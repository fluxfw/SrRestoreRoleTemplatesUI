<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\DIC\SrRestoreRoleTemplates\DICTrait;
use srag\Plugins\SrRestoreRoleTemplates\Utils\SrRestoreRoleTemplatesTrait;

/**
 * Class ilSrRestoreRoleTemplatesUIPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrRestoreRoleTemplatesUIPlugin extends ilUserInterfaceHookPlugin
{

    use DICTrait;
    use SrRestoreRoleTemplatesTrait;

    const PLUGIN_CLASS_NAME = ilSrRestoreRoleTemplatesPlugin::class;
    const PLUGIN_ID = "srresroltemui";
    const PLUGIN_NAME = "SrRestoreRoleTemplatesUI";
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * ilSrRestoreRoleTemplatesUIPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }
}
