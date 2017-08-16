<?php
namespace BooklyServiceExtras\Backend\Modules\Appearance;

use BooklyServiceExtras\Lib;
use Bookly\Backend\Modules\Appearance\Lib\Helper;

/**
 * Class Controller
 * @package BooklyServiceExtras\Backend\Modules\Appearance
 */
class Controller extends \Bookly\Lib\Base\Controller
{
    /**
     * Render Extras tab on Appearance.
     *
     * @param string $progress_tracker
     */
    public function renderAppearance( $progress_tracker )
    {
        $editable = new Helper();

        $this->render( 'appearance', compact( 'progress_tracker', 'editable' ) );
    }
}