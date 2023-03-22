
//format cpf/cnpj
function formatField(fieldText) {
    if (fieldText.value.length < 14) {
        fieldText.value = maskCpf(fieldText.value);
    } else {
        fieldText.value = maskCnpj(fieldText.value);
    }
}
function cleanFormat(fieldText) {
    fieldText.value = fieldText.value.replace(/[^0-9]/gi,'');
}
function cleanFormatMoney(fieldText) {
    var valor = fieldText.value;
    valor = valor.replace(/[^0-9.,]/gi,'');
    valor = valor.replaceAll(".", "");	
    valor = valor.replaceAll(",", ".");	
  
    fieldText.value = valor;
}
function maskCpf(valor) {
    return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
}
function maskCnpj(valor) {
    return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
}


//format phone
function formatTel(fieldText) {
	
	
	
	if (fieldText.value.length < 11) {
		fieldText.value = maskTel(fieldText.value);
	}	else {
		fieldText.value = maskCel(fieldText.value);
	}	
}

function maskTel(valor) {
	return valor.replace(/(\d{2})(\d{4})(\d{4})/g,"(\$1) \$2-\$3");
	}
function maskCel(valor) {
	return valor.replace(/(\d{2})(\d{1})(\d{4})(\d{4})/g,"(\$1) \$2 \$3-\$4");
}

function formatCep(fieldText) {
    if (fieldText.value.length <= 8) {
        fieldText.value = maskCep(fieldText.value);
       }
}

function maskCep(valor) {
	return valor.replace(/(\d{2})(\d{3})(\d{3})/g,"\$1.\$2-\$3");
}

//format taxa/porcento
function formatPer(fieldText) {
	if (fieldText.value.length <= 3) {
		fieldText.value = maskPer(fieldText.value);
	}	else {
		alert("Não utilize caracteres especiais");
	}	
}

function maskPer(valor) {
	return valor.replace(/(\d{1})(\d{2})/g,"\$1.\$2%");
	}




function sleep(seconds){
    var waitUntil = new Date().getTime() + seconds*1000;
    while(new Date().getTime() < waitUntil) true;
}

function onlynumber(evt) {
               var theEvent = evt || window.event;
               var key = theEvent.keyCode || theEvent.which;
               key = String.fromCharCode( key );

               //var regex = /^[0-9.,]+$/;
               var regex = /^[0-9.]+$/;
               if( !regex.test(key) ) {
                  theEvent.returnValue = false;
                  if(theEvent.preventDefault) theEvent.preventDefault();
               }              
            }

function onlynumberfull(evt) {
               var theEvent = evt || window.event;
               var key = theEvent.keyCode || theEvent.which;
               key = String.fromCharCode( key );

               //var regex = /^[0-9.,]+$/;
               var regex = /^[0-9,.%]+$/;
               if( !regex.test(key) ) {
                  theEvent.returnValue = false;
                  if(theEvent.preventDefault) theEvent.preventDefault();
               }              
            }

function onlynumberrealy(evt) {
               var theEvent = evt || window.event;
               var key = theEvent.keyCode || theEvent.which;
               key = String.fromCharCode( key );

               //var regex = /^[0-9.,]+$/;
               var regex = /^[0-9]+$/;
               if( !regex.test(key) ) {
                  theEvent.returnValue = false;
                  if(theEvent.preventDefault) theEvent.preventDefault();
               }              
            }/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================
NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

/**
 * Confirm
 */
