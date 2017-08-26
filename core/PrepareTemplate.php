<?php
/**
 * Created by PhpStorm.
 * File: PrepareTemplate.php.
 * Created: bigtows.
 * Created date: 26/08/2017  13:46
 * Description:
 */

namespace CMS;
require_once 'core/Included.php';

class PrepareTemplate {
    private $template = "";
    private $plugins = [];

    function __construct($template) {
        $this->template = $template;
        $includes = [];
        // This pattern search => {%=%}
        preg_match_all("/{([a-z]+)=([a-zA-Z0-9])+}/", $this->template, $includes);
        // if in Template has some {%=%}
        if (isset($includes[0])) {
            $this->prepareIncludes($includes[0]);
        }
    }

    private function prepareIncludes($includes) {
        foreach ($includes as $item) {
            $include = new \CMS\Included($item);
            if ($include->getTypeInclude() == Included::INCLUDE_PLUGIN) {
                require_once "plugins/" . $include->getNameFile() . ".php"; // Require plugin
                array_push($this->plugins, $include->getNameFile());
            } else if ($include->getTypeInclude() == Included::INCLUDE_TEMPLATE) {
                // TODO Get File Content
            }
        }
        $this->executePlugins();
    }

    private function executePlugins() {
        foreach ($this->plugins as $plugin) {
            $this->template = str_replace("{plugin=" . $plugin . "}", API::getPluginByName($plugin)->onReady(), $this->template);
        }
    }

    /**
     * @return string
     */
    public function getTemplate(): string {
        return $this->template;
    }


}