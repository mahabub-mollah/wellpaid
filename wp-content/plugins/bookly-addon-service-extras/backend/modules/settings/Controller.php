<?php
namespace BooklyServiceExtras\Backend\Modules\Settings;

use BooklyServiceExtras\Lib;

/**
 * Class Controller
 * @package BooklyServiceExtras\Backend\Modules\Settings
 */
class Controller extends \Bookly\Lib\Base\Controller
{
    /**
     * Render settings
     */
    public function renderSettingsForm()
    {
        $this->render( 'settings_form' );
    }

}