function confirmExclusao(data = {}) { 
    data = $.extend({}, {
            title: "Tem certeza que deseja remover?",
            content: "Você não poderá recuperar as informações depois...",
            confirmText: "Apagar",
            cancelText: "Cancelar",
            confirm: function() {},
            cancel: function() {},
        },
        data);


    $.confirm({
        title: data.title,
        content: data.content,
        theme: 'material',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small btn waves-effect waves-light red accent-2",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
            cancel: {
                text: data.cancelText,
                btnClass: "small btn button--simple",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}



$(".salvarConfig").on("click", function(e){
	e.preventDefault();

var div = "";
var url = document.baseURI;
var referencia = $(this).parent().find(".salvarConfig").data("id");
var nome = $(this).parent().parent().find(".nome").val();
var descricao = $(this).parent().parent().find(".descricao").val();
var status = $(this).parent().parent().find(".status").val();
var idConfig = $(this).parent().parent().find(".salvarConfig").data("value");
var cor = $(this).parent().parent().find(".cor").val();
var funil = $(this).parent().parent().find(".funil").val();
var motivo = $(this).parent().parent().find(".motivo").val();
	
//  if(referencia == "Tag") {
//  }
	
	
console.log("referencia:" + referencia);
console.log("nome:" + nome);
console.log("descricao:" + descricao);
console.log("status:" + status);
console.log("id:" + idConfig);
console.log("cor:" + cor);
console.log("motivo:" + motivo);


		$.ajax({
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: {
					action: "salvarConfig",
					nome: nome,
					descricao: descricao,
					status: status,
					idConfig: idConfig,
				  referencia: referencia,
				  cor: cor,
					funil:funil,
					motivo: motivo,
				  
			},
			   error: function(resp) {
						console.log("deu erro");  
          },
			
				 success: function(resp) {
					 console.log(resp);
					 console.log("deu certo")
					 $('#modalEquipe').modal("hide");
								Swal.fire({
									position: 'center',
									icon: 'success',
									title: 'Dados salvos com sucesso!',
									showConfirmButton: false,
									timer: 2500
								})
					 		
// 					 		if(idConfig == 0){
// 								div += '<td>'+resp.config.id+'</td>'; 
// 								div += '<td><span class="badge baddge-success-lighten"><span class="green-text"></span>Ativo</span></td>';
// 								div += '<td>'+resp.config.nome+'</td>';
// 								div += '<td><input disabled class="col-lg-2 col-md-2 col-sm-2" style="border:none;background:transparent; type="color" value="'+resp.config.cor+'"> </td>';
// 								div += '<td><button style="background:transparent;border:none;" type="button" data-bs-toggle="modal" data-bs-target="$modalEditTag"> 	<i class="fa fa-pencil" aria-hidden="true"></i>	</button>'
// 								div += 'a href="javascript:void(0)" class="tooltipped" data-type="User" data-position="top" data-tooltip="Remover"><i class="fa fa-times" aria-hidden="true"></i></a>'
// 								div += '</td>'
// 							} else {
// 									$("").css("background-color" , resp.task.cor);
// 									$("").text(resp.task.nome);
// 									$("").text(resp.task.responsavel);
// 											}
					 
						}
		});							
		setTimeout(function(){
	location.reload();
},1000);					 								
});


function sucesso (titulo) {
Swal.fire({
  position: 'center',
  icon: 'success',
  title: titulo,
  showConfirmButton: false,
  timer: 3000
})
}

function erro (titulo) {
Swal.fire({
  position: 'center',
  icon: 'error',
  title: titulo,
  showConfirmButton: true,
})
}


function edicaoFunil(id){
	console.log("edicao");
	
		$("#idFunil").val("");
		$(".nomeProcesso").val("");
		$(".equipeProcesso").val("");
		$(".unidadeProcesso").val("");
		$(".responsavelProcesso").val("");
		$(".descricaoProcesso").val("");
		$(".corProcesso").val("");
		
	$(".select2").select2({  dropdownParent: $("#processoModal")});	
	
   $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "edicaoFunil",
						  id:id,
          },
          error: function(resp) {
             console.log(resp);  
						 console.log("deu erro");  
          },
          success: function(resp) {
             console.log(resp);
						
						var $el = $("#responsavelFunil").empty();
            if(resp.responsavel == null){
								 $el.append($("<option selected disabled></option>")
											 .attr("value", '').text("Selecione "));
            }
            
						 $.each(resp.responsavel, function( index, value ) {
									if(value.selecionado == "false"){
											$el.append($("<option  ></option>")
															 .attr("value",value.id).text(value.nome));
										 } else {
											 $el.append($("<option selected ></option>")
															 .attr("value",value.id).text(value.nome));
										 }
							 });
						$("#idFunil").val(resp.id);
						$(".nomeProcesso").val(resp.nome);
						$(".equipeProcesso").val(resp.equipe);
						$(".unidadeProcesso").val(resp.unidade);
						$(".responsavelProcesso").val(resp.responsavel);
						$(".descricaoProcesso").val(resp.descricao);
						$(".corProcesso").val(resp.cor);
						$(".select2").select2({  dropdownParent: $("#processoModal")});	
          }
      });
}

