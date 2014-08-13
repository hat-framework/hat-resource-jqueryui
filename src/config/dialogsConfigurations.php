<?php
        
class dialogsConfigurations extends \classes\Classes\Options{
                
    protected $files   = array(
        'jqueryui/dialogs' => array(
            'title'        => 'Plugin de Popup',
            'descricao'    => 'Opções do plugin de popup',
            'grupo'        => 'Opções de Interface',
            'type'         => 'resource', //config, plugin, jsplugin, template, resource
            'referencia'   => 'jqueryui/dialogs',
            'visibilidade' => 'webmaster', //'usuario', 'admin', 'webmaster'
            'configs'      => array(
                
                'DEFAULT_DIALOG_PLUGIN' => array(
                    'name'          => 'DEFAULT_DIALOG_PLUGIN',
                    'label'         => 'Plugin Padrão',
                    'type'          => 'enum',//varchar, text, enum
                    'options'       => "'leanmodal' => 'Leanmodal', 'colorbox' => 'Colorbox'",
                    'default'       => 'leanmodal',
                    'value'         => 'leanmodal',
                    'value_default' => 'leanmodal',
                    'description'   => '',
                ),
                
            ),
        ),
    );
}

?>