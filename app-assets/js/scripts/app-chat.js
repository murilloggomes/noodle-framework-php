$(document).ready(function () {
   "use strict";

   // Sidenav
   if ($(window).width() > 900) {
      $("#chat-sidenav").removeClass("sidenav");
   }

   // Pefectscrollbar for sidebar and chat area
   if ($(".sidebar-chat").length > 0) {
      var ps_sidebar_chat = new PerfectScrollbar(".sidebar-chat", {
         theme: "dark"
      });
   }

   if ($(".chat-area").length > 0) {
      var ps_chat_area = new PerfectScrollbar(".chat-area", {
         theme: "dark"
      });
   }

   // Close other sidenav on click of any sidenav
   $(".sidenav-trigger").on("click", function () {
      if ($(window).width() < 960) {
         $(".sidenav").sidenav("close");
         $(".app-sidebar").sidenav("close");
      }
   });

   // Toggle class of sidenav
   $("#chat-sidenav").sidenav({
      onOpenStart: function () {
         $("#sidebar-list").addClass("sidebar-show");
      },
      onCloseEnd: function () {
         $("#sidebar-list").removeClass("sidebar-show");
      }
   });

   // Favorite star click
   $(".favorite i").on("click", function () {
      $(this).toggleClass("amber-text");
   });

   // For chat sidebar on small screen
   if ($(window).width() < 900) {
      $(".app-chat .sidebar-left.sidebar-fixed").removeClass("animate fadeUp animation-fast");
      $(".app-chat .sidebar-left.sidebar-fixed .sidebar").removeClass("animate fadeUp");
   }

   // chat search filter
   $("#chat_filter").on("keyup", function () {
      $('.chat-user').css('animation', 'none')
      var value = $(this).val().toLowerCase();
      if (value != "") {
         $(".sidebar-chat .chat-list .chat-user").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
         });
         var tbl_row = $(".chat-user:visible").length; //here tbl_test is table name

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
         $(".sidebar-chat .chat-list .chat-user").show();
      }
   });

   $(".chat-area").scrollTop($(".chat-area > .chats").height());
   // for rtl
   if ($("html[data-textdirection='rtl']").length > 0) {
      // Toggle class of sidenav
      $("#chat-sidenav").sidenav({
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


// Add message to chat
function enter_chat(source) {
   var message = $(".message").val();
   if (message != "") {
      var html = '<div class="chat-text">' + "<p>" + message + "</p>" + "</div>";
      $(".chat:last-child .chat-body").append(html);
      $(".message").val("");
      $(".chat-area").scrollTop($(".chat-area > .chats").height());
   }
}

$(window).on("resize", function () {
   if ($(window).width() > 899) {
      $("#chat-sidenav").removeClass("sidenav");
   }

   if ($(window).width() < 900) {
      $("#chat-sidenav").addClass("sidenav");
   }
});
