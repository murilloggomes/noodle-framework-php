$(function() {		
	$(".select2").select2({});
});

	$("#VoltarSessao").on("click", function(e){
		e.preventDefault();
		
		let cookie = {};		
		
		document.cookie.split(';').forEach(function(el) {
				let [k,v] = el.split('=');
				cookie[k.trim()] = v;
		});
		
		var sessaoAntiga = cookie.nplhA;
		
			$.ajax({
				url: window.location.origin + "/sessao",
				type: "POST",
				dataType: 'jsonp',
				data: {
						action: 'reloginAdm',
						sessaoAntiga: sessaoAntiga,
				},
				error: function() {
					 console.log("ERROR");
				},
				success: function(resp) {
						 setTimeout(function(){ location.reload(true); }, 1000);			
				}
			});
		});

	$(".login-usuario").on("click", function(e){
		e.preventDefault();
		
		let cookie = {};		
		let id = $(this).data('id');
		document.cookie.split(';').forEach(function(el) {
				let [k,v] = el.split('=');
				cookie[k.trim()] = v;
		});
		
		var sessaoAntiga = cookie.nplh;
		console.log(id);
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
	});

$(".view-data").on("click", function(){
	var modal = $(this).data('id');
	console.log(modal);
	$(modal).modal('open');
	$(".select2").select2({});
});

$(".navbar-toggler").on("click", function(){
	if ($(this).data("value") == 1){
		$(".sidenav").attr('style', 'width: 70px');
		$(this).data("value", 0); 		
	} else {
		$(".sidenav").attr('style', 'width: 260px');
		$(this).data("value", 1);	
	}		
});	

$(".sidenav-main").hover(function(){
	if ($(".navbar-toggler").data("value") == 0){	
		$(".sidenav").attr('style', 'width: 260px');	
	}		
});

$(".sidenav-main").mouseleave(function(){
	if ($(".navbar-toggler").data("value") == 0){	
		$(".sidenav").attr('style', 'width: 70px');	
	}		
});

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

// //format taxa/porcento
// function formatPer(fieldText) {
// 	if (fieldText.value.length <= 3) {
// 		fieldText.value = maskPer(fieldText.value);
// 	}	else {
// 		alert("Não utilize caracteres especiais");
// 	}	
// }

// function maskPer(valor) {
// 	return valor.replace(/(\d{1})(\d{2})/g,"\$1.\$2%");
// }

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
}

$(".precoBRL").on("blur", function(){
 var valor = parseInt($(this).val());
 valor = valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }); 
 $(this).val(valor);
});


/*================================================================================
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

$(".remover-dados").on("click", function(){
var url =  document.baseURI;	
var tr = $(this).closest('tr');	
var type = $(this).data('type');
var id = $(this).data('id');
	
console.log(type + " " + id);
	
	confirmExclusao({
		confirm: function() {
		$.ajax({
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: {
					action: "remover",
					id: id,
					type: type,
			}
		});							
							 								
	tr.fadeOut(400, function() {
			tr.remove();						
	});
			
	 setTimeout(function() {
				M.toast({
					html: "Excluído com sucesso!",
					classes: 'success-toast'
				})
			}, 200)
	}})						
});



// $(".edit-dados").on("click", function(){
	
// $.confirm({
//     title: 'Confirm!',
//     content: 'Simple confirm!',
//     buttons: {
//         confirm: function () {
//             $.alert('Confirmed!');
//         },
//         cancel: function () {
//             $.alert('Canceled!');
//         },
//         somethingElse: {
//             text: 'Something else',
//             btnClass: 'btn-blue',
//             keys: ['enter', 'shift'],
//             action: function(){
//                 $.alert('Something else?');
//             }
//         }
//     }
// 	});					
// });

// $(".add-campo").on("click", function(){
// 	$("#add-campo").hide();	
// 	$("#select-campos").show();				
// });

// $("#valor-campo").on("change", function(){
// 	var id = $(this).find('option:selected').val();
// 	var nome = $(this).find('option:selected').text();
// 	var url = document.baseURI;
	
// 	$.ajax({
//           url: url,
//           type: "POST",
//           dataType: "jsonp",
//           data: {
//               action: "adicionarCampo",
//               id: id             
//           },
//           error: function() {
//               console.log("ERRO");
//           },
//           success: function(resp) {  
						
// 					var lugarAdicao = $('#add-campo');
// 					var CampoCustomizado = '';
						
// 					CampoCustomizado += '<div class="input-field col s12 m6">';
// 					CampoCustomizado += '<i class="material-icons prefix">' + resp.icon + '</i>';
// 					CampoCustomizado += '<input data-id="' + resp.idCampo + '" value="" id="' + resp.identidadeCampo + '" name="' + resp.identidadeCampo +'" placeholder="Meta de ' + nome + '" type="' + resp.tipo + '" class="validate campoPersonalizado campoIndicador">';					
// 					CampoCustomizado += '</div>';	
						
// 					lugarAdicao.before(CampoCustomizado);	
						
// 					$("#select-campos").hide();	
//           $("#add-campo").show();
// 				}
//       });
// });	