<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\DIC\SrRestoreRoleTemplates\DICTrait;
use srag\Plugins\SrRestoreRoleTemplates\UI\SrRestoreRoleTemplatesUICtrl;
use srag\Plugins\SrRestoreRoleTemplates\Utils\SrRestoreRoleTemplatesTrait;

/**
 * Class ilSrRestoreRoleTemplatesUIUIHookGUI
 */
class ilSrRestoreRoleTemplatesUIUIHookGUI extends ilUIHookPluginGUI
{

    use DICTrait;
    use SrRestoreRoleTemplatesTrait;

    const GET_PARAM_REF_ID = "ref_id";
    const GET_PARAM_TARGET = "target";
    const OBJECT_GUIS = [ilObjCategoryGUI::class, ilObjCourseGUI::class, ilObjFolderGUI::class, ilObjGroupGUI::class];
    const PAR_SUB_TABS = "sub_tabs";
    const PLUGIN_CLASS_NAME = ilSrRestoreRoleTemplatesPlugin::class;


    /**
     * ilSrRestoreRoleTemplatesUIUIHookGUI constructor
     */
    public function __construct()
    {

    }


    /**
     * @inheritDoc
     */
    public function modifyGUI(/*string*/ $a_comp, /*string*/ $a_part, /*array*/ $a_par = [])/*: void*/
    {
        if ($a_part === self::PAR_SUB_TABS) {

            if (self::dic()->ctrl()->getCmdClass() === strtolower(ilPermissionGUI::class)
                || (in_array(self::dic()->ctrl()->getCmdClass(), array_map("strtolower", self::OBJECT_GUIS))
                    && self::dic()
                        ->ctrl()
                        ->getCmd() === "edit")
            ) {

                SrRestoreRoleTemplatesUICtrl::addTabs($this->getRefId());
            }
        }
    }


    /**
     * @return int|null
     */
    protected function getRefId()/* : ?int*/
    {
        $obj_ref_id = filter_input(INPUT_GET, self::GET_PARAM_REF_ID);

        if ($obj_ref_id === null) {
            $param_target = filter_input(INPUT_GET, self::GET_PARAM_TARGET);

            $obj_ref_id = explode("_", $param_target)[1];
        }

        $obj_ref_id = intval($obj_ref_id);

        if ($obj_ref_id > 0) {
            return $obj_ref_id;
        } else {
            return null;
        }
    }
}
