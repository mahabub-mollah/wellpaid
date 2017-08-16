<?php
namespace BooklyServiceExtras\Lib\ProxyProviders;

use BooklyServiceExtras\Lib;
use BooklyServiceExtras\Backend\Modules as Backend;

/**
 * Class Shared
 * Provide shared methods to be used in Bookly.
 *
 * @package BooklyServiceExtras\Lib\ProxyProviders
 */
abstract class Shared extends \Bookly\Lib\Base\ProxyProvider
{
    /******************************************************************************************************************
     * FRONTEND                                                                                                       *
     ******************************************************************************************************************/

    /**
     * Add extras titles for chain item
     *
     * @param array     $data
     * @param \Bookly\Lib\ChainItem $chain_item
     * @return array
     */
    public static function prepareChainItemInfoText( $data, \Bookly\Lib\ChainItem $chain_item )
    {
        $titles = array();
        $extras = $chain_item->get( 'extras' );
        if ( ! empty( $extras ) ) {
            foreach ( \Bookly\Lib\Proxy\ServiceExtras::findByIds( array_keys( $extras ) ) as $extra ) {
                $titles[] = Lib\Utils\Common::formatTitle( $extra->getTitle(), $extras[ $extra->get( 'id' ) ] );
            }
        }
        $data['extras'][] = implode( ', ', $titles );

        return $data;
    }

    /**
     * Add extras titles for cart item
     *
     * @param array     $data
     * @param \Bookly\Lib\CartItem $cart_item
     * @return array
     */
    public static function prepareCartItemInfoText( $data, \Bookly\Lib\CartItem $cart_item )
    {
        $titles = array();
        $extras = $cart_item->get( 'extras' );
        if ( ! empty( $extras ) ) {
            foreach ( \Bookly\Lib\Proxy\ServiceExtras::findByIds( array_keys( $extras ) ) as $extra ) {
                $titles[] = Lib\Utils\Common::formatTitle( $extra->getTitle(), $extras[ $extra->get( 'id' ) ] );
            }
        }
        $data['extras'][] = implode( ', ', $titles );

        return $data;
    }

    /**
     * Add {extras} code to booking
     *
     * @param array $info_text_codes
     * @param array $data
     * @return array
     */
    public static function prepareInfoTextCodes( array $info_text_codes, array $data )
    {
        $info_text_codes['{extras}'] = '<b>' . implode( ', ', $data['extras'] ) . '</b>';

        return $info_text_codes;
    }

    /**
     * Prepare data for notification codes.
     *
     * @param \Bookly\Lib\NotificationCodes     $codes
     * @param \Bookly\Lib\Entities\CustomerAppointment $ca
     * @return \Bookly\Lib\NotificationCodes
     */
    public static function prepareNotificationCodes( \Bookly\Lib\NotificationCodes $codes, \Bookly\Lib\Entities\CustomerAppointment $ca )
    {
        $extras = (array) json_decode( $ca->get( 'extras' ), true );
        $titles = array();
        $price  = 0.0;
        /** @var Lib\Entities\ServiceExtra $extra */
        foreach ( \Bookly\Lib\Proxy\ServiceExtras::findByIds( array_keys( $extras ) ) as $extra ) {
            $quantity = $extras[ $extra->get( 'id' ) ];
            $titles[] = Lib\Utils\Common::formatTitle( $extra->getTitle(), $quantity );
            $price   += $extra->get( 'price' ) * $quantity;
        }
        $codes->set( 'extras', implode( ', ', $titles ) );
        $codes->set( 'extras_total_price', $price );

        return $codes;
    }

    /**
     * Prepare replacements for notification codes.
     *
     * @param array     $codes
     * @param \Bookly\Lib\NotificationCodes $notification_codes
     * @param string    $format
     * @return array
     */
    public static function prepareReplaceCodes( array $codes, \Bookly\Lib\NotificationCodes $notification_codes, $format )
    {
        $extras = $notification_codes->get( 'extras' );
        if ( $format == 'text' ) {
            /** @see \BooklyServiceExtras\Lib\Utils\Common::formatTitle() */
            $extras = str_replace( '&nbsp;&times;&nbsp;', ' x ', $extras );
        }
        $codes['{extras}']             = $extras;
        $codes['{extras_total_price}'] = \Bookly\Lib\Utils\Common::formatPrice( $notification_codes->get( 'extras_total_price' ) );

        return $codes;
    }

    /******************************************************************************************************************
     * BACKEND                                                                                                        *
     ******************************************************************************************************************/

