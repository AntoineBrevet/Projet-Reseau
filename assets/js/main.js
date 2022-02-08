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

    $('.far').on('click', function (e) {
      var disp = $('.menu').css('display');
      if (disp == 'block') {
        $('.menu').css('display', 'none');
        // console.log('nothing');
      }
      else if (disp == 'none') {
        $('.menu').css('display', 'block');
        $('.far').find('.menu').show(400)
        // console.log('block');
      }
    });
  });
});