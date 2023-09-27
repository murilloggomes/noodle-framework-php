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
				console.log("aqui");
				console.log(id);
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
										//document.location.reload(true);
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





$('.hoverOportunidade').hover(function (){
	 var field = $(this).find('.btn-add-task');
	 field.attr('hidden', false);
}, function(){
	var field = $(this).find('.btn-add-task');
		field.attr('hidden', true);	
});


$('.visualizacaoFila').on("change", function (){
	var visualizacao = $('.visualizacaoFila').val();
	var boardKanban = $(".boardKanban");
	var boardList = $(".boardLista");
// 	console.log(boardKanban);
// 	console.log(boardList);
			
	if (visualizacao == "1") {
		console.log("a1");
	boardKanban.attr("hidden" , false);
	boardList.attr("hidden" , true);
		
	} else if (visualizacao == "2") {
		console.log("a2");
	boardKanban.attr("hidden" , true);
	boardList.attr("hidden" , false);
	}
});

// Adicionar Task
$(".addTarefa").on("click", function(){
	
	var div = "";
	
	var nomeTarefa = $(this).parent().parent().find(".nomeTarefa").val();
	var filaTarefa = $(this).parent().parent().find(".filaTarefa").val();
	var dataConclusao = $(this).parent().parent().find(".dataConclusao").val();
	var descricaoTarefa = $(this).parent().parent().find(".descricaoTarefa").val();
	var corTarefa = $(this).parent().parent().find(".corTarefa").val();
	var responsavelTarefa = $(this).parent().parent().find(".responsavelTarefa").val();
	var idTarefa = $(this).parent().find(".idTarefa").val();
	
// 	console.log(nomeTarefa);
// 	console.log(filaTarefa);
// 	console.log(dataConclusao);
// 	console.log(descricaoTarefa);
// 	console.log(corTarefa);
// 	console.log(responsavelTarefa);
	console.log("dale" + idTarefa);
		
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
						corTarefa: corTarefa,
						responsavelTarefa: responsavelTarefa,
						idTarefa: idTarefa
				},
				error: function(resp) {
					 console.log("ERROR");
				},
				success: function(resp) {
					console.log("sucesso")
					console.log(filaTarefa);
					
					var url = window.origin;
					
					if(idTarefa == 0){
						div += "<div id class='task-list-items'>";
							div += "<div class='card mb-0'>";
								div += "<div class='card-body p-3'>";
									div += '<small class="float-end text-muted">" '+resp.task.responsavel+' "</small>'
									div += '<span class="badge" style="color:transparent;background-color:'+resp.task.cor+'">High</span>'

									div += '<h5 class="mt-2 mb-2"><a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">'+resp.task.nome+'</a></h5>';

									div +=  '<p class="mb-0">';
									div +=	'<span class="pe-2 text-nowrap mb-2 d-inline-block">';
									div +=	'<i class="mdi mdi-calendar-clock-outline text-muted"></i>'+resp.task.dataConclusao+'';
									div +=  '</span>';
// 									div +=	'<span class="text-nowrap mb-2 d-inline-block">';
// 									div +=	'<i class="mdi mdi-comment-multiple-outline text-muted"></i><b>74</b> Comments';
// 									div +=	'</span>';
									div +=	'</p>';

									div +=	'<div class="dropdown float-end">';
									div +=	'<a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">';
									div +=	'<i class="mdi mdi-dots-vertical font-18"></i>';
									div +=	'</a>';
									div +=	'<div class="dropdown-menu dropdown-menu-end">';
									div +=	'<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" id="editarTask" data-bs-target="#modalTaskEdit'+resp.task.id+'"><i class="mdi mdi-pencil me-1"></i>Editar</a>';
									div +=	'<a href="javascript:void(0);" class="dropdown-item deletarTarefa" data-id="'+resp.task.id+'"><i class="mdi mdi-delete me-1"></i>Remover tarefa</a>';
									div +=	'</div>';
									div +=	'</div>';

									div +=	'<p class="mb-0">'
									div +=	'<img src="'+ url +'/assets/images/usuarios/'+resp.task.idCriador+'.jpg" class="avatar-xs rounded-circle me-1" />';
									div +=	'<span class="align-middle">'+resp.task.criador+' </span>';
									div +=	'</p>';
					
								div += "</div>";
							div += "</div>";
						div += "</div>";
					$('#filaTask'+resp.task.fila+'').prepend(div);
					$("#modalTask").modal("hide");
					$("#modalArquivo").modal("hide");
					} else {
				  console.log("#corTask"+idTarefa);
					console.log("#nomeTask"+idTarefa);
				  console.log("#responsavelTask"+idTarefa);
					
					$("#corTask"+idTarefa).css("background-color" , resp.task.cor);
					$("#taskNome"+idTarefa).text(resp.task.nome);
					$("#responsavelTask"+idTarefa).text(resp.task.responsavel);
						
					$('#modalTaskEdit'+resp.task.id+'').modal("hide");
					$('#modalTaskArquivos'+resp.task.id+'').modal("hide");
					}
			}
	});
});


$(".deletarTarefa").on("click", function(e) {
	 e.preventDefault();
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
												id: id		
												
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


(".deletarFila").on("click", function(e) {   
	 e.preventDefault();
	 			var url = window.location.origin + "/fila";
				var id = $(this).data("id");
       var atual = $(this).closest('.tasks');
				console.log("aqui");
				console.log(id);
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
										//document.location.reload(true);
								}							       
            });
        }		
 			});
    });




