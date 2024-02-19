// Read More Btn
$(document).ready(function () {
    $('.toggle-active').click(function () {
        var collapse_content_selector1 = $(this).attr('href');
        var toggle_switch1 = $(this);
        $(collapse_content_selector1).slideToggle(function () {
            if ($(this).css('display') == 'none') {
                toggle_switch1.html('Read More <i class="fa fa-chevron-down" aria-hidden="true"></i>');
            } else {
                toggle_switch1.html('Less <i class="fa fa-chevron-up" aria-hidden="true"></i>  ');
            }
        });
    })
});

// magnifi pictures
$(document).ready(function () {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function (item) {
                return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
            }
        }
    });
});


// owl crousel slider
$('.slider01').owlCarousel({
    items: 3,
    loop: true,
    margin: 10,
    responsiveClass: true,
    thumbs: false,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        575: {
            items: 2,
            nav: true
        },
        768: {
            items: 2,
            nav: true
        },
        992: {
            items: 3,
            nav: true
        },
        1200: {
            items: 3,
            nav: true,
            loop: false,
            margin: 20
        }
    }
})

$('.slider02').owlCarousel({
    items: 4,
    loop: true,
    margin: 10,
    responsiveClass: true,
    thumbs: false,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        575: {
            items: 2,
            nav: true,
        },
        768: {
            items: 2,
            nav: true,
        },
        992: {
            items: 3,
            nav: true,
        },
        1200: {
            items: 4,
            nav: true,
            loop: false,
            margin: 20
        }
    }
});

$('.slider03').owlCarousel({
    items: 3,
    loop: true,
    margin: 10,
    responsiveClass: true,
    thumbs: false,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        575: {
            items: 2,
            nav: true,
        },
        768: {
            items: 2,
            nav: true,
        },
        992: {
            items: 3,
            nav: true,
        },
        1200: {
            items: 3,
            nav: true,
            loop: false,
            margin: 20
        }
    }
})
var owl = $('.main-slider');
owl.owlCarousel({
    // autoplay: true,
    autoplayTimeout: 4000,
    loop: true,
    items: 1,
    center: true,
    nav: false,
    thumbs: true,
    thumbImage: false,
    thumbsPrerendered: true,
    thumbContainerClass: 'owl-thumbs',
    thumbItemClass: 'owl-thumb-item'
});

$('.picture-slide').owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    responsiveClass: true,
    thumbs: false
});

