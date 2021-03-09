/****************************************************************************************
 Unibody - Smart multi-purpose html5 template
 To use this template you must have a license purchased at Themeforest (themeforest.com)
 Copyright 2017 ForBetterWeb.com
 ***************************************************************************************/

(function($){
    "use strict";
    $(document).ready(function() {

        /***********************************************
         * Preloader
         ***********************************************/

        // jQuery(window).load(function () {
            jQuery("#status").fadeOut();
            jQuery("#preloader").fadeOut("slow");
        // });

        /***********************************************
         * Uni Parallax
         * Copyright - ForBetterWeb.com
         ***********************************************/

        var introHeader = $('.intro'),
            intro = $('.intro');

        buildModuleHeader(introHeader);

        $(window).resize(function() {
            var width = Math.max($(window).width(), window.innerWidth);
            buildModuleHeader(introHeader);
        });

        $(window).scroll(function() {
            effectsModuleHeader(introHeader, this);
        });

        intro.each(function(i) {
            if ($(this).attr('data-background')) {
                $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
            }
        });


        function buildModuleHeader(introHeader) {
        }
        function effectsModuleHeader(introHeader, scrollTopp) {
            if (introHeader.length > 0) {
                var homeSHeight = introHeader.height();
                var topScroll = $(document).scrollTop();
                if ((introHeader.hasClass('intro')) && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                    introHeader.css('top', (topScroll * .3));
                }
                if (introHeader.hasClass('intro') && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                    introHeader.css('opacity', (1 - topScroll/introHeader.height() * 1));
                }
            }
        }
        /***********************************************
         * jQuery Parallax
         ***********************************************/

        $('.bg-img').parallax("50%", .15);
        $('.bg-img2').parallax("50%", .15);
        $('.bg-img3').parallax("50%", .15);
        $('.bg-img4').parallax("50%", .15);
        $('.bg-img5').parallax("50%", .15);
        $('.bg-img6').parallax("50%", .15);

        /***********************************************
         * jQuery to collapse the navbar on scroll
         ***********************************************/

        $(window).scroll(function () {

            var nav = $('.navbar-unibody');
            if (nav.length) {

                if ($(".navbar-unibody").offset().top > 50) {
                    $(".navbar-fixed-top").addClass("top-nav-collapse");
                } else {
                    $(".navbar-fixed-top").removeClass("top-nav-collapse");
                }}
        });

        /***********************************************
         * Tabs
         ***********************************************/

        $('#myTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show')
        });

        /***********************************************
         * jQuery for page scrolling feature
         ***********************************************/

        $(function () {
            $('a.page-scroll').on('click', function (event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: ($($anchor.attr('href')).offset().top - 55)
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
            });
        });

        /***********************************************
         * Highlight the top nav as scrolling occurs
         ***********************************************/

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 65
        });

        /***********************************************
         * Closes the Responsive Menu on Menu Item Click in One Page Nav
         ***********************************************/

        $('.navbar-onepage .navbar-collapse ul li a') .on('click', function() { $('.navbar-onepage .navbar-toggle:visible') .click(); });

        /***********************************************
         * Active class to nav
         ***********************************************/

        var url = window.location;
        $('ul.nav a[href="' + url + '"]').parent().addClass('active');
        $('ul.nav a').filter(function () {
            return this.href == url;
        }).parent().addClass('active');

        /***********************************************
         * Countdown
         ***********************************************/


        /***********************************************
         * Carousel
         ***********************************************/

        $('.carousel-big').carousel({
            interval: 6500, //changes the speed
            pause: "false"
        });

        $('.carousel-small').carousel({
            interval: 5000, //changes the speed
            pause: "false"
        });

        /***********************************************
         * HTML5 Placeholder
         ***********************************************/

        /***********************************************
         * Load WOW.js
         ***********************************************/

        new WOW().init();

        /***********************************************
         * Circle Chart
        ***********************************************/
        
        /***********************************************
         * Progress Bar
         ***********************************************/

        $(".progress-bar").each(function(){
            var each_bar_width;
            each_bar_width = $(this).attr('aria-valuenow');
            $(this).width(each_bar_width + '%');
        });

        function vl_circle_progress_bar_shortcode(){

            var element = $('.vl-circle-progress-bar'),
                duration = 750;


            element.each(function(){

                $(this).one('inview', function(){

                    var t = $(this),
                        circle = t.find('.vl-circle-progress-bar--circle'),
                        percent = circle.data('vcvalue'),
                        thickness = circle.data('vcthickness'),
                        trackcolor = circle.data('vctrackcolor'),
                        barcolor = circle.data('vcbarcolor'),
                        size = circle.data('vcsize');

                    t.circleProgress({
                        value: percent / 100,
                        size: size,
                        thickness: thickness,
                        startAngle: -(3 * Math.PI) / 2,
                        fill: barcolor,
                        emptyFill: trackcolor,
                        animation: { duration: duration }
                    });

                    t.find('.vl-circle-progress-bar--circle span').countTo({
                        from: 0,
                        to: percent,
                        speed: duration,
                        refreshInterval: 30
                    });

                });

            });



        }

