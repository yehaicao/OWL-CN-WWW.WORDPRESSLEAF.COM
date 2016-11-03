/**
 * Created by agungbayu on 12/7/14.
 */

(function($) {

    $.fn.jFollowSidebar = function(options) {

        var setting = {
            listen_height : [],
            container : null,
            stop: 1024
        };

        if (options) {
            options = $.extend(setting, options);
        } else {
            options = $.extend(setting);
        }

        var $sidebarcontainer = this;

        var side_height;
        var container_height;
        var window_height;
        var top_pos;
        var bottom_pos;
        var followmode = 0;

        var prevscroltop = 0;
        var currenttoppos = 0;
        var ww = 0;


        function sticky_sidebar()
        {
            var scrolltop = $(window).scrollTop();

            if(followmode === 1) {
                if(scrolltop <= top_pos) { /** check kalau scroll top nya paling atas */
                    $sidebarcontainer.css({
                        'position' : 'relative',
                        'top': '0',
                        'bottom' : 'auto'
                    });
                } else if(scrolltop > ( bottom_pos - side_height )) { /** check kalau scroll top nya paling bawah */
                    $sidebarcontainer.css({
                        'position' : 'absolute',
                        'top': ( container_height - side_height ),
                        'bottom' : 'auto'
                    });
                } else if(scrolltop > top_pos) { /** check kalau scroll berada di tengah tengah */
                    $sidebarcontainer.css({
                        'position' : 'fixed',
                        'top': '127px',
                        'bottom' : 'auto'
                    });
                }
            } else if (followmode === 2) {
                /*** scroll naik ***/

                // normalize current top pos position
                if(currenttoppos < 0 ) currenttoppos = 0;
                if(currenttoppos > ( container_height - side_height )) currenttoppos = container_height - side_height;

                if(prevscroltop > scrolltop) {
                    if(currenttoppos <= 0) { /** kalau scroll naik udah mentok diatas **/
                        $sidebarcontainer.css({
                            'position' : 'relative',
                            'top': '0',
                            'bottom' : 'auto'
                        });
                    } else if( scrolltop > ( currenttoppos + top_pos ) ) {
                        $sidebarcontainer.css({
                            'position' : 'absolute',
                            'top': ( currenttoppos ),
                            'bottom' : 'auto'
                        });
                    } else {
                        $sidebarcontainer.css({
                            'position' : 'fixed',
                            'top': '127px',
                            'bottom' : 'auto'
                        });
                        currenttoppos = scrolltop - top_pos;
                    }
                }
                /*** scroll turun ***/
                else {
                    if(currenttoppos >= (container_height - side_height) ) {
                        $sidebarcontainer.css({
                            'position' : 'absolute',
                            'top': ( container_height - side_height ),
                            'bottom' : 'auto'
                        });
                    } else if(scrolltop > ( currenttoppos + top_pos + side_height - window_height)) {
                        $sidebarcontainer.css({
                            'position' : 'fixed',
                            'bottom': '0',
                            'top': 'auto'
                        });
                        currenttoppos = scrolltop + window_height - top_pos - side_height;
                    } else {
                        $sidebarcontainer.css({
                            'position' : 'absolute',
                            'top': ( currenttoppos ),
                            'bottom' : 'auto'
                        });
                    }
                }
                prevscroltop = scrolltop;
            } else {
                $sidebarcontainer.css({
                    'position' : 'relative',
                    'top': '0',
                    'bottom' : 'auto'
                });
            }
        }

        function setup_variable()
        {
            if($(window).width() <= options.stop)
            {
                $sidebarcontainer.css({
                    'position' : 'relative',
                    'top': '0',
                    'bottom' : 'auto'
                });
                $(window).unbind('scroll', sticky_sidebar);
            }
            else {
                side_height         = $sidebarcontainer.height();
                container_height    = $(options.container).height();
                window_height       = $(window).height();
                top_pos             = Math.floor($(options.container).offset().top);
                bottom_pos          = top_pos + container_height;

                if(side_height >= container_height) {
                    followmode = 0;
                } else {
                    if(side_height < window_height) {
                        followmode = 1;
                    } else {
                        followmode = 2;
                    }
                }

                $(window)
                    .unbind('scroll', sticky_sidebar)
                    .bind('scroll', sticky_sidebar);
            }

        }

        function listen_height_change()
        {
            $(window).bind('resize load', setup_variable);
            $(options.container).mutate('height', setup_variable);
            $sidebarcontainer.mutate('height', setup_variable);

            $.each(options.listen_height, function(i, val){
                $(val).mutate('height', setup_variable);
            });

        }

        setup_variable();
        listen_height_change();
        sticky_sidebar();
    };

})(jQuery);