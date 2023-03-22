/*
 * Contact Page
 */

// Sidenav
$('.sidenav-trigger').on('click', function () {
  if ($(window).width() < 960) {
    $('.sidenav').sidenav('close');
    $('.app-sidebar').sidenav('close');
  }
});

$(document).ready(function () {
  $('.contact-app-sidebar').sidenav();
  $('.contact-sidenav li').click(function () {
    $('li').removeClass("active");
    $(this).addClass("active");
  });

  if ($(window).width() < 992) {
    $("#contact-sidenav").addClass("sidenav");
  }
   // for rtl
   if($("html[data-textdirection='rtl']").length>0){
    $('.contact-app-sidebar').sidenav({
      edge:"right"
    });
    }
});


$(window).on('resize', function () {
  if ($(window).width() > 991) {
    $("#contact-sidenav").removeClass("sidenav");
  }

  if ($(window).width() < 992) {
    $("#contact-sidenav").addClass("sidenav");
  }
});