(function ($) {

            /* Basic Gallery */

            $( '.swipebox' ).swipebox( {
                useCSS : true, // false will force the use of jQuery for animations
                useSVG : false, // false to force the use of png for buttons
                hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
                hideBarsDelay : 0, // delay before hiding bars on desktop
                videoMaxWidth : 1140, // videos max width
                loopAtEnd: false, // true will return to the first image after the last image is reached
                autoplayVideos: true // true will autoplay Youtube and Vimeo videos
            } );

            /* Video */

            $( '.swipebox-video' ).swipebox();

        } )( jQuery );

        // addition for swipebox, closing img on click on bg
        jQuery(function(){
            jQuery(document.body)
                .on('click touchend','#swipebox-slider .current img', function(e){
                    return false;
                })
                .on('click touchend','#swipebox-slider .current', function(e){
                    jQuery('#swipebox-close').trigger('click');
                });
        });


        /***********************************************
         *  jQuery Animated Number
         *  Developers: Arun David, Boobalan
         ***********************************************/

        $(window).on("load",function(){
            $(document).scrollzipInit();
            $(document).rollerInit();
        });
        $(window).on("load scroll resize", function(){
            $('.numscroller').scrollzip({
                showFunction    :   function() {
                    numberRoller($(this).attr('data-slno'));
                },
                wholeVisible    :     false,
            });
        });
        $.fn.scrollzipInit=function(){
            $('body').prepend("<div style='position:fixed;top:0;left:0;width:0;height:0;' id='scrollzipPoint'></div>" );
        };
        $.fn.rollerInit=function(){
            var i=0;
            $('.numscroller').each(function() {
                i++;
                $(this).attr('data-slno',i);
                $(this).addClass("roller-title-number-"+i);
            });
        };
        $.fn.scrollzip = function(options){
            var settings = $.extend({
                showFunction    : null,
                hideFunction    : null,
                showShift       : 0,
                wholeVisible    : false,
                hideShift       : 0
            }, options);
            return this.each(function(i,obj){

                var numbers = $('#scrollzipPoint');
                if (numbers.length) {

                    $(this).addClass('scrollzip');
                    if (!(!$.isFunction(settings.showFunction) || $(this).hasClass('isShown') || $(window).outerHeight() + $('#scrollzipPoint').offset().top - settings.showShift <= $(this).offset().top + (settings.wholeVisible ? $(this).outerHeight() : 0) || $('#scrollzipPoint').offset().top + (settings.wholeVisible ? $(this).outerHeight() : 0) >= $(this).outerHeight() + $(this).offset().top - settings.showShift)) {
                        $(this).addClass('isShown');
                        settings.showFunction.call(this);
                    }
                    if ($.isFunction(settings.hideFunction) && $(this).hasClass('isShown') && ($(window).outerHeight() + $('#scrollzipPoint').offset().top - settings.hideShift < $(this).offset().top + (settings.wholeVisible ? $(this).outerHeight() : 0) || $('#scrollzipPoint').offset().top + (settings.wholeVisible ? $(this).outerHeight() : 0) > $(this).outerHeight() + $(this).offset().top - settings.hideShift)) {
                        $(this).removeClass('isShown');
                        settings.hideFunction.call(this);
                    }
                    return this;
                }
            });
        };

        function numberRoller(slno){
            var min=$('.roller-title-number-'+slno).attr('data-min');
            var max=$('.roller-title-number-'+slno).attr('data-max');
            var timediff=$('.roller-title-number-'+slno).attr('data-delay');
            var increment=$('.roller-title-number-'+slno).attr('data-increment');
            var numdiff=max-min;
            var timeout=(timediff*1000)/numdiff;
            //if(numinc<10){
            //increment=Math.floor((timediff*1000)/10);
            //}//alert(increment);
            numberRoll(slno,min,max,increment,timeout);
        }
        function numberRoll(slno,min,max,increment,timeout){//alert(slno+"="+min+"="+max+"="+increment+"="+timeout);
            if(min<=max){
                $('.roller-title-number-'+slno).html(min);
                min=parseInt(min, 10)+parseInt(increment, 10);
                setTimeout(function(){numberRoll(eval(slno),eval(min),eval(max),eval(increment),eval(timeout))},timeout);
            }else{
                $('.roller-title-number-'+slno).html(max);
            }
        }

        /***********************************************
         * Portfolio
         ***********************************************/

        var shuffleme = (function( $ ) {
            'use strict';
            var $grid = $('#grid'), //locate what we want to sort
                $filterOptions = $('.portfolio-sorting li'),  //locate the filter categories
                $sizer = $grid.find('.shuffle_sizer'),    //sizer stores the size of the items

                init = function() {

                    // None of these need to be executed synchronously
                    setTimeout(function() {
                        listen();
                        setupFilters();
                    }, 100);

                    // instantiate the plugin
                    $grid.shuffle({
                        itemSelector: '[class*="col-"]',
                        sizer: $sizer
                    });
                },

            // Set up button clicks
                setupFilters = function() {
                    var $btns = $filterOptions.children();
                    $btns.on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this),
                            isActive = $this.hasClass( 'active' ),
                            group = isActive ? 'all' : $this.data('group');

                        // Hide current label, show current label in title
                        if ( !isActive ) {
                            $('.portfolio-sorting li a').removeClass('active');
                        }

                        $this.toggleClass('active');

                        // Filter elements
                        $grid.shuffle( 'shuffle', group );
                    });

                    $btns = null;
                },

            // Re layout shuffle when images load. This is only needed
            // below 768 pixels because the .picture-item height is auto and therefore
            // the height of the picture-item is dependent on the image
            // I recommend using imagesloaded to determine when an image is loaded
            // but that doesn't support IE7
                listen = function() {
                    var debouncedLayout = $.throttle( 300, function() {
                        $grid.shuffle('update');
                    });

                    // Get all images inside shuffle
                    $grid.find('img').each(function() {
                        var proxyImage;

                        // Image already loaded
                        if ( this.complete && this.naturalWidth !== undefined ) {
                            return;
                        }

                        // If none of the checks above matched, simulate loading on detached element.
                        proxyImage = new Image();
                        $( proxyImage ).on('load', function() {
                            $(this).off('load');
                            debouncedLayout();
                        });

                        proxyImage.src = this.src;
                    });

                    // Because this method doesn't seem to be perfect.
                    setTimeout(function() {
                        debouncedLayout();
                    }, 500);
                };

            return {
                init: init
            };
        }( jQuery ));

        shuffleme.init(); //filter portfolio

    });
})(jQuery);