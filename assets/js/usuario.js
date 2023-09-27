$(".cpf_cnpj").mask("000.000.000-00", {
  onKeyPress: function(cpfcnpj, e, field, options) {
    const masks = ["000.000.000-000", "00.000.00000/000", "00.000.000/0000-00"];
    let mask = null;
    if (cpfcnpj.length <= 14) {
      mask = masks[0];
    } else if (cpfcnpj.length <= 15) {
      mask = masks[1];
    } else {
      mask = masks[2];
    }
    $(".cpf_cnpj").mask(mask, options);
  }
});


$(".telefone").mask("(00) 0.0000-0000", {
  onKeyPress: function(cpfcnpj, e, field, options) {
    const masks = ["(00) 0.0000-0000"];
    let mask = null;
   
      mask = masks[0];

    $(".telefone").mask(mask, options);
  }
});


 function senhaUsuario(){
   console.log("ebtriy");
$("#senhaUsuario").toggle();
$( "#bsenha" ).empty();
	$('<a href="javascript:void(0)" onclick="senhab()" style="float:right; font-size: 32px;margin-top: -2%;z-index: 999;">-</a>').appendTo("#bsenhaMenos");
   
   
   return false;
 }

 function senhab(){
   console.log("ebtriy");
$("#senhaUsuario").toggle();
$( "#bsenhaMenos" ).empty();
	$('<a href="javascript:void(0)" onclick="senhaUsuario()" style="float:right; font-size: 32px;margin-top: -2%;z-index: 999;">+</a>').appendTo("#bsenha");
   
   
   return false;
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


function confirmPermissao(data = {}) { 
	
    data = $.extend({}, {
            title: "Tem certeza?",
            content: "Você esta alterando as permissões do usuário",
            confirmText: "Confirmar",
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





$(".remover-user").on("click", function(){
var url =  document.baseURI;	
var tr = $(this).closest('tr');	
var type = $(this).data('type');
var id = $(this).data('id');
	
console.log(type + " " + id);
	
	confirmExclusaoUsuario({
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
var idForm = "";
function formV(id){
	idForm = id;
	console.log(idForm);
}

$(".submitPermissao").on("click", function(e){ 
		console.log(idForm);
  e.preventDefault();
		confirmPermissao({
		confirm: function() {
			
			$( "#form"+idForm ).submit();
			console.log("entrou confirm,ado");
			
	}})
console.log("entrou");

});



