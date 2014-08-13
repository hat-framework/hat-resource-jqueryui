function blockUI_success(msg){
    try{
        $.blockUI({
            css: {},
            overlayCSS:  {},
            fadeOut: 400, 
            message: "<div class='buibox'><span class='blockOverlay closemsg'>Fechar(x)</span><div class='content success'>"+msg+"</div></div>"
        });
        setTimeout($.unblockUI, 1200); 
        $('.closemsg').click($.unblockUI);
    }catch(e){ alert(msg);}
    
}

function blockUI_alert(erro){
    try{
        $.blockUI({ 
            css: {},
            overlayCSS:  {},
            fadeOut: 400, 
            message: "<div class='buibox'><span class='blockOverlay closemsg'>Fechar(x)</span><div class='content alert'>"+erro+"</div></div>"
        });
        $('.closemsg').click($.unblockUI); 
    }catch(e){ alert(erro);}
}

function blockUI_error(erro){
    try{
        $.blockUI({ 
            css: {},
            overlayCSS:  {},
            fadeOut: 400, 
            message: "<div class='buibox'><span class='blockOverlay closemsg'>Fechar(x)</span><div class='content erro'>"+erro+"</div></div>"
        });
        $('.closemsg').click($.unblockUI); 
    }catch(e){ alert(erro);}
}

function blockUI_wait(msg){
    try{
        $.blockUI({ 
            css: {},
            overlayCSS:{},
            fadeOut: 400,
            message: "<h2>"+msg+"</h2>"
        });
    }catch(e){ alert(msg);}
}

function blockUI_unwait(){
    try{
        $.unblockUI();
    }catch(e){}
}

function blockUI_confirmExitPage(){
    window.onbeforeunload = function() {
        return "Existem dados não salvos nesta página. Deseja sair?";
    }
}

$(document).ready(function(){
    try{
        $('.closemsg').click($.unblockUI); 
        $.blockUI.defaults.css = {};
    }catch(e){}
});