// adicionar etapa
function edicaoEtapa(id,id_processo){
  

  					
						$("#idEtapa").val("");
	          $("#nomeEtapa").val("");
            $("#visibilidadeEtapa").val("");
						$("#etapaProcesso").val("");
						$("#visibilidadeEtapa").val("");
						$("#etapaProcesso").val("");
						$("#ordemEtapa").val("");
						$("#responsavelEtapa").val("");
						$("#descricaoEtapa").val("");
						$("#empresaEtapa").val("");
						$("#pessoaEtapa").val("");
  
   $(".select2").select2({  dropdownParent: $("#funilModal")});	
  
   $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "edicaoEtapa",
						  id:id,
              id_processo:id_processo,
          },
          error: function(resp) {
             console.log(resp);  
						 console.log("deu erro");  
          },
          success: function(resp) {
             console.log(resp);
						
						 var $el = $("#responsavelEtapa").empty();
            if(resp.responsavel == null){
								 $el.append($("<option selected disabled></option>")
											 .attr("value", '').text("Selecione "));
            }
            
						 $.each(resp.responsavel, function( index, value ) {
									if(value.selecionado == "false"){
											$el.append($("<option  ></option>")
															 .attr("value",value.id).text(value.nome));
										 } else {
											 $el.append($("<option selected ></option>")
															 .attr("value",value.id).text(value.nome));
										 }
							 });
            
            
            var $ordem = $("#ordemEtapa").empty();
            if(resp.ordem == null){
								 $ordem.append($("<option selected disabled></option>")
											 .attr("value", '').text("Selecione "));
            }
            
						 $.each(resp.ordem, function( index, value ) {
									if(value.selecionado == "false"){
											$ordem.append($("<option  ></option>")
															 .attr("value",value.id).text(value.id));
										 } else {
											 $ordem.append($("<option selected ></option>")
															 .attr("value",value.id).text(value.id));
										 }
							 });
						
						$("#nomeEtapa").val(resp.nome);
						$("#visibilidadeEtapa").val(resp.visibilidade);
						$("#etapaProcesso").val(resp.processo);
			
			
						$("#descricaoEtapa").val(resp.descricao);
						$("#idEtapa").val(resp.id);
						$("#empresaEtapa").prop("checked",resp.exibe_empresa);
						$("#pessoaEtapa").prop("checked",resp.exibe_pessoa);
            $(".select2").select2({dropdownParent: $("#funilModal")});	
          }
      });
}

$(".btnEtapa").on("click", function(){
	
	var idFila = $(this).parent().parent().find(".idFila").val();
	var id = $(this).parent().parent().find(".inputId").val();
  var ordem = $(this).parent().parent().find("#ordemEtapa").val();
	var nome = $(this).parent().parent().find(".nomeFila").val();
	var visibilidade = $(this).parent().parent().find(".visibilidadeFila").val();
	var processo = $(this).parent().parent().find(".processoFila").val();
	var userFila = $(this).parent().parent().find(".userFila").val();
	var responsavelFila = $(this).parent().parent().find(".responsavelFila").val();
	var descricaoFila = $(this).parent().parent().find(".descricaoFila").val();
	var corFila = $(this).parent().parent().find(".corFila").val();
	var exibeEmpresa = $(".exibeEmpresaFila").prop("checked");
	var exibePessoa = $(".exibePessoaFila").prop("checked");
  if(processo == undefined){
       Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Vincule a etapa a um funil!',
            showConfirmButton: true,
          })
       return false;
    } 
	
// 	console.log("id" + id);
// 	console.log(nome);
// 	console.log(visibilidade);
// 	console.log(processo);
// 	console.log(visibilidade);
// 	console.log(userFila);
// 	console.log(responsavelFila);
// 	console.log(descricaoFila);
	console.log("empresa:" + exibeEmpresa);
	console.log("pessoa:" + exibePessoa);
	
	$.ajax({
				url: document.baseURI,
				type: "POST",
				dataType: 'jsonp',
				data: {
						action: 'addEtapa',
						nome: nome,
						visibilidade: visibilidade,
						usuario: userFila,
						responsavel: responsavelFila,
						descricao: descricaoFila,
						processo: processo,
						id: id,
						exibeEmpresa: exibeEmpresa,
						exibePessoa: exibePessoa,
            ordem:ordem,
				},
				error: function() {
					 console.log("ERROR");
				},
				success: function(resp) {
					console.log("deu certo");
					var url = window.origin;
					if(resp.result == 1){
						 Swal.fire({
									position: 'center',
									icon: 'success',
									title: 'Etapa salvo com sucesso!',
									showConfirmButton: false,
									timer: 1000
								})
					} 
					setTimeout(function(){
						location.reload();
					},1000);					 								
			}
	});
});


$(".tabFunil").on("click", function (){
	$("#btnProcesso").attr("hidden", false);
});
 
