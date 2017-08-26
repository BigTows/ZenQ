<?php
/**
 * Created by PhpStorm.
 * File: Example.php.
 * Created: bigtows.
 * Created date: 25/08/2017  22:04
 * Description:
 */
namespace CMS;
require_once 'core/plugin/PluginExtended.php';
require_once 'core/API.php';

class Example extends PluginExtended {
    function onReady(): string {
        if (isset($_POST['login'])) {
            return "Hello " . $_POST['login'];
        } else {
            return $this->initInput();
        }
    }

    function initInput() {
        return '<form method="post">
                <input type="text" name="login">
                <input type="submit" name="actionLogin"> 
            </form>
            ';
    }
}

\CMS\API::registerPlugin(new Example("Example", "0.1 BETA"));
