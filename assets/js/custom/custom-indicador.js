$("#add-campo-select").on("click", function(){
	console.log("Oi");	
});

$("#valor-campo").on("change", function(){
	var id = $(this).find('option:selected').val();
	var nome = $(this).find('option:selected').text();
	var url = document.baseURI;
	
	$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "adicionarCampo",
              id: id             
          },
          error: function() {
              console.log("ERRO");
          },
          success: function(resp) {  
						
					var lugarAdicao = $('#add-campo');
					var CampoCustomizado = '';
						
					CampoCustomizado += '<div class="input-field col s12 m6">';
					CampoCustomizado += '<i class="material-icons prefix">' + resp.icon + '</i>';
					CampoCustomizado += '<input data-id="' + resp.idCampo + '" value="" id="' + resp.identidadeCampo + '" name="' + resp.identidadeCampo +'" placeholder="Meta de ' + nome + '" type="' + resp.tipo + '" class="validate campoPersonalizado campoIndicador">';					
					CampoCustomizado += '</div>';	
						
					lugarAdicao.before(CampoCustomizado);	
						
					$("#select-campos").hide();	
          $("#add-campo").show();
				}
      });
});	