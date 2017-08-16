<?php
namespace BooklyPaypalPaymentsStandard\Lib;

/**
 * Class Installer
 * @package BooklyPaypalPaymentsStandard\Lib
 */
class Installer extends \Bookly\Lib\Base\Installer
{
    public function __construct()
    {
        //empty
    }

    /**
     * Remove data.
     */
    public function removeData()
    {
        if ( get_option( 'bookly_pmt_paypal' ) === 'ps' ) {
            update_option( 'bookly_pmt_paypal', 'disabled');
        }
        parent::removeData();
    }
}
