<?php
namespace BooklyPaypalPaymentsStandard\Lib;

use BooklyPaypalPaymentsStandard\Frontend\Modules as Frontend;

/**
 * Class Plugin
 * @package BooklyPaypalPaymentsStandard\Lib
 */
abstract class Plugin extends \Bookly\Lib\Base\Plugin
{
    protected static $prefix;
    protected static $title;
    protected static $version;
    protected static $slug;
    protected static $directory;
    protected static $main_file;
    protected static $basename;
    protected static $text_domain;
    protected static $root_namespace;

    /**
     * Register hooks.
     */
    public static function registerHooks()
    {
        parent::registerHooks();

        // Register proxy methods.
        ProxyProviders\Local::registerMethods();
        ProxyProviders\Shared::registerMethods();

        Frontend\Paypal\Controller::getInstance();
    }

    /**
     * Disable plugin
     */
    public static function disable()
    {
        if ( get_option( 'bookly_pmt_paypal' ) === 'ps' ) {
            update_option( 'bookly_pmt_paypal', 'disabled');
        }
        parent::disable();
    }

    /**
     * Deactivate plugin
     *
     * @param bool $network_wide
     */
    public static function deactivate( $network_wide )
    {
        if ( get_option( 'bookly_pmt_paypal' ) === 'ps' ) {
            update_option( 'bookly_pmt_paypal', 'disabled');
        }
        parent::deactivate( $network_wide );
    }
}
