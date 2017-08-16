<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    echo $progress_tracker;
    $amount = 0;
    $extras_exist = false;
?>
<div class="bookly-box"><?php echo $info_text ?></div>

<div class="bookly-extra-step">
    <?php foreach ( $chain as $chain_id => $chain_item ) : ?>
    <div class="bookly-js-extras-container<?php if ( ! empty( $chain_item['extras'] ) ) : ?> bookly-box<?php endif ?>" data-chain="<?php echo $chain_id ?>">
        <?php if ( ! empty( $chain_item['extras'] ) ) : ?>
            <?php $extras_exist = true ?>
            <?php if ( count( $chain ) > 1 ) : ?>
                <div class="bookly-box"><b><?php echo $chain_item['service_title'] ?></b></div>
            <?php endif ?>

            <?php foreach ( $chain_item['extras'] as $extra ) :
                $extra_id = $extra->get( 'id' );
                $extra_price = $extra->get( 'price' );
                $extra_count = empty( $chain_item['checked_extras'][ $extra_id ] ) ? 0 : $chain_item['checked_extras'][ $extra_id ];
                ?>
                <div class="bookly-extras-item bookly-js-extras-item" data-id="<?php echo $extra_id ?>" data-price="<?php echo $extra_price ?>" data-max_quantity="<?php echo $extra->get( 'max_quantity' ) ?>">
                    <div class="bookly-extras-thumb bookly-js-extras-thumb<?php if ( $extra_count ): ?> bookly-extras-selected<?php endif ?>">
                        <?php if ( in_array( 'image', $show ) ) : ?>
                            <?php if ( $extra->get( 'attachment_id' ) &&
                                       $image_attributes = wp_get_attachment_image_src( $extra->get( 'attachment_id' ), 'thumbnail' )
                            ) : ?>
                                <img style="margin-bottom: 8px" src="<?php echo $image_attributes[0] ?>"/>
                            <?php endif ?>
                        <?php endif ?>
                        <div>
                        <?php if ( in_array( 'title', $show ) ) : ?>
                            <span class='extra-widget-title'><?php echo $extra->getTitle() ?></span>
                        <?php endif ?>
                        <?php if ( $extra->get( 'duration' ) && in_array( 'duration', $show ) ) : ?>
                            <span class='extra-widget-duration'><?php echo \Bookly\Lib\Utils\DateTime::secondsToInterval( $extra->get( 'duration' ) ) ?></span>
                        <?php endif ?>
                        <?php if ( in_array( 'price', $show ) ) : ?>
                            <span class='extra-widget-price'><?php echo \Bookly\Lib\Utils\Common::formatPrice( $extra_price ) ?></span>
                        <?php endif ?>
                        </div>
                    </div>
                    <div<?php if ( $extra->get( 'max_quantity' ) <= 1 ): ?> style="display:none"<?php endif ?>>
                        <div class="bookly-extras-count-controls">
                            <button class="bookly-round bookly-js-count-control" type="button" style="margin-right: 5px"><i class="bookly-icon-sm bookly-icon-minus"></i></button><input type="text" readonly name="extra[]" value="<?php echo $extra_count ?>" /><button class="bookly-round bookly-js-count-control bookly-extras-increment bookly-js-extras-increment" type="button"><i class="bookly-icon-sm bookly-icon-plus"></i></button>
                        </div>
                        <div class="bookly-extras-total-price bookly-js-extras-total-price">
                            <?php echo \Bookly\Lib\Utils\Common::formatPrice( $extra_price * $extra_count ) ?>
                        </div>
                    </div>
                </div>
                <?php if ( isset( $chain_item['checked_extras'][ $extra_id ] ) ) :
                    $amount += $extra_price * $chain_item['checked_extras'][ $extra_id ];
                endif ?>
            <?php endforeach ?>
        <?php endif ?>
    </div>
    <?php endforeach ?>
    <?php if ( ! $extras_exist ) : ?>
        <div class="bookly-box"><?php _e( 'No Extras.', 'bookly-service-extras' ) ?></div>
    <?php endif ?>

    <?php if ( in_array( 'summary', $show ) ) : ?>
        <div class="bookly-box bookly-extras-summary bookly-js-extras-summary"><?php _e( 'Summary', 'bookly-service-extras' ) ?>:<?php if ( $chain_price !== null ): ?> <?php echo \Bookly\Lib\Utils\Common::formatPrice( $chain_price ) ?><?php endif ?><span><?php echo ( $amount ) ? ' + ' . \Bookly\Lib\Utils\Common::formatPrice( $amount ) : '' ?></span></div>
    <?php endif ?>
</div>

<div class="bookly-box bookly-nav-steps">
    <button class="bookly-back-step bookly-js-back-step bookly-btn ladda-button" data-style="zoom-in" style="margin-right: 10px;" data-spinner-size="40">
        <span class="ladda-label"><?php echo \Bookly\Lib\Utils\Common::getTranslatedOption( 'bookly_l10n_button_back' ) ?></span>
    </button>
    <?php if ( $show_cart_btn ) : ?>
        <button class="bookly-go-to-cart bookly-js-go-to-cart bookly-round bookly-round-md ladda-button" data-style="zoom-in" data-spinner-size="30"><span class="ladda-label"><img src="<?php echo plugins_url( 'appointment-booking/frontend/resources/images/cart.png' ) ?>" /></span></button>
    <?php endif ?>
    <button class="bookly-next-step bookly-js-next-step bookly-btn ladda-button" data-style="zoom-in" data-spinner-size="40">
        <span class="ladda-label"><?php echo \Bookly\Lib\Utils\Common::getTranslatedOption( 'bookly_l10n_step_extras_button_next' ) ?></span>
    </button>
</div>