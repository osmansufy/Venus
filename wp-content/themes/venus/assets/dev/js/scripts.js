/* ---------------------------------------------
 common scripts
 --------------------------------------------- */

;(function ($) {

    "use strict"; // use strict to start

    /* ---------------------------------------------
     WOW init
     --------------------------------------------- */

    new WOW().init();

    $(document).ready(function () {

        /* ---------------------------------------------
          vl custom menu
        --------------------------------------------- */
        vlmenu.init({
            selector: ".vlmenu"
        });

        $('.js-hamburger').on('click', function () {
            $('.hamburger').toggleClass('is-active');
        });


        /* ---------------------------------------------
          nav sticky
        --------------------------------------------- */
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 200) {
                $('.app-header').addClass('sticky-nav');
            } else {
                $('.app-header').removeClass('sticky-nav');
            }
        });


        /* ---------------------------------------------
         overlay nav
         --------------------------------------------- */

        $('#nav_toggle').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            $('#nav_overlay').toggleClass('open');
            $('.extra_link, .overlay-nav-social-link').toggleClass('open');
        });

        /* ---------------------------------------------
         portfolio filtering
         --------------------------------------------- */

        var $portfolio = $('.portfolio-grid');
        if ($.fn.imagesLoaded && $portfolio.length > 0) {
            imagesLoaded($portfolio, function () {
                $portfolio.isotope({
                    itemSelector: '.portfolio-item',
                    filter: '*'
                });
                $(window).trigger("resize");
            });
        }

        $('.portfolio-filter').on('click', 'a', function (e) {
            e.preventDefault();
            $(this).parent().addClass('active').siblings().removeClass('active');
            var filterValue = $(this).attr('data-filter');
            $portfolio.isotope({filter: filterValue});
        });

        /*---------------------------------------------
         Portfolio popup
         ---------------------------------------------*/

        $(".portfolio-gallery").each(function () {
            $(this).find(".popup-gallery").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true
                }
            });
        });

        $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
            disableOn: 300,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });


        /* ---------------------------------------------
         owl-carousel
         --------------------------------------------- */

        $('.owl-carousel').each(function() {
            var a = $(this),
                items = a.data('items') || [1,1,1],
                margin = a.data('margin'),
                loop = a.data('loop'),
                nav = a.data('nav'),
                dots = a.data('dots'),
                center = a.data('center'),
                autoplay = a.data('autoplay'),
                autoplaySpeed = a.data('autoplay-speed'),
                rtl = a.data('rtl'),
                autoheight = a.data('autoheight');

            var options = {
                nav: nav || false,
                loop: loop || false,
                dots: dots || false,
                center: center || false,
                autoplay: autoplay || false,
                autoHeight: autoheight || false,
                rtl: rtl || false,
                margin: margin || 0,
                autoplayTimeout: autoplaySpeed || 3000,
                autoplaySpeed: 400,
                autoplayHoverPause: true,
                navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                responsive: {
                    0: { items: items[2] || 1 },
                    576: { items: items[1] || 1 },
                    1200: { items: items[0] || 1}
                }
            };

            a.owlCarousel(options);
        });


        /* ---------------------------------------------
         Configure tooltips globally
         --------------------------------------------- */

        $('[data-toggle="tooltip"]').tooltip();

        /* ---------------------------------------------
         Configure popover globally
         --------------------------------------------- */
        $('[data-toggle="popover"]').popover();

        /* ---------------------------------------------
         Back to top init
         --------------------------------------------- */

        $("body").append("<a data-scroll class='lift-off js-lift-off lift-off_hide' href='#'><i class='fa fa-angle-up'></i></a>");

        var $liftOff = $(".js-lift-off");
        $(window).on("scroll", function () {
            if ($(window).scrollTop() > 150) {
                $liftOff.addClass("lift-off_show").removeClass("lift-off_hide");
            } else {
                $liftOff.addClass("lift-off_hide").removeClass("lift-off_show");
            }
        });


    });

})(jQuery);


