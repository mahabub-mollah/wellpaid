<?php
namespace BooklyServiceExtras\Lib;

/**
 * Class Updater
 * @package BooklyServiceExtras\Lib
 */
class Updater extends \Bookly\Lib\Base\Updater
{
    function update_1_14()
    {
        $this->register_l10n_options( array( 'bookly_l10n_step_extras_button_next' => __( 'Next', 'bookly' ) ) );
    }

    function update_1_11()
    {
        $options = array(
            'ab_appearance_text_step_extras'      => 'bookly_l10n_step_extras',
            'ab_appearance_text_info_extras_step' => 'bookly_l10n_info_extras_step',
        );
        $this->rename_l10n_strings( $options );
    }

    function update_1_4()
    {
        /** \wpdb $wpda */
        global $wpdb;

        /** @var \Bookly\Lib\Entities\CustomerAppointment[] $appointments */
        $appointments = \Bookly\Lib\Entities\CustomerAppointment::query( 'ca' )
            ->select( 'ca.*' )
            ->whereNot( 'ca.extras', '[]' )
            ->order( 'DESC' )
            ->find();
        foreach ( $appointments as $appointment ) {
            $extras_old = (array) json_decode( $appointment->get( 'extras' ), true );
            if ( isset ( $extras_old[0] ) ) {
                $extras = array();
                foreach ( $extras_old as $extras_id ) {
                    $extras[ $extras_id ] = 1;
                }
                $appointment->set( 'extras', json_encode( $extras ) );
                $appointment->save();
            }
        }

        $wpdb->query( 'ALTER TABLE `' . Entities\ServiceExtra::getTableName() . '` ADD COLUMN `max_quantity` INT NOT NULL DEFAULT 1' );
    }

    function update_1_3()
    {
        $this->rename_options( array( 'bookly_service_extras_loaded' => 'bookly_service_extras_data_loaded' ) );
    }

    function update_1_2()
    {
        if ( get_option( 'bookly_service_extras_step_extras_enabled', 'missing' ) != 'missing' ) {
            $this->rename_options( array( 'bookly_service_extras_step_extras_enabled' => 'bookly_service_extras_enabled' ) );
        }
    }

}