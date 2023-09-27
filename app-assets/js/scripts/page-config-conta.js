$(document).ready(function () {

  // variable declaration
  var equipeTable;
  
  // datatable initialization
  if ($("#equipe-lista-datatable").length > 0) {
    equipeTable = $("#equipe-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  } 
  
  // variable declaration
  var cargoTable;

  // datatable initialization
  if ($("#cargo-lista-datatable").length > 0) {
    cargoTable = $("#cargo-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }  
  
  // variable declaration
  var filialTable;

  // datatable initialization
  if ($("#filial-lista-datatable").length > 0) {
    filialTable = $("#filial-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }
  
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