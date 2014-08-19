<?php

use classes\Classes\JsPlugin;
class slidetoJs extends JsPlugin{
    
    static private $instance;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!isset(self::$instance))self::$instance = new $class_name($plugin);
        return self::$instance;
    } 
    
    public function init(){
        $this->LoadJsPlugin('jqueryui/jqueryui', 'jui');
        $this->Html->LoadBowerComponent("jQuery-slideto/jquery.slideto");
    }
    
    public function draw($id, $id_src){
        $this->Html->LoadJqueryFunction("
            $('#$id_src').click(function(){
                    $('#$id').slideto();
            });
        ");
    }
}