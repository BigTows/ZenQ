<?php
/**
 * Created by PhpStorm.
 * File: Included.php.
 * Created: bigtows.
 * Created date: 26/08/2017  13:34
 * Description:
 */

namespace CMS;


class Included {
    const INCLUDE_PLUGIN = 1;
    const INCLUDE_TEMPLATE = 2;
    private $typeInclude = null;
    private $nameFile = null;

    function __construct($item) {
        $array = preg_split("/=/", $item); // getting in 0 index => {%, and 1 index =>%}
        $array[0] = substr($array[0], -strlen($array[0]) + 1); // getting simple %
        $array[1] = substr($array[1], 0, -1);// getting simple %
        $this->prepareTypeInclude($array[0]);
        $this->nameFile=$array[1];
    }

    private function prepareTypeInclude($type) {
        switch (strtolower($type)) {
            case "plugin":
                $this->typeInclude = Included::INCLUDE_PLUGIN;
                break;
            case "include":
                $this->typeInclude = Included::INCLUDE_TEMPLATE;
                break;
        }
    }

    /**
     * @return null|int
     */
    public function getTypeInclude() {
        return $this->typeInclude;
    }

    /**
     * @return string
     */
    public function getNameFile():string {
        return $this->nameFile;
    }


}