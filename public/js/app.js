$(function() {
    // .carousel
    $('.carousel').carousel('cycle', {
        interval: 2000
    });

    // [invl-toggle-menu]
    $('[invl-toggle-menu]').on('click', function() {
        var el = $(this),
            target = $(el.attr('invl-toggle-menu'));
        if (!target.hasClass('show')) {
            target.addClass('show');
        }
        if (target.children('.invl-navbar-navlist').hasClass('animated slideInDown')) {
            target.children('.invl-navbar-navlist').removeClass('animated slideInDown');
            target.children('.invl-navbar-navlist').addClass('animated slideOutUp');
            $('html, body').css({
                overflow: 'auto',
            });
        } else {
            target.children('.invl-navbar-navlist').removeClass('animated slideOutUp');
            target.children('.invl-navbar-navlist').addClass('animated slideInDown');
            $('html, body').css({
                overflow: 'hidden',
            });
        }
    });

    // [slick-channels]
    $('[slick-channels]').slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    // ----------------------------------------------setFixedMenu---------------------------------------------
    setFixedMenu();
    $(window).scroll(function(event) {
        setFixedMenu();
    });

    function setFixedMenu() {
        var scroll = $(window).scrollTop();
        if (scroll > 40) {
            if (!$('[fixed-navbar]').hasClass('show')) {
                $('[fixed-navbar]').addClass('show');
            }
            $('[fixed-navbar]').removeClass('animated slideOutUp');
            $('[fixed-navbar]').addClass('animated slideInDown');
        } else {
            $('[fixed-navbar]').addClass('animated slideOutUp');
        }
    }
});