$("#adicionarProcesso").on("click", function(){
	
	var div = "";
	
	var id = $(this).parent().parent().find("#idFunil").val();
	var nome = $(this).parent().parent().find(".nomeProcesso").val();
	var unidadeNegocio = $(this).parent().parent().find(".unidadeProcesso").val();
	var equipe = $(this).parent().parent().find(".equipeProcesso").val();
	var descricao = $(this).parent().parent().find(".descricaoProcesso").val();
	var cor = $(this).parent().parent().find(".corProcesso").val();
	var responsavel = $(this).parent().parent().find(".responsavelFila").val();
  
	$.ajax({
				url: document.baseURI,
				type: "POST",
				dataType: 'jsonp',
				data: {
						action: 'addProcesso',
						id: id,
						nome: nome,
						unidadeNegocio: unidadeNegocio,
						responsavel: responsavel,
						equipe: equipe,
						descricao: descricao,
            cor:cor
				},
				error: function(resp) {
					 console.log("ERRO");
				},
				success: function(resp) {
					console.log("entrou certo");
					
					var url = window.origin;	
					
					if(resp.result == 1){
						 Swal.fire({
									position: 'center',
									icon: 'success',
									title: 'Funil salvo com sucesso!',
									showConfirmButton: false,
									timer: 2000
								})
					} 
					
					setTimeout(function(){
						location.reload();
					},1000);				

			}
	});
});

// remover etapa
 $(".remover-dados").on("click", function(e) {   
	 e.preventDefault();
	 		 var url = window.location;
			 var id = $(this).data("id");
       var type = $(this).data("type");
       var tr = $(this).closest('.tr');
			 console.log(type);
        exclusao("Tem certeza que deseja remover?" , "A ação não poderá ser desfeita!",{
            confirm: function() {		
							tr.remove();
                $.ajax({
                    url: url,
                    type: 'POST',
										dataType: "jsonp",
                    data: {
                        action: "remover",							
												id: id,
												type:type,
                    },error: function() {
										console.log("Não removeu!")
									},
									success: function(resp) {
										if(resp.result == 1){
											 Swal.fire({
													position: 'center',
													icon: 'success',
													title: type + ' excluído(a) com sucesso!',
													showConfirmButton: false,
													timer: 2000
											})
										}
										setTimeout(function(){
												location.reload();
											},1000);
								  }							       
							});
						}		
					});
		 });

// remover funil
 $(".deletarProcesso").on("click", function(e) {   
	 e.preventDefault();
	 		 var url = window.location;
			 var id = $(this).data("id");
       var atual = $(this).closest('.card');
			 console.log(id);
        exclusao("Tem certeza que deseja remover o funil?" , "Todas as etapas e tarefas vinculadas serão perdidas!",{
            confirm: function() {		
							atual.remove();
                $.ajax({
                    url: url,
                    type: 'POST',
										dataType: "jsonp",
                    data: {
                        action: "remover",							
												id: id,
												type: "Processo",
                    },error: function() {
										console.log("Não removeu!")
									},
									success: function(resp) {
										if(resp.result == 1){
											 Swal.fire({
													position: 'center',
													icon: 'success',
													title: 'Funil excluído com sucesso!',
													showConfirmButton: false,
													timer: 2000
											})
										}
										setTimeout(function(){
												location.reload();
											},1000);
								  }							       
							});
						}		
					});
		 });


// 	confirmExclusao({
// 		confirm: function() {		
// 			atual.remove();
// 		}
// 	})


function exclusao ($title, $text, data = {}) { 
    data = $.extend({}, {
            title: $title,
            content: $text,
            confirmText: "Confirmar",
            cancelText: "Cancelar",
            confirm: function() {
							
						},
            cancel: function() {},
        },
        data);

    $.confirm({
        title: data.title,
        content: data.content,
        theme: 'material',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small btn waves-effect waves-light red accent-2",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
            cancel: {
                text: data.cancelText,
                btnClass: "small btn button--simple",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}


function edicaoCargo(id){

      $("#nome_cargo").val("");
      $("#carg").val("");
      $("#status_cargo").val("");
  
   $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "edicaoCargo",
						  id:id,
          },
          error: function(resp) {
             console.log(resp);  
						 console.log("deu erro");  
          },
          success: function(resp) {
             console.log(resp);
						
						var $el = $("#status_cargo").empty();
            if(resp.status == null){
								 $el.append($("<option selected disabled></option>")
											 .attr("value", '').text("Selecione "));
              $el.append($("<option  ></option>")
															 .attr("value",1).text("Ativo"));
              $el.append($("<option  ></option>")
															 .attr("value",0).text("Desativado"));
            } else {
              
              if(resp.status == 1){
											$el.append($("<option selected ></option>")
															 .attr("value",1).text("Ativo"));
                      $el.append($("<option  ></option>")
															 .attr("value",0).text("Desativado"));
										 } else {
											$el.append($("<option selected ></option>")
															 .attr("value",0).text("Desativado"));
                       $el.append($("<option  ></option>")
															 .attr("value",1).text("Ativo"));
										 }
              
            }
            $("#carg").val(resp.id);
						$("#nome_cargo").val(resp.nome);
			
          }
      });
}

