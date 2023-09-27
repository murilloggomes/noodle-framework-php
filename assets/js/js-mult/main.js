$(function() {

	$('.js-multiple-select').select2({
		tags: true,
		tokenSeparators: [',', ' '],
		placeholder: 'Selecione um ou mais usuários'
	});

});

$("select").select2({
   theme: "bootstrap-5",
});

  $('#userSelect').attr('hidden', true); 
  $('#userFunil').prop( "disabled", true );
    
function porUsuario(){
	
	 console.log("entroudd");
	 var selectUser = document.getElementById("visibilidade");
   var visibilidade = selectUser.options[selectUser.selectedIndex].value;
	console.log(selectUser);
	console.log(visibilidade);
	 
	if(visibilidade == "3"){
    $('#userSelect').attr('hidden', false); 
    $('#userFunil').prop( "disabled", false );
		 } else {
			$('#userSelect').attr('hidden', true); 
      $('#userFunil').prop( "disabled", true );
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

