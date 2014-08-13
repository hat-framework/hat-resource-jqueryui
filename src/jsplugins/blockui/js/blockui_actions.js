(function($){
     $.fn.dialogs = function() {
        var config = {
            image:    "../busy.gif",
            method:   "mensagem",
            mensagem: "Aguarde..."
        };
        if (settings){$.extend(config, settings);}

        return this.each(function(){
            //mensagem($(this));
            config.method($(this));
        });

        function loading($this) {
            config.mensagem = "Carregando..."
            mensagem($this);
        }

        function mensagem($this) {
            $.blockUI({ 
                css: {
                },
                fadeIn:  400, 
                fadeOut: 400, 
                timeout: 5000, 
                message: '<h2><img src="'+config.image+'" /> Aguarde...</h2>'
            });
        }
    };
})(jQuery);