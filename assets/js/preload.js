/* 
 _____   _           _         _                        _                  
|_   _| | |         | |       | |                      | |                 
  | |   | |__   __ _| |_ ___  | |_ ___  _ __ ___   __ _| |_ ___   ___  ___ 
  | |   | '_ \ / _` | __/ _ \ | __/ _ \| '_ ` _ \ / _` | __/ _ \ / _ \/ __|
 _| |_  | | | | (_| | ||  __/ | || (_) | | | | | | (_| | || (_) |  __/\__ \
 \___/  |_| |_|\__,_|\__\___|  \__\___/|_| |_| |_|\__,_|\__\___/ \___||___/

Oh nice, welcome to the js file of dreams.
Enjoy responsibly!
@ihatetomatoes

*/

$(document).ready(function () {

  setTimeout(function () {
    $('body').addClass('loaded');
    $('h1').css('color', '#222222');
  }, 2000);


  $(window).load(function () {
    function Preloader() {
      var preloader = $('#loader');
      preloader.delay(1000).fadeOut(500);
      var preloader = $('#preloader');
      preloader.delay(1500).slideUp(500);
    }
    if (!sessionStorage.getItem('doNotShow')) {
      sessionStorage.setItem('doNotShow', 'true');
      Preloader();
    } else {
      $('#loader, #preloader, #loader-wrapper').hide();
    }
  });
});