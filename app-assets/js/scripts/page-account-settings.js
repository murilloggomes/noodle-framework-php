/* Account Settings */
/* ----------------*/
$(document).ready(function () {
  
  
  /*  UI - Alerts */
  $(".card-alert .close").click(function () {
    $(this)
      .closest(".card-alert")
      .fadeOut("slow");
  });
  // form validation for general tab
  $(".formValidate").validate({
    rules: {
      uname: {
        required: true,
        minlength: 5
      },
      email: {
        required: true,
        email: true
      },
      name: {
        required: true
        // email: true
      },
      oldpswd: {
        required: true,
        minlength: 5
      },
      newpswd: {
        required: true,
        minlength: 5,
      },
      repswd: {
        required: true,
        minlength: 5,
      },
      crole: {
        required: true,
      },
      curl: {
        required: true,
        url: true
      },
      ccomment: {
        required: true,
        minlength: 15
      },
      tnc_select: "required",
    },
    //For custom messages
    messages: {
      uname: {
        required: "Enter a username",
        minlength: "Enter at least 5 characters"
      },
      curl: "Enter your website",
    },
    errorElement: 'div',
    errorPlacement: function (error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
      } else {
        error.insertAfter(element);
      }
    }
  });
  //  form validation for passowrd tab
  $(".paaswordvalidate").validate({
    rules: {
      oldpswd: {
        required: true,
        minlength: 5
      },
      newpswd: {
        required: true,
        minlength: 5,
      },
      repswd: {
        required: true,
        minlength: 5,
      }
    },
    errorElement: 'div',
    errorPlacement: function (error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
      } else {
        error.insertAfter(element);
      }
    }
  });
  // upload button converting into file button
  $("#select-files").on("click", function () {
    $("#upfile").click();
  })
});