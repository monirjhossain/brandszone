
// hero slider
$('.v3_hero_banner_slider').slick({
    dots: true,
    infinite: true,
    arrows: false,
    speed: 300,
    slidesToShow: 1,
    responsive: [
        {
            breakpoint: 575.99,
            settings: {
                dots: false,
                autoplay: true
            }
        }
    ]
});


// category slider
$('.v3_mobile_cat_slider').slick({
    dots: false,
    infinite: true,
    arrows: false,
    speed: 1000,
    autoplay: true,
    slidesToShow: 10,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                dots: false,
                autoplay: true,
                slidesToShow: 6,
            }
        },
        {
            breakpoint: 575,
            settings: {
                dots: false,
                autoplay: true,
                slidesToShow: 5,
            }
        },
        {
            breakpoint: 400,
            settings: {
                dots: false,
                autoplay: true,
                slidesToShow: 4,
            }
        }
    ]
});

// v3_mobile_best_slider
$('.v3_mobile_brand_slider').slick({
    dots: false,
    infinite: true,
    arrows: false,
    speed: 1000,
    autoplay: true,
    slidesToShow: 3,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                dots: false,
                autoplay: true,
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 576,
            settings: {
                dots: false,
                autoplay: true,
                slidesToShow: 1,
            }
        }
    ]
});


// v3_mobile_best_slider
$('.v3_mobile_best_slider').slick({
    dots: false,
    infinite: true,
    arrows: false,
    speed: 1000,
    autoplay: false,
    slidesToShow: 5,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                dots: false,
                autoplay: true,
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 768,
            settings: {
                dots: false,
                autoplay: true,
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 420,
            settings: {
                dots: false,
                autoplay: true,
                slidesToShow: 2,
            }
        }

    ]
});



$(document).ready(function (){

    var time = $(".countdown");
    time.each(function () {
        var el = $(this),
            value = $(this).data('countdown');
        var countDownDate = new Date(value).getTime();
        var timeout = setInterval(function () {
            var now = new Date().getTime(),
                distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24)),
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
                seconds = Math.floor((distance % (1000 * 60)) / 1000);
            el.find('.days').html(days);
            el.find('.hours').html(hours);
            el.find('.minutes').html(minutes);
            el.find('.seconds').html(seconds);
            if (distance < 0) {
                clearInterval(timeout);
                var dataId = el.attr('id');
                $('#' + dataId).addClass('display-none');
            }
        }, 1000);
    });

});


