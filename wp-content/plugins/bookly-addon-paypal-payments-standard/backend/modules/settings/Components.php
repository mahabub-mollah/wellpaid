<?php
namespace BooklyPaypalPaymentsStandard\Backend\Modules\Settings;

/**
 * Class Components
 * @package BooklyPaypalPaymentsStandard\Backend\Modules\Settings
 */
class Components extends \Bookly\Lib\Base\Components
{
    /**
     * Render a template file.
     */
    public function renderOptions()
    {
        $this->render( '_options' );
    }
}