/* Account Settings */
/* ----------------*/
$(document).ready(function () {
  
  
  /*  UI - Alerts */
  $(".card-alert .close").click(function () {
    $(this)
      .closest(".card-alert")
      .fadeOut("slow");
  });

  //  form validation for passowrd tab
  $(".passwordvalidate").validate({
    rules: {
      antigasenha: {
        required: true,
        minlength: 5
      },
      novasenha: {
        required: true,
        minlength: 5,
      },
      confirmsenha: {
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
 
  
  $("#upfile").on("change", function() { 
    console.log($(this)[0])
     useImage($(this)[0]);        
  });  
  
});

// Creating the function
    function useImage(img) {
        var file = img.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(img.files[0]);
        

        function imageIsLoaded(e) {
            $('#profile-image').attr({ 'src': "" + e.target.result + "" });
            $('#profile-image-result').val(e.target.result);
        }
    }