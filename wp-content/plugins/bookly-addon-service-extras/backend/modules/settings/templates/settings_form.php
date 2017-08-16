<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="tab-pane" id="bookly_settings_service_extras">
    <form method="post" action="<?php echo esc_url( add_query_arg( 'tab', 'service_extras' ) ) ?>">
        <?php \Bookly\Lib\Utils\Common::optionToggle( 'bookly_service_extras_enabled', __( 'Extras', 'bookly-service-extras' ), __( 'This setting enables or disables the Extras step of booking. You can choose what information should be displayed to your clients by using the checkboxes below.', 'bookly-service-extras' ) ) ?>
        <?php \Bookly\Lib\Utils\Common::optionFlags( 'bookly_service_extras_show', array( array( 'title', __( 'Title', 'bookly' ) ), array( 'price', __( 'Price', 'bookly' ) ), 'image' => array( 'image', __( 'Image', 'bookly' ) ), 'duration' => array( 'duration', __( 'Duration', 'bookly' ) ), 'summary' => array( 'summary', __( 'Summary', 'bookly-service-extras' ) ) ), __( 'Show', 'bookly-service-extras' ) ) ?>
        <div class="panel-footer">
            <?php \Bookly\Lib\Utils\Common::submitButton() ?>
            <?php \Bookly\Lib\Utils\Common::resetButton() ?>
        </div>
    </form>
</div>