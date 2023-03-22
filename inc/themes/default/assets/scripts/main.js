$(document).ready(function() {
  setTimeout(function() {
    $(".info-holder").addClass("active");
  }, 100);

  //expanding login side on click
  if ($(window).innerWidth() > 1024) {
    $("#signin .side").click(function(params) {
      if ($(this).attr("data-active") !== "open") {
        $(this).attr("data-active", "true");
        $(this)
          .siblings()
          .attr("data-active", "false");
      }
    });
    $(document).on(
      "click",
      "#signin .page-holder.signin-active .signup",
      function(params) {
        $(".page-holder").removeClass("signin-active");
      }
    );
  }
  

  //animating scroll
  $("header [data-scroll]").click(function(e) {
    e.preventDefault();
    var scrollSection = $(this).data("scroll");
    var scrollTop =
      $('section[data-scroll="' + scrollSection + '"]').offset().top -
      $("header").height();
    $("html, body").animate({ scrollTop: scrollTop + "px" }, 1000);
  });

  //check if resized to responsive mode for forms
  $(window).on("resize load", function() {
    if ($(window).innerWidth() < 1024) {
      // $("#signin .side").attr("data-active", "start");
    }
  })  
});


