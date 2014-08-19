<?php

use classes\Classes\JsPlugin;
class jqueryuiJs extends JsPlugin{
      
    static private $instance;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!isset(self::$instance))self::$instance = new $class_name($plugin);
        return self::$instance;
    } 
    
    public function init(){
        $this->Html->LoadBowerComponent("jquery-ui/jquery-ui.min");
        $this->Html->loadCss("plugins/jqueryui/jqueryui/jquery-ui.custom");
    }
    
    public function dialog($name = 'dialog', $link = "", $buttons = array(), $width = 600){
        
        $button = "";
        if(!empty ($buttons)){
            $button = "buttons: { $button }";
            $v = "";
            foreach($buttons as $name => $function){
                $button .= "$v'$name':function(){ $function }";
                $v = ",";
            }
        }
        $autoOpen = 'false';
        if($link == ""){
            $autoOpen = 'true';
        }
        
        $this->Html->LoadJQueryFunction("$('#$name').dialog({autoOpen: $autoOpen, width: $width, $button});");
        if($link != ""){
            $this->Html->LoadJQueryFunction("$('#$name').click(function(){ $('#$link').dialog('open'); return false;});");
        }
    }
    
    public function datepicker($name = "datepicker"){
        $this->Html->LoadJQueryFunction("$('#$name').datepicker({inline: true});");
    }
    
    public function slider($name = "slider", $v1 = 17, $v2 = 67){
       $this->Html->LoadJQueryFunction("$('#$name').slider({range: true, values: [$v1, $v2]});");
    }
    
    public function progressbar($name = "progress", $value = 0){
        $this->Html->LoadJQueryFunction("$('#$name').progressbar({value: $value});");
    }
    
    public function accordion($id){
        $this->Html->LoadJQueryFunction("$('#$id').accordion({collapsible: true, header: '> ul > li'});");
    }
    
    public function sortable($id, $connected = array()){
        
        $conid = $params = "";
        if(!empty($connected)){
            if(!is_array($connected['id'])) $connected['id'] = array($connected['id']);
            foreach($connected['id'] as $con) $conid .= ", #$con";
            $params .= "connectWith: '.{$connected['conected']}' ";
        }
        
            
        $this->Html->LoadJQueryFunction("$('#$id$conid').sortable({{$params}}).disableSelection();");
    }
    
    public function spiner($id, $options){
        $str = "";
        foreach($options as $key => $value) $str .= "$key: $value,";
        
        $this->Html->LoadJQueryFunction("$('$id').spinner({ $str });");
    }
    
    public function draw($item){
        echo '<h1>Atenção!</h1>
            <p>
                O Plugin jqueryui possui vários métodos para desenhar as interfaces:
                <ul>
                    <li>setTheme($theme)</li>
                    <li>accordion($name)</li>
                    <li>tabs($name)</li>
                    <li>dialog($name = "dialog", $link = "", $buttons = array(), $width = 600)</li>
                    
                <ul/>
            
            </p>';
    }
}