<?php
namespace BooklyServiceExtras\Lib;

/**
 * Class Plugin
 * @package BooklyServiceExtras\Lib
 */
abstract class Plugin extends \Bookly\Lib\Base\Plugin
{
    protected static $prefix;
    protected static $title;
    protected static $version;
    protected static $slug;
    protected static $directory;
    protected static $main_file;
    protected static $basename;
    protected static $text_domain;
    protected static $root_namespace;

    /**
     * Register hooks.
     */
    public static function registerHooks()
    {
        parent::registerHooks();

        // Register proxy methods.
        ProxyProviders\Local::registerMethods();
        ProxyProviders\Shared::registerMethods();

        if ( is_admin() ) {
            \BooklyServiceExtras\Backend\Modules\Services\Controller::getInstance();
        }
    }

}