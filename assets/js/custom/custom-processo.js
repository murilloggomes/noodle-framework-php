
$(".processoForm").on("click", function(){
	
	var div = "";
	
	var id = $(this).parent().parent().find(".inputId").val();
	var nome = $(this).parent().parent().find(".nomeProcesso").val();
	var unidadeNegocio = $(this).parent().parent().find(".unidadeProcesso").val();
	var equipe = $(this).parent().parent().find(".equipeProcesso").val();
	var descricao = $(this).parent().parent().find(".descricaoProcesso").val();
	var cor = $(this).parent().parent().find(".corProcesso").val();
	var responsavel = $(this).parent().parent().find(".responsavelProcesso").val();
	
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
						cor: cor
				},
				error: function(resp) {
					 console.log("ERRO");
				},
				success: function(resp) {
					console.log("entrou certo");
					
					var url = window.origin;	
					console.log(resp.processos.idCriador);
					
					if(id == 0){
					div += '<div class="col col-sm-12 col-md-12 col-lg-4 mb-3">';
					 div += '<div class="card mb-0">';
					  div += '<div class="card-body p-3">';
						 div += '<span class="badge" style="background-color:'+ resp.processos.cor +'; width:10%;display: list-item"></span>';
							div += '<h5 class="mt-2 mb-2">';
							div += '<a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body">'+ resp.processos.nome +'</a>';
							div += '</h5>';
							
							div += '<p class="mb-0">'
								div += '<span class="pe-2 text-nowrap mb-2 d-inline-block">';
									div += '<i class="mdi mdi-briefcase-outline text-muted"></i> '+ resp.processos.equipe +'  ';	
								div += '</span>';
								div += '<span class="pe-2 text-nowrap mb-2 d-inline-block">';
								 div += '<i class="mdi mdi-comment-multiple-outline text-muted"></i>   ';
								 div += '<b>74</b> Pessoas Cadastradas';
								div += '</span>';
							div += '</p>'
					
						div += '<div class="dropdown float-end">'
								div += '<a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">';
									div += '<i class="mdi mdi-dots-vertical font-18"></i>';	
								div += '</a>';
								div += '<div class="dropdown-menu dropdown-menu-end">';
									div += '<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>';
									div += '<a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>';
								div +=	'</div>';
						div +=	'</div>';
					
						div += '<p class="mb-0">'
							div += '<img src="'+ url +'/assets/images/usuarios/'+resp.processos.idResponsavel+'.jpg" alt="user-img" class="avatar-xs rounded-circle me-1" />';
							div += '<span class="align-middle"><b>Responsável: </b> '+ resp.processos.responsavel +' </span>';
						div += '</p>';
					
						div += '</div>';
						div += '</div>';
						div += '</div>';
					
					$("#processoModal").modal("toggle");
					$("#processosArea").prepend(div);
							
				} else {
					$("#tituloProcesso"+id).text(resp.processos.nome);
					$("#equipeProcesso"+id).text(resp.processos.equipe);
					$("#nomeResponsavel"+id).text(resp.processos.responsavel);
					$("#fotoResponsavel"+id).attr("src", url+'/assets/images/usuarios/'+resp.processos.idResponsavel+'.jpg');
					$("#corProcesso"+id).css("background-color" , resp.processos.cor);
					$('#processoModalEdit'+resp.processos.id+'').modal("toggle");
				}	
			}
	});
});

 $(".deletarProcesso").on("click", function(e) {   
	 e.preventDefault();
	 			var url = window.location.origin + "/processos";
				var id = $(this).data("id");
       var atual = $(this).closest('.card_processos');
				console.log(id);
        confirmExclusao({
            confirm: function() {		
							atual.remove();
                $.ajax({
                    url: url,
                    type: 'POST',
										dataType: "jsonp",
                    data: {
                        action: "removerProcesso",							
												idDelete: id		
												
                    },error: function() {
										console.log("Não removeu!")
									},
									success: function(resp) {
										
										if(resp.result == 1){
											 alerta ("center" , "success", "Processo removido com sucesso!" );
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
            content: "Você perderá os dados do processo",
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


