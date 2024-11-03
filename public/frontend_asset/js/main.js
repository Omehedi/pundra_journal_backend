(function ($) {
    "use strict";

    /*--
        Commons Variables
    -----------------------------------*/
    var $window = $(window),
        $body = $('body'),
        $mainWrapper = $('.main-wrapper'),
        $headerHeight = $('.header').outerHeight();

    /*--
        Custom script to call Background
        Image form html data attribute
    -----------------------------------*/
    $('[data-bg-image]').each(function () {
        var $this = $(this),
            $image = $this.data('bg-image');
        $this.css('background-image', 'url(' + $image + ')');

    });

    /*--
        Parallax
    /*--
        Header Sticky
    -----------------------------------*/
    $window.on('scroll', function () {
        if ($window.scrollTop() > 350) {
            $('.header').addClass('is-sticky');
        } else {
            $('.header').removeClass('is-sticky');
        }
    });

    /*--
		Mobile OffCanvas Open & Close
    -----------------------------------*/
    function mobileOffCanvasToggle() {
        var $offCanvas = $('#offcanvas'),
            $offCanvasOverlay = $('.offcanvas-overlay');
        $('.offcanvas-toggle').on('click', function () {
            $offCanvas.addClass('open');
            $offCanvasOverlay.fadeIn();
            $body.addClass('offcanvas-open');
        });
        $('.offcanvas-close, .offcanvas-overlay').on('click', function () {
            $offCanvas.removeClass('open');
            $offCanvasOverlay.fadeOut();
            $body.removeClass('offcanvas-open');
        });
    }
    mobileOffCanvasToggle();

    /*--
        Off Canvas Menu
    -----------------------------------*/
    function mobileOffCanvasMenu() {
        var $offCanvasNav = $('.offcanvas-menu'),
            $offCanvasNavSubMenu = $offCanvasNav.find('.sub-menu');

        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i></i></span>');

        /*Category Sub Menu Toggle*/
        $offCanvasNav.on('click', 'li a, li .menu-expand', function (e) {
            var $this = $(this);
            if ($this.siblings('.sub-menu').length && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('active');
                    $this.siblings('ul').slideUp();
                    $this.parent('li').find('li').removeClass('active');
                    $this.parent('li').find('ul:visible').slideUp();
                } else {
                    $this.parent('li').addClass('active');
                    $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.siblings('ul').slideDown();
                }
            }
        });
    }
    mobileOffCanvasMenu();

    /*--
        Login & Register Modal
    -----------------------------------*/
    $('#loginSignupModal').on('show.bs.modal', function (event) {
        var $button = $(event.relatedTarget),
            $target = $button.data('target-sub'),
            $modal = $(this);
        $modal.find('.nav-link').removeClass('active');
        $modal.find('.nav-link[href="' + $target + '"]').addClass('active');
        $modal.find('.tab-pane').removeClass('active show');
        $modal.find('.tab-pane' + $target).addClass('active show');
    })

})(jQuery);
