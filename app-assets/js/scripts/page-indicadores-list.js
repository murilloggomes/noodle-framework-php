$(document).ready(function () {
// variable declaration
  var usersTable;
 
  // datatable initialization
  if ($("#indicadores-list-datatable").length > 0) {
    usersTable = $("#indicadores-list-datatable").DataTable({
      responsive: true,
      'columnDefs': [{
        "orderable": false,
        "targets": [0, 7]
      }]
    });
  }  
  
  // page users list role filter
  $("#filial-indicador").on("change", function () {
    var usersRoleSelect = $("#filial-indicador").val();
    // console.log(usersRoleSelect);
    usersTable.search(usersRoleSelect).draw();
  });
  
  // page users list role filter
  $("#status-indicador").on("change", function () {
    var usersRoleSelect = $("#status-indicador").val();
    // console.log(usersRoleSelect);
    usersTable.search(usersRoleSelect).draw();
  });

  // Input, Select, Textarea validations except submit button validation initialization
  if ($(".users-edit").length > 0) {
    $("#accountForm, #infotabForm").validate({
      errorElement: 'div'
    });
  }

});

$("#salvar").on("click", function(e) {
  
  var nome = $("#nome-indicador").val();
  var unidadeNegocio = $("#filial-indicador-input").val();
  var centroCustos = $("#centro-custo-indicador").val();
  var cargo = $("#cargo-indicador").val();
  
  $(".campoIndicador").each(function(){    
    if($(this).val() == ""){
      console.log("hahaha");
      setTimeout(function() {
				M.toast({
					html: "Preencha todos os campos do formulário!",
					classes: 'warning-toast'
				})
			}, 200);
      return false;
    }
  });
  
  e.preventDefault;
  
  var campos = [];
  
	// Ler Cada Linha de Produto
  $(".campoPersonalizado").each(function() {
    var c = {};    
    c.valor = $(this).val();
    c.tipo = $(this).attr("type");
    c.id = $(this).attr("id");
    c.idCampo = $(this).data("id");
    
    campos.push(c);
  });
  
  var url = document.baseURI;
  
  $.ajax({
    url: url,
    type: "POST",
    dataType: "jsonp",
    data: {
      action: "salvarIndicadorJs",
      campos: campos,
      nome: nome,
      unidadeNegocio: unidadeNegocio,
      centroCustos: centroCustos,
      cargo: cargo
    },
    error: function() {
      console.log("Erro de Valor");
    },
    success: function(resp) {					
      console.log(resp);						
    }          			
   });
  
	});