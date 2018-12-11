<?php namespace Lovata\Toolbox\Classes\Parser;

use Yaml;
use October\Rain\Filesystem\Filesystem;

/**
 * Class UpdatePluginYAML
 * @package Lovata\Toolbox\Classes\Parser
 * @author  Sergey Zakharevich, s.zakharevich@lovata.com, LOVATA Group
 */
class UpdatePluginYAML
{
    const PLUGIN_NAVIGATION  = 'navigation';
    const PLUGIN_PERMISSIONS = 'permissions';
    const PLUGIN_SIDE_MENU   = 'sideMenu';

    const PREFIX_MENU = '-menu-';

    /** @var string */
    protected $sFile = 'plugin.yaml';
    /** @var string */
    protected $sPluginYAMLPath = '';
    /** @var array */
    protected $arData = [];
    /** @var array */
    protected $arYAML = [];
    /** @var array */
    protected $arMainMenu = [];
    /** @var array */
    protected $arSideMenu = [];
    /** @var array */
    protected   $arPermission = [];
    /** @var bool */
    protected $bSave = true;

    /**
     * UpdatePluginYAML constructor.
     * @param array $arData
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct($arData = [])
    {
        $this->arData = $arData;
        $sAuthor = array_get($this->arData, 'replace.lower_author');
        $sPlugin = array_get($this->arData, 'replace.lower_plugin');

        if (empty($this->arData) || empty($sAuthor) || empty($sPlugin)) {
            return;
        }

        $this->sPluginYAMLPath = plugins_path($sAuthor.'/'.$sPlugin.'/'.$this->sFile);

        if (!file_exists($this->sPluginYAMLPath)) {
            $obPluginYAMLFile = new PluginYAMLFile($this->arData);
            $obPluginYAMLFile->create(true);
        }

        $this->processorYAML();
    }

    /**
     * Processing YAML
     */
    protected function processorYAML()
    {
        $this->arYAML = Yaml::parseFile($this->sPluginYAMLPath);

        $sLowerAuthor     = array_get($this->arData, 'replace.lower_author');
        $sLowerPlugin     = array_get($this->arData, 'replace.lower_plugin');
        $sLowerController = array_get($this->arData, 'replace.lower_controller');
        $sLowerModel      = array_get($this->arData, 'replace.lower_model');

        $sKeyMainMenu   = $sLowerPlugin.self::PREFIX_MENU.'main';
        $sKeySideMenu   = $sLowerPlugin.self::PREFIX_MENU.$sLowerController;
        $sKeyPermission = $sLowerPlugin.self::PREFIX_MENU.$sLowerController;

        $arNavigation  = array_get($this->arYAML, self::PLUGIN_NAVIGATION);
        $arPermissions = array_get($this->arYAML, self::PLUGIN_PERMISSIONS);

        $arMainMenuCurrent   = array_get($arNavigation, $sKeyMainMenu);
        $arSideMenuCurrent   = array_get($arMainMenuCurrent, self::PLUGIN_SIDE_MENU.'.'.$sKeySideMenu);
        $arPermissionCurrent = array_get($arPermissions, $sKeyPermission);

        if (empty($arNavigation) || count($arNavigation) == 0 || empty($arMainMenuCurrent)) {
            $this->setMainMenu($sLowerAuthor, $sLowerPlugin, $sLowerController);
        } else {
            $this->arMainMenu = $arMainMenuCurrent;
        }

        if (empty($arSideMenuCurrent)) {
            $this->setSideMenu($sLowerAuthor, $sLowerPlugin, $sLowerController);
        } else {
            $this->arSideMenu = $arSideMenuCurrent;
        }

        if (empty($arPermissionCurrent)) {
            $this->setPermission($sLowerAuthor, $sLowerPlugin, $sLowerModel);
        } else {
            $this->arPermission = $arPermissionCurrent;
        }

        $this->setYAML($sKeyMainMenu, $sKeySideMenu, $sKeyPermission);
        $this->save();
    }

