$(document).ready(function () {

  // variable declaration
  var condicaopagamentoTable;
  
  // datatable initialization
  if ($("#condicao-pagamento-lista-datatable").length > 0) {
    condicaopagamentoTable = $("#condicao-pagamento-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  } 
  
  // variable declaration
  var icmTable;

  // datatable initialization
  if ($("#icm-lista-datatable").length > 0) {
    icmTable = $("#icm-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }  
  
  // variable declaration
  var beneficiofiscalTable;

  // datatable initialization
  if ($("#beneficio-fiscal-lista-datatable").length > 0) {
    beneficiofiscalTable = $("#beneficio-fiscal-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }
  
   // variable declaration
  var substituicaotributariaTable;

  // datatable initialization
  if ($("#substituicao-tributaria-lista-datatable").length > 0) {
    substituicaotributariaTable = $("#substituicao-tributaria-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }
  
    // variable declaration
  var perfiltributarioTable;

  // datatable initialization
  if ($("#perfil-tributario-lista-datatable").length > 0) {
    perfiltributarioTable = $("#perfil-tributario-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }
  
     // variable declaration
  var bancoTable;

  // datatable initialization
  if ($("#banco-lista-datatable").length > 0) {
    bancoTable = $("#banco-lista-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0,5]
      }]
    });
  }
  
     // variable declaration
  var regimetributarioTable;

  // datatable initialization
  if ($("#regime-tributario-lista-datatable").length > 0) {
    bancoTable = $("#regime-tributario-lista-datatable").DataTable({
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