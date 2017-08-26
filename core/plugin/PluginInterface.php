<?php
/**
 * Created by PhpStorm.
 * File: PluginInterface.php.
 * Created: bigtows.
 * Created date: 24/08/2017  11:50
 * Description:
 */

namespace CMS;


interface Plugin {
    function __construct($name, $version = 1.0);

    function getName();

    function getVersion();

    function onReady(): string;
}