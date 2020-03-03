$(document).ready(function () {
    // HEAD CANVAS
    if (!window.requestAnimationFrame) {
        window.requestAnimationFrame = (window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame || function (callback) {
            return window.setTimeout(callback, 1000 / 60);
        });
    }
    (function ($, window) {
        /**
         * Makes a nice constellation on canvas
         * @constructor Constellation
         */
        function Constellation(canvas, options) {
            var $canvas = $(canvas),
                context = canvas.getContext('2d'),
                defaults = {
                    star: {
                        color: 'rgba(255, 255, 255, .5)',
                        width: 1
                    },
                    line: {
                        color: 'rgba(255, 255, 255, .5)',
                        width: 0.1
                    },
                    position: {
                        x: 0, // This value will be overwritten at startup
                        y: 0 // This value will be overwritten at startup
                    },
                    width: window.innerWidth,
                    height: window.innerHeight,
                    velocity: 0.05,
                    length: 3,
                    distance: 270,
                    radius: 1000,
                    points: [],
                    stars: []
                },
                config = $.extend(true, {}, defaults, options);

            function Star(point) {
                this.x = point.x;
                this.y = point.y;

                this.vx = (config.velocity - (Math.random() * 0.2));
                this.vy = (config.velocity - (Math.random() * 0.2));

                this.radius = config.star.width;
            }

            Star.prototype = {
                create: function () {
                    context.beginPath();
                    context.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
                    context.fill();
                },

                animate: function () {
                    var i;
                    for (i = 0; i < config.length; i++) {

                        var star = config.stars[i];
                        var point = config.points[i];

                        if (Math.abs(star.y - point.y) > 15 || star.y < 5 || star.y > canvas.height - 5) {
                            star.vx = star.vx;
                            star.vy = -star.vy;
                        } else if (Math.abs(star.x - point.x) > 15 || star.x < 5 || star.x > canvas.width - 5) {
                            star.vx = -star.vx;
                            star.vy = star.vy;
                        }

                        star.x += star.vx;
                        star.y += star.vy;
                    }
                },

                line: function () {
                    var length = config.length,
                        iStar,
                        jStar,
                        i,
                        j;

                    for (i = 0; i < length; i++) {
                        for (j = 0; j < length; j++) {
                            iStar = config.stars[i];
                            jStar = config.stars[j];

                            if (
                                (iStar.x - jStar.x) < config.distance &&
                                (iStar.y - jStar.y) < config.distance &&
                                (iStar.x - jStar.x) > -config.distance &&
                                (iStar.y - jStar.y) > -config.distance
                            ) {
                                if (
                                    (iStar.x - config.position.x) < config.radius &&
                                    (iStar.y - config.position.y) < config.radius &&
                                    (iStar.x - config.position.x) > -config.radius &&
                                    (iStar.y - config.position.y) > -config.radius
                                ) {
                                    context.beginPath();
                                    context.moveTo(iStar.x, iStar.y);
                                    context.lineTo(jStar.x, jStar.y);
                                    context.stroke();
                                    context.closePath();
                                }
                            }
                        }
                    }
                }
            };

            this.createStars = function () {
                var length = config.length,
                    star,
                    i;
                context.clearRect(0, 0, canvas.width, canvas.height);
                for (i = 0; i < length; i++) {
                    config.stars.push(new Star(config.points[i]));
                    star = config.stars[i];

                    star.create();
                }
                star.line();
                star.animate();
            };

            this.setCanvas = function () {
                canvas.width = config.width;
                canvas.height = config.height;
            };

            this.setContext = function () {
                context.fillStyle = config.star.color;
                context.strokeStyle = config.line.color;
                context.lineWidth = config.line.width;
            };

            this.setInitialPosition = function () {
                if (!options || !options.hasOwnProperty('position')) {
                    config.position = {
                        x: canvas.width * 0.5,
                        y: canvas.height * 0.5
                    };
                }
            };

            this.loop = function (callback) {
                callback();
                window.requestAnimationFrame(function () {
                    this.loop(callback);
                }.bind(this));
            };

            this.bind = function () {
                $canvas.on('mousemove', function (e) {
                    config.position.x = e.pageX - $canvas.offset().left;
                    config.position.y = e.pageY - $canvas.offset().top;
                });
            };

            this.init = function () {
                this.setCanvas();
                this.setContext();
                this.setInitialPosition();
                this.loop(this.createStars);
                this.bind();
            };
        }

        $.fn.constellation = function (options) {
            return this.each(function () {
                var c = new Constellation(this, options);
                c.init();
            });
        };
    })($, window);

    // Init plugin
    $('canvas').constellation({
        length: 20,
        width: 500,
        height: 620,
        line: {
            color: '#e6e2db',
            width: 0.1
        },
        star: {
            color: '#676565',
            width: 0.1
        },
        points: [{
                x: 0,
                y: 418
            }, {
                x: 25,
                y: 111
            }, {
                x: 30,
                y: 239
            }, {
                x: 124,
                y: 168
            }, {
                x: 123,
                y: 473
            }, {
                x: 137,
                y: 30
            }, {
                x: 140,
                y: 277
            }, {
                x: 200,
                y: 155
            }, {
                x: 248,
                y: 64
            }, {
                x: 287,
                y: 373
            }, {
                x: 321,
                y: 100
            }, {
                x: 355,
                y: 520
            }, {
                x: 407,
                y: 235
            }, {
                x: 300,
                y: 285
            }, {
                x: 450,
                y: 400
            }, {
                x: 450,
                y: 200
            }, {
                x: 490,
                y: 90
            }, {
                x: 300,
                y: 100
            }, {
                x: 97,
                y: 610
            }, {
                x: 35,
                y: 450
            },

        ]
    });
    // END HEAD CANVAS

    // MENU
    $(".navT").on("click", function () {
        $(this).toggleClass("active");
        $("#menu").toggleClass("open");
    });
    $(".js-menu").click(function () {
        $("#menu").removeClass("open");
        $(".navT").removeClass("active");
    });
    // END MENU

    //PROJECT CHANGE BACKGROUND
    $('.js-changebg').on('click', function () {
        $(this).parent().children().removeClass("main-bg_color");
        $(this).toggleClass('main-bg_color');
    });
    $('.js-changebg-2').on('click', function () {
        $(this).parent('.nav').children().removeClass("main-bg_color");
        $(this).toggleClass('main-bg_color');
    });

    // END PROJECT CHANGEBG

    //FADE
    AOS.init();
    //FADE

    //OWL CAROUSEL

    // PROJECT-SLIDE
    $('#slide-branding').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 1,
                dots: true,
            },
            1000: {
                items: 1,
            },
            1400: {
                items: 1,
                stagePadding: 260
            },
        },
    });
    $('#slide-view').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: false,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 1,
                dots: true,
            },
            1000: {
                items: 1,
            },
            1400: {
                items: 1,
                stagePadding: 260
            },
        },
    });
    $('#slide-software').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 1,
                dots: true,
            },
            1000: {
                items: 1,
            },
            1400: {
                items: 1,
                stagePadding: 260
            },
        },
    });
    $('#slide-mobile').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 1,
                dots: true,
            },
            1000: {
                items: 1,
            },
            1400: {
                items: 1,
                stagePadding: 260
            },
        },
    });
    $('#slide-website').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 1,
                dots: true,
            },
            1000: {
                items: 1,
            },
            1400: {
                items: 1,
                stagePadding: 260
            },
        },
    });
    // END PROJECT-SLIDE

    // CUSTOMER
    $('.customer-slide').owlCarousel({
        loop: true,
        margin: 144,
        nav: false,
        dots: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3,
                margin: 100
            },
            1400: {
                items: 3,
            },
        },
    });
    // END CUSTOMER
    $('#products-detail-slide').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: false,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 1,
                dots: true,
            },
            1000: {
                items: 1,
                dots: true,
            },
            1400: {
                items: 1,
            },
        },
    });

    $('#customer-content-slide').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        autoplay: false,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 1,
                dots: true,
            },
            1000: {
                items: 1,
                dots: true,
            },
            1400: {
                items: 1,
            },
        },
    });

    // END OWL CAROUSEL
    $('#slide-logo-content').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        autoplay: false,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 1,
                dots: true,
            },
            1000: {
                items: 1,
                dots: true,
            },
            1400: {
                items: 4,
            },
        },
    });




    // SERVICES  
    $(".input-fill-info").blur(function () {
        let Counter = true;
        $('[name="input-info"]').each(function () {
            if (this.value == '') {
                Counter = false;
                return false;
            }
        });
        if (Counter) {
            $('.step-dots div').addClass('div-step_bgcolor');
            $('.js-step_bg').addClass('div-step_color');
            $('.step-number-2').addClass('div-step_color');
            // $('.fill-require').addClass('m-0');
            $('#fill-infor').removeClass('show');
            $('html,body').animate({
                    scrollTop: $(".fill-require").offset().top
                },
                'slow'
            );
        } else {
            $('.step-dots div').removeClass('div-step_bgcolor');
            $('.js-step_bg').removeClass('div-step_color');
            $('.step-number-2').removeClass('div-step_color');
            // $('.fill-header').removeClass('mb-0');
        }
    });


    $(".input-fill-require").blur(function () {
        let Counter = true;
        $('[name="input-require"]').each(function () {
            if (this.value == '') {
                Counter = false;
                return false;
            }
        });
        if (Counter) {
            $('.step-dots-2 div').addClass('div-step_bgcolor');
            $('.js-step_bg-2').addClass('div-step_color');
            $('.step-number-3').addClass('div-step_color');
            $('#fill-require').removeClass('show');
            $('html,body').animate({
                    scrollTop: $(".shape-style").offset().top
                },
                'slow'
            );
        } else {
            $('.step-dots-2 div').removeClass('div-step_bgcolor');
            $('.js-step_bg-2').removeClass('div-step_color');
            $('.step-number-3').removeClass('div-step_color');
        }
    });

    var slider = document.getElementById("Range1");
    slider.oninput = function () {
        $('#volume1').text(this.value + '%').css({
            'left': this.value + '%',
            'transform': 'translateX(-' + this.value + '%)'
        });
    };

    var slider = document.getElementById("Range2");
    slider.oninput = function () {
        $('#volume2').text(this.value + '%').css({
            'left': this.value + '%',
            'transform': 'translateX(-' + this.value + '%)'
        });
    };

    var slider = document.getElementById("Range3");
    slider.oninput = function () {
        $('#volume3').text(this.value + '%').css({
            'left': this.value + '%',
            'transform': 'translateX(-' + this.value + '%)'
        });
    };

    var slider = document.getElementById("Range4");
    slider.oninput = function () {
        $('#volume4').text(this.value + '%').css({
            'left': this.value + '%',
            'transform': 'translateX(-' + this.value + '%)'
        });
    };

    var slider = document.getElementById("Range5");
    slider.oninput = function () {
        $('#volume5').text(this.value + '%').css({
            'left': this.value + '%',
            'transform': 'translateX(-' + this.value + '%)'
        });
    };

    var slider = document.getElementById("Range6");
    slider.oninput = function () {
        $('#volume6').text(this.value + '%').css({
            'left': this.value + '%',
            'transform': 'translateX(-' + this.value + '%)'
        });
    };

    var slider = document.getElementById("Range7");
    slider.oninput = function () {
        $('#volume7').text(this.value + '%').css({
            'left': this.value + '%',
            'transform': 'translateX(-' + this.value + '%)'
        });
    };

    var slider = document.getElementById("Range8");
    slider.oninput = function () {
        $('#volume8').text(this.value + '%').css({
            'left': this.value + '%',
            'transform': 'translateX(-' + this.value + '%)'
        });
    };
    //END SERVICES

    //Product List
    $(".nav-link").click(function () {
        $("#collapsibleNavbar").addClass("d-none");
        $("#collapsibleNavbar").removeClass("show");
        $(".navbar-toggler").click(function () {
            $("#collapsibleNavbar").removeClass("d-none");
        })
    });
    //END Product List


});