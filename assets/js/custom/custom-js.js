$(function() {		
	
	var table;
	
	$(document).ready(function(){		
		table =	dadosTabela();
	});
	
// 	table.on('keyup', function () {
//     table.search(this.value).draw();
// 	});
});


function dadosTabela(){	
		$('#notif').DataTable( {		
			 	processing: true,
        serverSide: true,	
				paging: true,				
				pagingType: 'numbers',
				pageLength: 10,
				searching: true,
				ordering: false,
				language: {
 					url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json'
				},
						
				ajax: {
					url: window.origin + "/notificacao/peep",	
					type: 'POST',		
					data: {
						action: 'otimizar'
					}
				},			
				deferRender: true,
		});		
}

function confirmExclusaoUsuario(data = {}) { 
    data = $.extend({}, {
            title: "Tem certeza?",
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





$(".configTema").on("change", function(){
	
	var valoresCampos = [];
	
	setTimeout(function(){ 
		$(".configTema").each(function() {
			var coluna = $(this).data("target");
			var valor = $(this).val();

			if ($(this).is(':checked')){
			
				var c = {};             
				c.valor = valor;			
				c.coluna = coluna;
				
				valoresCampos.push(c);				
			}
		});
		
		$.ajax({
			url: window.origin + "/config/tema",
			type: "POST",
			dataType: "jsonp",
			data: {
				action: "salvarConfigTema",      
				valores: valoresCampos,	
			},
			error: function(resp) {   
				console.log(resp);
			},
			success: function(resp) {		
				console.log(resp);
			}
		});
	}, 300);

});







	setTimeout(function() {
 
	
		$("#notificacaoDiv").empty();
		$.ajax({
			url: window.origin + "/notificacao/peep",
			type: "POST",
			dataType: "jsonp",
			data: {
				action: "Notificacao",      
				
			},
			error: function(resp) {   
				console.log(resp);
			},
			success: function(resp) {		
			console.log(resp);
			 var div = "";
			 var divM = "";
       var url = window.origin;
			if(resp.qtd != 0 ){
			$("#iconL").append('<span class="noti-icon-badge"></span>');
			} else if( resp.quantidade == 0){
				$("#notificacaoDiv").append('<center>Sem notificação no momento!</center>');
			  $("#limp").empty();
			  $("#verT").empty()
			}
				

      $.each(resp.arrayN, function (index, value) {
			 var pintaNotificacao = "";
				console.log(value.statusUN);
      if(value.statusUN === 1){
				 pintaNotificacao += 'unread-noti';
				 }
				
				div += '<div id="totalN'+ value.id +'">';
				div += '<a href="javascript:void(0)" onclick="limpUnicNot('+ value.id  +')" ><span class="float-end noti-close-btn text-muted"><i id="'+ value.id +'" class="mdi mdi-close"></i></span></a>';
				div += '<h5 class="text-muted font-13 fw-normal mt-0">'+ value.quando +'</h5>';
				div += '<a  onclick="visualizaNotificacao('+ value.id  +')" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#not'+ value.id +'" class="dropdown-item p-0 notify-item card '+ pintaNotificacao +' shadow-none mb-2">';
				div += '<div class="card-body">';
				div += '<div class="d-flex align-items-center">';
				div += '<div class="flex-shrink-0">';
				div += '<div class="notify-icon bg-primary">';
				div += '<img src="' + url + '/assets/images/usuarios/'+ value.usuario +'.jpg"" alt="user-image" class="rounded-circle" width="36px" height="36px">';
				div += '</div>';
				div += '</div>';
				div += '<div class="flex-grow-1 text-truncate ms-2">';
				div += '<h5 class="noti-item-title fw-semibold font-14">'+ value.nome +'<small class="fw-normal text-muted ms-1">'+ value.data +'</small></h5>';
				div += '<small class="noti-item-subtitle text-muted">'+ value.descricao +'</small>';
				div += '</div>';
				div += '</div>';
				div += '</div>';
				div += '</a>';
				div += '</div>';
	   delete pintaNotificacao;

      });
				
		      $.each(resp.arrayM, function (index, value) {
			  divM += '<div class="modal fade" data-bs-backdrop="static" id="not'+ value.id +'" aria-labelledby="exampleModalLabel" aria-hidden="true">';
				divM += '<div class="modal-dialog modal-sm">';
				divM += '<div class="modal-content">';
				divM += '<div class="modal-header">';
				divM += '<h5 class="modal-title" id="exampleModalLabel">'+ value.nome +' - '+ value.data  +'</h5>';
				divM += '<button onclick="AtualizaNotificacao()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
				divM += '</div>';
				divM += '<div class="modal-body">';
			  divM += '<div class="row">';
				divM += '<div class="col col-sm-12 col-md-12 col-lg-12 text-break">';
				divM +=  value.descricao ;
				divM += '</div>';
				divM += '</div>';
				divM += '</div>';
				divM += '</div>';
				divM += '</div>';
				divM += '</div>';

      });
		




        $("#notificacaoDiv").append(div);
				$(".container-fluid").append(divM);
	
				
				
				
			}
		});
	
	
		}, 2500)


function visualizaNotificacao(id) {
	console.log(id);
	
			$.ajax({
			url: window.origin + "/notificacao/peep",
			type: "POST",
			dataType: "jsonp",
			data: {
				action: "visualizaNotificacao",      
				idN:id
			},
			error: function(resp) {   
				console.log(resp);
			},
			success: function(resp) {		
			$("#iconL").empty();
			
				
				
				
				
			}
		});
	
}

$("#notif").on('click', '.exclui', function() {
var tt =   $(this).closest('tr');
	tt.remove();
});

function limpUnicNot(id){
	
		confirmExclusaoUsuario({
		confirm: function() {
	
	   $("#totalN"+id).empty();
			$.ajax({
			url: window.origin + "/notificacao/peep",
			type: "POST",
			dataType: "jsonp",
			data: {
				action: "removeNotificacao",  
				id:id
				
			},
			error: function(resp) {   
				console.log(resp);
			},
			success: function(resp) {		
				console.log(resp);
       
		
				
			}
		});	
}})	
	
}


function AtualizaNotificacao(){
console.log("entrou");
			$("#notificacaoDiv").empty();

	
		$.ajax({
			url: window.origin + "/notificacao/peep",
			type: "POST",
			dataType: "jsonp",
			data: {
				action: "Notificacao",      
				
			},
			error: function(resp) {   
				console.log(resp);
			},
			success: function(resp) {		
			console.log(resp);
			 var div = "";
			 var divM = "";
       var url = window.origin;
			if(resp.qtd != 0 ){
			$("#iconL").append('<span class="noti-icon-badge"></span>');
			} else if( resp.quantidade == 0){
				$("#notificacaoDiv").append('<center>Sem notificação no momento!</center>');
			  $("#limp").empty();
			  $("#verT").empty()
			}
				

      $.each(resp.arrayN, function (index, value) {
			 var pintaNotificacao = "";
				console.log(value.statusUN);
      if(value.statusUN === 1){
				 pintaNotificacao += 'unread-noti';
				 }
				
				div += '<div id="totalN'+ value.id +'">';
				div += '<a href="javascript:void(0)" onclick="limpUnicNot('+ value.id  +')" ><span class="float-end noti-close-btn text-muted"><i id="'+ value.id +'" class="mdi mdi-close"></i></span></a>';
				div += '<h5 class="text-muted font-13 fw-normal mt-0">'+ value.quando +'</h5>';
				div += '<a  onclick="visualizaNotificacao('+ value.id  +')" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#not'+ value.id +'" class="dropdown-item p-0 notify-item card '+ pintaNotificacao +' shadow-none mb-2">';
				div += '<div class="card-body">';
				div += '<div class="d-flex align-items-center">';
				div += '<div class="flex-shrink-0">';
				div += '<div class="notify-icon bg-primary">';
				div += '<img src="' + url + '/assets/images/usuarios/'+ value.usuario +'.jpg"" alt="user-image" class="rounded-circle" width="36px" height="36px">';
				div += '</div>';
				div += '</div>';
				div += '<div class="flex-grow-1 text-truncate ms-2">';
				div += '<h5 class="noti-item-title fw-semibold font-14">'+ value.nome +'<small class="fw-normal text-muted ms-1">'+ value.data +'</small></h5>';
				div += '<small class="noti-item-subtitle text-muted">'+ value.descricao +'</small>';
				div += '</div>';
				div += '</div>';
				div += '</div>';
				div += '</a>';
				div += '</div>';
	   delete pintaNotificacao;

      });
				
		      $.each(resp.arrayM, function (index, value) {
			  divM += '<div class="modal fade" data-bs-backdrop="static" id="not'+ value.id +'" aria-labelledby="exampleModalLabel" aria-hidden="true">';
				divM += '<div class="modal-dialog modal-sm">';
				divM += '<div class="modal-content">';
				divM += '<div class="modal-header">';
				divM += '<h5 class="modal-title" id="exampleModalLabel">'+ value.nome +' - '+ value.data  +'</h5>';
				divM += '<button onclick="AtualizaNotificacao()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
				divM += '</div>';
				divM += '<div class="modal-body">';
			  divM += '<div class="row">';
				divM += '<div class="col col-sm-12 col-md-12 col-lg-12 text-break">';
				divM +=  value.descricao ;
				divM += '</div>';
				divM += '</div>';
				divM += '</div>';
				divM += '</div>';
				divM += '</div>';
				divM += '</div>';

      });
		
        $("#notificacaoDiv").append(div);
				$(".container-fluid").append(divM);
	
			}
		});
	
	
}

// $(".project_estruture").hover(function() {
// 	console.log("passo1")
//     $('.imgCriador').show(); //hover in
// }, function() {
// 	console.log("passo2")
//     $('.imgCriador').hide(); //hover out
// });







