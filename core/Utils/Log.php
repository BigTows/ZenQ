<?php
/**
 * Created by PhpStorm.
 * File: Log.php.
 * Created: bigtows.
 * Created date: 24/08/2017  12:07
 * Description:
 */

namespace CMS;

class Log {
    public static function i($text) {
        $text = "[INFO] " . $text;
        file_put_contents("logs.log", $text . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    public static function e($text) {
        $text = "[ERROR] " . $text;
        file_put_contents("logs.log", $text . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}