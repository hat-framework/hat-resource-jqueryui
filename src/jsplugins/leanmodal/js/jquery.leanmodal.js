// leanModalExt modified by Arthur Camara based on leanModal v1.1 by Ray Stone - http://finelysliced.com.au
// Dual licensed under the MIT and GPL
(function($) {
	$.extend({
		leanModal: function(options) {
           //default options
			var defaults = {
				top: 100,
				overlay: 0.4,
                extraClass: null,
                element: null,
                link: null,
                file: null,
                params: null,
                content: null,
                width: null,
                loadingMessage: "Loading...",
                animation: 200     //in microseconds
			};
            options = $.extend(defaults, options);
            
            //append lean and modal
			var overlay = $("<div id='lean_overlay' class='lean_overlay'></div>");
            var modal = $("<div id='lean_modal' class='lean_modal'></div>");
			$("body").append(overlay);
            $("body").append(modal);
            overlay = $("#lean_overlay");
            modal = $("#lean_modal");
            
            if (options.width !== null) {
                modal.css('width', options.width);   
            }
            
            if (options.content !== null) {
                modal.html(options.content);   
            }
            
            if (options.link !== null) {
            	var linkObj = options.link;
	            var link = linkObj.attr("href");
	            options.element = $(link);
	            options.link = null;
	            linkObj.click( function() {
		            $.leanModal(options);
	            });
	            return;
            }
            
            if (options.element !== null) {
	            var element = options.element.html();
	            modal.html(element);   
            }
            
            if (options.extraClass !== null) {
                modal.addClass(options.extraClass);   
            }
            
            //
            if (options.file === null) {
			    open_modal();
                return;
            } else {
                loading = "<div class='loading'>"+options.loadingMessage+"</div>";
                modal.html(loading); 
                open_modal();
                
                if (options.params === null) {
                    var params = {};
                } else {
                    params = options.params;
                }
                
                $.post(options.file, params,
                       function (data) {
                           modal.html(data);
                       });
                return;
            }
                
            function open_modal() {
                //how to close
                overlay.click(function() {
                    close_modal()
                });
                //measurements
                var modal_height = modal.outerHeight();
                var modal_width = modal.outerWidth();
                //animation
                overlay.css({
                    "display": "block",
                    opacity: 0
                });
                modal.css({
                    "display": "block",
                    opacity: 0
                });
                
                overlay.fadeTo(options.animation, options.overlay);
                
                modal.css({
                    "display": "block",
                    "position": "fixed",
                    "opacity": 0,
                    "z-index": 11000,
                    "left": 50 + "%",
                    "margin-left": -(modal_width / 2) + "px",
                    "top": options.top + "px"
                });
                
                modal.fadeTo(options.animation, 1);
                
                //bind esc key event
                $('html').bind('keyup', close_on_esc);
                
            }
            
            function close_on_esc(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                //Esc keycode
                if(code == 27) {
                    close_modal();
                }
            }
            
			function close_modal() {
                overlay.fadeOut(options.animation, function() {
                    overlay.remove();
                });
                modal.fadeOut(options.animation, function() {
                    modal.remove();
                });
                //unbind esc event
                $('html').unbind('keyup');
			}
		}
	})
})(jQuery);