<?php
namespace BooklyServiceExtras\Lib\ProxyProviders;

use BooklyServiceExtras\Lib;
use BooklyServiceExtras\Backend\Modules as Backend;
use BooklyServiceExtras\Frontend\Modules as Frontend;

/**
 * Class Local
 * Provide local methods to be used in Bookly and other add-ons.
 *
 * @package BooklyServiceExtras\Lib\ProxyProviders
 */
abstract class Local extends \Bookly\Lib\Base\ProxyProvider
{
    /******************************************************************************************************************
     * FRONTEND                                                                                                       *
     ******************************************************************************************************************/

    /**
     * Render step Extras on frontend.
     *
     * @param \Bookly\Lib\UserBookingData   $userData
     * @param bool      $show_cart_btn
     * @param string    $info_text
     * @param string    $progress_tracker
     * @return string
     */
    public static function getStepHtml( \Bookly\Lib\UserBookingData $userData, $show_cart_btn, $info_text, $progress_tracker )
    {
        return Frontend\Extras\Controller::getInstance()->renderStep( $userData, $show_cart_btn, $info_text, $progress_tracker );
    }

    /******************************************************************************************************************
     * BACKEND                                                                                                        *
     ******************************************************************************************************************/

    /**
     * Find extras by given ids.
     *
     * @param array $extras_ids
     * @return Lib\Entities\ServiceExtra[]
     */
    public static function findByIds( array $extras_ids )
    {
        return Lib\Entities\ServiceExtra::query()->whereIn( 'id', $extras_ids )->find();
    }

    /**
     * Return sum durations of Extras
     *
     * @param array  $extras
     * @return int
     */
    public static function getTotalDuration( array $extras )
    {
        $duration = 0;
        $items = Lib\Entities\ServiceExtra::query()
            ->select( 'id, duration' )
            ->whereIn( 'id', array_keys( $extras ) )
            ->indexBy( 'id' )
            ->fetchArray();
        foreach ( $items as $extra_id => $values ) {
            $duration += $extras[ $extra_id ] * $values['duration'];
        }

        return $duration;
    }

    /**
     * Reorder Extras.
     * @hook bookly_service_extras_reorder
     *
     * @param array $order
     */
    public static function reorder( $order )
    {
        foreach ( (array) $order as $position => $extra_id ) {
            $extra = new Lib\Entities\ServiceExtra();
            $extra->load( $extra_id );
            $extra->set( 'position', $position );
            $extra->save();
        }
    }

    /**
     * Find extras by service id.
     *
     * @param int   $service_id
     * @return Lib\Entities\ServiceExtra[]
     */
    public static function findByServiceId( $service_id )
    {
        return Lib\Entities\ServiceExtra::query()->where( 'service_id', $service_id )->sortBy( 'position' )->find();
    }

    /**
     * Find all extras.
     *
     * @return Lib\Entities\ServiceExtra[]
     */
    public static function findAll()
    {
        return Lib\Entities\ServiceExtra::query()->sortBy( 'title' )->find();
    }

    /**
     * Get extras data for given json data of appointment.
     *
     * @param string $extras_json
     * @param bool   $translate
     * @return array
     */
    public static function getInfo( $extras_json, $translate )
    {
        $default = array();
        $extras  = json_decode( $extras_json, true );
        foreach ( \Bookly\Lib\Proxy\ServiceExtras::findByIds( array_keys( $extras ) ) as $extra ) {
            $quantity  = $extras[ $extra->get( 'id' ) ];
            $default[] = array(
                'title' => Lib\Utils\Common::formatTitle(
                    $translate
                        ? $extra->getTitle()
                        : $extra->get( 'title' ) ?: __( 'Untitled', 'bookly' ),
                    $quantity
                ),
                'price' => $extra->get( 'price' ) * $quantity,
            );
        }

        return $default;
    }

    /**
     * Render extras tab in Bookly Appearance.
     *
     * @param string $progress_tracker
     */
    public static function renderAppearance( $progress_tracker )
    {
        if ( Lib\Plugin::enabled() ) {
            Backend\Appearance\Controller::getInstance()->renderAppearance( $progress_tracker );
        }
    }

}