    /**
     * Set main menu
     * @param string $sLowerAuthor
     * @param string $sLowerPlugin
     * @param string $sLowerController
     */
    protected function setMainMenu($sLowerAuthor = '', $sLowerPlugin = '', $sLowerController = '')
    {
        if (empty($sLowerAuthor) || empty($sLowerPlugin) || empty($sLowerController) || !$this->bSave) {
            $this->bSave = false;

            return;
        }

        $sLabel      = $sLowerAuthor.'.'.$sLowerPlugin.'::lang.menu.main';
        $sURL        = $sLowerAuthor.'/'.$sLowerPlugin.'/'.$sLowerController;
        $sPermission = $sLowerPlugin.'-menu-*';

        $this->arMainMenu['label']         = $sLabel;
        $this->arMainMenu['url']           = $sURL;
        $this->arMainMenu['icon']          = 'icon-smile-o';
        $this->arMainMenu['permissions'][] = $sPermission;
    }

    /**
     * Set side menu
     * @param string $sLowerAuthor
     * @param string $sLowerPlugin
     * @param string $sLowerController
     */
    protected function setSideMenu($sLowerAuthor, $sLowerPlugin, $sLowerController)
    {
        if (empty($sLowerAuthor) || empty($sLowerPlugin) || empty($sLowerController) || !$this->bSave) {
            $this->bSave = false;

            return;
        }

        $sLabel      = $sLowerAuthor.'.'.$sLowerPlugin.'::lang.menu.'.$sLowerController;
        $sURL        = $sLowerAuthor.'/'.$sLowerPlugin.'/'.$sLowerController;
        $sPermission = $sLowerPlugin.self::PREFIX_MENU.$sLowerController;

        $this->arSideMenu['label']         = $sLabel;
        $this->arSideMenu['url']           = $sURL;
        $this->arSideMenu['icon']          = 'icon-paw';
        $this->arSideMenu['permissions'][] = $sPermission;
    }

    /** Set permission
     * @param string $sLowerAuthor
     * @param string $sLowerPlugin
     * @param string $sLowerModel
     */
    protected function setPermission($sLowerAuthor, $sLowerPlugin, $sLowerModel)
    {
        if (empty($sLowerAuthor) || empty($sLowerPlugin) || empty($sLowerModel) || !$this->bSave) {
            $this->bSave = false;

            return;
        }

        $sTab   = $sLowerAuthor.'.'.$sLowerPlugin.'::lang.tab.permissions';
        $sLabel = $sLowerAuthor.'.'.$sLowerPlugin.'::lang.permission.'.$sLowerModel;

        $this->arPermission['label'] = $sLabel;
        $this->arPermission['tab']   = $sTab;
    }

    /**
     * Set YAML
     * @param string $sKeyMainMenu
     * @param string $sKeySideMenu
     * @param string $sKeyPermission
     */
    protected function setYAML($sKeyMainMenu, $sKeySideMenu, $sKeyPermission)
    {
        if (empty($sKeyMainMenu) || empty($sKeySideMenu) || empty($sKeyPermission) || !$this->bSave) {
            $this->bSave = false;

            return;
        }

        array_set($this->arMainMenu, self::PLUGIN_SIDE_MENU.'.'.$sKeySideMenu, $this->arSideMenu);
        array_set($this->arYAML, self::PLUGIN_NAVIGATION.'.'.$sKeyMainMenu, $this->arMainMenu);
        array_set($this->arYAML, self::PLUGIN_PERMISSIONS.'.'.$sKeyPermission, $this->arPermission);
    }

    /**
     * Save plugin.yaml
     */
    protected function save()
    {
        if ($this->bSave) {
            $sContent = Yaml::render($this->arYAML);
            $obFile = new Filesystem();
            $obFile->put($this->sPluginYAMLPath, $sContent);
        }
    }
}
