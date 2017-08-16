<?php
/**
 * Template to show options to set up PayPal Payments Standard
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="bookly-paypal-ps">
    <?php \Bookly\Lib\Utils\Common::optionText( 'bookly_pmt_paypal_id', __( 'PayPal ID', 'bookly-paypal-payments-standard' ), __( 'Your PayPal ID or an email address associated with your PayPal account. Email addresses must be confirmed.', 'bookly-paypal-payments-standard' ) ) ?>
</div>
