<?php
namespace BooklyServiceExtras\Frontend\Modules\Extras;

/**
 * Class Controller
 * @package BooklyServiceExtras\Frontend\Modules\Extras
 */
class Controller extends \Bookly\Lib\Base\Controller
{
    /**
     * Render Extras step on Frontend.
     */
    public function renderStep( \Bookly\Lib\UserBookingData $userData, $show_cart_btn, $info_text, $progress_tracker )
    {
        $chain = array();
        $chain_price = null;
        foreach ( $userData->chain->getItems() as $chain_item ) {
            /** @var \Bookly\Lib\Entities\Service $service */
            $service = \Bookly\Lib\Entities\Service::query()->where( 'id', $chain_item->get( 'service_id' ) )->findOne();
            if ( $service->get( 'type' ) == \Bookly\Lib\Entities\Service::TYPE_COMPOUND ) {
                $service_id = current( json_decode( $service->get( 'sub_services' ), true ) );
                $chain_price += $service->get( 'price' );
            } else {
                $service_id = $service->get( 'id' );
                if ( count( $chain_item->get( 'staff_ids' ) ) == 1 ) {
                    $staff_service = \Bookly\Lib\Entities\StaffService::query()
                        ->select( 'price' )
                        ->where( 'service_id', $service->get( 'id' ) )
                        ->where( 'staff_id', current( $chain_item->get( 'staff_ids' ) ) )
                        ->fetchRow();
                    $chain_price += $staff_service['price'];
                }
            }
            $chain[] = array(
                'service_title'  => $service->getTitle(),
                'service_id'     => $service_id,
                'extras'         => (array) \Bookly\Lib\Proxy\ServiceExtras::findByServiceId( $service_id ),
                'checked_extras' => $chain_item->get( 'extras' ),
            );
        }
        $show = get_option( 'bookly_service_extras_show' );

        return $this->render( 'step_extras', compact( 'chain', 'show', 'show_cart_btn', 'info_text', 'progress_tracker', 'chain_price' ), false );
    }

}