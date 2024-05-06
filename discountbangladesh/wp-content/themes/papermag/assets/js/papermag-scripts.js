
(function ($) {
    "use strict";


    /**
    * Mobile Menu
   */
    $('.primary-menu').slicknav({
        label: '',
        duration: 1000,
        easingOpen: "easeOutBounce", //available with jQuery UI
        prependTo:'#papermag_mobile_menu',
        closeOnClick: true,
        easingClose:"swing", 
        easingOpen:"swing", 
        openedSymbol: "-",
        closedSymbol: "+"   
    });

    $('select').niceSelect();

    /**
     * Sticky Header
     */
    $(window).on('scroll', function(event) {
		var scroll = $(window).scrollTop();
		if (scroll < 110) {
			$('.header-sticky-active').removeClass('papermag-sticky');
		} else {
			$('.header-sticky-active').addClass('papermag-sticky');
		}
	});


    // Panel Widget
    var panelIcon = $('.sidemenu'),
    panelClose = $('.panel-close'),
    panelWrap = $('.offcanvas-panel');
    panelIcon.on('click', function (e) {
        panelWrap.toggleClass('panel-on');
        e.preventDefault();
    });
    panelClose.on('click', function (e) {
        panelWrap.removeClass('panel-on');
        e.preventDefault();
    });
    /**
     * trending post carousel
     * @param {*} $scope 
     * @param {*} $ 
     */
    function papermagTrendingActive( $scope, $ ){
        var $_this = $scope.find('.papermag-post-carousel');
        var $currentID = '#'+$_this.attr('id'),
            $slitems = $_this.data('slitems'),
            $navs = $_this.data('navs'),
            $loop = $_this.data('loop'),
            $dots = $_this.data('dots'),
            $center = $_this.data('center'),
            $autoplay = $_this.data('autoplay'),
            $slmargin = $_this.data('slmargin'),
            $autoplaytimeout = $_this.data('autoplaytimeout'),
            $smartspeed = $_this.data('smartspeed'),
            $animatein = $_this.data('animatein');
            
            
        var flSlideActive = $( $currentID );
        flSlideActive.owlCarousel({           
            loop: $loop,
            nav: $navs,
            dots: $dots,
            center:$center,
            margin:$slmargin,
            autoplay: $autoplay,
            autoplayTimeout: $autoplaytimeout,
            smartSpeed: $smartspeed,
            animateIn: $animatein,
            animateOut: 'fadeOut',
            navText:["<i class='fal fa-long-arrow-left'></i>", "<i class='fal fa-long-arrow-right'></i>"],
            responsive:{
                0:{
                    items:1,
                    nav: false,
                },
                600:{
                    items:3,
                    nav: false,
                },
                1000:{
                    items: $slitems,
                }
            }
        });
    }
    /**
     * Post Gallery
     */
     $('.papermag-blog-gallery').owlCarousel({
        items:1,
        loop:true,
        dots:false,
        autoplay:true,
        nav:true,
        smartSpeed:1500,
        navText:["<i class='fal fa-long-arrow-left'></i>", "<i class='fal fa-long-arrow-right'></i>"],
    });

    //====== 07. Magnific Popup
	$('.papermag-popup-video').magnificPopup({
		type: 'iframe'
		// other options
	});


    /**
     * Preloader
     */
    $(window).on('load', function() {
        $(".papermag-preloader").fadeOut(1000);
    });

    //Create the cookie object
    var cookieStorage = {
        setCookie: function setCookie(key, value, time, path) {
            var expires = new Date();
            expires.setTime(expires.getTime() + time);
            var pathValue = '';
            if (typeof path !== 'undefined') {
                pathValue = 'path=' + path + ';';
            }
            document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
        },
        getCookie: function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        },
        removeCookie: function removeCookie(key) {
            document.cookie = key + '=; Max-Age=0; path=/';
        }
    };

    //Click on dark mode icon. Add dark mode classes and wrappers. Store user preference through sessions
    $('.dark-button').click(function() {
        //Show either moon or sun
        $('.dark-button').toggleClass('active');
        //If dark mode is selected
        if ($('.dark-button').hasClass('active')) {
            //Add dark mode class to the body
            $('body').addClass('papermag-dark-mode');
            cookieStorage.setCookie('yonkovNightMode', 'true', 2628000000, '/');
        } else {
            $('body').removeClass('papermag-dark-mode');
            setTimeout(function() {
                cookieStorage.removeCookie('yonkovNightMode');
            }, 100);
        }
    })

    //Check Storage. Display user preference 
    if (cookieStorage.getCookie('yonkovNightMode')) {
        $('body').addClass('papermag-dark-mode');
        $('.dark-button').addClass('active');
    }

    /**
     * Search Header
     */
     if ($('.papermag-search-two').length) {
        $('.papermag-search-two').on('click', function() {
            $('body').addClass('search-active');
        });
        $('.close-search').on('click', function() {
            $('body').removeClass('search-active');
        });
    }

    /**
     * Post Sports Slider
     */
 function pmgPostSportsSlide( $scope, $ ){
    $('.papermag-sport-slider').owlCarousel({
        items:1,
        loop:true,
        dots:false,
        autoplay:true,
        nav:false,
        smartSpeed:1000,
        autoplayTimeout:5000,
        navText:["<i class='fal fa-long-arrow-left'></i>", "<i class='fal fa-long-arrow-right'></i>"],
    });
}
/**
 * Sports Score Slider
 */
 function pmgScoreDisplay( $scope, $ ){
    $('.pmg-sport-score-wraper').owlCarousel({
        stagePadding: 150,
        loop:true,
        margin:30,
        nav:false,
        autoplay:true,
        autoplayTimeout:6000,
        smartSpeed:1000,
        responsive:{
            0:{
                items:1,
                stagePadding: 0,
            },
            600:{
                items:2,
                stagePadding: 0,
            },
            1000:{
                items:3,
                stagePadding: 100,
            },
            1200:{
                items:3
            },
            1500:{
                items:4
            }
        }
    })
}
/**
 * Sports Score Slider
 */
 function postRecentAdd( $scope, $ ){
    $('.papermag-post-recent-add').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        autoplay:true,
        autoplayTimeout:6000,
        smartSpeed:1000,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items: 4,
            }
        }
    })
}

$(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/papermagpostgridslide.default', papermagTrendingActive);
    elementorFrontend.hooks.addAction('frontend/element_ready/papermag_sports_score.default', pmgScoreDisplay);
    elementorFrontend.hooks.addAction('frontend/element_ready/pmgSports_slider.default', pmgPostSportsSlide);
    elementorFrontend.hooks.addAction('frontend/element_ready/recent_add_post_carousel.default', postRecentAdd);
});

})(jQuery);