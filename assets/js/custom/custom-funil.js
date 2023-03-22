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
}

function moeda(a, e, r, t) {
            let n = ""
              , h = j = 0
              , u = tamanho2 = 0
              , l = ajd2 = ""
              , o = window.Event ? t.which : t.keyCode;
              a.value = a.value.replace('R$ ','');            
            if (n = String.fromCharCode(o),
            -1 == "0123456789".indexOf(n))
                return !1;
            for (u = a.value.replace('R$ ','').length,
            h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
                ;
            for (l = ""; h < u; h++)
                -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
            if (l += n,
            0 == (u = l.length) && (a.value = ""),
            1 == u && (a.value = "R$ 0" + r + "0" + l),
            2 == u && (a.value = "R$ 0" + r + l),
            u > 2) {
                for (ajd2 = "",
                j = 0,
                h = u - 3; h >= 0; h--)
                    3 == j && (ajd2 += e,
                    j = 0),
                    ajd2 += l.charAt(h),
                    j++;
                for (a.value = "R$ ",
                tamanho2 = ajd2.length,
                h = tamanho2 - 1; h >= 0; h--)
                    a.value += ajd2.charAt(h);
                a.value += r + l.substr(u - 2, u)
            }
            return !1
        }

$(".enviarForm").on("click", function(){
	var div = "";

	var id = $(this).parent().parent().find(".inputId").val();
	var nome = $(this).parent().parent().find(".nomeFila").val();
	var visibilidade = $(this).parent().parent().find(".visibilidadeFila").val();
	var tipoFila = $(this).parent().parent().find(".tipoFila").val();
	var userFila = $(this).parent().parent().find(".userFila").val();
	var responsavelFila = $(this).parent().parent().find(".responsavelFila").val();
	var descricaoFila = $(this).parent().parent().find(".descricaoFila").val();
	var corFila = $(this).parent().parent().find(".corFila").val();
	var exibeEmpresa = $(this).parent().parent().find(".exibeEmpresaFila").is(':checked');
	var exibePessoa = $(this).parent().parent().find(".exibePessoaFila").is(':checked');
	var idFila = $(this).parent().parent().find(".idFila").val();
	var processo = $(this).parent().parent().find(".processoFila").val();
	
	console.log(corFila);
	
	$.ajax({
				url: document.baseURI,
				type: "POST",
				dataType: 'jsonp',
				data: {
						action: 'addFila',
						nome: nome,
						visibilidade: visibilidade,
						tipo: tipoFila,
						usuario: userFila,
						responsavel: responsavelFila,
						descricao: descricaoFila,
						corFila: corFila,
						exibeEmpresa: exibeEmpresa,
						processo: processo,
						id: id,
						exibePessoa: exibePessoa
				},
				error: function() {
					 console.log("ERROR");
				},
				success: function(resp) {
					var url = window.origin;
					
					console.log()
					
					if(id == 0){
					div += "<div class='tasks' data-plugin='dragula' data-containers='['task-list-one', 'task-list-two', 'task-list-three', 'task-list-four']'>";
						div += "<h5 class='mt-0 task-header'>" + resp.nome + "</h5>";
						div += "<h5 class='mt-0 deletarLista'>X</h5>";
// 						div += "<div id='task-list-one'' class='task-list-items'>";
// 							div += "<div class='card mb-0'>";
// 								div += "<div class='card-body p-3'>";
// 									div += '<small class="float-end text-muted">" '+resp.fila.responsavelFunil +' "</small>'
// 									div += '<span class="badge bg-danger" style="color:transparent;background-color:'+resp.fila.cor+'">High</span>'

// 									div += "<h5 class='mt-2 mb-2'><a href='#' data-bs-toggle='modal' data-bs-target='#task-detail-modal' class='text-body'>iOS App home page</a></h5>";

					
// 									div +=  '<p class="mb-0">';
// 									div +=	'<span class="pe-2 text-nowrap mb-2 d-inline-block">'
// 									div +=	'<i class="mdi mdi-briefcase-outline text-muted"></i>iOS</span>'
// 									div +=	'<span class="text-nowrap mb-2 d-inline-block">'
// 									div +=	'<i class="mdi mdi-comment-multiple-outline text-muted"></i><b>74</b> Comments'
// 									div +=	'</span>'
// 									div +=	'</p>'

// 									div +=	'<div class="dropdown float-end">'
// 									div +=	'<a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">'
// 									div +=	'<i class="mdi mdi-dots-vertical font-18"></i>'
// 									div +=	'</a>'
// 									div +=	'<div class="dropdown-menu dropdown-menu-end">'
// 									div +=	'<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Editar</a>'
// 									div +=	'<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Deletar</a>'
// 									div +=	'<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle-outline me-1"></i>Adicionar Usuário</a>'
// 									div +=	'<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Sair</a>'
// 									div +=	'</div>'
// 									div +=	'</div>'

// 									div +=	'<p class="mb-0">'
// 									div +=	'<img src="'+ url +'/assets/images/usuarios/'+resp.fila.idCriador+'.jpg" class="avatar-xs rounded-circle me-1" />'
// 									div +=	'<span class="align-middle">'+ resp.fila.criador +' </span>'
// 									div +=	'</p>'
					
// 								div += "</div>";
// 							div += "</div>";
// 						div += "</div>";
					div += "</div>";
					$("#elementoFila").prepend(div);
					$("#funilModal").modal("hidden");
					$("#").modal("hidden");
					} else {
					console.log('#modalFilaEdit'+resp.fila.id+'');
					$("#corFunil"+id).css("background-color" , resp.fila.cor);
					$("#tituloFila"+id).text(resp.fila.nome);	
						
					$('#modalFilaEdit'+resp.fila.id+'').modal("hidden");
					}
			}
	});
	
});



  $(".deletarFila").on("click", function(e) {   
	 e.preventDefault();
	 			var url = window.location.origin + "/fila";
				var id = $(this).data("id");
       var atual = $(this).closest('.tasks');
				console.log("remover" + id);
        confirmExclusao({
            confirm: function() {		
							atual.remove();
                $.ajax({
                    url: url,
                    type: 'POST',
										dataType: "jsonp",
                    data: {
                        action: "removerFila",							
												idFila: id		
												
                    },error: function(resp) {
											console.log(resp)
										console.log("Não removeu!")
									},
									success: function(resp) {
										
										if(resp.result == 1){
											console.log(resp)
											 alerta ("center" , "success", "Fila removida com sucesso!" );
										} 
										document.location.reload(true);
								}							       
            });
        }		
 			});
    });

function confirmExclusao(data = {}) { 
    data = $.extend({}, {
            title: "Tem certeza?",
            content: "Você perderá os dados da fila, incluindo todas as tarefas vinculadas!",
            confirmText: "Apagar",
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



function edicaoTarefa(id){

        $("#idOportunidade").val("");
        $("#nomeTarefa").val("");
        $("#filaTarefa").val("");
        $("#dataTarefa").val("");
        $("#descricaoTarefa").val("");
        $("#clienteTarefa").val("");
        $("#corTarefa").val("");
        $("#idTarefa").val("");
        $("#tagTarefa").val("");
        $("#atividadeTarefa").val("");
        $("#valorTarefa").val("");
  
   $(".select2").select2({  dropdownParent: $("#modalTask")});	
       $.ajax({
              url: document.baseURI,
              type: "POST",
              dataType: "jsonp",
              data: {
                  action: "edicaoTarefa",
                  id:id,
              },
              error: function(resp) {
                 console.log(resp);  
                 console.log("deu erro");  
              },
              success: function(resp) {
                 console.log(resp);


                var $el = $("#responsavelTarefa").empty();
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

                if(resp.valor == null){
                   $("#valorTarefa").val("");
                 } else {
                   var valor = parseFloat(resp.valor);
                   $("#valorTarefa").val(valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }));
                 }
                
                $("#idOportunidade").val(resp.id);
                $("#nomeTarefa").val(resp.nome);
                $("#filaTarefa").val(resp.fila);
                $("#dataTarefa").val(resp.data_previsao);
                $("#descricaoTarefa").val(resp.descricao);
                $("#clienteTarefa").val(resp.cliente);
                $("#corTarefa").val(resp.cor);
                $("#idTarefa").val(resp.id);
                $("#tagTarefa").val(resp.tag);
                $("#atividadeTarefa").val(resp.atividade);
                $(".select2").select2({  dropdownParent: $("#modalTask")});	

              }
       });
}








function filtroUsuario(){
	 var opcao = $('#visibilidade').val();

	if(opcao == "3"){
    $('#userSelect').attr('hidden', false); 
    $('#userFunil').prop( "disabled", false );
		 } else {
			$('#userSelect').attr('hidden', true); 
      $('#userFunil').prop( "disabled", true );
		 }
}

$('.badge').hover(function () {
		console.log("entrou hover");
	var badge_inicial = $(this).find(".i_badge");
	 badge_inicial.attr("hidden", true); 
}, function () {
	var badge_inicial = $(this).find(".i_badge");
		badge_inicial.attr("hidden", false);
});


// $('.hoverOportunidade').hover(function (){
// 	 var field = $(this).find('.btn-add-task');
// 	 field.attr('hidden', false);
// }, function(){
// 	var field = $(this).find('.btn-add-task');
// 		field.attr('hidden', true);	
// });

$('.btnKanban').on("click", function (){
	var boardKanban = $(".boardKanban");
	var boardList = $(".boardLista");
	boardKanban.attr("hidden" , false);
	boardList.attr("hidden" , true);
	});

$('.btnLista').on("click", function (){
	var boardKanban = $(".boardKanban");
	var boardList = $(".boardLista");
	boardKanban.attr("hidden" , true);
	boardList.attr("hidden" , false);
	});

// $('.visualizacaoFila').on("change", function (){
// 	var visualizacao = $('.visualizacaoFila').val();
// 	var boardKanban = $(".boardKanban");
// 	var boardList = $(".boardLista");
// // 	console.log(boardKanban);
// // 	console.log(boardList);
			
// 	if (visualizacao == "1") {
// 		console.log("a1");
// 	boardKanban.attr("hidden" , false);
// 	boardList.attr("hidden" , true);
		
// 	} else if (visualizacao == "2") {
// 		console.log("a2");
// 	boardKanban.attr("hidden" , true);
// 	boardList.attr("hidden" , false);
// 	}
// });


// Adicionar Task
$(".addTarefa").on("click", function() {
	
	var div = "";
  
	var nomeTarefa = $(this).parent().parent().find(".nomeTarefa").val();
	var filaTarefa = $(this).parent().parent().find(".filaTarefa").val();
	var dataConclusao = $(this).parent().parent().find(".dataConclusao").val();
	var descricaoTarefa = $(this).parent().parent().find(".descricaoTarefa").val();
	var corTarefa = $(this).parent().parent().find(".corTarefa").val();
	var responsavelTarefa = $(this).parent().parent().find(".responsavelTarefa").val();
	var idTarefa = $(this).parent().find(".idTarefa").val();
	var cliente =   $("#clienteTarefa").val();
	var tag = $(this).parent().parent().find(".tag").val();
	var valorT = $(this).parent().parent().find(".valorTarefa").val();
	var valTarefa = valorT.replace(/\D+/g, '');
  var valorTarefa = parseFloat(valTarefa) / 100;

	$.ajax({
				url: document.baseURI,
				type: "POST",
				dataType: 'jsonp',
				data: {
						action: 'addTarefa',
						nomeTarefa: nomeTarefa,
						filaTarefa: filaTarefa,
						dataConclusao: dataConclusao,
						descricaoTarefa: descricaoTarefa,
						responsavelTarefa: responsavelTarefa,
						idTarefa: idTarefa,
						cliente: cliente,
						tag: tag,
						valorTarefa: valorTarefa,
				},
				error: function(resp) {
					 console.log("ERROR");
				},
				success: function(resp) {
					console.log("sucesso")
					console.log(filaTarefa);
					
					
					alerta("center", "success" , "Dados salvos com sucesso!")
					setTimeout(function(){   
					location.reload();
		},250);	

			}
	});
});


    function alerta (posicao , icon, texto ) {
       Swal.fire({
        position: posicao,
        icon: icon,
        title: texto,
        showConfirmButton: true,
        timer: false
      })
    }



$(".deletarTarefa").on("click", function(e) {
	e.preventDefault;
	 			var url = window.location.origin + "/processo";
				var id = $(this).data("id");
        var atual = $(this).closest('.task-list-items');
	
				console.log(atual);
				console.log(id);
        confirmExclusaoTarefa({
            confirm: function() {		
							atual.remove();
                $.ajax({
                    url: url,
                    type: 'POST',
										dataType: "jsonp",
                    data: {
                        action: "removerTarefa",							
												id: id,		
												
                    },error: function(resp) {
											console.log(resp)
											console.log("Não removeu!")
									},
										success: function(resp) {
											if(resp.result == 1){
												console.log(resp)
												 alerta ("center" , "success", "Tarefa removida com sucesso!" );
											} 
											//document.location.reload(true);
									}							       
            });
        }		
 			});
    });


function confirmExclusaoTarefa(data = {}) { 
    data = $.extend({}, {
            title: "Tem certeza?",
            content: "Você perderá os dados da tarefa permanentemente, incluindo todas as notas adicionadas!",
            confirmText: "Apagar",
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

function confirmOportunidade ($text, data = {}) { 
    data = $.extend({}, {
            title: "Tem certeza?",
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



$(".btnGanha").on("click", function(){
	
 var status = $(".btnGanha").data("value");
	console.log("status " + status);
	console.log(document.baseURI);
	confirmOportunidade("Deseja marcar essa oportunidade como ganha?",{
   confirm: function() {		
	$.ajax({
				url: document.baseURI,
				type: "POST",
				dataType: 'jsonp',
				data: {
						action: 'ganhaOportunidade',
						status: status,

				},
				error: function(resp) {
					 console.log("ERROR");
					console.log(resp);
					
				},
				success: function(resp) {
				console.log("certo");
				Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Oportunidade marcada como ganha!',
                showConfirmButton:  true,
                timer: 2000
              })
					setTimeout(function(){   
				},150);
					document.location.reload(true);	
			}
	});
	 }
	 });

});



$(".btnPerda").on("click", function(){

var motivo = $("#motivo").val();
var descricao = $("#descricao_perda").val();
var status = $(".po").data("value");
	
	console.log(motivo);
	console.log(descricao);
	console.log(status);
	confirmOportunidade("Deseja marcar essa oportunidade como perdida?",{
   confirm: function() {
	$.ajax({
				url: document.baseURI,
				type: "POST",
				dataType: 'jsonp',
				data: {
						action: 'perdaOportunidade',
						status: status,
					 	motivo: motivo,
						descricao: descricao,

					},
					error: function() {
						 console.log("ERROR");

					},
					success: function(resp) {
					console.log("certo");
					Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Oportunidade marcada como ganha!',
                showConfirmButton:  true,
                timer: 2000
              })
						setTimeout(function(){   
				},650);
					document.location.reload(true);	
				}
			});
			 }
			});
		});

$(".btnReativa").on("click", function(){

var status = $(".btnReativa").data("value");
	
	console.log(status);
	confirmOportunidade("Deseja reativar a oportunidade?",{
   confirm: function() {
	$.ajax({
				url: document.baseURI,
				type: "POST",
				dataType: 'jsonp',
				data: {
						action: 'reativaOportunidade',
						status: status,
					},
					error: function() {
						 console.log("ERROR");

					},
					success: function(resp) {
					console.log("certo");
					alerta("center", "success" , "Oportunidade reativada com sucesso!")
						setTimeout(function(){   
					},950);
					document.location.reload(true);	
				}
		});
	}
		});
	});



$(document).ready(function (e) {
	console.log("iniciou")
 $(".addArquivo").on('click',(function(e) {
  e.preventDefault();
	 	var url = document.baseURI;
	 
    var image_file = $('.selectedImage').attr('src'); // getting file
	  var idTarefa = $(this).parent().parent().find(".idTarefa").val();
	 	console.log("idtarefa:" + idTarefa);
    if(image_file != ''){ // check if image is selected
// 			console.log("image:" + image_file);

	  $.ajax({
	   url: url,
	   type: "POST",
	   data: {
			 file:image_file
		 },
	   success: function(data){
	    	console.log(data);
	    	if(data == 'error'){
	    		console.log('error');
	    	}else{
	    		$(".success_message").fadeIn(1000);
	    		$(".error_message").hide();	
	    	}
	    },
	    error: function(e){
	      console.log(e);
	    }          
	    });
    }else{
    	$(".error_message").fadeIn(1000);
    }

    }));
});

function changeImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.selectedImage').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function alerta (posicao , icon, texto ) {
   Swal.fire({
		position: posicao,
  	icon: icon,
  	title: texto,
		showConfirmButton: true,
		timer: false
	})
}




