<?php

use classes\Classes\JsPlugin;
class colorboxJs extends JsPlugin {

    static private $instance;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!isset(self::$instance)) self::$instance = new $class_name($plugin);
        return self::$instance;
    }
    
    public function init(){
        $this->Html->LoadBowerComponent('/jquery-colorbox/jquery.colorbox-min');
        $this->Html->LoadBowerComponent('/hatframework-hatjs-form/colorbox_resize');
        $this->Html->loadCss('plugins/jqueryui/colorbox');
    }
    
    private $selector_list = array();
    public function formDialogWithData($selector, $dados, $values, $hidden_id = ""){
        if(in_array($selector, $this->selector_list)) return;
        $this->selector_list[] = $selector;
        $this->LoadResource('formulario', 'form');
        $this->form = new formularioResource();
        $this->form->printable();
        $html = $this->form->NewForm($dados, $values);
        $hidden_id = ($hidden_id == "")?"":" id='$hidden_id'";
        echo "<div style='display:none'>";
        if($hidden_id != "") echo "<div $hidden_id>";
        echo $html;
        if($hidden_id != "") echo "</div>";
        echo "</div>";
        $this->Html->LoadJsFunction("
            $('$selector').colorbox({
                inline:true, 
                minWidth: '350px',
                minHeight: '250px',
            });
        ");
        
    }
    
    public function formDialog($selector, $model, $keys = array(), $nameOfInput = ''){
        //evita entrada de formulários duplicados
        if(in_array($selector, $this->selector_list)) return;
        $this->selector_list[] = $selector;
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
    
    private function setJsFunctions($selector, $model){
        $this->LoadResource('formulario', 'form');
        $this->form = new formularioResource();
        $this->form->printable();
        $html = $this->form->execute($model, array(), array(), "$model/formulario/ajax");
        echo "<div style='display:none'>$html</div>";
        $this->Html->LoadJsFunction("
            $('$selector').colorbox({
                inline:true, 
                minWidth: '350px',
                minHeight: '250px',
            });
        ");
    }
    
    public function ajaxDialog($seletor){
        $this->Html->LoadJsFunction("
            $('$seletor').colorbox({
                iframe:true,
                width:'60%', height:'60%',
                minWidth: '350px', minHeight: '250px',
                maxWidth: '500px', maxHeight: '400px',
                onComplete: function(){
                    //Resize_Box();
                }
            });
        ");
    } 

}

?>