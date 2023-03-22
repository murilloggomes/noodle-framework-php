$(document).ready(function () {

  // variable declaration
  var ncmTable;
  
  // datatable initialization
  if ($("#ncm-lista-datatable").length > 0) {
    ncmTable = $("#ncm-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  } 
  
  // variable declaration
  var kitprodutoTable;

  // datatable initialization
  if ($("#kitproduto-lista-datatable").length > 0) {
    kitprodutoTable = $("#kitproduto-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }  
  
  // variable declaration
  var segmentoprodutoTable;

  // datatable initialization
  if ($("#segmentoproduto-lista-datatable").length > 0) {
    segmentoprodutoTable = $("#segmentoproduto-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }
  
    // variable declaration
  var tipoprodutoTable;

  // datatable initialization
  if ($("#tipoproduto-lista-datatable").length > 0) {
    tipoprodutoTable = $("#tipoproduto-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }
  
    // variable declaration
  var modeloprodutoTable;

  // datatable initialization
  if ($("#modeloproduto-lista-datatable").length > 0) {
    modeloprodutoTable = $("#modeloproduto-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }
  
      // variable declaration
  var origemprodutoTable;

  // datatable initialization
  if ($("#origemproduto-lista-datatable").length > 0) {
   origemprodutoTable = $("#origemproduto-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }
  
      // variable declaration
  var fabricanteprodutoTable;

  // datatable initialization
  if ($("#fabricanteproduto-lista-datatable").length > 0) {
   fabricanteprodutoTable = $("#fabricanteproduto-lista-datatable").DataTable({
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