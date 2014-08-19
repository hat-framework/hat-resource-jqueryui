<?php

class dialogPlugin extends PluginComponent{
    
    public $file_sample = "sample.php";
    public function load(){
        $this->Html->LoadCssFromPlugins("ui-dialog", $this->base_url . "dialog.css");
        $this->Js->LoadPlugin("jqueryui", "jqueryui", "jqueryui");
        $this->Js->jqueryui->load();
    }
    
    public function draw($title, $msg, $link_msg){
        
        static $i = 0;
        $i++;
        
        $dialog  = "dialog$i";
        $dialog_link = "$dialog"."_link";
        echo "<p>
                <a href='#' id='$dialog_link' class='dialog_link ui-state-default ui-corner-all'>
                    <span class='ui-icon ui-icon-newwin'></span>$link_msg
                </a>
              </p>";
        echo "<div id='$dialog' title='$title'><p>$msg</p></div>";
        
        $this->Html->LoadJsFunctions("$('#$dialog').dialog({autoOpen: false,width: 600});");
        $this->Html->LoadJsFunctions("$('#$dialog_link').click(function(){ $('#$dialog').dialog('open');return false;});");
    }
    
}