<?php
namespace BooklyServiceExtras\Backend\Modules\Services;

use BooklyServiceExtras\Lib;

/**
 * Class Controller
 * @package BooklyServiceExtras\Backend\Modules\Services
 */
class Controller extends \Bookly\Lib\Base\Controller
{

    public function executeDeleteServiceExtra()
    {
        $extra = new Lib\Entities\ServiceExtra();
        $extra->set( 'id', $_POST['id'] );
        $extra->delete();
        wp_send_json_success();
    }

    /**
     * Render Extras form on Service edit page.
     */
    public function renderExtrasBlank()
    {
        $this->render( 'extras_blank' );
    }

    /**
     * Render Extras in service form.
     *
     * @param array $service
     */
    public function renderExtras( array $service )
    {
        $service_id = $service['id'];
        $extras = \Bookly\Lib\Proxy\ServiceExtras::findByServiceId( $service_id );
        $time_interval = get_option( 'bookly_gen_time_slot_length' );

        $this->render( 'extras', compact( 'service_id', 'extras', 'time_interval' ) );
    }

}