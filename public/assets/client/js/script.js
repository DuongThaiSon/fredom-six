$(document).ready(function () {
  document.querySelector("#number", function () {
    if (input.value.length === 1) {
      input.value = "0" + input.value;
    }
  })
  $(".btn-search").click(function () {
    $(".search-header").toggle("linear");
  });
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 50) {
      $("#navbar").addClass("fixed-menu");
      $(".bread-crumb").addClass("fixed-menu");
    } else {
      $(".bread-crumb").removeClass("fixed-menu");
      $("#navbar").removeClass("fixed-menu");
    }
  });

  AOS.init();

  $("#banner").owlCarousel({
    nav: true,
    loop: true,
    dots: true,
    navText: [
      '<span aria-label="Previous"> <i class="fas fa-arrow-left"></i> </span>',
      '<span aria-label="Next"> <i class="fas fa-arrow-right"></i> </span>'
    ],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });
  $("#about-slide").owlCarousel({
    loop: true,
    dots: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });

  $('#match').owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1025: {
        items: 1,
      },
    }
  });

  $("#cus-slide").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    navText: [
      '<span aria-label="Previous"> <i class="fas fa-arrow-left"></i> </span>',
      '<span aria-label="Next"> <i class="fas fa-arrow-right"></i> </span>'
    ],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 4
      }
    }
  });

  $("#logo-partner").owlCarousel({
    loop: true,
    nav: false,
    navText: [
      '<span aria-label="Previous"> <i class="fas fa-chevron-left"></i> </span>',
      '<span aria-label="Next"> <i class="fas fa-chevron-right"></i> </span>'
    ],
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 4
      },
      1000: {
        items: 6
      }
    }
  });

  $("#new-slide").owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 3
      }
    }
  });

  // validation
  // $("#form-checkout").validate({
  //   rules: {
  //     ho: "required",
  //     ten: "required",
  //     email: {
  //       required: true
  //     },
  //     address: {
  //       required: true
  //     },
  //     city: {
  //       required: true
  //     },
  //     phone: {
  //       required: true
  //     }
  //   },
  //   messages: {
  //     ho: "Vui lòng nhập họ",
  //     ten: "Vui lòng nhập tên",
  //     email: "Vui lòng nhập email",
  //     address: "Vui lòng nhập dịa chỉ",
  //     city: "Vui lòng nhập thành phố",
  //     phone: "Vui lòng nhập số điện thoại",
  //   }
  // });
});
$(".filter-responsive").on('click', function () {
  $(".checkbox-option").fadeToggle(500);
})

// back to top
$(window).scroll(function () {
  if ($(this).scrollTop()) {
    $('#toTop').fadeIn();
  } else {
    $('#toTop').fadeOut();
  }
});

$("#toTop").click(function () {
  $("html, body").animate({ scrollTop: 0 }, 500);
});

// if ($(window).width() < 1024) {
//   $(".toggle-icon").click(function () {
//     $(".submenu").slideToggle();
//   })
//   $(".toggle-icon-sub").click(function () {
//     $(".second-submenu").slideToggle();
//   })
// }