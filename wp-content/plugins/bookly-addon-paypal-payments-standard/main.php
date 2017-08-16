<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Bookly PayPal Payments Standard (Add-on)
Plugin URI: http://booking-wp-plugin.com
Description: Bookly PayPal Payments Standard allows your client to use PayPal Payments Standard payment method.
Version: 1.1
Author: Ladela Interactive
Author URI: http://booking-wp-plugin.com
Text Domain: bookly-paypal-payments-standard
Domain Path: /languages
License: Commercial
*/

include_once __DIR__ . '/autoload.php';

if ( class_exists( '\Bookly\Lib\Plugin' ) && version_compare( Bookly\Lib\Plugin::getVersion(), '13.3', '>=' ) ) {
    BooklyPaypalPaymentsStandard\Lib\Plugin::run();
} else {
    add_action( 'init', function () {
        if ( current_user_can( 'activate_plugins' ) ) {
            add_action( 'admin_init', function () {
                deactivate_plugins( 'bookly-addon-paypal-payments-standard/main.php', false, is_network_admin() );
            } );
            add_action( is_network_admin() ? 'network_admin_notices' : 'admin_notices', function () {
                printf( '<div class="updated"><h3>Bookly PayPal Payments Standard (Add-on)</h3><p>The plugin has been <strong>deactivated</strong>.</p><p><strong>Bookly v%s</strong> is required.</p></div>',
                    '13.3'
                );
            } );
            unset ( $_GET['activate'], $_GET['activate-multi'] );
        }
    } );
}