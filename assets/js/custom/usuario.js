    
function remov(id){

	
console.log(id);	
var url =  document.baseURI;	
	
	
	$.confirm({
    title: 'Deseja remover?',
    content: '' +
    '<form action="" class="formName">' +
    '<div class="form-group mb-3">' +
    '<label>Digite abaixo o motivo para a exclusão</label>' +
    '<input type="text" value=" " id="motivo" placeholder="Motivo" class="name form-control" required />' +
    '</div>' +
		'<div class="form-group mb-3">' +
    '<label>Sua Senha</label>' +
    '<input type="password" value=" "  id="senhaRemove" class="name form-control" required />' +
    '</div>' +
    '</form>',
    buttons: {
        formSubmit: {
            text: 'Remover',
            btnClass: 'btn-red',
            action: function () {
							
                var motivo = this.$content.find('#motivo').val();
							  var senha = this.$content.find('#senhaRemove').val();
							
			$.ajax({
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: {
					action: "remover",
					id: id,
				  motivo: motivo,
				  senha: senha,

			},
			   error: function(resp) {
						console.log(resp);  
          },
			
				 success: function(resp) {
					 
					 
									if(resp.result == 1){
							Swal.fire({
								position: 'top-end',
								icon: 'success',
								title: resp.msg ,
								showConfirmButton: false,
								timer: 2500
							})
					 
					 const element = document.querySelector('#fecharModalUsuario');
                 element.click();
						}	else if(resp.result == 2) {
								 Swal.fire({
										icon: 'info',
										title: 'Oops...',
										text: resp.msg,
										footer: 'Horus S/A'
									});
										return false;				
							
							
						}
		
						}
		});	
	
           }
        },
        cancel: {
			    text: 'Cancelar',
				},
    },

});
	
	
	

						
							 								
}






 
function modalUsuario(id){

	
console.log(id);	
var url =  document.baseURI;	

		$.ajax({
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: {
					action: "modalUsuario",
					id: id,

			},
			   error: function(resp) {
						console.log(resp);  
          },
			
				 success: function(resp) {
					 
					 
					 $("#nome").val(resp.nome);
					 $("#user").val(resp.id);
					 $("#cpf").val(resp.cpf);
					 $("#telefone").val(resp.telefone);
					 $("#email").val(resp.email);
					 $("#unidade").val(resp.unidade);
					 $("#tipo").val(resp.tipo);
					 $("#cargo").val(resp.cargo);
					 $("#statusU").val(resp.status);
			
					
					 
					 console.log(resp);
						}
		});							
							 								
}


$("#salvarUsuario").on("click", function(e){
	e.preventDefault();
var url =  document.baseURI;	
var nome = $("#nome").val();
var user = $("#user").val();
var cpf = $("#cpf").val();
var telefone = $("#telefone").val();
var email = $("#email").val();
var unidade = $("#unidade").val();
var tipo = $("#tipo").val(); 
var cargo = $("#cargo").val();
var senha = $("#senha").val(); 
var confirmacaoSenha = $("#confirmacaoSenha").val();
var status = $("#statusU").val();	
	
console.log(nome);
	
		$.ajax({
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: {
					action: "salvarUsuario",
					nome: nome,
					cpf: cpf,
					telefone: telefone,
					user: user,
					unidade: unidade,
					email: email,
				  tipo: tipo,
				  cargo: cargo,
				  senha: senha,
				  confirmacaoSenha: confirmacaoSenha,
				  status: status,
			},
			   error: function(resp) {
						console.log("deu erro");  
          },
			
				 success: function(resp) {
					 
					 
					if(resp.result == 1){
							Swal.fire({
								position: 'top-end',
								icon: 'success',
								title: resp.msg ,
								showConfirmButton: false,
								timer: 2500
							})
					 
					 const element = document.querySelector('#fecharModalUsuario');
                 element.click();
						}	else if(resp.result == 2) {
								 Swal.fire({
										icon: 'info',
										title: 'Oops...',
										text: resp.msg,
										footer: 'Horus S/A'
									});
										return false;				
							
							
						}
					 
						}
		});							
							 								
});


$(document).on("click", ".hidePass", function(){
		var data = $(this).data("value");             

		if (data == "pass"){
			$(".codePass").hide();
			$(".textPass").show();
			$("#senhaA").attr("type", "text");           
		} else if (data == "text"){
			$(".textPass").hide();
			$(".codePass").show();
			$("#senhaA").attr("type", "password");
		} 

	});




 function modalPermissao(id){

																		
											
var url =  document.baseURI;	


		$.ajax({
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: {
					action: "modalPermissao",
					id: id,

			},
			   error: function(resp) {
						console.log(resp);  
          },
			
				 success: function(resp) {
					 $("#user").val(resp.id);
					 
					 console.log(resp.filiais); 
						var $el = $("#permissaoUsuario").empty();
								 $el.append($("<option selected disabled></option>")
											 .attr("value", '').text("Selecione "));
						 $.each(resp.arrayUsuarios, function( index, value ) {
									if(value.selecionado == "false"){
											$el.append($("<option  ></option>")
															 .attr("value",value.id).text(value.nome));
										 } else {
											 $el.append($("<option selected ></option>")
															 .attr("value",value.id).text(value.nome));
										 }
							 });
					 
					 
					 	 var $filiais = $("#permissaoFiliais").empty();
								 $filiais.append($("<option selected disabled></option>")
											 .attr("value", '').text("Selecione "));
						 $.each(resp.filiais, function( indexF, valueF ) {
									if(valueF.selecionado == "false"){
											$filiais.append($("<option  ></option>")
															 .attr("value",valueF.id).text(valueF.nome));
										 } else {
											 $filiais.append($("<option selected ></option>")
															 .attr("value",valueF.id).text(valueF.nome));
										 }
							 });
					 
					 	 	var $cargo = $("#permissaoCargo").empty();
								 $cargo.append($("<option selected disabled></option>")
											 .attr("value", '').text("Selecione "));
						 $.each(resp.departamentos, function( indexC, valueC ) {
									if(valueC.selecionado == "false"){
											$cargo.append($("<option  ></option>")
															 .attr("value",valueC.id).text(valueC.nome));
										 } else {
											 $cargo.append($("<option selected ></option>")
															 .attr("value",valueC.id).text(valueC.nome));
										 }
							 });
           
           	var $paginas = $("#paginasPermitidas").empty();
								 $paginas.append($("<option selected disabled></option>")
											 .attr("value", '').text("Selecione "));
						 $.each(resp.paginas, function( indexC, valueC ) {
									if(valueC.selecionado == "false"){
											$paginas.append($("<option  ></option>")
															 .attr("value",valueC.id).text(valueC.nome));
										 } else {
											 $paginas.append($("<option selected ></option>")
															 .attr("value",valueC.id).text(valueC.nome));
										 }
							 });
					 
							 $(".select2").select2({});		 
					 }
		  });							
							 								
}



