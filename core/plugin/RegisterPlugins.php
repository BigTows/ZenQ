<?php
/**
 * Created by PhpStorm.
 * File: RegisterPlugins.php.
 * Created: bigtows.
 * Created date: 24/08/2017  12:03
 * Description:
 */

namespace CMS;

class RegisterPlugins {

    private $arrayPlugins = [];

    function __construct() {

    }

    public function registerPlugin(Plugin $plugin): bool {
        if ($this->getPluginByName($plugin->getName()) == null) {
            array_push($this->arrayPlugins, $plugin);
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function getAll(): array {
        return $this->arrayPlugins;
    }

    public function getPluginByName($name) {
        foreach ($this->arrayPlugins as $plugin) {
            if ($plugin->getName() == $name) {
                return $plugin;
            }
        }
        return null;
    }
}