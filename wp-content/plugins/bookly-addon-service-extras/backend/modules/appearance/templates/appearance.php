<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * @var Bookly\Backend\Modules\Appearance\Lib\Helper $editable
 */
?>
<div class="bookly-form">

    <!-- Progress Tracker-->
    <?php echo $progress_tracker ?>

    <div class="bookly-box">
        <?php $editable::renderText( 'bookly_l10n_info_extras_step', $this->render( '_codes', array( 'step' => 2 ), false ) ) ?>
    </div>
    <div class="bookly-extra-step">
        <div class="bookly-box">
            <div class="bookly-extras-item">
                <div class="bookly-extras-thumb bookly-extras-selected">
                    <div><img style="margin-bottom: 8px" src="<?php echo plugins_url( 'bookly-addon-service-extras/backend/modules/appearance/resources/images/medical.png' ) ?>" /></div>
                    <span>Dental Care Pack</span>
                    <strong><?php echo \Bookly\Lib\Utils\Common::formatPrice( 90 ) ?></strong>
                </div>
            </div>
            <div class="bookly-extras-item">
                <div class="bookly-extras-thumb">
                    <div><img style="margin-bottom: 8px" src="<?php echo plugins_url( 'bookly-addon-service-extras/backend/modules/appearance/resources/images/teeth.png' ) ?>" /></div>
                    <span>Special Toothbrush</span>
                    <strong><?php echo \Bookly\Lib\Utils\Common::formatPrice( 15 ) ?></strong>
                </div>
            </div>
            <div class="bookly-extras-item">
                <div class="bookly-extras-thumb">
                    <div><img style="margin-bottom: 8px" src="<?php echo plugins_url( 'bookly-addon-service-extras/backend/modules/appearance/resources/images/tool.png' ) ?>" /></div>
                    <span>Natural Toothpaste</span>
                    <strong><?php echo \Bookly\Lib\Utils\Common::formatPrice( 10 ) ?></strong>
                </div>
            </div>
        </div>

        <div class="bookly-extras-summary bookly-js-extras-summary bookly-box"><?php _e( 'Summary', 'bookly-service-extras' ) ?>: <?php echo \Bookly\Lib\Utils\Common::formatPrice( 350 ) ?> + <?php echo \Bookly\Lib\Utils\Common::formatPrice( 90 ) ?><span></span></div>
    </div>
    <div class="bookly-box bookly-nav-steps">
        <div class="bookly-back-step bookly-js-back-step bookly-btn">
            <?php $editable::renderString( array( 'bookly_l10n_button_back' ) ) ?>
        </div>
        <button class="bookly-go-to-cart bookly-js-go-to-cart bookly-round bookly-round-md ladda-button"><img src="<?php echo plugins_url( 'appointment-booking/frontend/resources/images/cart.png' ) ?>" /></button>
        <div class="bookly-next-step bookly-js-next-step bookly-btn">
            <?php $editable::renderString( array( 'bookly_l10n_step_extras_button_next' ) ) ?>
        </div>
    </div>
</div>