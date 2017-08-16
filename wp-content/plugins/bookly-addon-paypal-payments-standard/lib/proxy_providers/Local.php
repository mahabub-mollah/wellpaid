<?php
namespace BooklyPaypalPaymentsStandard\Lib\ProxyProviders;

use BooklyPaypalPaymentsStandard\Lib;
use BooklyPaypalPaymentsStandard\Frontend\Modules as Frontend;
use BooklyPaypalPaymentsStandard\Backend\Modules as Backend;

/**
 * Class Local
 * Provide local methods to be used in Bookly and other add-ons.
 *
 * @package BooklyPaypalPaymentsStandard\Lib\ProxyProviders
 */
abstract class Local extends \Bookly\Lib\Base\ProxyProvider
{
    /******************************************************************************************************************
     * FRONTEND                                                                                                       *
     ******************************************************************************************************************/

    /**
     * Outputs HTML form for PayPal Payments Standard.
     *
     * @param string $form_id
     * @param string $page_url
     */
    public static function renderPaymentForm( $form_id, $page_url )
    {
        if ( Lib\Plugin::enabled() ) {
            Frontend\Paypal\Controller::getInstance()->renderPaymentForm( $form_id, $page_url );
        }
    }

    /******************************************************************************************************************
     * BACKEND                                                                                                        *
     ******************************************************************************************************************/

    /**
     * Add option to enable PayPal Payments Standard.
     *
     * @param array $options
     * @return array
     */
    public static function prepareToggleOptions( array $options )
    {
        $options[] = array( \Bookly\Lib\Payment\PayPal::TYPE_PAYMENTS_STANDARD, 'PayPal Payments Standard' );

        return $options;
    }

    /**
     * Prints list of options to set up PayPal Payments Standard
     */
    public static function renderSetUpOptions()
    {
        Backend\Settings\Components::getInstance()->renderOptions();
    }

}