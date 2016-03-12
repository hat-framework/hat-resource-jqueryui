<?php

use classes\Classes\JsPlugin;
class tabsJs extends JsPlugin{
    
    
    static private $instance;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!isset(self::$instance)) {
            self::$instance = new $class_name($plugin);
        }

        return self::$instance;
    }
    
    public function init($name = ""){    
        $this->LoadJsPlugin("jqueryui/jqueryui", 'jui');
        $this->Html->LoadJQueryFunction("$('.jqtabs').tabs({
            activate: function(event, ui) {
                window.location.hash = ui.newPanel.attr('id');
            }
        });");
    }
    
    public function draw($tabs){
        static $i = 1;
        $content = "";
        echo "<div class='jqtabs'><ul class='nav tab-menu nav-tabs'>";
        foreach($tabs as $name => $value){
            $id   = (is_array($value))?$value['tabname']:"tabs_$i";
            $cont = (is_array($value))?$value['content']:$value;
            echo "<li><a href='#$id'>$name</a></li>";
            $content .= "<div id='$id'>$cont</div>";
            $i++;
        }
        echo "</ul> $content </div>";
    }
    
    public function AjaxTabs($tabs){
        static $i = 1;
        
        $name = array_shift($tabs);
        echo "<div class='jqtabs'><ul>
                <li><a href='#tabs-1'>$name</a></li>";
        foreach($tabs as $name => $value){
            echo "<li><a href='$name'>$value</a></li>";
            $i++;
        }
        echo "</ul> <div id='tabs-1'>$value</div> </div>";
    }
    
}