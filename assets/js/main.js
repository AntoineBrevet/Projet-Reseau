$(document).ready(function () {

  // ================================== HEADER BG ON SCROLL ==================================

  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 510) {
      $(".header-container").addClass("active");
    } else {
      //remove the background property so it comes transparent again (defined in your css)
      $(".header-container").removeClass("active");
    }
  });


  // ================================ USER ICON DROPDOWN MENU ================================
  $('.far').click(function () {
    // console.log("hello");
    $('.menu').animate({
      height: 'toggle'
    });

    $('body').click(function (event) {
      if (!$(event.target).closest('.menu').length && !$(event.target).is('.far')) {
        $(".menu").hide();
      }
    });
    // $('.far').on('click', function (e) {
    //   var disp = $('.menu').css('display');
    //   if (disp == 'block') {
    //     $('.menu').css('display', 'none');
    //     // console.log('nothing');
    //   }
    //   else if (disp == 'none') {
    //     $('.menu').css('display', 'block');
    //     $('.far').find('.menu').show(400)
    //     // console.log('block');
    //   }
    // });
  });
});

// ================================ MAPS ================================
let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 49.430680, lng: 1.080230 },
    zoom: 17,
  });
}