(function ($) {
    "use strict"
    jQuery(document).ready(function () {
        /* start point */




        $(".mobile-mp-cate-btn").click(function () {
            // $(this).toggleClass("active");
            $('.mp_dropdown.small-device').addClass("active");
        });

        $(".cls-cat-btn").click(function () {
            // $(this).toggleClass("active");
            $('.mp_dropdown.small-device').removeClass("active");
        });

        $('.hero-slider-active').slick({
            dots: false,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000
        });

        // prograss bar
        $(".progress-bar1").loading();


        // var options = {
        //     series: [100],
        //     chart: {
        //         type: 'donut',
        //     },
        //     legend: {
        //         show: false
        //     },
        //     dataLabels: {
        //         enabled: false
        //     },
        //     tooltip: {
        //         enabled: false
        //     },
        //     // fill: {
        //     //     colors: ['#F45b9f2']
        //     // }
        // };

        // var chart = new ApexCharts(document.querySelector("#chart-ratings"), options);
        // chart.render();


        // var options2 = {
        //     series: [100],
        //     chart: {
        //         type: 'donut',
        //     },
        //     legend: {
        //         show: false
        //     },
        //     dataLabels: {
        //         enabled: false
        //     },
        //     tooltip: {
        //         enabled: false
        //     },
        //     // fill: {
        //     //     colors: ['#F45b9f2']
        //     // }
        // };

        // var chart2 = new ApexCharts(document.querySelector("#ratings-distribution"), options2);
        // chart2.render();


        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })






















        // new theme styles end here
        // Scroll To Top 
        $('.scrollup').on('click', function () {
            $("html").animate({
                "scrollTop": '0'
            }, 500);
        });
        $(window).on('scroll', function () {
            var toTopVisible = $('html').scrollTop();
            if (toTopVisible > 500) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        // nice-select
        $('select').niceSelect();


        /* end point */
    });

    jQuery(window).on('load', function () {

        // WOW JS
        new WOW().init();

        // Preloader
        var preLoder = $("#preloader");
        preLoder.fadeOut(0);

    });
})(jQuery);
