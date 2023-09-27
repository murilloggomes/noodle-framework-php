/*================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 5.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================*/

// Globally variables
var sidenavMain = $(".sidenav-main"),
   contentOverlay = $(".content-overlay"),
   navCollapsible = $(".navbar .nav-collapsible"),
   breadcrumbsWrapper = $("#breadcrumbs-wrapper");

// Functions
//----------

// Menu: Default menu collapse check
defaultMenuCollapse();
function defaultMenuCollapse() {
   if ($("body").hasClass("menu-collapse") && $(window).width() > 993) {
      //  Toggle navigation expan and collapse
      sidenavMain.removeClass("nav-lock");
      $(".nav-collapsible .navbar-toggler i").text("radio_button_unchecked");
      navCollapsible.removeClass("sideNav-lock");
      toogleMenuCollapse();
      navigationCollapse();
   }
}

// Menu: Function for toggle class for menu collapse
function toogleMenuCollapse() {
   if (sidenavMain.hasClass("nav-expanded") && !sidenavMain.hasClass("nav-lock")) {
      sidenavMain.toggleClass("nav-expanded");
      $("#main").toggleClass("main-full");
   } else {
      $("#main").toggleClass("main-full");
   }
}

// Menu: Collapse navigation
function navigationCollapse() {
   if (!$(".sidenav-main.nav-collapsible").hasClass("nav-lock")) {
      var openLength = $(".collapsible .open").children().length;
      $(".sidenav-main.nav-collapsible, .navbar .nav-collapsible")
         .addClass("nav-collapsed")
         .removeClass("nav-expanded");
      $("#slide-out > li.open > a")
         .parent()
         .addClass("close")
         .removeClass("open");
      setTimeout(function () {
         // Open only if collapsible have the children
         if (openLength > 1) {
            var collapseEl = $(".sidenav-main .collapsible");
            var collapseInstance = M.Collapsible.getInstance(collapseEl);
            collapseInstance.close($(".collapsible .close").index());
         }
      }, 100);
   }
}

// Left side drawer chat tab: Add message on click of send btn
function slideOutChat() {
   var message = $(".search").val();
   if (message != "") {
      var html =
         '<li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat"><div class="user-content speech-bubble-right">' +
         '<p class="medium-small">' +
         message +
         "</p>" +
         "</div></li>";
      $("#right-sidebar-nav #slide-out-chat .chat-body .collection").append(html);
      $(".search").val("");
      var charScroll = $("#right-sidebar-nav #slide-out-chat .chat-body .collection");
      if (charScroll.length > 0) {
         charScroll[0].scrollTop = charScroll[0].scrollHeight;
      }
   }
}

// Preload-transitions class remove after page load
$(window).on("load", function () {
   $("body").removeClass("preload-transitions");
});