    /**
     * Add on calender info about extras.
     *
     * @param string $description
     * @param  \Bookly\Lib\Entities\CustomerAppointment | array $appointment_data
     * @return string
     */
    public static function prepareCalendarAppointmentDescription( $description, $appointment_data )
    {
        $ca_extras = '[]';
        if ( $appointment_data instanceof \Bookly\Lib\Entities\CustomerAppointment ) {
            $ca_extras = $appointment_data->get( 'extras' );
        } elseif ( is_array( $appointment_data ) && isset( $appointment_data['extras'] ) ) {
            $ca_extras = $appointment_data['extras'];
        }
        if ( $ca_extras != '[]' ) {
            $extras = (array) json_decode( $ca_extras, true );
            $items = \Bookly\Lib\Proxy\ServiceExtras::findByIds( array_keys( $extras ) );
            if ( ! empty( $items ) ) {
                $description .= sprintf(
                    '<br/><div>%s: %s</div>',
                    __( 'Extras', 'bookly-service-extras' ),
                    implode( ', ', array_map( function ( $extra ) use ( $extras ) {
                        /** @var Lib\Entities\ServiceExtra $extra */
                        $id    = $extra->get( 'id' );
                        $title = $extra->get( 'title' );
                        if ( $extras[ $id ] > 1 ) {
                            $title = $extras[ $id ] . '&nbsp;&times;&nbsp;' . $title;
                        }

                        return $title;
                    }, $items ) )
                );
            }
        }

        return $description;
    }

    /**
     * Prepare appearance codes.
     *
     * @param array $codes
     * @return array
     */
    public static function prepareAppearanceCodes( array $codes )
    {
        return array_merge( $codes, array(
            array( 'code' => 'extras', 'description' => __( 'extras titles', 'bookly-service-extras' ), 'flags' => array( 'step' => '>2' ) ),
        ) );
    }

    /**
     * Render form for creating new Extra in service profile.
     */
    public static function renderAfterServiceList()
    {
        Backend\Services\Controller::getInstance()->renderExtrasBlank();
    }

    /**
     * Prepare appearance options.
     *
     * @param array $options_to_save
     * @param array $options
     * @return array
     */
    public static function prepareAppearanceOptions( array $options_to_save, array $options )
    {
        if ( Lib\Plugin::enabled() ) {
            $options_to_save = array_merge( $options_to_save, array_intersect_key( $options, array_flip( array (
                'bookly_l10n_info_extras_step',
                'bookly_l10n_step_extras',
                'bookly_l10n_step_extras_button_next',
            ) ) ) );
        }

        return $options_to_save;
    }

    /**
     * Add {extras} code for WooCommerce.
     *
     * @param array $codes
     * @return array
     */
    public static function prepareWooCommerceShortCodes( array $codes )
    {
        $codes[] = array( 'code' => 'extras', 'description' => __( 'extras titles', 'bookly-service-extras' ) );

        return $codes;
    }

    /**
     * Add {extras*} codes for Notification.
     *
     * @param array $codes
     * @return array
     */
    public static function prepareNotificationShortCodes( array $codes )
    {
        $codes[] = array( 'code' => 'extras', 'description' => __( 'extras titles', 'bookly-service-extras' ), );
        $codes[] = array( 'code' => 'extras_total_price', 'description' => __( 'extras total price', 'bookly-service-extras' ), );

        return $codes;
    }

    /**
     * Save Extra.
     *
     * @param array     $alert
     * @param \Bookly\Lib\Entities\Service $service
     * @param array     $_post
     * @return array
     */
    public static function updateService( array $alert, \Bookly\Lib\Entities\Service $service, array $_post )
    {
        foreach ( $_post['extras'] as $data ) {
            $form = new Backend\Services\Forms\ServiceExtra();
            $data['service_id'] = $service->get( 'id' );
            $form->bind( $data );
            $form->save();
        }

        return $alert;
    }

    /**
     * Render Extras in Service form.
     *
     * @param array $service
     */
    public static function renderServiceForm( array $service )
    {
        Backend\Services\Controller::getInstance()->renderExtras( $service );
    }

    /**
     * Render extras settings form in Bookly Settings.
     */
    public static function renderSettingsForm()
    {
        Backend\Settings\Controller::getInstance()->renderSettingsForm();
    }

    /**
     * Render extras menu in Bookly Settings.
     */
    public static function renderSettingsMenu()
    {
        printf( '<li class="bookly-nav-item" data-target="#bookly_settings_service_extras" data-toggle="tab">%s</li>', __( 'Service Extras', 'bookly-service-extras' ) );
    }

    /**
     * Save Extras settings.
     *
     * @param array  $alert
     * @param string $tab
     * @param array  $_post
     * @return array
     */
    public static function saveSettings( array $alert, $tab, $_post )
    {
        if ( $tab == 'service_extras' && ! empty( $_post ) ) {
            if ( ! array_key_exists( 'bookly_service_extras_show', $_post ) ) {
                $_post['bookly_service_extras_show'] = array();
            }
            $options = array( 'bookly_service_extras_enabled', 'bookly_service_extras_show' );
            foreach ( $options as $option_name ) {
                if ( array_key_exists( $option_name, $_post ) ) {
                    update_option( $option_name, $_post[ $option_name ] );
                }
            }
            $alert['success'][] = __( 'Settings saved.', 'bookly' );
        }

        return $alert;
    }

}