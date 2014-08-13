<?php

class dialogsResource extends \classes\Interfaces\resource{

    protected $dir  = "";
    private static $instance;

    public function __construct(){
        parent::__contruct();
        $this->dir = dirname(__FILE__);
        //$this->LoadJsPlugin("jqueryui/leanmodal", 'obj');
        $this->LoadJsPlugin("jqueryui/colorbox", 'obj');
    }

    public static function getInstanceOf(){
        $class_name = __CLASS__;
        if (!isset(self::$instance))self::$instance = new $class_name();
        return self::$instance;
    }
    
    public function ajaxDialog($selector){
        $this->obj->ajaxDialog($selector);
    }
    
    public function formDialog($selector, $model, $keys = array(), $nameOfInput = ''){
        $this->obj->formDialog($selector, $model, $keys, $nameOfInput);
    }
    
    public function formDialogWithData($selector, $dados, $values, $hidden_id = ''){
        $this->obj->formDialogWithData($selector, $dados, $values, $hidden_id);
    }

}

?>