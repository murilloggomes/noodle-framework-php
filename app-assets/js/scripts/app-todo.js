/*
 * DataTables - Tables
 */

$(document).ready(function () {
   "use strict";

   // For date picker
   // $('.assign-date').datepicker({
   //    container: 'body',
   //    defaultDate: true,
   //    setDefaultDate: 'Nov 12, 2019',
   //    autoClose: true
   // });

   $('.dropdown-trigger').dropdown({
      constrainWidth: false
   });
   // todo Quill Editor
   // -------------------
   var composeTodoEditor = new Quill(".snow-container .compose-editor", {
      modules: {
         toolbar: ".compose-quill-toolbar"
      },
      placeholder: "Add Description....",
      theme: "snow"
   });
   var commentTodoEditor = new Quill(".snow-container .comment-editor", {
      modules: {
         toolbar: ".comment-quill-toolbar"
      },
      placeholder: "Write a Comment....",
      theme: "snow"
   });
   // select tags
   $(".select-tags").select2({
      /* the following code is used to disable x-scrollbar when click in select input and
      take 100% width in responsive also */
      dropdownAutoWidth: true,
      width: '100%',
   });
   // Dragula Drag and Drop
   $("ul.todo-collection").sortable({
      group: "no-drop",
      handle: "i.icon-move"
   });

   $(".todo-list li").click(function () {
      var $this = $(this);
      if (!$this.hasClass("sidebar-title")) {
         $("li").removeClass("active");
         $this.addClass("active");
      }
   });

   // Close other sidenav on click of any sidenav
   if ($(window).width() > 900) {
      $("#todo-sidenav").removeClass("sidenav");
   }

   // Remove Row
   $('.app-todo i[type="button"]').click(function (e) {
      $(this)
         .closest("tr")
         .remove();
   });

   $(".app-todo .favorite").on("click", function (e) {
      e.stopPropagation();
      $(this).toggleClass("amber-text");
   });

   $(".app-todo .delete-tasks").on("click", function () {
      $(".collection-item")
         .find("input:checked")
         .closest("li")
         .remove();
   });

   $(".app-todo .delete-task").on("click", function () {
      $(this)
         .closest("li")
         .remove();
   });

   // Sidenav
   $(".sidenav-trigger").on("click", function () {
      if ($(window).width() < 960) {
         $(".sidenav").sidenav("close");
         $(".app-sidebar").sidenav("close");
      }
   });

   // Toggle class of sidenav
   $("#todo-sidenav").sidenav({
      onOpenStart: function () {
         $("#sidebar-list").addClass("sidebar-show");
      },
      onCloseStart: function () {
         $("#sidebar-list").removeClass("sidebar-show");
      }
   });

   //  Notifications & messages scrollable
   if ($("#sidebar-list").length > 0) {
      var ps_sidebar_list = new PerfectScrollbar("#sidebar-list", {
         theme: "dark"
      });
   }
   if ($(".app-todo .collection").length > 0) {
      var ps_todo_collection = new PerfectScrollbar(".app-todo .collection", {
         theme: "dark"
      });
   }

   // For todo sidebar on small screen
   if ($(window).width() < 900) {
      $(".sidebar-left.sidebar-fixed").removeClass("animate fadeLeft");
      $(".sidebar-left.sidebar-fixed .sidebar").removeClass("animate fadeLeft");
   }

   // Check and Uncheck to do list line through css
   $('.todo-collection input[name="foo"]').on('click', function () {
      var parentCls = $(this).closest('.collection-item');
      if ($(this).is(':checked')) {
         $(parentCls).find('.list-content .list-title').css('textDecoration', 'line-through');
         $(parentCls).find('.list-content .list-desc').css('textDecoration', 'line-through');
      }
      else {
         $(parentCls).find('.list-content .list-title').css('textDecoration', 'none');
         $(parentCls).find('.list-content .list-desc').css('textDecoration', 'none');
      }
   });

   // todo search filter
   $("#todo_filter").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      if (value != "") {
         $(".todo-collection .todo-items").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
         });
         var tbl_row = $(".todo-items:visible").length; //here tbl_test is table name

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
         $(".todo-collection .todo-items").show();
      }
   });

   // todo-overlay and sidebar hide
   // --------------------------------------------
   var todoOverlay = $(".todo-overlay"),
      updateTodo = $(".update-todo"),
      addTodo = $(".add-todo"),
      todoComposeSidebar = $(".todo-compose-sidebar"),
      editTodoItemTitle = $(".edit-todo-item-title"),
      composeQleditor = $(".compose-editor .ql-editor p"),
      selectTags = $('.select-tags'),
      todoComplete = $(".todo-complete"),
      todoTitleLabel = $(".todo-title-label"),
      labelEditForm = $("label[for='edit-item-form']");
   $(".todo-sidebar-trigger").on("click", function () {
      todoOverlay.addClass("show");
      updateTodo.addClass("display-none");
      addTodo.removeClass("display-none");
      todoComposeSidebar.addClass("show");
      editTodoItemTitle.val('');
      composeQleditor.html("");
      labelEditForm.removeClass("active");
      selectTags.val("").trigger('change');
      todoComplete.addClass("hide");
      todoTitleLabel.removeClass("hide")
   })
   $(
      ".todo-compose-sidebar .update-todo, .todo-compose-sidebar .close-icon, .todo-compose-sidebar .add-todo, .todo-overlay"
   ).on("click", function () {
      todoOverlay.removeClass("show");
      todoComposeSidebar.removeClass("show");
   });
   $(".tags-toggler").on("click", function () {
      if ($(".select-tags").is("[disabled]") > 0) {
         $(".select-tags").removeAttr("disabled");
      }
      else {
         $(".select-tags").attr("disabled", "true");

      }
   })
   var globalThis;
   $(".todo-collection .list-content").on("click", function () {
      var $this = $(this),
         todoTitle = $this.find(".list-title").html();
      globalThis = $this;
      editTodoItemTitle.val(todoTitle);
      labelEditForm.addClass("active");
      composeQleditor.html(todoTitle);
      updateTodo.removeClass("display-none");
      addTodo.addClass("display-none");
      todoOverlay.addClass("show");
      todoComposeSidebar.addClass("show");
      selectTags.val("Paypal").trigger('change');
      todoComplete.removeClass("hide");
      todoTitleLabel.addClass("hide");
   })
   todoComplete.on("click", function () {
      globalThis.parent().find('input[type=checkbox]').prop('checked', true);
      globalThis.parent().find('.list-content .list-title').css('textDecoration', 'line-through');
      globalThis.parent().find('.list-content .list-desc').css('textDecoration', 'line-through');
   })
   if (todoComposeSidebar.length > 0) {
      var ps_compose_sidebar = new PerfectScrollbar(".todo-compose-sidebar", {
         theme: "dark",
         wheelPropagation: false
      });
   }
   // for rtl
   if ($("html[data-textdirection='rtl']").length > 0) {
      // Toggle class of sidenav
      $("#todo-sidenav").sidenav({
         edge: "right",
         onOpenStart: function () {
            $("#sidebar-list").addClass("sidebar-show");
         },
         onCloseStart: function () {
            $("#sidebar-list").removeClass("sidebar-show");
         }
      });
   }
});

