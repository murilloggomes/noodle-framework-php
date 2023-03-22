$(document).ready(function () {
// variable declaration
  var usersTable;
  var usersDataArray = [];
  // datatable initialization
  if ($("#users-list-datatable").length > 0) {
    usersTable = $("#users-list-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0, 8]
      }]
    });
  }  
  
   // page users list role filter
  $("#status-usuario").on("change", function () {
    var usersRoleSelect = $("#status-usuario").val();
    // console.log(usersRoleSelect);
    usersTable.search(usersRoleSelect).draw();
  });
  
  // page users list role filter
  $("#filial-usuario").on("change", function () {
    var usersRoleSelect = $("#filial-usuario").val();
    // console.log(usersRoleSelect);
    usersTable.search(usersRoleSelect).draw();
  });

  // Input, Select, Textarea validations except submit button validation initialization
  if ($(".users-edit").length > 0) {
    $("#accountForm, #infotabForm").validate({
      rules: {
        cidade: {
          required: true,
          minlength: 5
        },
        equipe: {
          required: true
        },
        nivel: {
          required: true
        },
        status: {
          required: true
        },
        acoes: {
          required: true
        }
      },
      errorElement: 'div'
    });
  }

});


$("#butaoUsuarioGeral").click(function(e){
  e.preventDefault();
  $("#modalusuarioGeral").modal("open");  
  setTimeout(function(){  
  $(".select2").select2({});	
  },500);	  
});

