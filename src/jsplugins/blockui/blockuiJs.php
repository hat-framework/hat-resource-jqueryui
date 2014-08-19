<?php

use classes\Classes\JsPlugin;
class blockuiJs extends JsPlugin{
    
    static private $instance;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!isset(self::$instance)) {
            self::$instance = new $class_name($plugin);
        }
        return self::$instance;
    } 
    
    public function init(){
        static $css = '<style>.closemsg{color:white; font-size:12px; float:right; cursor: Pointer;}</style>';
        $this->Html->LoadBowerComponent("blockUI/jquery.blockUI");
        $this->Html->LoadBowerComponent('hatframework-hatjs-form/jqueryui/blockui');
        $this->Html->LoadCss("plugins/jqueryui/blockui");
        $this->Html->addSytle($css);
        $css = "";
    }
    
    public function getLoadingImage(){
        return $this->Html->getImageIfExists('loading.gif');
    }
}