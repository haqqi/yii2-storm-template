$(document).ready(function () {

  var navbarHeight = 60;
  var screenSmMin = 768;

  // activate metis menu
  $("#sidebar-menu").metisMenu();

  // set min-height of #page-wrapper to window size
  $(window).on("load resize", function () {
    var topOffset = navbarHeight;
    var width = getScreenOrWindowWidth();

    if (width < screenSmMin) {
      $('#main-sidebar').addClass('collapse');
      // topOffset = 100; // 2-row-menu
    } else {
      $('#main-sidebar').removeClass('collapse').css("height", "100%");
    }

    var height = getScreenOrWindowHeight();
    height = height - topOffset;
    if (height < 1) height = 1;

    if (height > topOffset) {
      $("#page-wrapper").css("min-height", (height) + "px");
    }
  });

  // navbar toggle change
  $("#main-sidebar").on("hidden.bs.collapse", function (e) {
    $("#sidebar-toggle i").addClass("mdi-menu").removeClass("mdi-close");

  });

  $("#main-sidebar").on("shown.bs.collapse", function (e) {
    $("#sidebar-toggle i").removeClass("mdi-menu").addClass("mdi-close");
  });

  $("#main-sidebar").scrollator({
    customClass: 'necro-scroll'
  });

  function getScreenOrWindowWidth() {
    return (window.innerWidth > 0) ? window.innerWidth : screen.width;
  }

  function getScreenOrWindowHeight() {
    return ((window.innerHeight > 0) ? window.innerHeight : screen.height) - 1;
  }
});
