/*================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 5.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================*/

var searchListLi = $(".search-list li"),
   searchList = $(".search-list"),
   searchSm = $(".search-sm"),
   searchBoxSm = $(".search-input-sm .search-box-sm"),
   searchListSm = $(".search-list-sm");

$(function () {
   "use strict";

   // On search input focus, Add search focus class
   $(".header-search-input")
      .focus(function () {
         $(this)
            .parent("div")
            .addClass("header-search-wrapper-focus");
      })
      .blur(function () {
         $(this)
            .parent("div")
            .removeClass("header-search-wrapper-focus");
      });

   //Search box form small screen
   $(".search-button").click(function (e) {
      if (searchSm.is(":hidden")) {
         searchSm.show();
         searchBoxSm.focus();
      } else {
         searchSm.hide();
         searchBoxSm.val("");
      }
   });
   // search input get focus
   $('.search-input-sm').on('click', function () {
      searchBoxSm.focus();
   });

   $(".search-sm-close").click(function (e) {
      searchSm.hide();
      searchBoxSm.val("");
   });

   // Search scrollbar
   if ($(".search-list").length > 0) {
      var ps_search_nav = new PerfectScrollbar(".search-list", {
         wheelSpeed: 2,
         wheelPropagation: false,
         minScrollbarLength: 20
      });
   }
   if (searchListSm.length > 0) {
      var ps_search2_nav = new PerfectScrollbar(".search-list-sm", {
         wheelSpeed: 2,
         wheelPropagation: false,
         minScrollbarLength: 20
      });
   }

   // Quick search
   //-------------
   var $filename = $(".header-search-wrapper .header-search-input,.search-input-sm .search-box-sm").data("search");

   // Navigation Search area Close
   $(".search-sm-close").on("click", function () {
      searchBoxSm.val("");
      searchBoxSm.blur();
      searchListLi.remove();
      searchList.addClass("display-none");
      if (contentOverlay.hasClass("show")) {
         contentOverlay.removeClass("show");
      }
   });

   // Navigation Search area Close on click of content overlay
   contentOverlay.on("click", function () {
      searchListLi.remove();
      contentOverlay.removeClass("show");
      searchSm.hide();
      searchBoxSm.val("");
      searchList.addClass("display-none");
      $(".search-input-sm .search-box-sm, .header-search-input").val("");
   });

   // Search filter
   $(".header-search-wrapper .header-search-input, .search-input-sm .search-box-sm").on("keyup", function (e) {
      contentOverlay.addClass("show");
      searchList.removeClass("display-none");
      var $this = $(this);
      if (e.keyCode !== 38 && e.keyCode !== 40 && e.keyCode !== 13) {
         if (e.keyCode == 27) {
            contentOverlay.removeClass("show");
            $this.val("");
            $this.blur();
         }
         // Define variables
         var value = $(this)
            .val()
            .toLowerCase(), //get values of inout on keyup
            liList = $("ul.search-list li"); // get all the list items of the search
         liList.remove();
         // If input value is blank
         if (value != "") {
            var $startList = "",
               $otherList = "",
               $htmlList = "",
               $activeItemClass = "",
               a = 0;
            // getting json data from file for search results
            $.getJSON("../../../app-assets/data/" + $filename + ".json", function (data) {
               for (var i = 0; i < data.listItems.length; i++) {
                  // Search list item start with entered letters and create list
                  if (
                     (data.listItems[i].name.toLowerCase().indexOf(value) == 0 && a < 4) ||
                     (!(data.listItems[i].name.toLowerCase().indexOf(value) == 0) &&
                        data.listItems[i].name.toLowerCase().indexOf(value) > -1 &&
                        a < 4)
                  ) {
                     if (a === 0) {
                        $activeItemClass = "current_item";
                     } else {
                        $activeItemClass = "";
                     }
                     $startList +=
                        '<li class="auto-suggestion ' +
                        $activeItemClass +
                        '">' +
                        '<a class="collection-item" href=' +
                        data.listItems[i].url +
                        ">" +
                        '<div class="display-flex">' +
                        '<div class="display-flex align-item-center flex-grow-1">' +
                        '<span class="material-icons" data-icon="' +
                        data.listItems[i].icon +
                        '">' +
                        data.listItems[i].icon +
                        "</span>" +
                        '<div class="member-info display-flex flex-column"><span class="black-text">' +
                        data.listItems[i].name +
                        '</span><small class="grey-text">' +
                        data.listItems[i].category +
                        "</small>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</a>" +
                        "</li>";
                     a++;
                  }
               }
               if ($startList == "" && $otherList == "") {
                  $otherList = $("#search-not-found").html();
               }
               var $mainPage = $("#page-search-title").html();
               var defaultList = $("#default-search-main").html();

               $htmlList = $mainPage.concat($startList, $otherList, defaultList); // merging start with and other list
               $("ul.search-list").html($htmlList); // Appending list to <ul>
            });
         } else {
            // if search input blank, hide overlay
            if (contentOverlay.hasClass("show")) {
               contentOverlay.removeClass("show");
               searchList.addClass("display-none");
            }
         }
      }
      // for large screen search list
      if ($(".header-search-wrapper .current_item").length) {
         searchList.scrollTop(0);
         searchList.scrollTop($('.search-list .current_item:first').offset().top - searchList.height());
      }
      // for small screen search list 
      if ($(".search-input-sm .current_item").length) {
         searchListSm.scrollTop(0);
         searchListSm.scrollTop($('.search-list-sm .current_item:first').offset().top - searchListSm.height());
      }
   });

   // small screen search box form submit prevent
   $('#navbarForm').on('submit', function (e) {
      e.preventDefault();
   })
   // If we use up key(38) Down key (40) or Enter key(13)
   $(window).on("keydown", function (e) {
      var $current = $(".search-list li.current_item"),
         $next,
         $prev;
      if (e.keyCode === 40) {
         $next = $current.next();
         $current.removeClass("current_item");
         $current = $next.addClass("current_item");
      } else if (e.keyCode === 38) {
         $prev = $current.prev();
         $current.removeClass("current_item");
         $current = $prev.addClass("current_item");
      }
      if (e.keyCode === 13 && $(".search-list li.current_item").length > 0) {
         var selected_item = $("li.current_item a");
         window.location = $("li.current_item a").attr("href");
         $(selected_item).trigger("click");
      }
   });

   searchList.mouseenter(function () {


      if ($(".search-list").length > 0) {
         ps_search_nav.update();
      }
      if (searchListSm.length > 0) {
         ps_search2_nav.update();
      }
   });
   // Add class on hover of the list
   $(document).on("mouseenter", ".search-list li", function (e) {
      $(this)
         .siblings()
         .removeClass("current_item");
      $(this).addClass("current_item");
   });
   $(document).on("click", ".search-list li", function (e) {
      e.stopPropagation();
   });
});

//Collapse menu on below 994 screen
$(window).on("resize", function () {
   // search result remove on screen resize
   if ($(window).width() < 992) {
      $(".header-search-input").val("");
      $(".header-search-input").closest(".search-list li").remove();
   }
   if ($(window).width() > 993) {
      searchSm.hide();
      searchBoxSm.val("");
      $(".search-input-sm .search-box-sm").val("");
   }
});
