function Resize_Box(){
                var x = $('body').width();
                var y = $('body').height();
                parent.$.fn.colorbox.resize({
                    innerWidth: x,
                    innerHeight: y
                });
            }