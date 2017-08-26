<?php
/**
 * Created by PhpStorm.
 * File: API.php.
 * Created: bigtows.
 * Created date: 24/08/2017  12:21
 * Description:
 */

namespace CMS;

require_once 'core/plugin/RegisterPlugins.php';
require_once 'Utils/Log.php';

class API {

    const INFO_LOG = 1;
    const ERROR_LOG = 2;

    public static function registerPlugin(Plugin $plugin) {
        API::init();
        Log::i("Try Register plugin " . $plugin->getName());
        if (API::$REGISTER_PLUGIN->registerPlugin($plugin)) {
            Log::i("Register plugin with name " . $plugin->getName() . " success");
        } else {
            Log::e("Register plugin with name " . $plugin->getName() . " (" . $plugin->getVersion() . ") failed");
        }
    }

    public static function getAll(): array {
        API::init();
        return API::$REGISTER_PLUGIN->getAll();
    }

    public static function getPluginByName($name) {
        API::init();
        return API::$REGISTER_PLUGIN->getPluginByName($name);
    }

    public static function log($text, $typeLog = API::INFO_LOG) {
        switch ($typeLog) {
            case API::INFO_LOG:
                Log::i($text);
                break;
            case API::ERROR_LOG:
                Log::e($text);
                break;
        }
    }

    private static $REGISTER_PLUGIN = null;

    private static function init() {
        if (API::$REGISTER_PLUGIN === null) {
            API::$REGISTER_PLUGIN = new RegisterPlugins();
        }
    }

}