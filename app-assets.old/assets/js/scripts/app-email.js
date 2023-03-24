$(document).ready(function () {
   "use strict";

   // Close other sidenav on click of any sidenav
   if ($(window).width() > 900) {
      $("#email-sidenav").removeClass("sidenav");
   }
   // email Quill Editor
   // -------------------
   var composeMailEditor = new Quill(".snow-container .compose-editor", {
      modules: {
         toolbar: ".compose-quill-toolbar"
      },
      placeholder: "Write a Message... ",
      theme: "snow"
   });

   // Toggle class of sidenav
   $("#email-sidenav").sidenav({
      onOpenStart: function () {
         $("#sidebar-list").addClass("sidebar-show");
      },
      onCloseEnd: function () {
         $("#sidebar-list").removeClass("sidebar-show");
      }
   });

   //  Notifications & messages scrollable
   if ($("#sidebar-list").length > 0) {
      var ps_sidebar_list = new PerfectScrollbar("#sidebar-list", {
         theme: "dark",
         wheelPropagation: false
      });
   }
   if ($(".app-email .collection").length > 0) {
      var ps_email_collection = new PerfectScrollbar(".app-email .collection", {
         theme: "dark",
         wheelPropagation: false
      });
   }
   // active class chnage on click
   $(".email-list li").click(function () {
      var $this = $(this);
      if (!$this.hasClass("sidebar-title")) {
         $("li").removeClass("active");
         $this.addClass("active");
      }
   });

   // Remove Row
   $('.app-email i[type="button"]').click(function (e) {
      $(this)
         .closest("tr")
         .remove();
   });

   // Favorite star click
   $(".app-email .favorite i").on("click", function (e) {
      e.preventDefault();
      $(this).toggleClass("amber-text");
   });

   // Important label click
   $(".app-email .email-label i").on("click", function (e) {
      e.preventDefault();
      $(this).toggleClass("amber-text");
      if ($(this).text() == "label_outline") $(this).text("label");
      else $(this).text("label_outline");
   });

   // To delete all mails
   $(".app-email .delete-mails").on("click", function () {
      $(".collection-item")
         .find("input:checked")
         .closest(".collection-item")
         .remove();
   });

   // To delete Single mail
   $(".app-email .delete-task").on("click", function () {
      $(this)
         .closest(".collection-item")
         .remove();
   });

   // Sidenav
   $(".sidenav-trigger").on("click", function () {
      if ($(window).width() < 960) {
         $(".sidenav").sidenav("close");
         $(".app-sidebar").sidenav("close");
      }
   });
   // chat search filter
   $("#email_filter").on("keyup", function () {
      $('.email-brief-info').css('animation', 'none')
      var value = $(this).val().toLowerCase();
      if (value != "") {
         $(".email-collection .email-brief-info").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
         });
         var tbl_row = $(".email-brief-info:visible").length; //here tbl_test is table name

         //Check if table has row or not
         if (tbl_row == 0) {
            if (!$(".no-data-found").hasClass('show')) {
               $(".no-data-found").addClass('show');
            }
         }
         else {
            $(".no-data-found").removeClass('show');
         }
      }
      else {
         // if search filter box is empty
         $(".email-collection .email-brief-info").show();
      }
   });

   // email-overlay and sidebar hide
   // --------------------------------------------
   $(".compose-email-trigger").on("click", function () {
      $(".email-overlay").addClass("show");
      $(".email-compose-sidebar").addClass("show");

   })
   $(
      ".email-compose-sidebar .cancel-email-item, .email-compose-sidebar .close-icon, .email-compose-sidebar .send-email-item, .email-overlay"
   ).on("click", function () {
      $(".email-overlay").removeClass("show");
      $(".email-compose-sidebar").removeClass("show");
      $("input").val("");
      $(".compose-editor .ql-editor p").html("");
      $("#edit-item-from").val("user@example.com");
   });

   if ($(".email-compose-sidebar").length > 0) {
      var ps_sidebar_compose = new PerfectScrollbar(".email-compose-sidebar", {
         theme: "dark",
         wheelPropagation: false
      });
   }

   // for rtl
   if ($("html[data-textdirection='rtl']").length > 0) {
      // Toggle class of sidenav
      $("#email-sidenav").sidenav({
         edge: "right",
         onOpenStart: function () {
            $("#sidebar-list").addClass("sidebar-show");
         },
         onCloseEnd: function () {
            $("#sidebar-list").removeClass("sidebar-show");
         }
      });
   }
});

// Checkbox
function toggle(source) {
   checkboxes = document.getElementsByName("foo");
   for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked;
   }
}

$(window).on("resize", function () {
   resizetable();
   $(".email-compose-sidebar").removeClass("show");
   $(".email-overlay").removeClass("show");
   $("input").val("");
   $(".compose-editor .ql-editor p").html("");
   $("#edit-item-from").val("user@example.com");
   if ($(window).width() > 899) {
      $("#email-sidenav").removeClass("sidenav");
   }

   if ($(window).width() < 900) {
      $("#email-sidenav").addClass("sidenav");
   }
});
function resizetable() {
   if ($(".vertical-layout").length > 0) {
      $(".app-email .collection").css({ maxHeight: $(window).height() - 350 + "px" });
   }
   else {
      $(".app-email .collection").css({ maxHeight: $(window).height() - 410 + "px" });
   }
}
resizetable();
