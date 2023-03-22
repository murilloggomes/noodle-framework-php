       
         
         $(function () {
          var id_origem = "";
          var id_destino = "";
          var  id_clicado = "";
           
           
        $(".items").on('change').sortable({
          
							
          
                connectWith: ".items",
                start: function (event, ui) {
                  
              var id_principal = $(this).attr('id');
							var id_do_li = $('li').attr('id');
							var teste = ui.item.attr("id");
						//	console.log('Start  Id Pricipal = '+id_principal+' | Id do li = '+id_do_li+' | Id divi Final = '+teste);
							
							
                        ui.item.toggleClass("highlight"); 
                  
                  
                  
                  
					//console.log(ui.item);
                        ui.item.toggleClass("highlight");
                },
          
          
                stop: function (event, ui) {

							var id_principal = $(this).attr('id');
							var id_do_li = $('li').attr('id');
							var teste = ui.item.attr("id");
						//	console.log('Stop  Id Pricipal = '+id_principal+' | Id do li = '+id_do_li+' | Id divi Final = '+teste);
							
							
                        ui.item.toggleClass("highlight");
						
                },
            receive: function (event, ui) {
							
				 id_origem = ui.sender.attr("id"),
         id_destino = $(this).attr("id");
         id_clicado = ui.item.attr("id"),
       
							
        
							salvarDrag(id_origem,id_destino,id_clicado);
  
              
              
                        ui.item.toggleClass("highlight");
						
                }
        });
	
});


       
 function salvarDrag(id_origem,id_destino,id_clicado){
   
    if (id_clicado.includes("sem")) {
        return false;
    }
   
   
           $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "salvarDrag",
						  id_origem:id_origem,
              id_destino: id_destino,
				  		id_clicado:id_clicado,
			
          },
          error: function(resp) {
             
						console.log("deu erro");  
          },
          success: function(resp) {

            $( "#sem"+id_destino ).remove();
						$( "#sem"+id_origem ).remove();
						
						           $.ajax({
          url: document.baseURI,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "Filas",
						  id_origem:id_origem,
              id_destino: id_destino,
				  		id_clicado:id_clicado,
			
          },
          error: function(resp) {
         
						console.log("deu erro");  
          },
          success: function(resp) {

						   $( "#sem"+id_destino ).remove();
						$( "#sem"+id_origem ).remove();
					 if(resp.qtd == 0){
						 
						  $( '<li style="height:200px" id="sem'+ id_origem +'" class="list"></li>' ).appendTo( "#semTarefa"+ id_origem);
	
							
							}	

          }
      });


          }
      });
            
   
   
 }        
         

