$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //aos
    AOS.init();

    //search
    var searchShow = function () {
        var searchWrap = $('.search-wrap');
        $('.js-search-open').on('click', function (e) {
            e.preventDefault();
            searchWrap.addClass('active');
            setTimeout(function () {
                searchWrap.find('.form-control').focus();
            }, 300);
        });
        $('.js-search-close').on('click', function (e) {
            e.preventDefault();
            searchWrap.removeClass('active');
        })
    };
    searchShow();

    //mobile menu
    $('.js-show--menu').click(function () {
        $('body').toggleClass('is-collapsed-mobile');
    })
    $('.js-close--menu').click(function () {
        $('body').removeClass('is-collapsed-mobile');
    })

    $(document).mouseup(function (e) {
        var container = $(".site-navbar");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if ($('body').hasClass('is-collapsed-mobile')) {
                $('body').removeClass('is-collapsed-mobile');
            }
        }
    });

    //fixed header
    var siteScroll = function () {
        $(window).scroll(function () {
            var st = $(this).scrollTop();
            if (st > 20) {
                $('.header').addClass('fixed-header');
            } else {
                $('.header').removeClass('fixed-header');
            }
        })
    }
    siteScroll();

    //banner slide
    $('#banner').owlCarousel({
        loop: true,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    })

    //collection slide
    $('#collection').owlCarousel({
        loop: true,
        // autoplay:true,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    })

    //intro slide
    $('#intro').owlCarousel({
        loop: true,
        // autoplay:true,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    })

    //product slide
    $('#product').owlCarousel({
        loop: true,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    })

    //product detail slide
    $('#product-detail--slide').owlCarousel({
        loop: true,
        responsiveClass: true,
        margin: 0,
        nav: true,
        dots: false,
        navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    })

    //quantity number
    var spins = document.getElementsByClassName("quantity-selector");
    for (var i = 0, len = spins.length; i < len; i++) {
        var spin = spins[i],
            span = spin.getElementsByTagName("span"),
            input = spin.getElementsByTagName("input")[0];

        input.onchange = function () {
            input.value = +input.value || 0;
        };
        span[0].onclick = function () {
            input.value = Math.max(0, input.value - 1);
        };
        span[1].onclick = function () {
            input.value -= -1;
        };
    }
})
