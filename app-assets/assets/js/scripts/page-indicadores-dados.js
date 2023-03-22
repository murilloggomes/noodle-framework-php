$(document).ready(function () {
  
  $("#salvarDadosUsuario").on("click", function(e){
     $(this).unbind(e); 
  });

  $("#botaoIndicador").on("click", function() {
    //console.log($(this).attr("data-value"));
    if ($(this).attr("data-value") == 0){
      $("#infoIndicador").show();
      $("#infoUsuario").hide();
      $("#tableUsuario").hide();
      $("#cardIndicador").addClass("grey-js-insertion");
      $("#cardUsuario").removeClass("grey-js-insertion");     
      $(this).attr("data-value", 1);
    } else {   
      $("#infoIndicador").hide();
      $("#tableIndicador").hide();
      $("#cardIndicador").removeClass("grey-js-insertion");
      $(this).attr("data-value", 0);
    }  
  });

  $("#botaoUsuario").on("click", function() {
    //console.log($(this).attr("data-value"));
    if ($(this).attr("data-value") == 0){
      $("#infoIndicador").hide();
      $("#tableIndicador").hide();
      $("#cardUsuario").addClass("grey-js-insertion");
      $("#cardIndicador").removeClass("grey-js-insertion");
      $("#infoUsuario").show();
      $(this).attr("data-value", 1);
    } else {
      $("#infoUsuario").hide();  
      $("#cardUsuario").removeClass("grey-js-insertion");
      $(this).attr("data-value", 0);
    }  
  });
  
  $(".selectIndicador").on("change", function() {
    $("#registro-indicador-list-datatable tbody tr").remove();
    
    var NomeIndicador = $(".selectIndicador").find("option:selected").text();
    var IdIndicador = $(".selectIndicador").find("option:selected").val();
    console.log(IdIndicador);
    $("#nomeIndicadorTabela").text(NomeIndicador);
    
    $.ajax({
              url: document.baseURI,
              type: "POST",
              dataType: "jsonp",
              data: {
                  action: "selectIndicador",
                  id: IdIndicador
              },

              error: function(resp) {
                  console.log(resp);
              },
              success: function(resp) {
                  console.log(resp);
                  
                  $.each(resp.registros, function(index, value) {
                      //Verificar se pode já adicionar Produtos	
                      var newRow = $("<tr>");	    
                      var cols = "";	
                      var url = document.baseURI;	

                      cols += '<td></td>';
                      cols += '<td>'+value.id+'</td>';
                      cols += '<td>'+value.editor+'</td>';
                      cols += '<td>'+value.edicao+'</td>';
                      cols += '<td>'+value.mes+'</td>';	
                      cols += '<td>'+value.quantidade+'</td>';
                      cols += '<td>';	
                      cols += '<a href="#" class="tooltipped" data-position="left" data-tooltip="Editar">';		
                      cols += '<i class="material-icons">edit</i></a>';	
                      cols += '<a href="javascript:void(0)" data-id="' + value.id + '" class="tooltipped remover-dados red-text" data-type="DesempenhoIndicador" data-position="right" data-tooltip="Remover">';	
                      cols += '<i class="material-icons">clear</i></a>';
                      cols += '</td>';
                    
                      newRow.append(cols);
                    
                      $("#registro-indicador-list-datatable tbody").append(newRow);
                    
                      $("#registro-indicador-list-datatable").dataTable();

                      
                  });
                
                  var modal = "";
                
                  modal += '<center><h4>Cadastro do Indicador: ' + NomeIndicador + '</h4></center>';
                  modal += '<input name="idIndicador" value="' + IdIndicador + '" type="hidden">';
                  modal += '<div class="row">';
                     modal += '<div class="input-field col s12 m12">';
                      modal += ' <textarea id="dadosIndicador" name="dadosIndicador" class="materialize-textarea"></textarea>';                 
                     modal += '</div>';
                  modal += '</div>';
               
                  $("#modalIndicadorContent").append(modal);                  

                  $("#tableIndicador").show();
              }
         });
  });
  
    $(".selectUsuario").on("change", function() {
    $("#registro-usuario-list-datatable tbody tr").remove();    
    
    var NomeUsuario = $(".selectUsuario").find("option:selected").text();
    var idUsuario = $(".selectUsuario").find("option:selected").val();
    console.log(idUsuario);
    $("#nomeUsuarioTabela").text(NomeUsuario);
    
    $.ajax({
              url: document.baseURI,
              type: "POST",
              dataType: "jsonp",
              data: {
                  action: "selectUsuario",
                  id: idUsuario
              },

              error: function(resp) {
                  console.log("Erro");
              },
              success: function(resp) {
                  console.log(resp);
                  
                  $.each(resp.registros, function(index, value) {
                      //Verificar se pode já adicionar Produtos	
                      var newRow = $("<tr>");	    
                      var cols = "";	
                      var url = document.baseURI;	
                        
                      cols += '<td></td>';
                      cols += '<td>'+value.id+'</td>';
                      cols += '<td>'+value.editor+'</td>';
                      cols += '<td>'+value.edicao+'</td>';
                      cols += '<td>'+value.mes+'</td>';	
                      cols += '<td>'+value.quantidade+'</td>';
                      cols += '<td>';	
                      cols += '<a href="#" class="tooltipped" data-position="left" data-tooltip="Editar">';		
                      cols += '<i class="material-icons">edit</i></a>';	
                      cols += '<a href="javascript:void(0)" data-id="' + value.id + '" class="tooltipped remover-dados red-text" data-type="DesempenhoUsuario" data-position="right" data-tooltip="Remover">';	
                      cols += '<i class="material-icons">clear</i></a>';
                      cols += '</td>';
                    
                      newRow.append(cols);
                    
                      $("#registro-usuario-list-datatable tbody").append(newRow);
                    
                      $("#registro-usuario-list-datatable").dataTable();
                      
                  });
                
                  var modal = "";
                
                  modal += '<center><h4>Cadastro do Usuario: ' + NomeUsuario + '</h4></center>';
                  modal += '<input name="idUsuario" value="' + idUsuario + '" type="hidden">';
                  modal += '<div class="row">';
                     modal += '<div class="input-field col s12 m12">';
                      modal += ' <textarea id="dadosUsuario" name="dadosUsuario" class="materialize-textarea"></textarea>';                 
                     modal += '</div>';
                  modal += '</div>';
               
                  $("#modalUsuarioContent").append(modal);    

                  $("#tableUsuario").show();
              }
         });
  });
  
  $(".selectUsuario").on("change", function() {    
    $(".divUsuario").show();       
    $("#usuarioNome").text("Indicador: " + $(".selectUsuario").find("option:selected").text());    
  });
  
});
