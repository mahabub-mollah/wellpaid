<?php
namespace BooklyPaypalPaymentsStandard\Frontend\Modules\Paypal;

use Bookly\Lib\Entities\CustomerAppointment;
use Bookly\Lib\Entities\Payment;
use Bookly\Lib\NotificationSender;
use Bookly\Lib\Payment\PayPal;
use Bookly\Lib\UserBookingData;
use Bookly\Lib\Utils\Common;

/**
 * Class Controller
 * @package BooklyPaypalPaymentsStandard\Frontend\Modules\Recurring
 */
class Controller extends \Bookly\Lib\Base\Controller
{

    /**
     * Process Payments Standard return request.
     */
    public function success()
    {
        $userData = new UserBookingData( $this->getParameter( 'bookly_fid' ) );
        $userData->load();
        $userData->setPaymentStatus( Payment::TYPE_PAYPAL, 'processing' );

        @wp_redirect( remove_query_arg( PayPal::$remove_parameters, Common::getCurrentPageURL() ) );
        exit;
    }

    /**
     * Process Payments Standard cancel request.
     */
    public function cancel()
    {
        $userData = new UserBookingData( $this->getParameter( 'bookly_fid' ) );
        $userData->load();
        $userData->setPaymentStatus( Payment::TYPE_PAYPAL, 'cancelled' );

        $this->cancelAppointment( $userData->getPaymentId() );

        @wp_redirect( remove_query_arg( PayPal::$remove_parameters, Common::getCurrentPageURL() ) );
        exit;
    }

    /**
     * Process Payments Standard IPN requests.
     */
    public function ipn()
    {
        if ( PayPal::verifyIPN() ) {
            $payment_id = (int) $this->getParameter( 'custom' );
            $payment    = new Payment();
            if ( $payment->loadBy( array( 'id' => $payment_id, 'type' => Payment::TYPE_PAYPAL ) ) ) {
                // Check if payment details match.
                switch ( false ) {
                    // Status
                    case ( $payment->get( 'status' ) != Payment::STATUS_COMPLETED ):
                        // Currency
                    case ( $this->getParameter( 'mc_currency' ) == get_option( 'bookly_pmt_currency' ) ):
                        // PayPal ID
                    case (
                        $this->getParameter( 'receiver_email' ) == get_option( 'bookly_pmt_paypal_id' ) ||
                        $this->getParameter( 'receiver_id' ) == get_option( 'bookly_pmt_paypal_id' )
                    ):
                        // Amount
                    case ( abs( $payment->get( 'paid' ) - $this->getParameter( 'mc_gross' ) ) < 0.000001 ): // comparing 2 float numbers
                        // Something doesn't match.
                        break;
                    default:
                        // All matches.
                        switch ( $this->getParameter( 'payment_status' ) ) { // Grouped cases used
                            case 'Completed':
                                $payment->set( 'status', Payment::STATUS_COMPLETED )->save();
                                $ca_list = CustomerAppointment::query()
                                    ->where( 'payment_id', $payment->get( 'id' ) )
                                    ->find();
                                NotificationSender::sendFromCart( $ca_list );
                                break;
                            case 'Denied':
                            case 'Expired':
                            case 'Failed':
                            case 'Reversed':
                            case 'Voided':
                                // Cancel application
                                $this->cancelAppointment( $payment->get( 'id' ) );
                                break;
                            case 'Canceled_Reversal':
                            case 'Created':
                            case 'Pending':
                            case 'Refunded':
                            case 'Processed':
                            default:
                                // Skip request
                                break;
                        }
                }

            }

        }
        exit;
    }

    public function renderPaymentForm( $form_id, $page_url )
    {
        $userData = new UserBookingData( $form_id );
        $userData->load();

        list ( $total, $deposit ) = $userData->cart->getInfo();

        $names = explode( ' ', $userData->get( 'name' ) );

        $replacement = array(
            '%action%'        => 'https://www' . ( get_option( 'bookly_pmt_paypal_sandbox' ) ? '.sandbox' : '' ) . '.paypal.com/cgi-bin/webscr',
            '%business%'      => get_option( 'bookly_pmt_paypal_id' ),
            '%amount%'        => $deposit,
            '%currency%'      => get_option( 'bookly_pmt_currency' ),
            '%item_name%'     => esc_attr( $userData->cart->getItemsTitle( 127 ) ),
            '%notify_url%'    => esc_attr( add_query_arg( array( 'bookly_action' => 'paypal-ps-ipn' ), $page_url ) ),
            '%return%'        => esc_attr( add_query_arg( array( 'bookly_action' => 'paypal-ps-return', 'bookly_fid' => $form_id ), $page_url ) ),
            '%cancel_return%' => esc_attr( add_query_arg( array( 'bookly_action' => 'paypal-ps-cancel', 'bookly_fid' => $form_id ), $page_url ) ),
            '%email%'         => $userData->get( 'email' ),
            '%first_name%'    => esc_attr( $names[0] ),
            '%last_name%'     => isset ( $names[1] ) ? esc_attr( $names[1] ) : '',
            '%back%'          => Common::getTranslatedOption( 'bookly_l10n_button_back' ),
            '%next%'          => Common::getTranslatedOption( 'bookly_l10n_step_payment_button_next' ),
            '%gateway%'       => Payment::TYPE_PAYPAL,
        );
        $form = '<form action="%action%" method="post" data-gateway="%gateway%">
            <input type="hidden" name="cmd" value="_xclick" />
            <input type="hidden" name="business" value="%business%" />
            <input type="hidden" name="amount" value="%amount%" class="bookly-payment-amount" />
            <input type="hidden" name="custom" value="" class="bookly-payment-id" />
            <input type="hidden" name="currency_code" value="%currency%" />
            <input type="hidden" name="item_name" value="%item_name%" />
            <input type="hidden" name="notify_url" value="%notify_url%" />
            <input type="hidden" name="return" value="%return%" />
            <input type="hidden" name="cancel_return" value="%cancel_return%" />
            <input type="hidden" name="email" value="%email%" />
            <input type="hidden" name="first_name" value="%first_name%" />
            <input type="hidden" name="last_name" value="%last_name%" />
            <input type="hidden" name="charset" value="utf-8" />
            <button class="bookly-back-step bookly-js-back-step bookly-btn ladda-button" data-style="zoom-in" style="margin-right: 10px;" data-spinner-size="40"><span class="ladda-label">%back%</span></button>
            <button class="bookly-next-step bookly-js-next-step bookly-btn ladda-button" data-style="zoom-in" data-spinner-size="40"><span class="ladda-label">%next%</span></button>
        </form>';

        echo strtr( $form, $replacement );
    }

    /**
     * Cancel appointment and payment
     *
     * @param int $payment_id
     */
    private function cancelAppointment( $payment_id )
    {
        \Bookly\Lib\Proxy\RecurringAppointments::cancelPayment( $payment_id );

        // Delete appointments.
        $ca_list = CustomerAppointment::query()
            ->where( 'payment_id', $payment_id )
            ->find();

        foreach ( $ca_list as $ca ) {
            /** @var CustomerAppointment $ca */
            $ca->deleteCascade();
        }

        // Delete payment.
        Payment::query()->delete()->where( 'id', $payment_id )->execute();
    }
}