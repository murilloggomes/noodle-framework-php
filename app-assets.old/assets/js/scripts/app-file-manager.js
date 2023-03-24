// /* file manager js */
// /*----------------*/

$(function () {
  "use strict";
  // variables
  var appContentOverlay = $(".app-file-overlay"),
    sideBarLeft = $(".sidebar-left"),
    sideBarInfo = $(".app-file-sidebar-info"),
    app_file_content = $(".app-file-content"),
    app_file_sidebar_left = $(".app-file-sidebar-left");

  // add file btn
  if (sideBarLeft.length > 0) {
    $(".add-file-btn").on("click", function () {
      $(".getfileInput input").click();
    })
  }

  // To add Perfect Scrollbar
  // ---------------------------
  // App - File Content Area
  if (app_file_content.length > 0) {
    var users_list = new PerfectScrollbar(".app-file-content", {
      theme: "dark"
    });
  }

  // App File Left Sidebar
  if (app_file_sidebar_left.length > 0) {
    var app_file_sidebar_content = new PerfectScrollbar(".app-file-sidebar-content", {
      theme: "dark"
    });
  }

  // Edit File Sidebar - Right Side
  if (sideBarInfo.length > 0) {
    var edit_file_sidebar = new PerfectScrollbar(".app-file-sidebar-info", {
      theme: "dark"
    });
  }


  // Sidebar visiblility and content area overlay
  // ----------------------------------------------
  $('.menu-toggle, .close-icon, .app-file-overlay').on('click', function (e) {
    sideBarLeft.removeClass('show');
    appContentOverlay.removeClass('show');
    sideBarInfo.removeClass('show');
  });

  // On click of "app-file-info" class from file-content-area, visible edit sidebar and hide left sidebar
  $('.app-file-info').on('click', function () {
    sideBarInfo.addClass('show');
    appContentOverlay.addClass('show');
  });

  // Sidebar menu close button on click remove show class form both sidebar-left and App content overlay
  $(".app-file-sidebar-close").on('click', function () {
    sideBarLeft.removeClass('show');
    appContentOverlay.removeClass('show');
  });

  // on click of Sidebar-toggle, add class show to content overlay and toggle class to app sidebar left
  $('.sidebar-toggle').on('click', function (e) {
    e.stopPropagation();
    sideBarLeft.addClass('show');
    appContentOverlay.addClass('show');
  });

  // Add class active on click of sidebar list folder and label
  var $active_label = $(".app-file-sidebar-content .file-manager-drive a");
  $($active_label).on('click', function () {
    var $this = $(this);
    $active_label.removeClass('active');
    $this.addClass("active");
  });

  // On screen Resize JS
  // -----------------------------------
  $(window).on("resize", function () {
    // remove show classes from sidebar and overlay if size is > 768
    if ($(window).width() > 768) {
      if (appContentOverlay.hasClass('show')) {
        sideBarLeft.removeClass('show');
        appContentOverlay.removeClass('show');
        sideBarInfo.removeClass('show');
      }
    }
  });
});