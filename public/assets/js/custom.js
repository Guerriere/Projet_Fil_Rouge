$(function() {
    "use strict";
    
    // Preloader
    $(window).on('load', function() {
        $('.preloader').fadeOut();
    });
    
    // Sidebar toggle
    $('.nav-toggler').on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    
    // This is for the mini-sidebar
    $(function() {
        $(".sidebartoggler").on('click', function() {
            $("#main-wrapper").toggleClass("mini-sidebar");
            if ($("#main-wrapper").hasClass("mini-sidebar")) {
                $(".sidebartoggler").prop("checked", true);
                $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
            } else {
                $(".sidebartoggler").prop("checked", false);
                $("#main-wrapper").attr("data-sidebartype", "full");
            }
        });
    });
    
    // Waves Effect
    Waves.init();
    Waves.attach('.button', ['waves-effect']);
    Waves.attach('.waves-effect', ['waves-ripple']);
    Waves.attach('.navbar .nav-link', ['waves-light']);
    
    // Tooltip
    $('[data-bs-toggle="tooltip"]').tooltip();
    
    // Popover
    $('[data-bs-toggle="popover"]').popover();
    
    // Sidebar Menu
    $("#sidebarnav").metisMenu();
    
    // Auto select left navbar
    $(function() {
        var url = window.location;
        var element = $('ul#sidebarnav a').filter(function() {
            return this.href == url;
        }).addClass('active').parent().addClass('active');
        while (true) {
            if (element.is('li')) {
                element = element.parent().addClass('in').parent().addClass('active');
            } else {
                break;
            }
        }
    });
    
    // Scroll to top
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    $('#back-to-top').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});