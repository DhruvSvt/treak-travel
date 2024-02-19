 // banner-slider
 $('.banner-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    focusOnSelect: false,
    arrows: true,
    centreMode: true,
    infinite: false,
    prevArrow:
    '<span class="prev-arrow "><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>',
  nextArrow:
    '<span class="next-arrow "><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>',
    responsive: [
      {
        breakpoint: 1201,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });
 // banner-img-slider
 $('.banner-left').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    focusOnSelect: false,
    arrows: true,
    fade: true,
    speed: 1000,
    autoplay: true,
    centreMode: true,
    prevArrow:
    '<span class="prev-arrow "><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>',
  nextArrow:
    '<span class="next-arrow "><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });


   // active class
   $('.trend-tab button').on('click', function () {
    $('.trend-tab').find('li.active').removeClass('active');
    $(this).parent('li').addClass('active');
  });
  
  $('.btn').click(function () {
    $('.para-text').hide(); // Hide all tabs with class para_text
    $('.' + this.id).show(); // Show only the tab you want to show
  });

  // holiday package
 $('.holiday-pack').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  focusOnSelect: false,
  arrows: true,
  centreMode: true,
  prevArrow:
  '<span class="prev-arrow "><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>',
nextArrow:
  '<span class="next-arrow "><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>',
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
});

  // intresting holidays
 $('.best-holidays').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  focusOnSelect: false,
  arrows: true,
  centreMode: true,
  prevArrow:
  '<span class="prev-arrow "><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>',
nextArrow:
  '<span class="next-arrow "><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
});
	

$('.slider-single').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: false,
  // adaptiveHeight: true,
  // infinite: false,
//  useTransform: true,
  speed: 400,
  asNavFor: '.slider-nav',
  cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
});

$('.slider-nav')
  .on('init', function(event, slick) {
    $('.slider-nav .slick-slide.slick-current').addClass('is-active');
  })
  .slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    asNavFor: '.slider-single',
    // focusOnSelect: false,
    // infinite: false,
  //   prevArrow:
  //   '<span class="prev-arrow "><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>',
  // nextArrow:
  //   '<span class="next-arrow "><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>',
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    }, {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
     }
    }, {
      breakpoint: 640,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
     }
    }, {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
   }
    }]
  });

$('.slider-single').on('afterChange', function(event, slick, currentSlide) {
  $('.slider-nav').slick('slickGoTo', currentSlide);
  var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
  $('.slider-nav .slick-slide.is-active').removeClass('is-active');
  $(currrentNavSlideElem).addClass('is-active');
});

// $('.slider-nav').on('click', '.slick-slide', function(event) {
//   event.preventDefault();
//   var goToSingleSlide = $(this).data('slick-index');

//   $('.slider-single').slick('slickGoTo', goToSingleSlide);
// });

// Read More Btn
$(document).ready(function () {
	$('.toggle-active').click(function () {
		var collapse_content_selector1 = $(this).attr('href');
		var toggle_switch1 = $(this);
		$(collapse_content_selector1).slideToggle(function () {
			if ($(this).css('display') == 'none') {
				toggle_switch1.html('Read More <i class="fa fa-angle-right" aria-hidden="true"></i>');
			} else {
				toggle_switch1.html('Less <i class="fa fa-angle-left" aria-hidden="true"></i>  ');
			}
		});
	})
});


