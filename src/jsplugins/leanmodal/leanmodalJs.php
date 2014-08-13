<?php

use classes\Classes\JsPlugin;
class leanmodalJs extends JsPlugin {

    static private $instance;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!isset(self::$instance)) self::$instance = new $class_name($plugin);
        return self::$instance;
    }
    
    public function init(){
        $this->Html->LoadJs($this->url.'/js/jquery.leanmodal');
        $this->Html->loadCss('plugins/jqueryui/leanmodal');
    }
    
    public function formDialog($selector, $model, $keys = array(), $nameOfInput = ''){
        //evita entrada de formul�rios duplicados
        static $selector_list = array();
        if(in_array($selector, $selector_list)) return;
        $selector_list[] = $selector;
        $this->preencheAutomatico($keys, $nameOfInput);
        $this->setJsFunctions($selector, $model);
    }
    
    private function preencheAutomatico($keys, $nameOfInput){
        if(empty($keys) || $nameOfInput == "") return;
        $this->LoadJsPlugin('formulario/jqtokeninput', 'jqtin');
        $inpt = $this->jqtin->getInputName($nameOfInput);
        
        $id = array_shift($keys);
        $temp = array_shift($keys);
        $jsonname = "json.item.$temp";
        //$jsonname = "json.item.".implode(" + ' ' + json.item.", $keys);
        
        $this->LoadJsPlugin('formulario/jqueryvalidate', 'jqval');
        //$this->jqval->addToReset("alert('$jsonname' + ' '+$jsonname)");
        $this->jqval->addToReset("$('$inpt').tokenInput('add', {id: json.item.$id, name: $jsonname});");
        
    }
    
    private function genFormDialog($model){
        $this->LoadResource('formulario', 'form');
        $this->form = new formularioResource();
        $this->form->printable();
        return $this->form->execute($model, array(), array(), "$model/formulario/ajax");
    }
    
    private function setJsFunctions($selector, $model){
        $html = $this->genFormDialog($model);
        echo "<div style='display:none'>$html</div>";
        $var = "$.leanModal({ link: $('$selector'), extraClass: 'narrow' });";
        $this->Html->LoadJsFunction("$var");
    }
    
    public function ajaxDialog($seletor){
        $var = "$.leanModal({ link: $('$seletor') });";
        $this->Html->LoadJsFunction("$var");
    } 

}

?>