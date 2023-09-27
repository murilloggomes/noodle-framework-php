$(document).ready(function () {
   "use strict";
   /*
    * DataTables - Tables
    */
   var calcDataTableHeight = function () {
      return $(window).height() - 380 + "px";
   };

   var table = $("#data-table-contact").DataTable({
      scrollY: calcDataTableHeight(),
      scrollCollapse: true,
      scrollX: false,
      paging: true,
      responsive: true,
      lengthMenu: [15],
      aoColumns: [
         {
            bSortable: false
         },
         {
            bSortable: false
         },
         null,
         null,
         null,
         {
            bSortable: false
         },
         {
            bSortable: false
         }
      ],
      "fnInitComplete": function () {
         var ps_datatable = new PerfectScrollbar('.dataTables_scrollBody');
      },
      //on paginition page 2,3.. often scroll shown, so reset it and assign it again
      "fnDrawCallback": function (oSettings) {
         var ps_datatable = new PerfectScrollbar('.dataTables_scrollBody');
      }
   });

   // Custom search
   function filterGlobal() {
      table.search($("#global_filter").val(), $("#global_regex").prop("checked"), $("#global_smart").prop("checked")).draw();
   }

   function filterColumn(i) {
      table
         .column(i)
         .search(
            $("#col" + i + "_filter").val(),
            $("#col" + i + "_regex").prop("checked"),
            $("#col" + i + "_smart").prop("checked")
         )
         .draw();
   }

   $("input#global_filter").on("keyup click", function () {
      filterGlobal();
   });

   $("input.column_filter").on("keyup click", function () {
      filterColumn(
         $(this)
            .parents("tr")
            .attr("data-column")
      );
   });

   //  Notifications & messages scrollable
   if ($("#sidebar-list").length > 0) {
      var ps_sidebar_list = new PerfectScrollbar("#sidebar-list", {
         theme: "dark"
      });
   }

   // Favorite star click
   $(".app-page .favorite i").on("click", function (e) {
      e.preventDefault();
      $(this).toggleClass("amber-text");
   });

   // Toggle class of sidenav
   $("#contact-sidenav").sidenav({
      onOpenStart: function () {
         $("#sidebar-list").addClass("sidebar-show");
      },
      onCloseEnd: function () {
         $("#sidebar-list").removeClass("sidebar-show");
      }
   });

   // Remove Row for datatable in responsive
   $(document).on("click", ".app-page i.delete", function () {
      var $tr = $(this).closest("tr");
      if ($tr.prev().hasClass("parent")) {
         $tr.prev().remove();
      }
      $tr.remove();
   });

   $("#contact-sidenav li").on("click", function () {
      var $this = $(this);
      if (!$this.hasClass("sidebar-title")) {
         $("li").removeClass("active");
         $this.addClass("active");
      }
   });

   // Modals Popup
   $(".modal").modal();

   // Close other sidenav on click of any sidenav
   if ($(window).width() > 900) {
      $("#contact-sidenav").removeClass("sidenav");
   }

   // contact-overlay and sidebar hide
   // --------------------------------------------
   var contactOverlay = $(".contact-overlay"),
      updatecontact = $(".update-contact"),
      addcontact = $(".add-contact"),
      contactComposeSidebar = $(".contact-compose-sidebar"),
      labelEditForm = $("label[for]");
   $(".contact-sidebar-trigger").on("click", function () {
      contactOverlay.addClass("show");
      updatecontact.addClass("display-none");
      addcontact.removeClass("display-none");
      contactComposeSidebar.addClass("show");
      labelEditForm.removeClass("active");
      $(".contact-compose-sidebar input").val("");
   })
   $(
      ".contact-compose-sidebar .update-contact, .contact-compose-sidebar .close-icon, .contact-compose-sidebar .add-contact, .contact-overlay"
   ).on("click", function () {
      contactOverlay.removeClass("show");
      contactComposeSidebar.removeClass("show");
   });

   $(".dataTables_scrollBody tr").on("click", function () {
      updatecontact.removeClass("display-none");
      addcontact.addClass("display-none");
      contactOverlay.addClass("show");
      contactComposeSidebar.addClass("show");
      $("#first_name").val("Paul");
      $("#last_name").val("Rees");
      $("#company").val("Acme Corporation");
      $("#business").val("Software Developer");
      $("#email").val("paul.rees@domain.com");
      $("#phone").val("+1-202-555-0112");
      $("#notes").val("Do not disturb during work."); 0.2
      labelEditForm.addClass("active");
   }).on("click", ".checkbox-label,.favorite,.delete", function (e) {
      e.stopPropagation();
   })

   if (contactComposeSidebar.length > 0) {
      var ps_compose_sidebar = new PerfectScrollbar(".contact-compose-sidebar", {
         theme: "dark",
         wheelPropagation: false
      });
   }

   // for rtl
   if ($("html[data-textdirection='rtl']").length > 0) {
      // Toggle class of sidenav
      $("#contact-sidenav").sidenav({
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

// Sidenav
$(".sidenav-trigger").on("click", function () {
   if ($(window).width() < 960) {
      $(".sidenav").sidenav("close");
      $(".app-sidebar").sidenav("close");
   }
});

// Select all checkbox on click of header checkbox
function toggle(source) {
   checkboxes = document.getElementsByName("foo");
   for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked;
   }
}

$(window).on("resize", function () {
   resizetable();

   if ($(window).width() > 899) {
      $("#contact-sidenav").removeClass("sidenav");
   }

   if ($(window).width() < 900) {
      $("#contact-sidenav").addClass("sidenav");
   }
});

function resizetable() {
   $(".app-page .dataTables_scrollBody").css({
      maxHeight: $(window).height() - 420 + "px"
   });
}
resizetable();

// For contact sidebar on small screen
if ($(window).width() < 900) {
   $(".sidebar-left.sidebar-fixed").removeClass("animate fadeUp animation-fast");
   $(".sidebar-left.sidebar-fixed .sidebar").removeClass("animate fadeUp");
}