// Check All Checkbox
function toggle(source) {
   checkboxes = document.getElementsByName("foo");
   for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked;

      // Check and Uncheck to do list line through css
      var parentCls = $(checkboxes[i]).closest(".collection-item");
      if (checkboxes[i].checked) {
         $(parentCls)
            .find(".list-content .list-title")
            .css("textDecoration", "line-through");
         $(parentCls)
            .find(".list-content .list-desc")
            .css("textDecoration", "line-through");
      } else {
         $(parentCls)
            .find(".list-content .list-title")
            .css("textDecoration", "none");
         $(parentCls)
            .find(".list-content .list-desc")
            .css("textDecoration", "none");
      }
   }
}

$(window).on('resize', function () {
   resizetable();
   $(".todo-compose-sidebar").removeClass("show");
   $(".todo-overlay").removeClass("show");
   if ($(window).width() > 899) {
      $("#todo-sidenav").removeClass("sidenav");
   }

   if ($(window).width() < 900) {
      $("#todo-sidenav").addClass("sidenav");
   }
});
function resizetable() {
   // $(".app-todo .collection").css({
   //    maxHeight: $(window).height() - 380 + "px"
   // });
   if ($(".vertical-layout").length > 0) {
      $(".app-todo .collection").css({ maxHeight: $(window).height() - 350 + "px" });
   }
   else {
      $(".app-todo .collection").css({ maxHeight: $(window).height() - 410 + "px" });
   }
}
resizetable();
