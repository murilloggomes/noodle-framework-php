/////// ABA DADOS GERAIS ///////////////////////////////////////

$("#tabDadosGerais").on("click", function(){
	
		if ($("#cliente_sit").val() == ""){
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}
	
	$(".divAba").hide();
	$("#general").show();
		
});

$(".tipo_cliente").on("change", function(){
	var valor = $(this).val();
	
	if (valor == "2"){	
		$(".camposCNPJ").show();
		$(".inputId").text("CNPJ Cliente");
		$("#tabDadosPessoais").hide();
		$(".nomeRazao").prop("readonly", true);
		$(".labelNomeRazao").text("Razão Social Cliente");
		$(".cpfCnpj").attr("maxlength", "18");
	}	else {
		$(".camposCNPJ").hide();
		$(".inputId").text("CPF Cliente");
		$("#tabDadosPessoais").show();
		$(".nomeRazao").removeAttr("readonly");
		$(".labelNomeRazao").text("Nome Cliente");
		$(".cpfCnpj").attr("maxlength", "14");
	}
});

$("#inputId").on("keyup", function(){	
	console.log($(".tipo_cliente").val());
	
	if ($(".tipo_cliente").val() == null){
		$(this).val("");
		setTimeout(function() {
				M.toast({
					html: "Selecione primeiro o tipo de Perfil do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
	}
});


$("#inputId").on("blur", function(){	
		
	if ($(".tipo_cliente").val() == "2"){	
		
		var valor = $(this).val();
		var url = document.baseURI;	
	console.log("oI");
	 $.ajax({
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: {
					action: "searchCnpj",
					cnpj: valor,
			},
			error: function() {
					console.log("Erro Consulta CNPJ");
			},

			success: function(resp) {							
				//$("#nomeRazao").val("");
				$(".labelNomeRazao").addClass("active");
				$(".nomeRazao").val(resp.cnpj.razao);						
				$(".nomeRazao").addClass("valid");

				$(".labelFantasia").addClass("active");
				$(".nome_fantasia_input").val(resp.cnpj.fantasia);					
				$(".nome_fantasia_input").addClass("valid");
				
				$(".labelFundacao").addClass("active");
				$(".data_fundacao_input").val(resp.cnpj.fundacao);					
				$(".data_fundacao_input").addClass("valid");
			}
		})
	}
	
});
  
  $("#upfile").on("change", function() { 
    console.log($(this)[0])
     useImage($(this)[0]);        
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
            $('.imagem_cliente').attr({ 'src': "" + e.target.result + "" });
            $('.imagem_cliente_result').val(e.target.result);
        }
    }
$(document).ready(function(){
$(".label").addClass("active");
});	

$(".validate").on("blur", function(){
	$(".label").addClass("active");
});
/////////////////////////////////////////////////////////////////////////////////
	

//////////// ABA DADOS PESSOAIS /////////////////////////////////////////////////

$("#tabDadosPessoais").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#dados-pessoais").show();
		
});

$(".casado").on("click", function(){
	if($(".casado").is(':checked')){		
		$(".camposConjuge").show();
	} else {
		$(".camposConjuge").hide();
	}
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA ENDEREÇOS /////////////////////////////////////////////////

$("#tabEnderecos").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#enderecos").show();
		
});


/////////////////////////////////////////////////////////////////////////////////

//////////// ABA ONLINE /////////////////////////////////////////////////

$("#tabOnline").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#online").show();
		
});

/////////////////////////////////////////////////////////////////////////////////


//////////// ABA INF COBRANCA /////////////////////////////////////////////////

$("#tabInfCobranca").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#infCobranca").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA INF Estrategica /////////////////////////////////////////////////

$("#tabInfEstrategia").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#inf-estrategia").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA REFERENCIAS /////////////////////////////////////////////////

$("#tabReferencias").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#referencias").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA LIMITE CRÉDITO /////////////////////////////////////////////////

$("#tabLimiteCredito").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#limitecredito").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA CONTATO /////////////////////////////////////////////////

$("#tabContato").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#cliente-contato").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA FUNCIONARIOS /////////////////////////////////////////////////

$("#tabFuncionario").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#cliente-funcionario").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA VENDAS ENDOSSADAS /////////////////////////////////////////////////

$("#tabVendaEndossada").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#venda-endossada").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA CONDIÇÃO DE PAGAMENTO /////////////////////////////////////////////////

$("#tabCondicaoPagamento").on("click", function(){
	console.log("Condid");
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#condicaoPagamento").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA VEICULO AUROTIZADO /////////////////////////////////////////////////

$("#tabVeiculoAutorizado").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#veiculo-autorizado").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA CLIENTE COMPRADOR /////////////////////////////////////////////////

$("#tabClienteComprador").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#cliente-comprador").show();
		
});

/////////////////////////////////////////////////////////////////////////////////

//////////// ABA PROTEÇÃO DE CRÉDITO /////////////////////////////////////////////////

$("#tabProtecaoCredito").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();
	$("#protecao-credito").show();
		
});

//////////// ABA Imagens /////////////////////////////////////////////////

$("#tabClienteImagem").on("click", function(){
	
	if ($("#cliente_sit").val() == ""){
		console.log("foi");
		setTimeout(function() {
				M.toast({
					html: "Cadastre Primeiro os dados Gerais do Cliente!",
					classes: 'warning-toast'
				})
			}, 200);
		$("#tabADadosGerais").addClass("active");	
		return false;
	}	
	
	$(".divAba").hide();  
	$("#cliente-imagens").show();
		
});


  document.addEventListener('DOMContentLoaded', function(){
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
  });


  // Or with jQuery

  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

/////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
$(function() {
$(".modal").modal(); 
$(".table").DataTable({		
		"pageLength": 10,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
		}	
  });
});
$(".view-data").on("click", function(){
	var modal = $(this).data('id');
	console.log(modal);
	$(modal).modal('open');
});
/////////////////////////////////////////////////////////////////////////////////

$(".motorista").on("change" , function () {  
  var cpf = $(this).find('option:selected').data("id");
 // console.log(valor + " - " + cpf);
  
 //$(".cpf_motorista").val("");
 $(".cpf_motorista").val(cpf); 
});

////////////////////////////////////////////////////////////////////////////////

$(".cpfField").on("blur", function() { 
	console.log("dale");
	var cpf = $(this).val();
	var url = document.baseURI;	
		
		 $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "searchCpf",
							cpf: cpf,
          },
          error: function() {
              console.log("error");
          },

          success: function(resp) {
						console.log(resp);
						
          }
      })
	});
////////////////////////////////////////////////////////////////////////////////

$(".precoBRL").on("blur", function(){
 var valor = parseInt($(this).val());
 valor = valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }); 
 $(this).val(valor);
});

///////////////////////////////////////////////////////////////////////////////

$(".cepField").on("blur", function() { 
	
	var cep = $(this).val();
	var url = document.baseURI;	
		
		 $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "searchCep",
							cep: cep,
          },
          error: function() {
              console.log("Erro Consulta CEP");
          },

          success: function(resp) {
						console.log(resp);		
						
            $(".estadoField").val(resp.uf[0]).change();
						$(".logradouroField").val(resp.logradouro[0]);
						$(".bairroField").val(resp.bairro[0]);
						$(".localidadeField").val(resp.localidade[0]);						
          }
      })
	});




