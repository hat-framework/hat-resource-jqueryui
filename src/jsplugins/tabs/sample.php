<?php 
    $tabs = array(
        "Tibia" => "Rpg online", 
        "Loja"  => "Bom pra vender", 
        "Celular" => "Sempre te acham", 
    );
    $this->Js->LoadPlugin("tabs", "jqueryui", "tabs");
    $this->Js->tabs->draw($tabs);
?>