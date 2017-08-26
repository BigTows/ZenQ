<?php
/**
 * Created by PhpStorm.
 * File: index.php.
 * Created: bigtows.
 * Created date: 24/08/2017  11:44
 * Description:
 */
namespace CMS;
require_once 'core/plugin/PluginExtended.php';
require_once 'core/PrepareTemplate.php';
require_once 'core/API.php';
echo (new PrepareTemplate(file_get_contents("template/default/index.html")))->getTemplate();
?>