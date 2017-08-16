<?php
namespace BooklyPaypalPaymentsStandard\Lib\ProxyProviders;

use BooklyPaypalPaymentsStandard\Lib;
use BooklyPaypalPaymentsStandard\Frontend\Modules\Paypal;

/**
 * Class Shared
 * Provide shared methods to be used in Bookly.
 *
 * @package BooklyPaypalPaymentsStandard\Lib\ProxyProviders
 */
abstract class Shared extends \Bookly\Lib\Base\ProxyProvider
{
    /******************************************************************************************************************
     * FRONTEND                                                                                                       *
     ******************************************************************************************************************/

    /**
     * Process payment action.
     *
     * @param string $action
     */
    public static function handleRequestAction( $action )
    {
        if ( Lib\Plugin::enabled() ) {
            switch ( $action ) {
                case 'paypal-ps-return':
                    Paypal\Controller::getInstance()->success();
                    break;
                case 'paypal-ps-cancel':
                    Paypal\Controller::getInstance()->cancel();
                    break;
                case 'paypal-ps-ipn':
                    Paypal\Controller::getInstance()->ipn();
                    break;
            }
        }
    }

    /******************************************************************************************************************
     * BACKEND                                                                                                        *
     ******************************************************************************************************************/

    /**
     * Add add-on option to array of payment options to be saved in Bookly Settings.
     *
     * @param array $options
     * @return array
     */
    public static function preparePaymentOptions( array $options )
    {
        if ( Lib\Plugin::enabled() ) {
            $options[] = 'bookly_pmt_paypal_id';
        }

        return $options;
    }

    /**
     * Alter and apply payment options data before saving in Bookly Settings.
     *
     * @param array $data
     * @return array
     */
    public static function preparePaymentOptionsData( array $data )
    {
        if ( $data['bookly_pmt_paypal'] === 'ps' ) {
            update_option( Lib\Plugin::getPrefix() . 'enabled', '1' );
        }

        return $data;
    }

}