function SalvaCargo(){
  
     var id = $("#carg").val();
     var nome = $("#nome_cargo").val();
     var status = $("#status_cargo").val();
  
   $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "SalvarCargo",
						  id:id,
              nome:nome,
              status:status,
          },
          error: function(resp) {
             console.log(resp);  
						 console.log("deu erro");  
          },
          success: function(resp) {
            
    if(resp.result == 1){
         	Swal.fire({
              title: '<strong>Cargo ' + resp.nome + ' editado com sucesso!</strong>',
              icon: 'success',
              html:
                'Para visualizar a tabela atualizada ' +
                '<a href="'+ window.location +'">Clique aqui</a> ' +
                '.',
              showCloseButton: true,
              showCancelButton: false,
              focusConfirm: false,
              confirmButtonText:
                'OK!',
            })
       } else {
         Swal.fire({
              title: '<strong>Cargo ' + resp.nome + ' cadastrado com sucesso!</strong>',
              icon: 'success',
              html:
                'Para visualizar a tabela atualizada ' +
                '<a href="'+ window.location +'">Clique aqui</a> ' +
                '.',
              showCloseButton: true,
              showCancelButton: false,
              focusConfirm: false,
              confirmButtonText:
                'OK!',
            })
       }       
            
          }
      });
}

function edicaoPagina(id){

      $("#nome_pagina").val("");
      $("#pag").val("");
      $("#status_pagina").val("");
      $("#uri").val("");
  
   $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "edicaoPagina",
						  id:id,
          },
          error: function(resp) {
             console.log(resp);  
						 console.log("deu erro");  
          },
          success: function(resp) {
             console.log(resp);
						
						var $el = $("#status_pagina").empty();
            if(resp.status == null){
								 $el.append($("<option selected disabled></option>")
											 .attr("value", '').text("Selecione "));
              $el.append($("<option  ></option>")
															 .attr("value",1).text("Ativo"));
              $el.append($("<option  ></option>")
															 .attr("value",0).text("Desativado"));
            } else {
              
              if(resp.status == 1){
											$el.append($("<option selected ></option>")
															 .attr("value",1).text("Ativo"));
                      $el.append($("<option  ></option>")
															 .attr("value",0).text("Desativado"));
										 } else {
											$el.append($("<option selected ></option>")
															 .attr("value",0).text("Desativado"));
                       $el.append($("<option  ></option>")
															 .attr("value",1).text("Ativo"));
										 }
              
            }
            $("#pag").val(resp.id);
						$("#nome_pagina").val(resp.nome);
            $("#uri").val(resp.uri);
			
          }
      });
}

function SalvaPagina(){
  
     var id = $("#pag").val();
     var nome = $("#nome_pagina").val();
     var status = $("#status_pagina").val();
     var uri = $("#uri").val();  
   $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "SalvarPagina",
						  id:id,
              nome:nome,
              status:status,
              uri:uri
          },
          error: function(resp) {
             console.log(resp);  
						 console.log("deu erro");  
          },
          success: function(resp) {
            
    if(resp.result == 1){
         	Swal.fire({
              title: '<strong>Página ' + resp.nome + ' editada com sucesso!</strong>',
              icon: 'success',
              html:
                'Para visualizar a tabela atualizada ' +
                '<a href="'+ window.location +'">Clique aqui</a> ' +
                '.',
              showCloseButton: true,
              showCancelButton: false,
              focusConfirm: false,
              confirmButtonText:
                'OK!',
            })
       } else {
         Swal.fire({
              title: '<strong>Página ' + resp.nome + ' cadastrada com sucesso!</strong>',
              icon: 'success',
              html:
                'Para visualizar a tabela atualizada ' +
                '<a href="'+ window.location +'">Clique aqui</a> ' +
                '.',
              showCloseButton: true,
              showCancelButton: false,
              focusConfirm: false,
              confirmButtonText:
                'OK!',
            })
       }       
            
          }
      });
}


