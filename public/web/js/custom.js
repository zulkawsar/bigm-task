
jQuery(function($) {

    'use strict';

    var CUSTOM_SETTINGS = window.CUSTOM_SETTINGS || {};

    CUSTOM_SETTINGS.OwlCursolHome = function() {
        // ------------------------------- Partner Slider
        var pSlider = $ (".owl-carousel");
        if(pSlider.length) {
            pSlider.owlCarousel({
              loop:true,
              margin:15,
              nav:false,
              dots:false,
              autoplay:true,
              responsiveClass:true,
              autoplayTimeout:4000,
              smartSpeed:1200,
              autoplayHoverPause:true,
              lazyLoad:false,
              responsive:{
                    0:{
                        items:1
                    },
                    400:{
                        items:1
                    },
                    768:{
                        items:2
                    },
                    992:{
                        items:3
                    },
                    1200:{
                        items:4
                    }
                },
          })
        }
    }

    CUSTOM_SETTINGS.UpcomingCarousel = function() {
        // ------------------------------- Partner Slider
        var uSlider = $("#upcoming-carousel");
        if(uSlider.length) {
            uSlider.carousel({
              interval: 5000
            })
        }
    }

    CUSTOM_SETTINGS.SpiderSlider = function() {
      var sSlider = $("#devtrixSlider");
      if (sSlider.length) {

        // creating custom effects
        Sliderman.effect({name: 'devtrix01', cols: 10, rows: 5, fade: true, order: 'swirl', delay: 50});
        Sliderman.effect({name: 'devtrix02', cols: 10, rows: 5, fade: true, order: 'swirl', road: 'TL', reverse: true, delay: 50});
        Sliderman.effect({name: 'devtrix03', cols: 1, rows: 1, duration: 500, fade: true});
        Sliderman.effect({name: 'devtrix04', cols: 1, rows: 6, duration: 500, fade: true, top: true});
        Sliderman.effect({name: 'devtrix05', cols: 10, rows: 1, duration: 500, fade: true, left: true});
        Sliderman.effect({name: 'devtrix06', cols: 9, rows: 3, delay: 50, duration: 500, fade: true, right: true});
        Sliderman.effect({name: 'devtrix07', cols: 9, rows: 3, delay: 50, chess: true, duration: 500, fade: true, bottom: true});
        Sliderman.effect({name: 'devtrix08', cols: 6, rows: 3, delay: 70, duration: 400, move: true, top: true});
        Sliderman.effect({name: 'devtrix09', cols: 8, rows: 4, delay: 70, duration: 400, move: true, top: true, road: 'TL', order: 'straight'});
        Sliderman.effect({name: 'devtrix10', cols: 10, rows: 5, delay: 40, duration: 500, fade: true, road: 'TL', order: 'straight_stairs'});
        Sliderman.effect({name: 'devtrix11', cols: 10, rows: 5, delay: 40, duration: 500, fade: true, road: 'BR', order: 'straight_stairs'});
        Sliderman.effect({name: 'devtrix12', cols: 10, rows: 5, delay: 10, fade: true, order: 'straight_stairs'});
        Sliderman.effect({name: 'devtrix13', cols: 10, rows: 5, delay: 50, duration: 500, fade: true, road: 'TR', order: 'snake'});
        Sliderman.effect({name: 'devtrix14', cols: 10, rows: 5, delay: 30, duration: 500, fade: true, road: 'RB', order: 'snake'});
        Sliderman.effect({name: 'devtrix15', cols: 10, rows: 5, delay: 30, duration: 500, fade: true, road: 'LT', order: 'snake'});
        Sliderman.effect({name: 'devtrix16', cols: 6, rows: 1, duration: 400, fade: true, move: true, left: true});
        Sliderman.effect({name: 'devtrix17', cols: 1, rows: 4, duration: 400, fade: true, move: true, top: true});
        Sliderman.effect({name: 'devtrix18', cols: 10, rows: 5, fade: true, delay: 10, duration: 400});
        Sliderman.effect({name: 'devtrix19', fade: true, duration: 500, move: true, top: true});
        Sliderman.effect({name: 'devtrix20', fade: true, duration: 400, move: true, left: true});
        Sliderman.effect({name: 'devtrix21', fade: true, duration: 400, move: true, right: true});
        Sliderman.effect({name: 'devtrix22', fade: true, duration: 500, move: true, bottom: true});
        Sliderman.effect({name: 'devtrix23', cols: 10, delay: 100, duration: 400, order: 'straight', bottom: true, road: 'RB', fade: true});
        Sliderman.effect({name: 'devtrix24', rows: 8, delay: 100, duration: 400, order: 'straight', left: true, fade: true, chess: true});
        Sliderman.effect({name: 'devtrix25', cols: 10, delay: 100, duration: 500, order: 'straight', right: true, move: true, zoom: true, fade: true});
        Sliderman.effect({name: 'devtrix26', rows: 7, cols: 14, fade: true, easing: 'swing', order: 'cross', delay: 100, duration: 400});
        Sliderman.effect({name: 'devtrix27', rows: 7, cols: 14, fade: true, easing: 'swing', order: 'cross', delay: 100, duration: 400, reverse: true});
        Sliderman.effect({name: 'devtrix28', rows: 7, cols: 14, fade: true, easing: 'swing', order: 'rectangle', delay: 200, duration: 1000});
        Sliderman.effect({name: 'devtrix29', rows: 7, cols: 14, fade: true, easing: 'swing', order: 'rectangle', delay: 200, duration: 1000, reverse: true});
        Sliderman.effect({name: 'devtrix30', rows: 7, cols: 10, zoom: true, move: true, right: true, easing: 'swing', order: 'circle', delay: 150, duration: 800});
        Sliderman.effect({name: 'devtrix31', rows: 7, cols: 10, zoom: true, move: true, left: true, easing: 'swing', order: 'circle', delay: 150, duration: 800, reverse: true});
        Sliderman.effect({name: 'devtrix32', rows: 7, cols: 1, zoom: true, move: true, bottom: true, easing: 'bounce', order: 'circle', delay: 150, duration: 800});
        Sliderman.effect({name: 'devtrix33', rows: 7, cols: 1, zoom: true, move: true, top: true, easing: 'bounce', order: 'circle', delay: 150, duration: 800, reverse: true});

        // we don't want the default presets (fade,move,stairs,blinds,rain) to appear, so passing an array of the effect we created above
        var devtrixEffects = ['devtrix01','devtrix02','devtrix03','devtrix04','devtrix05','devtrix06','devtrix07','devtrix08','devtrix09','devtrix10','devtrix11','devtrix12','devtrix13','devtrix14','devtrix15','devtrix16','devtrix17','devtrix18','devtrix19','devtrix20','devtrix21','devtrix22','devtrix23','devtrix24','devtrix25','devtrix26','devtrix27','devtrix28','devtrix29','devtrix30','devtrix31','devtrix32','devtrix33'];
        // var divWidth = document.getElementById("slider_container").offsetWidth;
        // var divHeight = 350;
        // if (divWidth > 700) {
        //   // divWidth = (divWidth / 4) + 15;
        //   // divHeight = 200;
        // }
        var h = ($(window).height()) - 20;
        var w = ($(window).width());
        if( /Android|webOS|iPhone|iPad|Mac|Macintosh|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            h = h/2;
            
            $("header").attr('style', 'height: '+ h +'px !important');
        }
           // returns height of browser viewport
        var slider = Sliderman.slider({container: 'devtrixSlider', width: w, height: h,
          effects: devtrixEffects,
          display: {
            autoplay: 3000,
            effects_order: 'random',
            description: {hide: true, background: 'transparent', opacity: 0.5, height: 60, position: 'bottom'},
            loading: {background: '#000000', opacity: 0.7, image: '../web/img/loading.gif'},
            buttons: {hide: true, opacity: 1, prev: {className: 'devtrixSliderPrev', label: ''}, next: {className: 'devtrixSliderNext', label: ''} },
            navigation: {container: 'devtrixSliderNavigation', label: '<img src="../web/img/clear.gif"  alt="" />'}
          }
        });
      }
    }

    $(document).ready(function() {
        CUSTOM_SETTINGS.OwlCursolHome();
        CUSTOM_SETTINGS.UpcomingCarousel();
        CUSTOM_SETTINGS.SpiderSlider();
    });
});