$("#salvarPermissoes").on("click", function(e){
	e.preventDefault();
var url =  document.baseURI;	
var usuarios = $("#permissaoUsuario").val();
var filiais = $("#permissaoFiliais").val();
var departamentos = $("#permissaoCargo").val();
var paginas = $("#paginasPermitidas").val();
var user = $("#user").val();
var senha = $("#senhaA").val();
console.log(senha);
if(senha == ""){
	 Swal.fire({
  icon: 'info',
  title: 'Oops...',
  text: 'Campo [Sua Senha] é obrigatório!',
  footer: 'Horus S/A'
});
	return false;
	 }	
		$.ajax({
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: {
					action: "permissoes",
					usuarios: usuarios,
					filiais: filiais,
					departamentos: departamentos,
				  user: user,
				  senha: senha, 
          paginas:paginas,
				
			},
			   error: function(resp) {
						console.log("deu erro");  
          },
			
				 success: function(resp) {
					 
			   if(resp.result == 1){
				 
							Swal.fire({
								position: 'top-end',
								icon: 'success',
								title: 'Permissões salva com sucesso!',
								showConfirmButton: false,
								timer: 1500
							})
					 $("#senhaA").val("");
					 const element = document.querySelector('#fecharModalPermissao');
                 element.click();
						}	else if(resp.result == 2) {
								 Swal.fire({
										icon: 'info',
										title: 'Oops...',
										text: 'Senha divergente da cadastrada do banco, corrija e tente novamente!',
										footer: 'Horus S/A'
									});
										return false;				
						}
				 }
		});							
							 								
});


$(function() {		
	
	var table;
	
	$(document).ready(function(){		
		
		table =	dadosTabelaUsuario();
		$.fn.dataTable.ext.errMode = 'none';
	});
	
	$('#usuarios').on('keyup', function () {
    $('#usuarios').search(this.value).draw();
	});	

});


function dadosTabelaUsuario(paramentro1 = null,paramentro2 = null,paramentro3 = null){	
console.log(paramentro1);
	console.log(paramentro2);
	console.log(paramentro3);
		$('#usuarios').DataTable( {	
			  destroy:true,
			  responsive: true,
			 	processing: true,
        serverSide: true,	
			  stateSave: true, 
				stateDuration: 20,
				paging: true,				
				pagingType: 'full_numbers',
				searching: true,
	   		bSort: true,
			  order: [1, 'DESC'],
        lengthMenu: [ [15, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"] ],   
				pageLength: 15,
				ordering: true,
				language: {
 					url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
				},
			dom: 'Blfrtip',
// 						 buttons: [
// 							 'print',
//             {
//                 extend:    'copyHtml5',
//                 text:      '<i class="fa fa-files-o"></i>',
//                 titleAttr: 'Copy'
//             },
//             {
//                 extend:    'excelHtml5',
//                 text:      '<i class="fa fa-file-excel-o"></i>',
//                 titleAttr: 'Excel'
//             },
//             {
//                 extend:    'csvHtml5',
//                 text:      '<i class="fa fa-file-text-o"></i>',
//                 titleAttr: 'CSV'
//             },
//             {
//                 extend:    'pdfHtml5',
//                 text:      '<i class="fa fa-file-pdf-o"></i>',
//                 titleAttr: 'PDF'
//             }
//         ],
				ajax: {
					url: document.baseURI,	
					type: 'POST',	
					data: {
						action: 'otimizar',
						cache: false,
        contentType: false,
						paramentro1:paramentro1,
						paramentro2:paramentro2,
						paramentro3:paramentro3
					}
				},			
				deferRender: true,
		});		
}
 function loginUsuario(id){
		
		console.log("entoru");
		let cookie = {};		
		
		document.cookie.split(';').forEach(function(el) {
				let [k,v] = el.split('=');
				cookie[k.trim()] = v;
		});
		
		var sessaoAntiga = cookie.nplh;
		console.log(sessaoAntiga);
		$.ajax({
			url: document.baseURI,
			type: "POST",
			dataType: 'jsonp',
			data: {
					action: 'login',
					id: id,
					sessaoAntiga: sessaoAntiga,
			},
			error: function(resp) {
				 console.log(resp);
			},
			success: function(resp) {
					 setTimeout(function(){ location.reload(true); }, 1000);			
			}
		});
	}


