<?php

class autocompleteJs extends JsPlugin {

    static private $instance;
    private $prePopulate = array();
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!isset(self::$instance)) {
            self::$instance = new $class_name($plugin);
        }

        return self::$instance;
    }
    
    public function init(){
        $this->Html->LoadJs($this->url.'/jquery-autocomplete/lib/jquery.bgiframe.min');
        $this->Html->LoadJs($this->url.'/jquery-autocomplete/lib/jquery.ajaxQueue');
        $this->Html->LoadJs($this->url.'/jquery-autocomplete/lib/thickbox-compressed');
        $this->Html->LoadJs($this->url.'/jquery-autocomplete/jquery.autocomplete');
        $this->Html->loadCss('/plugins/jqueryui/autocomplete');
    }
    
    public function addToForm($form, $name, $array){
        $title = $array['name'];
        $model = $array['model'];
        $campo = implode("-",$array['keys']);
        $url = $this->url . "/completar.php?model=$model&campo=$campo";
        $this->autocomplete("#$name", $url);
        $form->text($name, $title);
    }
    
    
    public function autocomplete($name, $url){
        $this->Html->LoadJqueryFunction("
            $('$name').autocomplete({
                source: '$url',
                minLength: 2,
                delay: 300,
                selectFirst: false,
                width:300,
                messages: {
                    noResults: '',
                    results: function() {}
                }
            }).data( 'ui-autocomplete' )._renderItem = function( ul, item ) {
      return $( '<li>' )
        .append( '<a href=\"/'+item.link+'\">' + item.termo +'</a>' )
        .appendTo( ul );
    };;");
    }
    
}

?>