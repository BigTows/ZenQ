<?php
/**
 * Created by PhpStorm.
 * File: PluginExtended.php.
 * Created: bigtows.
 * Created date: 24/08/2017  11:52
 * Description:
 */

namespace CMS;

require_once 'PluginInterface.php';

abstract class PluginExtended implements Plugin {

    private $namePlugin;
    private $versionPlugin;

    public function __construct($name, $version = "1.0") {
        $this->namePlugin = $name;
        $this->versionPlugin = $version;

    }

    function getName() {
        return $this->namePlugin;
    }

    function getVersion() {
        return $this->versionPlugin;
    }

    function onReady(): string {
        return "Plugin " . $this->getName() . " ready";
    }
}