$(function () {
   "use strict";

   // function for detect touch device
   function is_touch_device() {
      var prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
      var mq = function (query) {
         return window.matchMedia(query).matches;
      }
      if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
         return true;
      }
      // include the 'heartz' as a way to have a non matching MQ to help terminate the join
      // https://git.io/vznFH
      var query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('');
      return mq(query);
   }

   // Plugin initialization
   //---------------------

   //Init tabs
   $(".tabs").tabs();

   // initialize datepicker
   $('.datepicker').datepicker({
      autoClose: true,
      format: 'dd/mm/yyyy',
      container: 'body',
      onDraw: function () {
         // materialize select dropdown not proper working on mobile and tablets so we make it browser default select
         $('.datepicker-container').find('.datepicker-select').addClass('browser-default');
         $(".datepicker-container .select-dropdown.dropdown-trigger").remove()
      }
   });

   // Swipeable Tabs Demo Init
   if ($("#tabs-swipe-demo").length) {
      $("#tabs-swipe-demo").tabs({
         swipeable: true
      });
   }

   $("select").formSelect();
   // Set checkbox on forms.html to indeterminate
   var indeterminateCheckbox = document.getElementById("indeterminate-checkbox");
   if (indeterminateCheckbox !== null) indeterminateCheckbox.indeterminate = true;

   // Materialize Slider
   $(".slider").slider({
      full_width: true
   });

   // Common, Translation & Horizontal Dropdown
   $(".dropdown-trigger").dropdown();

   // Common, Translation
   $(".dropdown-button").dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false,
      hover: true,
      gutter: 0,
      coverTrigger: true,
      alignment: "left"
   });

   // Notification, Profile, Translation, Settings Dropdown & Horizontal Dropdown
   $(".notification-button, .profile-button, .translation-button, .dropdown-settings").dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false,
      hover: false,
      gutter: 0,
      coverTrigger: false,
      alignment: "right",
      hover: false,
      closeOnClick: true,
   });
   $(".dropdown-menu").dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false,
      hover: false,
      gutter: 0,
      coverTrigger: false,
      alignment: "right",
      hover: false,
      closeOnClick: false,
   });
   // horizonatal nav nested dropdown
   $(".dropdownSub-menu").dropdown({
      closeOnClick: false,
      constrainWidth: false,
      alignment: "left",
      inDuration: 300,
      outDuration: 225,
      gutter: 0,
      coverTrigger: true,
      hover: true
   });
   // horzontal nested dropdown close and open on mouse enter and leave
   $(".dropdown-submenu").on("mouseenter", function () {
      var $this = $(this);
      $(this).find(".dropdownSub-menu").dropdown('open');
      var dd = $this.find('.dropdown-content');
      if (dd) {
         var ddLeft = dd.offset().left,
            ddWidth = dd.width();
         // Add class to horizontal sub menu if screen width is small
         if ($("html[data-textdirection='rtl']").length > 0) {
            if (ddLeft >= ddWidth) {
               $this.find(".dropdown-content").removeClass("right-open").addClass("left-open");
            }
            else {
               $this.find(".dropdown-content").removeClass("left-open").addClass("right-open");
            }
         }
         else {
            if (((window.innerWidth) - (ddLeft + ddWidth)) <= (ddWidth)) {
               $this.find(".dropdown-content").removeClass("left-open").addClass("right-open");
            }
            else {
               $this.find(".dropdown-content").removeClass("right-open").addClass("left-open");
            }
         }
      }
   })

   $(".dropdown-submenu").on("mouseleave", function () {
      var $this = $(this);
      $this.find(".dropdownSub-menu").dropdown('close');
      // remove left and right open class in mouse leave
      $this.find(".dropdown-content").removeClass("right-open");
      $this.find(".dropdown-content").removeClass("left-open");
   })

   // Fab
   $(".fixed-action-btn").floatingActionButton();
   $(".fixed-action-btn.horizontal").floatingActionButton({
      direction: "left"
   });
   $(".fixed-action-btn.click-to-toggle").floatingActionButton({
      direction: "left",
      hoverEnabled: false
   });
   $(".fixed-action-btn.toolbar").floatingActionButton({
      toolbarEnabled: true
   });

   // Materialize Tabs
   $(".tab-demo")
      .show()
      .tabs();
   $(".tab-demo-active")
      .show()
      .tabs();

   // Materialize scrollSpy
   $(".scrollspy").scrollSpy();

   // Materialize tooltip
   $(".tooltipped").tooltip({
      delay: 50
   });

   // Collapsible inside page not for sidebar
   var allCollapse = document.querySelectorAll(".collapsible");
   M.Collapsible.init(allCollapse);
   // Collapsible expandable    
   var elem = document.querySelector('.collapsible.expandable');
   var instance = M.Collapsible.init(elem, {
      accordion: false
   });

   // Breadcrumbs with bg image (vertical-dark-menu-template)
   if (breadcrumbsWrapper.attr("data-image")) {
      var imageUrl = breadcrumbsWrapper.attr("data-image");
      breadcrumbsWrapper.addClass("breadcrumbs-bg-image");
      breadcrumbsWrapper.css("background-image", "url(" + imageUrl + ")");
   }

   // Main Menu (SideNav)
   //------------------
   var collapsibleSubCollapsible = $("li.active .collapsible-sub .collapsible");
   var sidemainCollapse = document.querySelectorAll(".sidenav-main .collapsible");

   // Init collapsible
   M.Collapsible.init(sidemainCollapse, {
      accordion: true,
      onOpenStart: function () {
         // Removed open class first and add open at collapsible active
         $(".collapsible > li.open").removeClass("open");
         setTimeout(function () {
            $("#slide-out > li.active > a")
               .parent()
               .addClass("open");
         }, 10);
      }
   });

   // Add open class on init
   if ($("body").hasClass("menu-collapse")) {
      var sidenavCollapse = $(".sidenav-main .collapsible");
      if ($("#slide-out > li.active").children().length > 1) {
         $("#slide-out > li.active > a")
            .parent()
            .addClass("close");
      }
      M.Collapsible.getInstance(sidenavCollapse)
         .close($(".collapsible .close")
            .index())
   } else {
      if ($("#slide-out > li.active").children().length > 1) {
         $("#slide-out > li.active > a")
            .parent()
            .addClass("open");
      }
   }

   // Open active menu for multi level
   if (collapsibleSubCollapsible.find("a.active").length > 0) {
      collapsibleSubCollapsible
         .find("a.active")
         .closest("div.collapsible-body")
         .show();
      collapsibleSubCollapsible
         .find("a.active")
         .closest("div.collapsible-body")
         .closest("li")
         .addClass("active");
   }

   // Auto Scroll menu to the active item
   var position;
   if (
      $(".sidenav-main li a.active")
         .parent("li.active")
         .parent("ul.collapsible-sub").length > 0
   ) {
      position = $(".sidenav-main li a.active")
         .parent("li.active")
         .parent("ul.collapsible-sub")
         .position();
   } else {
      position = $(".sidenav-main li a.active")
         .parent("li.active")
         .position();
   }
   setTimeout(function () {
      if (position !== undefined) {
         $(".sidenav-main ul")
            .stop()
            .animate({ scrollTop: position.top - 300 }, 300);
      }
   }, 300);

   // On SideNav toggle button click: collapse menu
   $(".nav-collapsible .navbar-toggler").click(function () {
      // Toggle navigation expan and collapse on radio click
      toogleMenuCollapse();
      // Set navigation lock / unlock with radio icon
      if (
         $(this)
            .children()
            .text() == "radio_button_unchecked"
      ) {
         $(this)
            .children()
            .text("radio_button_checked");
         sidenavMain.addClass("nav-lock");
         navCollapsible.addClass("sideNav-lock");
      } else {
         $(this)
            .children()
            .text("radio_button_unchecked");
         sidenavMain.removeClass("nav-lock");
         navCollapsible.removeClass("sideNav-lock");
      }
   });

   // Expand navigation on mouseenter event
   $(".sidenav-main.nav-collapsible, .navbar .brand-sidebar").mouseenter(function () {
      if (!$(".sidenav-main.nav-collapsible").hasClass("nav-lock")) {
         $(".sidenav-main.nav-collapsible, .navbar .nav-collapsible")
            .addClass("nav-expanded")
            .removeClass("nav-collapsed");
         $("#slide-out > li.close > a")
            .parent()
            .addClass("open")
            .removeClass("close");
         setTimeout(function () {
            // Open only if collapsible have the children
            if ($(".collapsible .open").children().length > 1) {
               var collapseEl = $(".sidenav-main .collapsible");
               var collapseInstance = M.Collapsible.getInstance(collapseEl);
               collapseInstance.open($(".collapsible .open").index());
            }
         }, 100);
      }
   });

   // Collapse navigation on mouseleave event
   $(".sidenav-main.nav-collapsible, .navbar .brand-sidebar").mouseleave(function () {
      navigationCollapse();
   });

   // Right side slide-out
   //---------------------

   //Main Left Sidebar Menu // sidebar-collapse
   $(".sidenav").sidenav({
      edge: "left" // Choose the horizontal origin
   });

   //Main Right Sidebar
   $(".slide-out-right-sidenav").sidenav({
      edge: "right"
   });

   //Main Right Sidebar Chat
   $(".slide-out-right-sidenav-chat").sidenav({
      edge: "right"
   });

   //Chat search filter
   $("#messages .header-search-input").on("keyup", function () {
      $(".chat-user").css("animation", "none");
      var value = $(this)
         .val()
         .toLowerCase();
      if (value != "") {
         $(".right-sidebar-chat .right-sidebar-chat-item").filter(function () {
            $(this).toggle(
               $(this)
                  .text()
                  .toLowerCase()
                  .indexOf(value) > -1
            );
         });
      } else {
         // if search filter box is empty
         $(".right-sidebar-chat .right-sidebar-chat-item").show();
      }
   });

   // Chat scroll till bottom of the chat content area
   var chatScrollAuto = $("#right-sidebar-nav #slide-out-chat .chat-body .collection");
   if (chatScrollAuto.length > 0) {
      chatScrollAuto[0].scrollTop = chatScrollAuto[0].scrollHeight;
   }

   // Fullscreen
   function toggleFullScreen() {
      if (
         (document.fullScreenElement && document.fullScreenElement !== null) ||
         (!document.mozFullScreen && !document.webkitIsFullScreen)
      ) {
         if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
         } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
         } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
         } else if (document.documentElement.msRequestFullscreen) {
            if (document.msFullscreenElement) {
               document.msExitFullscreen();
            } else {
               document.documentElement.msRequestFullscreen();
            }
         }
      } else {
         if (document.cancelFullScreen) {
            document.cancelFullScreen();
         } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
         } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
         }
      }
   }
   $(".toggle-fullscreen").click(function () {
      toggleFullScreen();
   });

   // Detect touch screen and enable scrollbar if necessary
   function is_touch_device() {
      try {
         document.createEvent("TouchEvent");
         return true;
      } catch (e) {
         return false;
      }
   }
   if (is_touch_device()) {
      $("#nav-mobile").css({
         overflow: "auto"
      });
   }

   // Language translation
   // Init i18n and load language file
   i18next.use(window.i18nextXHRBackend).init(
      {
         debug: false,
         fallbackLng: "en",
         backend: {
            loadPath: "../../../app-assets/data/locales/{{lng}}.json"
         },
         returnObjects: true
      },
      function (err, t) {
         // resources have been loaded
         jqueryI18next.init(i18next, $);
      }
   );
   //Change language according to data-language of dropdown item
   $(".dropdown-language .dropdown-item").on("click", function () {
      var $this = $(this);
      $this.siblings(".selected").removeClass("selected");
      $this.addClass("selected");
      var selectedFlag = $this.find(".flag-icon").attr("class");
      $(".translation-button .flag-icon")
         .removeClass()
         .addClass(selectedFlag);
      var currentLanguage = $this.find("a").data("language");
      i18next.changeLanguage(currentLanguage, function (err, t) {
         $(".sidenav-main, #horizontal-nav").localize();
      });
   });
   // Horizontal-nav active parent  
   if ($("#ul-horizontal-nav li.active").length > 0) {
      $('#ul-horizontal-nav li.active').closest('ul').parents('li').addClass('active');
   }

   // RTL specific
   if ($("html[data-textdirection='rtl']").length > 0) {
      //Main Left Sidebar Menu // sidebar-collapse
      $(".sidenav").sidenav({
         edge: "right" // Choose the horizontal origin
      });
      $(".slide-out-right-sidenav").sidenav({
         edge: "left"
      });
      //Main Right Sidebar Chat
      $(".slide-out-right-sidenav-chat").sidenav({
         edge: "left"
      });
   }
});

//Collapse menu on below 994 screen
$(window).on("resize", function () {
   if ($(window).width() < 994) {
      if (sidenavMain.hasClass("nav-collapsed")) {
         sidenavMain.removeClass("nav-collapsed").addClass("nav-lock nav-expanded");
         navCollapsible.removeClass("nav-collapsed").addClass("sideNav-lock");
      }
   } else if ($(window).width() > 993 && $("body").hasClass("menu-collapse")) {
      if (sidenavMain.hasClass("nav-lock")) {
         sidenavMain.removeClass("nav-lock nav-expanded").addClass("nav-collapsed");
         navCollapsible.removeClass("sideNav-lock").addClass("nav-collapsed");
      }
   }
});
