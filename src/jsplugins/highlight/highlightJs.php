<?php

use classes\Classes\JsPlugin;
class highlightJs extends JsPlugin{
    
    static private $instance;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!isset(self::$instance))self::$instance = new $class_name($plugin);
        return self::$instance;
    } 
    
    public function init(){
        $this->LoadJsPlugin('jqueryui/jqueryui', 'jui');
        $this->Html->LoadBowerComponent("jquery-highlight/jquery.highlight");
        $this->Html->LoadCss('plugins/jqueryui/highlight');
        $this->LoadClassFromPlugin('search/alg/StoppingWords', 'alg');
        $this->LoadClassFromPlugin('search/alg/OrengoStemmer', 'os');
        $this->ignore = $this->alg->getIgnoredWords();
    }
    
    public function draw($words, $seletor){
        
        if(is_array($words)){
            foreach($words as $wr){
                if(in_array(trim($wr), $this->ignore)) continue;
                $wr = $this->alg->getWord($this->os->stemming($wr));
                if($wr == null) continue;
                $this->Html->LoadJqueryFunction("$('$seletor').highlight('$wr');");
            }
        }else{
            $words = trim($this->alg->removePlural(trim($words)));
            $this->Html->LoadJqueryFunction("$('$seletor').highlight('$words');");
        }
        
    }
}