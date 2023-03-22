

var NextPost = {};

$(function() {	
    NextPost.General();
    NextPost.Skeleton();
    NextPost.ContextMenu();
    NextPost.Tooltip();
    NextPost.Tabs();
    NextPost.Forms();
    NextPost.FileManager();
    NextPost.LoadMore();
    NextPost.Popups();    
    NextPost.Brand();
    NextPost.RemoveListItem();
    NextPost.AsideList();
		NextPost.Enter();
	
		$(".notificacao").on("click", function(){
			if ($(".model-notificacao").val() == 0){
				$(".mensagem").show();
				$(".model-notificacao").val(1);
			} else {
				$(".mensagem").hide();
        $(".mensagens").hide();
				$(".model-notificacao").val(0);
			}			
		});
	
	
	$(document).ready(function() {
			setTimeout(function() {
			 $("#div_fases").attr('hidden', true);
	 $("#fases").attr('disabled', true); 
					 }, 1000)	
		$("#div_tensao").attr('hidden', true);
		var fabricanteInversor = $("#fabricanteInversor").val();
		var tensao = $("#tensao").val();
		
	if (tensao <= 2 ){
	 $("#div_fases").attr('hidden', false);
   $("#fases").attr('disabled', false); 
  } else if(tensao > 2){
	 $("#div_fases").attr('hidden', true);
	 $("#fases").attr('disabled', true); 
  }
		
		if (fabricanteInversor == "ENPHASE"){
	 console.log("enp");
   $("#div_tensao").attr('hidden', false);
   $("#div_consumo").attr('hidden', false);
	 $("#div_cc").attr('hidden', false);
   $("#div_fCabo").attr('hidden', true);
   $("#fabricanteCabo").attr('disabled', true);
				setTimeout(function() {
	        $(".select2").select2({});
					 }, 1000)	

} else if(fabricanteInversor != "ENPHASE"){
   $("#div_tensao").attr('hidden', true);
   $("#div_consumo").attr('hidden', true);
	 $("#div_cc").attr('hidden', true);
	// $("#div_fases").attr('hidden', true); 
   $("#div_fCabo").attr('hidden', false);
   $("#fabricanteCabo").attr('disabled', false);
		setTimeout(function() {
     	$(".select2").select2({});
					 }, 1000)	
}

	});

	
$("#fabricanteInversor").on("change", function(){	
	 $("#div_fases").attr('hidden', true);
	 $("#fases").attr('disabled', true); 
 if ($(this).val() == "ENPHASE"){
	
   $("#div_tensao").attr('hidden', false);
   $("#div_consumo").attr('hidden', false);
	  $("#div_cc").attr('hidden', false);
 $("#div_fCabo").attr('hidden', true);
 $("#fabricanteCabo").attr('disabled', true);

} else if($(this).val() != "ENPHASE"){
   $("#div_tensao").attr('hidden', true);
   $("#div_consumo").attr('hidden', true);
	 $("#div_cc").attr('hidden', true);
//	 $("#div_fases").attr('hidden', true); 
 $("#div_fCabo").attr('hidden', false);
 $("#fabricanteCabo").attr('disabled', false);
console.log("nao enp");	

}
	setTimeout(function() {
	$(".select2").select2({});
					 }, 1000)	
});
	
$("#tensao").on("change", function(){	
 if ($(this).val() <= 2 ){
	 $("#div_fases").attr('hidden', false);
   $("#fases").attr('disabled', false); 
} else if($(this).val() > 2){
	 $("#div_fases").attr('hidden', true);
	 $("#fases").attr('disabled', true); 
}
	setTimeout(function() {
	$(".select2").select2({});
					 }, 800)	
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
});

function mascaraMoeda(event) {
  const onlyDigits = event.target.value
    .split("")
    .filter(s => /\d/.test(s))
    .join("")
    .padStart(3, "0")
  const digitsFloat = onlyDigits.slice(0, -2) + "." + onlyDigits.slice(-2)
  event.target.value = maskCurrency(digitsFloat)
}

function maskCurrency(valor, locale = 'pt-BR', currency = 'BRL') {
  return new Intl.NumberFormat(locale, {
    style: 'currency',
    currency
  }).format(valor)
}

function sweet(posicao,icon,texto,botao,time){
Swal.fire({
  position: posicao,
  icon: icon,
  title: texto,
  showConfirmButton: botao,
  timer: time
})
	
}

function removeRascunho(){
	      var idRascunho = $('#idDelete').attr('data-id');
				 var url =  window.location.origin + "/rascunho/" + idRascunho;
							$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "removeRascunho",
							idRascunho: idRascunho,
          
          },
          error: function() {
            sweet('center','error','Erro ao excluir!',true,10000);
          },
          success: function(resp) {	
						sweet('top-end','success','Rascunho excluido com sucesso!',false,2000);
						setTimeout(function(){
						var url_atual = window.location.origin;
						window.location.replace(url_atual + "/order");
					},2500);
						
          }			
      });
}

function autosave(){
	//	console.log($(".producerInversor").val());

	
  var urlSave = document.baseURI;
	
  var idNew = urlSave.split("/").pop();
  var Rascunho = urlSave.includes("rascunho");

			var description = $(".description").val();
    	var descriptionP = $(".descriptionP").val();
				      var products = [];				
		
			// Ler Cada Linha de Produto
      $(".selectProduct").each(function() {
          var id = $(this).val();	
					var name = $(this).find('option:selected').text();				
					
					if (id == "0"){
						return true;
					}
					var p = {};             
							p.id = id;
							p.product = name; 
              p.quantidade = $(this).parent().parent().find('td:nth-child(3)').find('input').val();
							p.price = $(this).parent().parent().find('td:nth-child(4)').find('input').val();						
							p.priceTotal = $(this).parent().parent().find('td:nth-child(5)').find('input').val();
							p.margemLucroP = $(this).parent().parent().find('td:nth-child(6)').find('input').val();
          		
          products.push(p);
      });
	 if(Rascunho != true){
		var id = $("#idOC").val();	
			}
		//		console.log(idNew);
		var url = document.baseURI;	
if(idNew == "new" || Rascunho == true){
	
		 $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "saveRascunho",
							renew: 1,
             	status: $(".status").val(),
						  id: id,
              santri: $(".santri_id").val(),
							client: $(".selectCliente").val(),
							useConsume: $(".use-consume").val(),
							typeClient: $(".type-client").val(),
							valorFrete: $(".valorFrete").val(),
							ufClient: $(".inputUF").val(),
							margemLucro: $(".margemLucro").val(),
						  kwpReal: $(".kwpReal").val(),
						  comissao: $(".comissao").val(),
						  comissaoActive: $(".comissaoActive").val(),
							seller: $(".seller").find('option:selected').data("id"),
							typeOrder: $(".type-order").val(),
							totalUnitField: $(".totalUnitField").val(),
							description: description,		
					  	descriptionP: descriptionP,		
							totalTotalField: $(".totalTotalField").val(),
							modelType: $(".model-select").val(),
							producerKit: $(".producerKit").val(),
							desconto: $(".desconto").val(),
							producerInversor: $(".producerInversor").val(),
					  	producerCabo: $(".producerCabo").val(),
							power: $(".power").val(),
							branch: $(".uf-branch").val(),
							frete: $(".frete").val(),							
							ufFrete: $(".ufFrete").val(),
							paymentMode: $(".paymentMode").val(),
							products: products,
						  tensao: $("#tensao").val(),
					  	medir_cc: $("#medir_cc").val(),
					    medir: $("#medir").val(),
						  fases: $("#fases").val(),


          },
          error: function(resp) {
              console.log(resp);
          },
          success: function(resp) {
						console.log(resp);
						var id = resp.id;
						$( ".idoc" ).empty();
						$( '<input type="hidden" value="'+ id +'" name="idOC" id="idOC" ></input>' ).appendTo( ".idoc" );
          }
      });
    }
}

function cabo(qnt = null){
  var url = document.baseURI;		
	var selectFabricante = document.getElementById('fabricanteCabo');
	var marca =  selectFabricante.value;
  if(qnt == null){
		var qntPainel = 0;
		$("#orderTable tr").each(function() {	
			if ($(this).data('type') == "Painel"){					
				qntPainel = $(this).find('td:nth-child(3)').find('input').val();					
			} 
		});
		 }else{
			 qntPainel = qnt;
			 
		 }
				var id = $("#Cabo").val();
console.log(qntPainel);
	console.log(marca);	
	
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectCabo",
						painel: qntPainel,
						id: marca											
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {
				console.log("removeu cabo:");
				console.log(resp);
			//valorTotal();	
			$('#CaboPositivo').children('option').remove();
			$('#CaboNegativo').children('option').remove();	
				
			$('#CaboPositivo').append($("<option></option>").attr("value", "").text("Cabo Positivo"));
			$('#CaboNegativo').append($("<option></option>").attr("value", "").text("Cabo Negativo"));
				
			$.each(resp.productsCaboPositivo, function(index, value) {
				$('#CaboPositivo').append($("<option></option>").attr("value", value.id).text(value.name));				
			});
				
			$.each(resp.productsCaboNegativo, function(index, value) {
				$('#CaboNegativo').append($("<option></option>").attr("value", value.id).text(value.name));				
			});	
				
			}
		});
	return false;
	
}

NextPost.Enter = function () {
   $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });
}

/**
 * General
 */
NextPost.General = function() {
    // Mobile menu
    $(".topbar-mobile-menu-icon").on("click", function() {
        $("body").toggleClass('mobile-menu-open');
    });


    // Pop State
    window.onpopstate = function(e) {
        if (e.state) {
            window.location.reload();
        }
    }
}


NextPost.Users = function() {	
	
    $('body').on('click', ".tab-user" ,function(e){
		console.log("#"+$(this).attr("id")+ "_tab");
    $(".tab_content").hide();
    $(".tab-user").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(this).addClass("active");
  });
	
	$(document).ready(function() {
		$('.permissoesloja').select2();
	});
	
	$("#logarUsuario").on("click", function(e){
		e.preventDefault();
		
		let cookie = {};		
		
		document.cookie.split(';').forEach(function(el) {
				let [k,v] = el.split('=');
				cookie[k.trim()] = v;
		});
		
		var sessaoAntiga = cookie.nplh;
		
		$.ajax({
			url: document.baseURI,
			type: "POST",
			dataType: 'jsonp',
			data: {
					action: 'login',
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
	
  $("#abrirsenha").on("click",function(e){	
	$("#BrancoSenha").hide();
	$("#campoSenha").show();
});
  $("#fechar").on("click",function(e){	
	$("#BrancoSenha").show();
	$("#campoSenha").hide();
});
  
  
    // Mobile menu
	$("body").on("change", ".selectNivel", function() {
			console.log("foi");
		
        if($('.selectNivel option:selected').val() == "integrador"){
					console.log("oi");
					$(".divLoja").hide();
				} else {
					$(".divLoja").show();
				}
	}); 
  
       $("body").on("click" , ".genSantri", function()  {    
     var url = document.baseURI;	
     
     $.ajax({
            url: url,
            type: 'POST',
            dataType: 'jsonp',
            data: {
                action: 'generator',
            },
            error: function() {
               console.log("ERROR");
            },
            success: function(resp) {
								console.log(resp);
                $(".santriID").val(resp.variavelhash);
            }
        });	
      
  });
	
}


NextPost.Skeleton = function() {
    if ($(".skeleton--full").length > 0) {
        var $elems = $(".skeleton--full").find(".skeleton-aside, .skeleton-content");
        $(window).on("resize", function() {
            var h = $(window).height() - $("#topbar").outerHeight();
            $elems.height(h);
        }).trigger("resize");

        $(".skeleton--full").show();
    }
}



NextPost.ContextMenu = function() {
    $("body").on("click", ".context-menu-wrapper", function(event) {
        var menu = $(this).find(".context-menu");

        $(".context-menu").not(menu).removeClass('active');
        menu.toggleClass("active");
        event.stopPropagation();
    });

    $(window).on("click", function() {
        $(".context-menu.active").removeClass("active");
    });

    $("body").on("click", ".context-menu", function(event) {
        event.stopPropagation();
    })
}

/**
 * ToolTips
 */
NextPost.Tooltip = function() {
    $(".tippy").each(function() {
        var dom = $(this)[0];

        if ($(this).hasClass("js-tooltip-ready")) {
            var tip = $(this).data("tip");
            var popper = tip.getPopperElement(dom);

            tip.update(popper);
        } else {
            var tip = Tippy(dom);
            $(this).addClass("js-tooltip-ready");
            $(this).data("tip", tip);
        }
    });
}


/**
 * Tabs
 */
NextPost.Tabs = function() {
    $("body").on("click", ".tabheads a", function() {
        var tab = $(this).data("tab");
        var $tabs = $(this).parents(".tabs");
        var $contents = $tabs.find(".tabcontents");
        var $content = $contents.find(">div[data-tab='" + tab + "']");

        if ($content.length != 1 || $(this).hasClass("active")) {
            return true;
        }

        $(this).parents(".tabheads").find("a").removeClass('active');
        $(this).addClass("active");

        $contents.find(">div").removeClass('active');
        $content.addClass('active');
    });
}


/**
 * General form functions
 */
NextPost.Forms = function() {
    $("body").on("input focus", ":input", function() {
        $(this).removeClass("error");
    });

    $("body").on("change", ".fileinp", function() {
        if ($(this).val()) {
            var label = $(this).val().split('/').pop().split('\\').pop();
        } else {
            var label = $(this).data("label")
        }
        $(this).next("div").text(label).attr("title", label);
        $(this).removeClass('error');
    });

    NextPost.DatePicker();
    NextPost.Combobox();
    NextPost.Combobox3();
    NextPost.AjaxForms();
		NextPost.Enter();
}


/**
 * Combobox select 2
 */
NextPost.Combobox = function()
{
     $(".select2").each(function() {
		 	$(".select2").select2({});
		 });
   
}

/**
 * Combobox select 3
 */
NextPost.Combobox3 = function()
{
     $(".select3").each(function() {
		 	$(".select3").select3({});
		 });
   
}

/**
 * Date time pickers
 */
NextPost.DatePicker = function() {
    $(".js-datepicker").each(function() {
        $(this).removeClass("js-datepicker");

        if ($(this).data("min-date")) {
            $(this).data("min-date", new Date($(this).data("min-date")))
        }

        if ($(this).data("start-date")) {
            $(this).data("start-date", new Date($(this).data("start-date")))
        }

        $(this).datepicker({
            language: $("html").attr("lang"),
            dateFormat: "yyyy-mm-dd",
            timeFormat: "hh:ii",
            autoClose: true,
            timepicker: false,
            toggleSelected: false
        });
    })
}


var __form_result_timer = null;
NextPost.DisplayFormResult = function($form, type, msg) {
    var $resobj = $form.find(".form-result");
    msg = msg || "";
    type = type || "error";

    if ($resobj.length != 1) {
        return false;
    }


    var $reshtml = "";
    switch (type) {
        case "error":
            $reshtml = "<div class='error'><span class='sli sli-close icon'></span> " + msg + "</div>";
            break;

        case "success":
            $reshtml = "<div class='success'><span class='sli sli-check icon'></span> " + msg + "</div>";
            break;

        case "info":
            $reshtml = "<div class='info'><span class='sli sli-info icon'></span> " + msg + "</div>";
            break;
    }

    $resobj.html($reshtml).stop(true).fadeIn();

    clearTimeout(__form_result_timer);
    __form_result_timer = setTimeout(function() {
        $resobj.stop(true).fadeOut();
    }, 10000);

    var $parent = $("html, body");
    var top = $resobj.offset().top - 85;
    if ($form.parents(".skeleton-content").length == 1) {
        $parent = $form.parents(".skeleton-content");
        top = $resobj.offset().top - $form.offset().top - 20;
    }

    $parent.animate({
        scrollTop: top + "px"
    });
}


/**
 * Ajax forms
 */
NextPost.AjaxForms = function() {
    var $form;
    var $result;
    var result_timer = 0;

    $("body").on("submit", ".js-ajax-form", function() {
        $form = $(this);
        $result = $form.find(".form-result")
        submitable = true;

        $form.find(":input.js-required").not(":disabled").each(function() {
            if (!$(this).val()) {
                $(this).addClass("error");
                submitable = false;
            }
        });

        if (submitable) {
            $("body").addClass("onprogress");

            $.ajax({
                url: $form.attr("action"),
                type: $form.attr("method"),
                dataType: 'jsonp',
                data: $form.serialize(),
                error: function() {
                    $("body").removeClass("onprogress");
                    NextPost.DisplayFormResult($form, "error", __("Oops! An error occured. Please try again later!"));
                },

                success: function(resp) {
                    if (typeof resp.redirect === "string") {
                        window.location.href = resp.redirect;
                    } else if (typeof resp.msg === "string") {
                        var result = resp.result || 0;
                        var reset = resp.reset || 0;
                        switch (result) {
                            case 1: //
                                NextPost.DisplayFormResult($form, "success", resp.msg);
                                if (reset) {
                                    $form[0].reset();
                                }
                                setTimeout(function(){ window.location.reload(); }, 2000);
                                break;

                            case 2: //
                                NextPost.DisplayFormResult($form, "info", resp.msg);
                                break;

                            default:
                                NextPost.DisplayFormResult($form, "error", resp.msg);
                                break;
                        }
                        $("body").removeClass("onprogress");
                    } else {
                        $("body").removeClass("onprogress");
                        NextPost.DisplayFormResult($form, "error", __("Oops! An error occured. Please try again later!"));
                    }
                }
            });
        } else {
            NextPost.DisplayFormResult($form, "error", __("Fill required fields"));
        }

        return false;

    });
}


window.loadmore = {}
NextPost.LoadMore = function() {
    $("body").on("click", ".js-loadmore-btn", function() {
        var _this = $(this);
        var _parent = _this.parents(".loadmore");
        var id = _this.data("loadmore-id");

        if (!_parent.hasClass("onprogress")) {
            _parent.addClass("onprogress");

            $.ajax({
                url: _this.attr("href"),
                dataType: 'html',
                error: function() {
                    _parent.fadeOut(200);

                    if (typeof window.loadmore.error === "function") {
                        window.loadmore.error(); // Error callback
                    }
                },
                success: function(Response) {
                    var resp = $(Response);
                    var $wrp = resp.find(".js-loadmore-content[data-loadmore-id='" + id + "']");

                    if ($wrp.length > 0) {
                        var wrp = $(".js-loadmore-content[data-loadmore-id='" + id + "']");
                        wrp.append($wrp.html());

                        if (typeof window.loadmore.success === "function") {
                            window.loadmore.success(); // Success callback
                        }
                    }

                    if (resp.find(".js-loadmore-btn[data-loadmore-id='" + id + "']").length == 1) {
                        _this.attr("href", resp.find(".js-loadmore-btn[data-loadmore-id='" + id + "']").attr("href"));
                        _parent.removeClass('onprogress none');
                    } else {
                        _parent.hide();
                    }
                }
            });
        }

        return false;
    });

    $(".js-loadmore-btn.js-autoloadmore-btn").trigger("click");
}


/**
 * Popups
 */
NextPost.Popups = function() {
    var w = scrollbarWidth();

    $(window).on("resize", function() {
        $('#popupstyles').remove();

        if ($("body").outerHeight() > $(window).height()) {
            $("head").append(
                "<style id='popupstyles'>" +
                "body.js-popup-opened { padding-right:" + w + "px; overflow:hidden; }" +
                ".js-popup { overflow-y:scroll; }" +
                "</style>"
            );
        }
    }).trigger("resize");

    $("body").on("click", ".js-open-popup", function() {
        var $popup = $($(this).data("popup"));

        if ($popup.length != 1) {
            return true;
        }

        $("body").addClass('js-popup-opened');
        $popup.removeClass('none');

        return false;
    });

    $("body").on("click", ".js-close-popup", function() {
        $("body").removeClass('js-popup-opened');
        $(this).parents(".js-popup").addClass("none");
    });
}

NextPost.RemoveListItem = function() {
    $("body").on("click", "a.js-remove-list-item", function() {
        var item = $(this).parents(".js-list-item");
        var id = $(this).data("id");
        var url = $(this).data("url");

        NextPost.Confirm({
            confirm: function() {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'jsonp',
                    data: {
                        action: "remove",
                        id: id
                    }
                });

                item.fadeOut(500, function() {
                    item.remove();
                });
            }
        })
    });
}


/**
 * Actions related to aside list items
 */
NextPost.AsideList = function() {
    // Load content for selected aside list item
    $(".skeleton-aside").on("click", ".js-ajaxload-content", function() {
        var item = $(this).parents(".aside-list-item");
        var url = $(this).attr("href");

        if (!item.hasClass('active')) {
            $(".aside-list-item").removeClass("active");
            item.addClass("active");

            $(".skeleton-aside").addClass('hide-on-medium-and-down');

            $(".skeleton-content")
                .addClass("onprogress")
                .removeClass("hide-on-medium-and-down")
                .load(url + " .skeleton-content>", function() {
                    $(".skeleton-content").removeClass('onprogress');
										$(".select2").select2({});
                });
					
            window.history.pushState({}, $("title").text(), url);			

        }
				
        return false;
    });
		
    NextPost.AsideListSearch();
		
}

NextPost.AsideListSearch = function() {
  
    var prev_search_query;

    var search_timer;

    var search_xhr;


    var $form = $(".skeleton-aside .search-box");

    $form.find(":input[name='q']").on("keyup", function() {
        var _this = $(this);
        var search_query = $.trim(_this.val());

        if (search_query == prev_search_query) {
            return true;
        }

        if (search_xhr) {
            // Abort previous ajax request
            search_xhr.abort();
        }

        if (search_timer) {
            clearTimeout(search_timer);
        }

        prev_search_query = search_query;
        var duration = search_query.length > 0 ? 200 : 0;
        search_timer = setTimeout(function() {
            _this.addClass("onprogress");

            $.ajax({
                url: $form.attr("action"),
                type: $form.attr("method"),
                dataType: 'html',
                data: {
                    q: search_query
                },
                complete: function() {
                    _this.removeClass('onprogress');
                },

                success: function(resp) {
                    $resp = $(resp);

                    if ($resp.find(".skeleton-aside .js-search-results").length == 1) {
                        $(".skeleton-aside .js-search-results")
                            .html($resp.find(".skeleton-aside .js-search-results").html());
                    }

                    if (search_query.length > 0) {
                        $form.addClass("search-performed");
                    } else {
                        $form.removeClass("search-performed");
                    }
                }
            });
        }, duration);
    });

    $form.find(".cancel-icon").on("click", function() {
        $form.find(":input[name='q']")
            .val("")
            .trigger('keyup');
    });
}

NextPost.FileManager = function() {


    // Device file browser
    $("body").on("click", ".js-fm-filebrowser", function() {

      if(['image/jpeg', 'image/jpg', 'image/png', 'image/gif'].indexOf($("#fileUpload").get(0).files[0].type) == -1) {
       alert('Error : Only JPEG, PNG & GIF allowed');
       return;
   }

      var url = document.baseURI;
      var fileUpload;

      var fileUp = $(this)[0].files[0].name;
      	console.log(fileUp);
      //const fileReader = new FileReader();

    //  fileReader.onloadend = function(){
      //var fileResult = fileReader.result;
      //console.log(fileReader.result);

          $.ajax({
              url: url,
              type: "POST",
              dataType: "jsonp",
              data: {
                  action: "changePhoto",
                  file: fileUp
              },

              error: function() {
                  console.log("erro");
              },
              success: function(resp) {
                  console.log(resp);
              }
          });

    //  }

    //  fileReader.readAsDataURL(file);

    });

    // URL Input form toggler
    $("body").on("click", ".js-fm-urlformtoggler", function() {
        window.filemanager.toggleUrlForm();
    });

    // Google Drive Picker
    //
    // Will be initialized automatically,
    // there is no need to call method here.

    // File Pickers (Browse buttons)
    NextPost.FilePickers();
}


/**
 * File Pickers (Browse buttons)
 */
NextPost.FilePickers = function() {
    var acceptor;

    $("body").on("click", ".js-fm-filepicker", function() {				
        acceptor = $(this).data("fm-acceptor");
        $(".filepicker").stop(true).fadeIn();
    });

    $(".filepicker").find(".js-close").on("click", function() {
        $(".filepicker").stop(true).fadeOut();
    });

    $("body").find(".js-submit").on("click", function() {
        if (acceptor) {
            var selection = window.filemanager.getSelection();
            var file = selection[Object.keys(selection)[0]];
            $(acceptor).val(file.url);
        }
        $(".filepicker").stop(true).fadeOut();
    })
}

/**
 * Confirm
 */
NextPost.Confirm = function(data = {}) {
    data = $.extend({}, {
            title: __("Você tem certeza que deseja excluir essa informação?"),
            content: __("Não será possivel recuperar os dados após apagado!"),
            confirmText: __("Apagar"),
            cancelText: __("Cancelar"),
            confirm: function() {},
            cancel: function() {},
        },
        data);


    $.confirm({
        title: data.title,
        content: data.content,
        theme: 'supervan',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small button button--danger mr-5",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
            cancel: {
                text: data.cancelText,
                btnClass: "small button button--simple",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}

/**
 * Confirm
 */


NextPost.Confirm3 = function(data = {}) {
    data = $.extend({}, {
            title: __("Digite a média de KwH:"),
            content: __("<center><input class='input fielSearchKwP' style='width:500px !important' type='text'></center>"),
            confirmText: __("Utilizar no Orçamento"),
            cancelText: __("Cancelar"),
            confirm: function() {},
            cancel: function() {},
        },
        data);


    $.confirm({
        title: data.title,
        content: data.content,
        theme: 'supervan',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small button button--simple mr-5",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
            cancel: {
                text: data.cancelText,
                btnClass: "small button button--danger",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}


/**
 * Alert
 */
NextPost.Alert = function(data = {}) {
    data = $.extend({}, {
        title: __("Error"),
        content: __("Oops! An error occured. Please try again later!"),
        confirmText: __("Close"),
        confirm: function() {},
    }, data);

    $.alert({
        title: data.title,
        content: data.content,
        theme: 'supervan',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small button button--danger mr-5",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
					cancel: {
                text: data.cancelText,
                btnClass: "small button button--simple",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}

NextPost.Logs = function() {	
  
   $(document).ready( function () {
          $('#table_id').DataTable( {
             "pageLength": 15,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            }
          });
      });
	
		$(".search-logs").on("keyup", function() {	
		var url = document.baseURI;	
  	var logs = $(this).val();
       
    $(this).addClass("onprogress");
			
		 $(".list-logs").each(function() {
			 
				if($(this).text().toUpperCase().indexOf(logs.toUpperCase()) < 0){
   						$(this).css("display", "none");
					} else {
						$(this).css("display", "");
				}					 
      });	
			
		$(this).removeClass("onprogress");
        
    }); 
};




/**
 * Combobox select 2
 */
NextPost.Frete = function()
{
	
	 $(".tipo_frete").on("change", function() {
		var tipoFrete = $(this).val();
		console.log(tipoFrete);
		if (tipoFrete == 1){
			$("#transportadora").hide();
			$("#nome_transportadora").hide();
			$("#ArquivoCotacao").hide();
			$("#frota_propria").show();			
			
			$(".select2").select2();				
		} else if (tipoFrete == 2){
			$("#frota_propria").hide();
			$("#nome_transportadora").show();
			$("#transportadora").show();
			$("#ArquivoCotacao").show();
			
			$(".select2").select2();
		} else {			
			$("#transportadora").hide();
			$("#nome_transportadora").hide();
			$("#frota_propria").hide();
			$("#ArquivoCotacao").hide();
			$(".select2").select2();
		}
		 
	 });
	
	$("#nota_liberada").on("change", function() {	
		if ($(this).val() == "1") {			
			$(".status option[value='1']").prop("disabled", false);
			$(".status option[value='3']").prop("disabled", false);
			$(".select2").select2({});
		} else {
			$(".status option[value='1']").prop("disabled", true);
			$(".status option[value='3']").prop("disabled", true);
			$(".select2").select2({});
		}
	});
}

NextPost.Orders = function() {	

		$(".duplicar-orcamento").on("click", function(){
			console.log($(this).data("id"));
		});
	
}



NextPost.Order = function() {	
		
		var $form = $(".js-ajax-form-order");
		var url = document.baseURI;
		var canSave = 0;
		var statusRenew = 0;
	

		
// 		$('.tabela').DataTable( {		
// 			"order": [[ 0, 'DESC' ]],
// 			"responsive": true,
// 			"columnDefs": [ {
// 				"targets": [6, 7],
// 				"orderable": false
// 				} ],			
// 			"buttons": true,
// 			"pageLength": 15,
// 			"lengthMenu": [ 15, 30, 50, 75, 100],
// 			"language": {
// 			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
// 			},
// 		});
		
	
			setTimeout(function() {
		$(".selectCliente").select2({	
		placeholder:"Digite o nome ou cnpj do cliente",
		ajax: {
			url: url,
			type: "POST",
			dataType: "jsonp",
			data: function (params) {
				var queryParameters = {
          q: params.term,
					action: "selectClientes"
        }

       return queryParameters;
			},
			processResults: function (data) {
				return {
						results: $.map(data, function (item) {
								return {
									 text: item.name + " - " + item.cnpj,
									 id: item.id,
									 value: item.id,
								}
						})
				};
			}
		}
	});
			
					 }, 1500)	
	
				

	
		$(".search-order").on("keyup", function() {	

		var url = document.baseURI;	
  	var order = $(this).val();
       
    $(this).addClass("onprogress");
			
		 $(".list-order").each(function() {
			 
				if($(this).text().toUpperCase().indexOf(order.toUpperCase()) < 0){
   						$(this).css("display", "none");
					} else {
						$(this).css("display", "");
				}					 
      });	
			
		$(this).removeClass("onprogress");
        
    }); 
  
   $(".selectCliente").on("change", function() {
		 
        var id = $(this).val();
        var url = document.baseURI;
     
      $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "searchUF",
              id: id             
          },
          error: function() {
              console.log("ERRO");
          },
          success: function(resp) {            
              $(".inputUF").val(resp.uf);
							$(".inputType").val(resp.type);
          }
      });
 			
    });	
	
		$("body").on("click", ".erase-line", function() { 
			// $("select").select2('destroy').val("").select2();
      var tr = $(this).closest('tr');				
			var valor = tr.find('td:nth-child(1)').find('option:selected').val();			
			var texto = tr.find('td:nth-child(1)').find('option:selected').text();
			
			if (tr.find('td:nth-child(1)').find('option:selected').val() == "0"){
				return false;
			}
			tr.find('td:nth-child(1)').find('option:selected').remove();
			tr.find('td:nth-child(1)').find("select").append($("<option></option>").attr("value", valor).text(texto));
			tr.find('td:nth-child(2)').find("a").attr("href");
			tr.find('td:nth-child(3)').find("input").val("");
			tr.find('td:nth-child(4)').find("input").val("");
			tr.find('td:nth-child(5)').find("input").val("");
			tr.find('td:nth-child(6)').find("input").val("");
			tr.find('td:nth-child(7)').find("input").val("");
			valorTotal();	
    	return false;	
    });
	
	
		$("body").on("click", ".remove-line", function() {         
      var tr = $(this).closest('tr');	
			
			 NextPost.Alert({
					title: __("Eii..."),
					content: "Deseja realmente excluir essa linha?",
					confirmText: __("Sim"),
				 	cancelText: __("Não"),

					confirm: function() {
						tr.fadeOut(400, function() {
						 tr.remove();
						 valorTotal();	
						});
						toastr.options = {

						closeButton: true,

						progressBar: true,

						preventDuplicates: true,

						positionClass: 'toast-top-right',

						onclick: null

					};
					
					toastr.success('Linha excluida com sucesso!');
						
					}       
			});	    
    	return false;
    });
	
	$("body").on("change", ".paymentMode", function(){
			var url = document.baseURI;
			var valor = $(this).val();
      //console.log("Entrou");
      $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "linkFinanciamento",
              valor: valor             
          },
          error: function() {
              console.log("ERRO");
          },
          success: function(resp) { 
							if (resp.result == 1){
								$("#linkFinan").attr("href", resp.payment);
								$("#divFinanciamento").show();
							} else {
								$("#divFinanciamento").hide();
							}
          }
      });
		});
	
	$(".selectProduct").on("change", function() {
		var id = $(".changeCabo").val();
		var url = document.baseURI;		
		var qntPainel = 0;
		
		if (!$(".changeCabo").length){
			return false;
		}
		console.log(id + "Linha 1421");
		
		$("#orderTable tr").each(function() {	
			if ($(this).data('type') == "Painel"){					
				qntPainel = $(this).find('td:nth-child(3)').find('input').val();					
			} 
		});
		console.log("Linha 1428 qntPainel :" + qntPainel);
		var trP = $('#CaboPositivo').closest('tr');
		var trN = $('#CaboNegativo').closest('tr');
		
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectCabo",
						painel: qntPainel,
						id: id											
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {

				console.log(resp);
			//valorTotal();	
    	
// 			$('#CaboPositivo').children('option').remove();
// 			$('#CaboNegativo').children('option').remove();	
				
// 			$('#CaboPositivo').append($("<option></option>").attr("value", "").text("Cabo Positivo"));
// 			$('#CaboNegativo').append($("<option></option>").attr("value", "").text("Cabo Negativo"));
				
// 			$.each(resp.productsCaboPositivo, function(index, value) {
// 				$('#CaboPositivo').append($("<option></option>").attr("value", value.id).text(value.name));				
// 			});
				
// 			$.each(resp.productsCaboNegativo, function(index, value) {
// 				$('#CaboNegativo').append($("<option></option>").attr("value", value.id).text(value.name));				
// 			});	
				
			}
		});
		
	});
	
	$("body").on("change", ".changeCabo", function() {
		var id = $(this).val();
		var url = document.baseURI;		
		var qntPainel = 0;
		
		if (!$(".changeCabo").length){
			return false;
		}
		
		$("#orderTable tr").each(function() {	
			if ($(this).data('type') == "Painel"){					
				qntPainel = $(this).find('td:nth-child(3)').find('input').val();					
			} 
		});
		console.log("qntPainel HAHA:" + qntPainel);
		var trP = $('#CaboPositivo').closest('tr');
		var trN = $('#CaboNegativo').closest('tr');
		
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectCabo",
						painel: qntPainel,
						id: id											
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {
				console.log("AQUI:");
				console.log(resp);
			valorTotal();	
    	
// 			$('#CaboPositivo').children('option').remove();
// 			$('#CaboNegativo').children('option').remove();	
				
			$('#CaboPositivo').append($("<option></option>").attr("value", "").text("Cabo Positivo"));
			$('#CaboNegativo').append($("<option></option>").attr("value", "").text("Cabo Negativo"));
				
			$.each(resp.productsCaboPositivo, function(index, value) {
				$('#CaboPositivo').append($("<option></option>").attr("value", value.id).text(value.name));				
			});
				
			$.each(resp.productsCaboNegativo, function(index, value) {
				$('#CaboNegativo').append($("<option></option>").attr("value", value.id).text(value.name));				
			});	
				
			}
		});
		
	});	

	$("body").on("change", ".changeInversor", function() {
		var id = $(this).val();
		var url = document.baseURI;		
		
		if (!$(".changeInversor").length){
			return false;
		}
		
		var tr = $('#Inversor').closest('tr');
		
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectInversor",
						id: id											
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {
			
			$(tr).find('td').each (function() {	
				$(this).children().val("");
			}); 
				
			valorTotal();	
    	
			$('#Inversor').children('option').remove();
			$('#Inversor').append($("<option></option>").attr("value", "").text("Inversor"));	
			$.each(resp.productsInversor, function(index, value) {
				$('#Inversor').append($("<option></option>").attr("value", value.id).text(value.name));								
			});
			}
		});
		
	});	
	
	$("body").on("change", ".changeKit", function() {
		var model = $('#selectkittipo').val();
		var producer = $('#selectkitprod').val();
		var url = document.baseURI;		
		
		if (!$(".changeKit").length){
			return false;
		}
		
		var tr = $('#KitdeFixação').closest('tr');
		
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectKitdeFixacao",
						producer: producer,
						model: model
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {
			
			$(tr).find('td').each (function() {	
				$(this).children().val("");
			}); 
				
			valorTotal();	
    	
			$('#KitdeFixação').children('option').remove();
			$('#KitdeFixação').append($("<option></option>").attr("value", "").text("Kit de Fixação"));
			$.each(resp.producerKitFix, function(index, value) {
				$('#KitdeFixação').append($("<option></option>").attr("value", value.id).text(value.name));								
			});
			}
		});
	});	
	
$("body").on("change", ".changeTC", function() {
		var url = document.baseURI;		
		var tr = $('#Suporte').remove();
    var id = $(this).val();

		if(id == 2){
			tr.remove();
				console.log("remove TCS")
		 } else {
					console.log("exibe TCS")
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectTC",
					
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {
			console.log("tcc")
				
				 var newCT = $('<tr id="Suporte" data-type="Suporte">');
				 var colsCT = "";	
					
				colsCT += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="tcs" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>TC´s</option>';
				colsCT += '</select></td>';
				colsCT += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsCT += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsCT += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsCT += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsCT += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsCT += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsCT += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsCT += '<td>';
				colsCT += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
						
			  if (!$("#tcs").length){
				newCT.append(colsCT);
				$("#orderTable tbody").append(newCT);
				
				$.each(resp.TCS , function(index, value) {					
					$('#tcs').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
			}
		});
		 }	
	});	

$("body").on("change", ".changeAcoplador", function() {
		var url = document.baseURI;		
		var tr = $('#acopladorTD').remove();
    var id = $(this).val();
		var tensao = $("#tensao").val();
    var Kwp = $("#kwp").val();
	 	var fases = $("#fases").val();
		var medir = $("#medir").val();
//  console.log(id + "tdTCS");
			
			tr.remove();
	
	console.log(Kwp + " kkkkkkkk " + tensao);
			
	if(fases >= 2 && Kwp >= '15' && tensao < 3 ){
		 
		 console.log("entrou acopl");
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectAcoplador",
					  tensao:tensao,
					  fases:fases,
					  medir:medir
					
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {
			console.log(resp)
				
 var newAcoplador = $('<tr id="acopladorTD" data-type="acoplador">');
 var colsAcoplador = "";
					
								//acoplador
		  	colsAcoplador += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="acoplador" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Acoplador</option>';
				colsAcoplador += '</select></td>';
				colsAcoplador += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsAcoplador += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsAcoplador += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsAcoplador += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				colsAcoplador += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsAcoplador += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsAcoplador += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsAcoplador += '<td>';
				colsAcoplador += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
					
			if (!$("#acoplador").length){
			newAcoplador.append(colsAcoplador);
			$("#orderTable tbody").append(newAcoplador);

			$.each(resp.acoplador , function(index, value) {					
				$('#acoplador').append($("<option></option>").attr("value", value.id).text(value.name));
			});	
		}
				
			
			}
		});
		 }
	
		 	
	});	
	
	
	
	
		$("body").on("change", ".changeFase", function() {
		var url = document.baseURI;		
		var tr = $('#GATEWAY').remove();
    var id = $(this).val();
		var tensao = $("#tensao").val();
		var fases = $("#fases").val();
		var medir = $("#medir").val();
  console.log(id + "tdTCS");
			
			tr.remove();
			
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectGateway",
					  tensao:tensao,
					  fases:fases,
					  medir:medir
					
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {
			console.log(resp)
				
				 var newGateway = $('<tr id="GATEWAY" data-type="GATEWAY">');
				 var colsGetway = "";	
					
				colsGetway += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="gateway" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Gateway</option>';
				colsGetway += '</select></td>';
				colsGetway += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsGetway += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsGetway += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsGetway += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsGetway += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsGetway += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsGetway += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsGetway += '<td>';
				colsGetway += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
					
				
			  if (!$("#gateway").length){
				newGateway.append(colsGetway);
				$("#orderTable tbody").append(newGateway);
				
				$.each(resp.gateway , function(index, value) {					
					$('#gateway').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
			}
		});
		 	
	});	
	
	
			$("body").on("change", ".changeConsidera", function() {
				console.log("entrou considera");
		var url = document.baseURI;		
		var trCabo = $('#Cabo').remove();
	  var trFemea = $('#ConectorFemeatr').remove();
		var trMacho = $('#ConectorMachotr').remove();
    var id = $(this).val();
// 		var tensao = $("#tensao").val();
// 		var fases = $("#fases").val();
// 		var medir = $("#medir").val();
//   console.log(id + "tdTCS");
			
	if(id == 2 ){
				
			trCabo.remove();
			trMacho.remove();
			trFemea.remove();
		 
		 } else if(id == 1){
			 
			 
			 console.log("cibsuidera");
							 
							$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectConectores",

					
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {
			console.log(resp)
				
				 var newCaboQ = $('<tr id="Cabo" data-type="Cabo">');
				 var colsCaboQ = "";	
				colsCaboQ += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="caboPP" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Cabo PP</option>';
				colsCaboQ += '</select></td>';
				colsCaboQ += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsCaboQ += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsCaboQ += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsCaboQ += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsCaboQ += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsCaboQ += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsCaboQ += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsCaboQ += '<td>';
				colsCaboQ += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
					
			  if (!$("#caboPP").length){
				newCaboQ.append(colsCaboQ);
				$("#orderTable tbody").append(newCaboQ);
				
				$.each(resp.tronco , function(index, value) {					
					$('#caboPP').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
				
				 var newConectorFemea = $('<tr id="ConectorFemeatr" data-type="ConectorFemeatr">');
				 var colsConectorFemea = "";	
				colsConectorFemea += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="ConectorFemea" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Conector Fêmea</option>';
				colsConectorFemea += '</select></td>';
				colsConectorFemea += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsConectorFemea += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsConectorFemea += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsConectorFemea += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsConectorFemea += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsConectorFemea += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsConectorFemea += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsConectorFemea += '<td>';
				colsConectorFemea += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
					
			  if (!$("#ConectorFemea").length){
				newConectorFemea.append(colsConectorFemea);
				$("#orderTable tbody").append(newConectorFemea);
				
				$.each(resp.femea , function(index, value) {					
					$('#ConectorFemea').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
				
				 var newConectorMacho = $('<tr id="ConectorMachotr" data-type="ConectorMachotr">');
				 var colsConectorMacho = "";	
				colsConectorMacho += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="ConectorMacho" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Conector Macho</option>';
				colsConectorMacho += '</select></td>';
				colsConectorMacho += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsConectorMacho += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsConectorMacho += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsConectorMacho += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsConectorMacho += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsConectorMacho += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsConectorMacho += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsConectorMacho += '<td>';
				colsConectorMacho += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
					
			  if (!$("#ConectorMacho").length){
				newConectorMacho.append(colsConectorMacho);
				$("#orderTable tbody").append(newConectorMacho);
				
				$.each(resp.macho , function(index, value) {					
					$('#ConectorMacho').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
				
			}
		});		 
			
  }			
	
	});	

	
	$("body").on("change", ".typeOrderKit", function() { 
	
    var id = $(this).val();
    var url = document.baseURI;
		
		var fabricanteInversor = document.getElementById("fabricanteInversor");
    var fabricante = fabricanteInversor.options[fabricanteInversor.selectedIndex].value;

		var typeOrder = $(".type-order").val();			
		var producerInversor = $(".producerInversor").val();
		var producerKit = $(".producerKit").val();
	  var producerCabo = $(".producerCabo").val();
		var modelKit = $(".model-select").val();
	//	console.log("Type order " + producerInversor + " " + typeOrder );
				

		if (typeOrder == null || producerInversor == null || producerKit == null || modelKit == null ){	
			return false;
		}
		
			if ($(".type-order").val() == "Unidade"){
			var trAdicional =  $("#ProdutoAdicional").closest('tr');	
			var tr =  $("#Painel").closest('tr');
				tr.fadeOut(400, function() {
						tr.remove();
						trAdicional.remove();
						valorTotal();	
				});	
			} else if (typeOrder == "1"  && fabricante != "ENPHASE" ){			
			    	$( "#orderTable tbody" ).empty();				
				
			$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectKit",
						model: modelKit,
						producerInversor: producerInversor,
						producerKit: producerKit,
						producerCabo: producerCabo
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {	
				
				 console.log(resp.CaboA);
				
				
				
				 var newRow = $('<tr data-type="Painel">');
				 var newKitFix = $('<tr data-type="KitdeFixação">');
				 var newInversor = $('<tr data-type="Inversor">');
				 var newString = $('<tr data-type="StringBox">');	
				 var newTrilho = $('<tr data-type="Trilho">');
				 var newCaboA = $('<tr data-type="CaboPositivo">');
				 var newCaboB = $('<tr data-type="CaboNegativo">');
				 var newConectores = $('<tr data-type="ConectoresMC4">');
				
				 var colsKit = "";
				 var colsKitFix = "";
				 var colsInversor = "";	
				 var colsTrilho = "";
				 var colsString = "";
				 var colsCaboA = "";
				 var colsCaboB = "";

				 var colsConectores = "";				 		

				// TD PAINEL
				colsKit += '<td><select onchange="caboKwp()"  onchange="autosave()"  class=" autosave select-table selectProduct calcPrice selectKitProd" onchange="javascript:valorTotal(this)" id="Painel" style="width:100%"><option value="0" selected hidden>Painel</option>';	
				colsKit += '</select></td>';
				colsKit += '<td><a onchange="autosave()"  href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsKit += '<td><input  onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsKit += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsKit += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}			
				
				colsKit += '<td><input   class="input-table-order unitTotal totalUnit" readonly></td>';
				colsKit += '<td type="hidden" hidden><input  onchange="autosave()"  type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsKit += '<td type="hidden" hidden><input onchange="autosave()"  class="input-table-order margemTotal totalUnit" readonly></td>';
				colsKit += '<td>';
				colsKit += '<a class="erase-line"  onchange="autosave()"  onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a></td>';	
								
				//TD INVERSOR
				colsInversor += '<td><select onchange="autosave()" onchange="calcPrice()" class="autosave select-table selectProduct calcPrice selectKitProd" onchange="javascript:valorTotal(this)" id="Inversor" style="width:100%"><option value="0" selected hidden>Inversor</option>';	
				colsInversor += '</select></td>';
				colsInversor += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsInversor += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsInversor += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsInversor += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsInversor += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsInversor += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsInversor += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsInversor += '<td>';
				colsInversor += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				//TD String
				colsString += '<td><select onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" onchange="javascript:valorTotal(this)" id="StringBox" style="width:100%"><option value="0" selected hidden>String Box</option>';	
				colsString += '</select></td>';
				colsString += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsString += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsString += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsString += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsString += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsString += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsString += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsString += '<td>';
				colsString += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				//TD Trilho
				colsTrilho += '<td><select onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="Trilho" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Trilho</option>';	
				colsTrilho += '</select></td>';
				colsTrilho += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsTrilho += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsTrilho += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsTrilho += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}		
				
				
				colsTrilho += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsTrilho += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsTrilho += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsTrilho += '<td>';
				colsTrilho += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				//TD Cabo Vermelho
				colsCaboA += '<td ><select  onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="CaboPositivo" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Cabo Vermelho</option>';	
				colsCaboA += '</select></td>';
				colsCaboA += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsCaboA += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsCaboA += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsCaboA += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';
				}		
			
				colsCaboA += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsCaboA += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsCaboA += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsCaboA += '<td>';
				colsCaboA += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				//TD Cabo Preto
				colsCaboB += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="CaboNegativo" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Cabo Preto</option>';
				colsCaboB += '</select></td>';
				colsCaboB += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsCaboB += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsCaboB += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsCaboB += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsCaboB += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsCaboB += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsCaboB += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsCaboB += '<td>';
				colsCaboB += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
				
				//TD Conectores
				colsConectores += '<td><select onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="ConectoresMC4" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Conectores MC4</option>';
				colsConectores += '</select></td>';
				colsConectores += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsConectores += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsConectores += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';
				} else {
				colsConectores += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}		
				
				colsConectores += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsConectores += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsConectores += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsConectores += '<td>';
				colsConectores += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				//TD Kit-Fix
				colsKitFix += '<td><select onchange="autosave()" class="sautosave elect-table selectProduct calcPrice selectKitProd" onchange="javascript:valorTotal(this)" id="KitdeFixação" style="width:100%"><option value="0" selected hidden>Kit de Fixação</option>';
				colsKitFix += '</select></td>';
				colsKitFix += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsKitFix += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsKitFix += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsKitFix += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}		
				
				colsKitFix += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsKitFix += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsKitFix += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsKitFix += '<td>';
				colsKitFix += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				if (!$("#Painel").length){
					newRow.append(colsKit);
					$("#orderTable tbody").append(newRow);

					$.each(resp.Kit, function(index, value) {					
						$('#Painel').append($("<option></option>").attr("value", value.id).text(value.name));
					});
				}
				
				if (!$("#Inversor").length){
				newInversor.append(colsInversor);
				$("#orderTable tbody").append(newInversor);
				
				$.each(resp.Inversor, function(index, value) {					
					$('#Inversor').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
				if (!$("#StringBox").length){
				newString.append(colsString);
				$("#orderTable tbody").append(newString);
				
				$.each(resp.String, function(index, value) {					
					$('#StringBox').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
				if (!$("#CaboPositivo").length){
				newCaboA.append(colsCaboA);
				$("#orderTable tbody").append(newCaboA);
					
				$.each(resp.CaboA, function(index, value){
						$('#CaboPositivo').append($("<option></option>").attr("value", value.id).text(value.name));
					});				
				}			
				
				if (!$("#CaboNegativo").length){
					newCaboB.append(colsCaboB);
					$("#orderTable tbody").append(newCaboB);

					$.each(resp.CaboB , function(index, value) {					
						$('#CaboNegativo').append($("<option></option>").attr("value", value.id).text(value.name));
					});	
				}				

				
				if (!$("#ConectoresMC4").length){
				newConectores.append(colsConectores);
				$("#orderTable tbody").append(newConectores);
				
				$.each(resp.Conectores , function(index, value) {					
					$('#ConectoresMC4').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
				if (!$("#KitdeFixação").length){
					newKitFix.append(colsKitFix);
					$("#orderTable tbody").append(newKitFix);

					$.each(resp.KitFix, function(index, value) {					
						$('#KitdeFixação').append($("<option></option>").attr("value", value.id).text(value.name));
					});
				}
				
				if (resp.producerKit != "Pratyc"){
					if (!$("#Trilho").length){
					newTrilho.append(colsTrilho);
					$("#orderTable tbody").append(newTrilho);

					$.each(resp.Trilho , function(index, value) {					
						$('#Trilho').append($("<option></option>").attr("value", value.id).text(value.name));
					});
					}
				}
				
					$(".selectKitProd").select3({});
					return false;
				}
			});
				return false;
		} else if($(".type-order").val() == "1"  && fabricante == "ENPHASE"){
		//	console.log("Foi ii");
			//		console.log($(".type-order").val() + " - " + fabricante);
		
		
							
				$( "#orderTable tbody" ).empty();				
			  var TipoRede = $("#tensao").val();
						$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "selectKit",
						model: modelKit,
						producerInversor: producerInversor,
						producerKit: producerKit,
						producerCabo: producerCabo,
					  TipoRede:TipoRede
			},
			error: function() {
				console.log("ERRO");
			},
			success: function(resp) {	
				
				
			  var KwP = $("#kwp").val();
				var TipoRede = $("#tensao").val();
				var fases = $("#fases").val();
				var medir = $("#medir").val();
				var medir_cc = $("#medir_cc").val();
				
	//			 console.log("rede " + TipoRede);
				
				
				
				 var newRow = $('<tr data-type="Painel">');
				 var newKitFix = $('<tr data-type="KitdeFixação">');
				 var newInversor = $('<tr data-type="Inversor">');
				 var newcaboQ = $('<tr id="caboQ" data-type="caboQ">');	
				 var newConectorTerm = $('<tr data-type="conectorTerm">');
				 var newTrilho = $('<tr data-type="Trilho">');
				 var newParafuso = $('<tr data-type="parafuso">');
				 var newGetway = $('<tr id="GATEWAY" data-type="gateway">');
			
				
				 var colsKit = "";
				 var colsKitFix = "";
				 var colsInversor = "";	
				 var colsCaboQ = "";
				 var colsTerm = "";
         var colsParafuso = "";
         var colsGetway = "";
				 var colsTrilho = "";
			//	 var colsConectores = "";				 		
	

			
							// TD PAINEL
				colsKit += '<td><select onchange="caboKwp()"  onchange="autosave()"  class=" autosave select-table selectProduct calcPrice selectKitProd" onchange="javascript:valorTotal(this)" id="Painel" style="width:100%"><option value="0" selected hidden>Painel</option>';	
				colsKit += '</select></td>';
				colsKit += '<td><a onchange="autosave()"  href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsKit += '<td><input  onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsKit += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsKit += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}			
				
				colsKit += '<td><input   class="input-table-order unitTotal totalUnit" readonly></td>';
				colsKit += '<td type="hidden" hidden><input  onchange="autosave()"  type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsKit += '<td type="hidden" hidden><input onchange="autosave()"  class="input-table-order margemTotal totalUnit" readonly></td>';
				colsKit += '<td>';
				colsKit += '<a class="erase-line"  onchange="autosave()"  onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a></td>';	
								
				//TD INVERSOR
				colsInversor += '<td><select onchange="autosave()" onchange="calcPrice()" class="autosave select-table selectProduct calcPrice selectKitProd" onchange="javascript:valorTotal(this)" id="Inversor" style="width:100%"><option value="0" selected hidden>Micro-inversor</option>';	
				colsInversor += '</select></td>';
				colsInversor += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsInversor += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsInversor += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsInversor += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsInversor += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsInversor += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsInversor += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsInversor += '<td>';
				colsInversor += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				colsParafuso += '<td><select onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" onchange="javascript:valorTotal(this)" id="parafuso" style="width:100%"><option value="0" selected hidden>Parafuso Cabeça de Martelo</option>';	
				colsParafuso += '</select></td>';
				colsParafuso += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsParafuso += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsParafuso += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsParafuso += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsParafuso += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsParafuso += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsParafuso += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsParafuso += '<td>';
				colsParafuso += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
			
				
				
				
				colsCaboQ += '<td><select onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" onchange="javascript:valorTotal(this)" id="CaboQ" style="width:100%"><option value="0" selected hidden>Cabo Q</option>';	
				colsCaboQ += '</select></td>';
				colsCaboQ += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsCaboQ += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsCaboQ += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsCaboQ += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsCaboQ += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsCaboQ += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsCaboQ += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsCaboQ += '<td>';
				colsCaboQ += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				//TD Trilho
				colsTrilho += '<td><select onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="Trilho" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Trilho</option>';	
				colsTrilho += '</select></td>';
				colsTrilho += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsTrilho += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsTrilho += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsTrilho += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}		
				
				
				colsTrilho += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsTrilho += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsTrilho += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsTrilho += '<td>';
				colsTrilho += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				//TD Cabo Vermelho
				colsTerm += '<td ><select  onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="conectorTerm" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Conector Term</option>';	
				colsTerm += '</select></td>';
				colsTerm += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsTerm += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsTerm += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsTerm += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';
				}		
			
				colsTerm += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsTerm += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsTerm += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsTerm += '<td>';
				colsTerm += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
				
				

			//getway
								
				colsGetway += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="gateway" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Gateway</option>';
				colsGetway += '</select></td>';
				colsGetway += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsGetway += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsGetway += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsGetway += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsGetway += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsGetway += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsGetway += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsGetway += '<td>';
				colsGetway += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	

				//TD Kit-Fix
				colsKitFix += '<td><select onchange="autosave()" class="sautosave elect-table selectProduct calcPrice selectKitProd" onchange="javascript:valorTotal(this)" id="KitdeFixação" style="width:100%"><option value="0" selected hidden>Kit de Fixação</option>';
				colsKitFix += '</select></td>';
				colsKitFix += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsKitFix += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsKitFix += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsKitFix += '<td><input onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}		
				
				colsKitFix += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsKitFix += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsKitFix += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsKitFix += '<td>';
				colsKitFix += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
						
			
			
			
			
	//		console.log(colsCaboQ);
							
				if (!$("#Painel").length){
					newRow.append(colsKit);
					$("#orderTable tbody").append(newRow);

					$.each(resp.Kit, function(index, value) {					
						$('#Painel').append($("<option></option>").attr("value", value.id).text(value.name));
					});
				}
				
				if (!$("#Inversor").length){
				newInversor.append(colsInversor);
				$("#orderTable tbody").append(newInversor);
				
				$.each(resp.Inversor, function(index, value) {					
					$('#Inversor').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
		  	if (!$("#parafuso").length){
				newParafuso.append(colsParafuso);
				$("#orderTable tbody").append(newParafuso);
				
				$.each(resp.parafuso, function(index, value) {					
					$('#parafuso').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
				
				if (!$("#CaboQ").length){
				newcaboQ.append(colsCaboQ);
				$("#orderTable tbody").append(newcaboQ);
				
				$.each(resp.caboQ, function(index, value) {					
					$('#CaboQ').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
				if (!$("#conectorTerm").length){
				newConectorTerm.append(colsTerm);
				$("#orderTable tbody").append(newConectorTerm);
					
				$.each(resp.caboTerm, function(index, value){
						$('#conectorTerm').append($("<option></option>").attr("value", value.id).text(value.name));
					});				
				}			

				
				if(medir_cc == 1){
				 var newConectFemea = $('<tr id="ConectorFemeatr" data-type="ConectorFemeatr">');
				 var newConectMacho = $('<tr id="ConectorMachotr" data-type="ConectorMachotr">');
			   var newCaboPP = $('<tr id="Cabo" data-type="Cabo">');
				 var colsConectorFemea = "";
				 var colsConectorMacho = "";
				 var colsCaboPP = "";
				
				
				colsConectorFemea += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="ConectorFemea" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Conector Fêmea</option>';
				colsConectorFemea += '</select></td>';
				colsConectorFemea += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsConectorFemea += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsConectorFemea += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsConectorFemea += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsConectorFemea += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsConectorFemea += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsConectorFemea += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsConectorFemea += '<td>';
				colsConectorFemea += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
				
				
				
				colsConectorMacho += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="ConectorMacho" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Conector Macho</option>';
				colsConectorMacho += '</select></td>';
				colsConectorMacho += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsConectorMacho += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsConectorMacho += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsConectorMacho += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsConectorMacho += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsConectorMacho += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsConectorMacho += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsConectorMacho += '<td>';
				colsConectorMacho += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
				
				
				
				colsCaboPP += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="caboPP" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Cabo PP</option>';
				colsCaboPP += '</select></td>';
				colsCaboPP += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsCaboPP += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsCaboPP += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsCaboPP += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsCaboPP += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsCaboPP += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsCaboPP += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsCaboPP += '<td>';
				colsCaboPP += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
					
					
									
				if (!$("#ConectorFemea").length){
					newConectFemea.append(colsConectorFemea);
					$("#orderTable tbody").append(newConectFemea);

					$.each(resp.conectorFemea , function(index, value) {					
						$('#ConectorFemea').append($("<option></option>").attr("value", value.id).text(value.name));
					});	
				}	
				
				if (!$("#ConectorMacho").length){
					newConectMacho.append(colsConectorMacho);
					$("#orderTable tbody").append(newConectMacho);

					$.each(resp.conectorMacho , function(index, value) {					
						$('#ConectorMacho').append($("<option></option>").attr("value", value.id).text(value.name));
					});	
				}	
				
				if (!$("#caboPP").length){
					newCaboPP.append(colsCaboPP);
					$("#orderTable tbody").append(newCaboPP);

					$.each(resp.caboPP , function(index, value) {					
						$('#caboPP').append($("<option></option>").attr("value", value.id).text(value.name));
					});	
				}	
					
					
		}
	
				
		if(medir == "1"){
				 var newCT = $('<tr id="Suporte" data-type="Suporte">');
				 var colsCT = "";	
					
				colsCT += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="tcs" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>TC´s</option>';
				colsCT += '</select></td>';
				colsCT += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsCT += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsCT += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsCT += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsCT += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsCT += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsCT += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsCT += '<td>';
				colsCT += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
						
			  if (!$("#tcs").length){
				newCT.append(colsCT);
				$("#orderTable tbody").append(newCT);
				
				$.each(resp.TCS , function(index, value) {					
					$('#tcs').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
			}
				
				
		  var Kwp = $("#kwp").val();
	
				if((TipoRede <=  "2")  && fases >= '2' && Kwp >= '15' ){
				 var newAcoplador = $('<tr id="acopladorTD" data-type="acoplador">');
				 var colsAcoplador = "";
					
								//acoplador
		  	colsAcoplador += '<td><select   onchange="autosave()" class="autosave select-table selectProduct calcPrice selectKitProd" id="acoplador" onchange="javascript:valorTotal(this)" style="width:100%"><option value="0" selected hidden>Acoplador</option>';
				colsAcoplador += '</select></td>';
				colsAcoplador += '<td><a onchange="autosave()" href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
				colsAcoplador += '<td><input onchange="autosave()" class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
				
				if (resp.conta == "integrador"){
				colsAcoplador += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
				} else {
				colsAcoplador += '<td><input  onchange="autosave()" class="input-table-order unitPrice totalUnit" readonly></td>';	
				}	
				
				colsAcoplador += '<td><input onchange="autosave()" class="input-table-order unitTotal totalUnit" readonly></td>';
				colsAcoplador += '<td type="hidden" hidden><input onchange="autosave()" type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
				colsAcoplador += '<td type="hidden" hidden><input onchange="autosave()" class="input-table-order margemTotal totalUnit" readonly></td>';
				colsAcoplador += '<td>';
				colsAcoplador += '<a onchange="autosave()" class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';	
							
				
					if (!$("#acoplador").length){
					newAcoplador.append(colsAcoplador);
					$("#orderTable tbody").append(newAcoplador);

					$.each(resp.acoplador , function(index, value) {					
						$('#acoplador').append($("<option></option>").attr("value", value.id).text(value.name));
					});	
				}	
								}
				
				if (!$("#gateway").length){
				newGetway.append(colsGetway);
				$("#orderTable tbody").append(newGetway);
				
				$.each(resp.gateway , function(index, value) {					
					$('#gateway').append($("<option></option>").attr("value", value.id).text(value.name));
				});
				}
				
	
				
				if (!$("#KitdeFixação").length){
					newKitFix.append(colsKitFix);
					$("#orderTable tbody").append(newKitFix);

					$.each(resp.KitFix, function(index, value) {					
						$('#KitdeFixação').append($("<option></option>").attr("value", value.id).text(value.name));
					});
				}
				
				if (resp.producerKit != "Pratyc"){
					if (!$("#Trilho").length){
					newTrilho.append(colsTrilho);
					$("#orderTable tbody").append(newTrilho);

					$.each(resp.Trilho , function(index, value) {					
						$('#Trilho').append($("<option></option>").attr("value", value.id).text(value.name));
					});
					}
				}
				
					$(".selectKitProd").select3({});
					return false;
		
							}
						});
		
		}
		
	});	
	
	$("body").on("change", ".comissaoActive", function() { 
		
		if($(this).val() == "0"){
			//console.log("entrou 0");
			$(".comissao").attr("disabled", "true");
			$(".comissao").val(0);
			$(".comissaoLiquida").hide();
		} else if ($(this).val() == "1" || $(this).val() == "2"){
			//console.log("entrou 1");
			$(".comissao").removeAttr('disabled');
			$(".comissao").removeAttr("display");
			$(".comissaoLiquida").show();
		}
	});
	
	$("body").on("change", ".calcPrice", function() {	
		
			if ($(this).data("type") == "status"){
					if ($(this).find('option:selected').val() != "2"){
					return false;
				} else {
					statusRenew = 1;
					toastr.options = {

						closeButton: true,

						progressBar: true,

						preventDuplicates: true,

						positionClass: 'toast-top-right',

						onclick: null

					};
					toastr.info('Preço atualizado de acordo com o estoque atual!');					
					console.log(statusRenew);
				}
			}
		
			
		
			var url = document.baseURI;
					
			var ufClient = $(".inputUF").val();
		  var ufBranch = $(".uf-branch").val();
			var frete = $(".frete").find('option:selected').val();
			var ufFrete = $(".ufFrete").find('option:selected').val();
			var typeClient = $(".type-client").val();
			var typeOrder = $(".type-order").val();		 
			var paymentMode = $(".paymentMode").find('option:selected').val();
			var useConsume = $(".use-consume").val();
		  var comissao = $(".comissao").val();
			var desconto = $(".desconto").val();
			var margemtotalCampo = $(".margemLucro").val().replace(/[^0-9.,]/g, "");
			var kwp = $("#kwp").val();
			var descontoReal = $(".descontoReal").val();
			var qntPainel = 0;
		  var qntKit = 0;
		  var idKit = 0;
			var recalcProd = 0;
		  var qnt = "";
			
			//console.log(comissao);
			if (ufClient == null || ufBranch == null || typeOrder  == null){
				return false;
			}	
			
			if ($(this).data('type') == "kwp" || $(this).data('type') == "renew"){				
				recalcProd = 1;
			}
		
			// Get ready tags
			$(".selectProduct").each(function() {
			var id = $(this).parent().parent().find('td').find('select').val();				
     	
			if (id == 0){
					return true;
			}
				
			var painelNow = 0;
				
			$("#orderTable tr").each(function() {	
				if ($(this).data('type') == "Painel"){					
					qntPainel = $(this).find('td:nth-child(3)').find('input').val();					
				} else if ($(this).data('type') == "KitdeFixação"){					
					qntKit = $(this).find('td:nth-child(3)').find('input').val();
					idKit = $(this).find('td:nth-child(1)').find('option:selected').val();			
				} else if ($(this).data('type') == "CaboPositivo"){					
					qntKit = $(this).find('td:nth-child(3)').find('input').val();
					idKit = $(this).find('td:nth-child(1)').find('option:selected').val();			
				} else if ($(this).data('type') == "CaboNegativo"){					
					qntKit = $(this).find('td:nth-child(3)').find('input').val();
					idKit = $(this).find('td:nth-child(1)').find('option:selected').val();			
				}
			});
			
			if (recalcProd == 1){
				qnt = "";
			}	else {
				qnt = $(this).parent().parent().find('td:nth-child(3)').find('input').val();
			}
							
			var linha = $(this).parent().parent();
			//console.log(qntPainel);
			var tensao = $("#tensao").val();	
		  var fases = $("#fases").val();	
				
			$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "calcValue",
              id: id,
							qnt: qnt,
							painel: qntPainel,
						  kit: qntKit,
						  idkit: idKit,
							desconto: desconto,
							margemtotalCampo: margemtotalCampo,
							typeOrder: typeOrder,
						  comissaoActive: $(".comissaoActive").val(),
							ufClient: ufClient,													
							ufBranch: ufBranch,
							descontoReal: descontoReal,
							frete: frete,
						 	paymentMode: paymentMode,
							typeClient: typeClient,
							useConsume: useConsume,
							comissao: comissao,		
							kwp: kwp,
						  tensao:tensao,
						  fases:fases
          },
          error: function(resp) {
            console.log(resp);
          },
          success: function(resp) {
						
						//console.log(resp);
						
						if (resp.kwpReal != 0){
							$(".kwpReal").val(parseFloat(resp.kwpReal.toFixed(2)));
						}	
						
						linha.find('td:nth-child(2)').find('a').attr("href", resp.datasheet);
						
						if (resp.datasheet != "javascript:void(0)"){
							linha.find('td:nth-child(2)').find('a').attr("style", "color:#212121");
							linha.find('td:nth-child(2)').find('a').attr("target", "_blank");
						}
						
						var valorTotal = resp.qnt * resp.value;
						linha.find('td:nth-child(3)').find('input').val(resp.qnt);
						linha.find('td:nth-child(4)').find('input').val(resp.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));					
						linha.find('td:nth-child(5)').find('input').val(valorTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						linha.find('td:nth-child(6)').find('input').val(resp.precototalsemjuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
					  linha.find('td:nth-child(7)').find('input').val(resp.margemProduto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						var vunitTotal = 0;						
						var vtotalTotal = 0;
						var vPriceLiquid = 0;					
						var vunitTotalPorcent = 0;
						var vmargemtotal = 0;
						var vtotalTotalSemJuros = 0;
						
						$("#orderTable tr").each(function() {
							
							if ($(this).find("input.unitPrice").val() != null){
								if ($(this).find("input.unitPrice").val()){
									var unittotal = $(this).find("input.unitPrice").val().replace(/[^0-9.,]/g, "");
									unittotal = unittotal.replace(".", "");
									unittotal = unittotal.replace(",", ".");
									vunitTotal += parseFloat(unittotal);				
								} 
							}	
							
							if ($(this).find("input.margemTotal").val() != null){
								if ($(this).find("input.margemTotal").val()){
											var margemtotal = $(this).find("input.margemTotal").val().replace(/[^0-9,]/g, "");								
											margemtotal = margemtotal.replace(".", "");
											margemtotal = margemtotal.replace(",", ".");										
											vmargemtotal += parseFloat(margemtotal);				
									} 
							}
							
						  if ($(this).find("input.priceLiq").val() != null){
								if ($(this).find("input.priceLiq").val()){
											var unittotalliquid = $(this).find("input.priceLiq").val().replace(/[^0-9,]/g, "");								
											unittotalliquid = unittotalliquid.replace(".", "");
											unittotalliquid = unittotalliquid.replace(",", ".");										
											vtotalTotalSemJuros += parseFloat(unittotalliquid);				
									} 
							}


							if ($(this).find("input.unitTotal").val() != null){
								if ($(this).find("input.unitTotal").val()){
									var unittotaltotal = $(this).find("input.unitTotal").val().replace(/[^0-9,]/g, "")
									unittotaltotal = unittotaltotal.replace(".", "");
									unittotaltotal = unittotaltotal.replace(",", ".");
									vtotalTotal += parseFloat(unittotaltotal);
									//console.log( "Total:" + vtotalTotal);
								} 
							}

						});
						
						$("#vtotalPriceSemJuros").val(vtotalTotalSemJuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						
						if($(".comissaoActive").val() == "2"){
							var comissao = $(".comissao").val();
							comissao = comissao.replace("R$ ", "");
							comissao = comissao.replace(".", "");
							comissao = comissao.replace(",", ".");
							
							if(comissao == 0){
								comissao = "0";
							}
							
							vtotalTotal += parseFloat(comissao);
							
							var valorJuros = (9.25/100) * comissao;
							
							var comissaoLiquida = comissao - valorJuros;	
							$(".comissaoLiquida").val(comissaoLiquida.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							
						} else if ($(".comissaoActive").val() == "1"){
							var comissao1 = $(".comissao").val();
							comissao1 = comissao1.replace(".", "");
							comissao1 = comissao1.replace(",", ".");
							//console.log("Comissão 1: " + comissao1);
						
							
							var precoComissao = $("#vtotalPriceSemJuros").val().replace(/[^0-9.,]/g, "");
							//console.log("Preço Comissão(0): " + precoComissao);
							precoComissao = precoComissao.replaceAll(".", "");							
							//console.log("Preço Comissão(1): " + precoComissao);
							precoComissao = precoComissao.replace(",", ".");								
							//console.log("Preço Comissão(2): " + precoComissao);
							precoComissao = precoComissao - (precoComissao * (parseFloat($(".desconto").val())/100));
							//console.log("Preço Comissão(3): " + precoComissao);							
							
							
							var valorPorcentagem = precoComissao * (comissao1/100);						
							
							var precoComissaoLiquida = 0.0925 * valorPorcentagem;	
							//console.log("Comissão Liquida: " + precoComissaoLiquida);
							var valorFinal = (valorPorcentagem - precoComissaoLiquida);
							//console.log(precoComissao + " " + precoComissaoLiquida);
							$(".comissaoLiquida").val(valorFinal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							if(comissao1 == 0){
								var zero = 0; 
								$(".comissaoLiquida").val(zero.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							}
						}		
								console.log(vtotalTotal);	
						$("#vuntTotal").val(vunitTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						$("#vmargemTotal").val(vmargemtotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));	
						$("#vtotalTotal").val(vtotalTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						var margemCampo2 = (vmargemtotal / vtotalTotal) * 100;			
						//console.log("MB: " + vmargemtotal + " - Total: " + vtotalTotal);
						var desconto = (resp.desconto * 100);
						
						if(desconto == null){
							desconto = 0;
						}
						
						
						var margemReal1 = parseFloat(margemCampo2) - parseFloat(desconto);	
						var margemReal = margemReal1 + parseFloat(resp.margemUsuario);
						//console.log("Margem Campo: " + margemCampo2 + " - MB: " + margemReal + " - Desconto: " + desconto);
						
						$(".margemLucro").val(margemReal.toFixed(2) + "%");	
						$(".desconto").val((resp.desconto * 100).toFixed(2) + "%");	
						
						if (resp.desconto == 0){
						$(".desconto").val(0) + "%";	
						}
						
						canSave = 0;
          }
      });
					canSave = 0;
			});	
	});
	
	$("body").on("change", ".selectProduct", function() {	
		
			console.log("Entrou Funçao");

			if ($(this).data("type") == "status"){
					if ($(this).find('option:selected').val() != "2"){
					return false;
				} else {
					statusRenew = 1;
					toastr.options = {

						closeButton: true,

						progressBar: true,

						preventDuplicates: true,

						positionClass: 'toast-top-right',

						onclick: null

					};
					toastr.info('Preço atualizado de acordo com o estoque atual!');					
					//console.log(statusRenew);
				}
			}
		
			
		
			var url = document.baseURI;
					
			var ufClient = $(".inputUF").val();
		  var ufBranch = $(".uf-branch").val();
			var frete = $(".frete").find('option:selected').val();
			var ufFrete = $(".ufFrete").find('option:selected').val();
			var typeClient = $(".type-client").val();
			var typeOrder = $(".type-order").val();		 
			var paymentMode = $(".paymentMode").find('option:selected').val();
			var useConsume = $(".use-consume").val();
		  var comissao = $(".comissao").val();
			var desconto = $(".desconto").val();
			var margemtotalCampo = $(".margemLucro").val().replace(/[^0-9.,]/g, "");
			var kwp = $("#kwp").val();
			var descontoReal = $(".descontoReal").val();
			var qntPainel = 0;
		  var qntKit = 0;
		  var idKit = 0;
			var recalcProd = 0;
		  var qnt = "";
			
			//console.log(comissao);
			if (ufClient == null || ufBranch == null || typeOrder  == null){
				return false;
			}	
			
			if ($(this).data('type') == "kwp" || $(this).data('type') == "renew"){				
				recalcProd = 1;
			}
		
			// Get ready tags
			$(".selectProduct").each(function() {
			var id = $(this).parent().parent().find('td').find('select').val();				
     	
			if (id == 0){
					return true;
			}
				
			var painelNow = 0;
				
			$("#orderTable tr").each(function() {	
				if ($(this).data('type') == "Painel"){		
					qntPainel = $(this).find('td:nth-child(3)').find('input').val();					
				} else if ($(this).data('type') == "KitdeFixação"){					
					qntKit = $(this).find('td:nth-child(3)').find('input').val();
					idKit = $(this).find('td:nth-child(1)').find('option:selected').val();			
				}
			});
			
			if (recalcProd == 1){
				qnt = "";
			}	else {
				qnt = $(this).parent().parent().find('td:nth-child(3)').find('input').val();
			}
							
			var linha = $(this).parent().parent();
			console.log("Quantidade Painel: " + qntPainel);
			var tensao = $("#tensao").val();	
		  var fases = $("#fases").val();			
			$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "calcValue",
              id: id,
							qnt: qnt,
							painel: qntPainel,
						  kit: qntKit,
						  idkit: idKit,
							desconto: desconto,
							margemtotalCampo: margemtotalCampo,
							typeOrder: typeOrder,
						  comissaoActive: $(".comissaoActive").val(),
							ufClient: ufClient,													
							ufBranch: ufBranch,
							descontoReal: descontoReal,
							frete: frete,
						 	paymentMode: paymentMode,
							typeClient: typeClient,
							useConsume: useConsume,
							comissao: comissao,		
							kwp: kwp,
						  tensao: tensao,
							fases: fases,		
          },
          error: function(resp) {
            console.log(resp);
          },
          success: function(resp) {
						
						//console.log(resp);
						
						if (resp.kwpReal != 0){
							$(".kwpReal").val(parseFloat(resp.kwpReal.toFixed(2)))
						}	
						
						if (resp.estoque == 1){
							toastr.options = {

								closeButton: true,

								progressBar: true,

								preventDuplicates: true,

								positionClass: 'toast-top-right',

								onclick: null

							};						
							var msg = "Produto sem demanda para o orçamento: <br>" + resp.nomeEstoque + " quantidade atual: " + resp.qntEstoque; 
							toastr.info(msg);	
						}
						
						linha.find('td:nth-child(2)').find('a').attr("href", resp.datasheet);
						
						if (resp.datasheet != "javascript:void(0)"){
							linha.find('td:nth-child(2)').find('a').attr("style", "color:#212121");
							linha.find('td:nth-child(2)').find('a').attr("target", "_blank");				
						}
						
						var valorTotal = resp.qnt * resp.value;
						linha.find('td:nth-child(3)').find('input').val(resp.qnt);
						linha.find('td:nth-child(4)').find('input').val(resp.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));					
						linha.find('td:nth-child(5)').find('input').val(valorTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						linha.find('td:nth-child(6)').find('input').val(resp.precototalsemjuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
					  linha.find('td:nth-child(7)').find('input').val(resp.margemProduto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						
						var vunitTotal = 0;						
						var vtotalTotal = 0;
						var vPriceLiquid = 0;					
						var vunitTotalPorcent = 0;
						var vmargemtotal = 0;
						var vtotalTotalSemJuros = 0;
						
						$("#orderTable tr").each(function() {
							
							if ($(this).find("input.unitPrice").val() != null){
								if ($(this).find("input.unitPrice").val()){
									var unittotal = $(this).find("input.unitPrice").val().replace(/[^0-9.,]/g, "");
									unittotal = unittotal.replace(".", "");
									unittotal = unittotal.replace(",", ".");
									vunitTotal += parseFloat(unittotal);				
								} 
							}	
							
							if ($(this).find("input.margemTotal").val() != null){
								if ($(this).find("input.margemTotal").val()){
											var margemtotal = $(this).find("input.margemTotal").val().replace(/[^0-9,]/g, "");								
											margemtotal = margemtotal.replace(".", "");
											margemtotal = margemtotal.replace(",", ".");										
											vmargemtotal += parseFloat(margemtotal);				
									} 
							}
							
						  if ($(this).find("input.priceLiq").val() != null){
								if ($(this).find("input.priceLiq").val()){
											var unittotalliquid = $(this).find("input.priceLiq").val().replace(/[^0-9,]/g, "");								
											unittotalliquid = unittotalliquid.replace(".", "");
											unittotalliquid = unittotalliquid.replace(",", ".");										
											vtotalTotalSemJuros += parseFloat(unittotalliquid);				
									} 
							}


							if ($(this).find("input.unitTotal").val() != null){
								if ($(this).find("input.unitTotal").val()){
									var unittotaltotal = $(this).find("input.unitTotal").val().replace(/[^0-9,]/g, "")
									unittotaltotal = unittotaltotal.replace(".", "");
									unittotaltotal = unittotaltotal.replace(",", ".");
									vtotalTotal += parseFloat(unittotaltotal);
									//console.log( "Total:" + vtotalTotal);
								} 
							}

						});
						
						$("#vtotalPriceSemJuros").val(vtotalTotalSemJuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						
						if($(".comissaoActive").val() == "2"){
							var comissao = $(".comissao").val();
							comissao = comissao.replace("R$ ", "");
							comissao = comissao.replace(".", "");
							comissao = comissao.replace(",", ".");
							
							if(comissao == 0){
								comissao = "0";
							}
							
							vtotalTotal += parseFloat(comissao);
							
							var valorJuros = (9.25/100) * comissao;
							
							var comissaoLiquida = comissao - valorJuros;	
							$(".comissaoLiquida").val(comissaoLiquida.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							
						} else if ($(".comissaoActive").val() == "1"){
							var comissao1 = $(".comissao").val();
							comissao1 = comissao1.replace(".", "");
							comissao1 = comissao1.replace(",", ".");
							//console.log("Comissão 1: " + comissao1);
						
							
							var precoComissao = $("#vtotalPriceSemJuros").val().replace(/[^0-9.,]/g, "");
							//console.log("Preço Comissão(0): " + precoComissao);
							precoComissao = precoComissao.replaceAll(".", "");							
							//console.log("Preço Comissão(1): " + precoComissao);
							precoComissao = precoComissao.replace(",", ".");								
							//console.log("Preço Comissão(2): " + precoComissao);
							precoComissao = precoComissao - (precoComissao * (parseFloat($(".desconto").val())/100));
							//console.log("Preço Comissão(3): " + precoComissao);							
							
							
							var valorPorcentagem = precoComissao * (comissao1/100);						
							
							var precoComissaoLiquida = 0.0925 * valorPorcentagem;	
							//console.log("Comissão Liquida: " + precoComissaoLiquida);
							var valorFinal = (valorPorcentagem - precoComissaoLiquida);
							//console.log(precoComissao + " " + precoComissaoLiquida);
							$(".comissaoLiquida").val(valorFinal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							if(comissao1 == 0){
								var zero = 0; 
								$(".comissaoLiquida").val(zero.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							}
						}		
									console.log(vtotalTotal);
						$("#vuntTotal").val(vunitTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						$("#vmargemTotal").val(vmargemtotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));	
						$("#vtotalTotal").val(vtotalTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						var margemCampo2 = (vmargemtotal / vtotalTotal) * 100;			
						//console.log("MB: " + vmargemtotal + " - Total: " + vtotalTotal);
						var desconto = (resp.desconto * 100);
						
						if(desconto == null){
							desconto = 0;
						}
						
						var margemReal1 = parseFloat(margemCampo2) - parseFloat(desconto);	
						var margemReal = margemReal1 + parseFloat(resp.margemUsuario);
						//console.log("Margem Campo: " + margemCampo2 + " - MB: " + margemReal + " - Desconto: " + desconto);
						
						$(".margemLucro").val(margemReal.toFixed(2) + "%");	
						$(".desconto").val((resp.desconto * 100).toFixed(2) + "%");	
						
						if (resp.desconto == 0){
						$(".desconto").val(0) + "%";	
						}
						
						canSave = 0;						
          }
      });
					canSave = 0;
			});	
	});
	

	
	$("body").on("click", ".calcPrice", function() {	

		
			if ($(this).data("type") == "status"){
					if ($(this).find('option:selected').val() != "2"){
					return false;
				} else {
					statusRenew = 1;
					toastr.options = {

						closeButton: true,

						progressBar: true,

						preventDuplicates: true,

						positionClass: 'toast-top-right',

						onclick: null

					};
					toastr.info('Preço atualizado de acordo com o estoque atual!');					
					//console.log(statusRenew);
				}
			}
		
			
		
			var url = document.baseURI;
					
			var ufClient = $(".inputUF").val();
		  var ufBranch = $(".uf-branch").val();
			var frete = $(".frete").find('option:selected').val();
			var ufFrete = $(".ufFrete").find('option:selected').val();
			var typeClient = $(".type-client").val();
			var typeOrder = $(".type-order").val();		 
			var paymentMode = $(".paymentMode").find('option:selected').val();
			var useConsume = $(".use-consume").val();
		  var comissao = $(".comissao").val();
			var desconto = $(".desconto").val();
			var margemtotalCampo = $(".margemLucro").val().replace(/[^0-9.,]/g, "");
			var kwp = $("#kwp").val();
			var descontoReal = $(".descontoReal").val();
			var qntPainel = 0;
		  var qntKit = 0;
		  var idKit = 0;
			var recalcProd = 0;
		  var qnt = "";
			
			//console.log(comissao);
			if (ufClient == null || ufBranch == null || typeOrder  == null){
				return false;
			}	
			
			if ($(this).data('type') == "kwp" || $(this).data('type') == "renew"){				
				recalcProd = 1;
			}
		
			// Get ready tags
			$(".selectProduct").each(function() {
			var id = $(this).parent().parent().find('td').find('select').val();				
     	
			if (id == 0){
					return true;
			}
				
			var painelNow = 0;
				
			$("#orderTable tr").each(function() {	
				if ($(this).data('type') == "Painel"){					
					qntPainel = $(this).find('td:nth-child(3)').find('input').val();					
				} else if ($(this).data('type') == "KitdeFixação"){					
					qntKit = $(this).find('td:nth-child(3)').find('input').val();
					idKit = $(this).find('td:nth-child(1)').find('option:selected').val();			
				}
			});
			
			if (recalcProd == 1){
				qnt = "";
			}	else {
				qnt = $(this).parent().parent().find('td:nth-child(3)').find('input').val();
			}
							
			var linha = $(this).parent().parent();
			//console.log(qntPainel);
			var tensao = $("#tensao").val();	
		  var fases = $("#fases").val();	
				
				
			$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "calcValue",
              id: id,
							qnt: qnt,
							painel: qntPainel,
						  kit: qntKit,
						  idkit: idKit,
							desconto: desconto,
							margemtotalCampo: margemtotalCampo,
							typeOrder: typeOrder,
						  comissaoActive: $(".comissaoActive").val(),
							ufClient: ufClient,													
							ufBranch: ufBranch,
							descontoReal: descontoReal,
							frete: frete,
						 	paymentMode: paymentMode,
							typeClient: typeClient,
							useConsume: useConsume,
							comissao: comissao,		
							kwp: kwp,
						  tensao:tensao,
						  fases:fases
          },
          error: function() {
            console.log("Erro de Valor");
          },
          success: function(resp) {
				
						console.log(resp);
						
						console.log("KWP" + resp.kwpRea);
						
						if (resp.kwpReal != 0){
							$(".kwpReal").val(parseFloat(resp.kwpReal.toFixed(2)))
						}	
						
						if (resp.estoque == 1){
							toastr.options = {

								closeButton: true,

								progressBar: true,

								preventDuplicates: true,

								positionClass: 'toast-top-right',

								onclick: null

							};						
							var msg = "Produto sem demanda para o orçamento: <br>" + resp.nomeEstoque + " quantidade atual: " + resp.qntEstoque; 
							toastr.info(msg);	
						}
						
						linha.find('td:nth-child(2)').find('a').attr("href", resp.datasheet);
						
						if (resp.datasheet != "javascript:void(0)"){
							linha.find('td:nth-child(2)').find('a').attr("style", "color:#212121");
							linha.find('td:nth-child(2)').find('a').attr("target", "_blank");				
						}
						console.log(resp.qnt + "buro");
						var valorTotal = resp.qnt * resp.value;
						linha.find('td:nth-child(3)').find('input').val(resp.qnt);
						linha.find('td:nth-child(4)').find('input').val(resp.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));					
						linha.find('td:nth-child(5)').find('input').val(valorTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						linha.find('td:nth-child(6)').find('input').val(resp.precototalsemjuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
					  linha.find('td:nth-child(7)').find('input').val(resp.margemProduto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						
						var vunitTotal = 0;						
						var vtotalTotal = 0;
						var vPriceLiquid = 0;					
						var vunitTotalPorcent = 0;
						var vmargemtotal = 0;
						var vtotalTotalSemJuros = 0;
						
						$("#orderTable tr").each(function() {
							
							if ($(this).find("input.unitPrice").val() != null){
								if ($(this).find("input.unitPrice").val()){
									var unittotal = $(this).find("input.unitPrice").val().replace(/[^0-9.,]/g, "");
									unittotal = unittotal.replace(".", "");
									unittotal = unittotal.replace(",", ".");
									vunitTotal += parseFloat(unittotal);				
								} 
							}	
							
							if ($(this).find("input.margemTotal").val() != null){
								if ($(this).find("input.margemTotal").val()){
											var margemtotal = $(this).find("input.margemTotal").val().replace(/[^0-9,]/g, "");								
											margemtotal = margemtotal.replace(".", "");
											margemtotal = margemtotal.replace(",", ".");										
											vmargemtotal += parseFloat(margemtotal);				
									} 
							}
							
						  if ($(this).find("input.priceLiq").val() != null){
								if ($(this).find("input.priceLiq").val()){
											var unittotalliquid = $(this).find("input.priceLiq").val().replace(/[^0-9,]/g, "");								
											unittotalliquid = unittotalliquid.replace(".", "");
											unittotalliquid = unittotalliquid.replace(",", ".");										
											vtotalTotalSemJuros += parseFloat(unittotalliquid);				
									} 
							}


							if ($(this).find("input.unitTotal").val() != null){
								if ($(this).find("input.unitTotal").val()){
									var unittotaltotal = $(this).find("input.unitTotal").val().replace(/[^0-9,]/g, "")
									unittotaltotal = unittotaltotal.replace(".", "");
									unittotaltotal = unittotaltotal.replace(",", ".");
									vtotalTotal += parseFloat(unittotaltotal);
									//console.log( "Total:" + vtotalTotal);
								} 
							}

						});
						
						$("#vtotalPriceSemJuros").val(vtotalTotalSemJuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						
						if($(".comissaoActive").val() == "2"){
							var comissao = $(".comissao").val();
							comissao = comissao.replace("R$ ", "");
							comissao = comissao.replace(".", "");
							comissao = comissao.replace(",", ".");
							
							if(comissao == 0){
								comissao = "0";
							}
							
							vtotalTotal += parseFloat(comissao);
							
							var valorJuros = (9.25/100) * comissao;
							
							var comissaoLiquida = comissao - valorJuros;	
							$(".comissaoLiquida").val(comissaoLiquida.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							
						} else if ($(".comissaoActive").val() == "1"){
							var comissao1 = $(".comissao").val();
							comissao1 = comissao1.replace(".", "");
							comissao1 = comissao1.replace(",", ".");
							//console.log("Comissão 1: " + comissao1);
						
							
							var precoComissao = $("#vtotalPriceSemJuros").val().replace(/[^0-9.,]/g, "");
							//console.log("Preço Comissão(0): " + precoComissao);
							precoComissao = precoComissao.replaceAll(".", "");							
							//console.log("Preço Comissão(1): " + precoComissao);
							precoComissao = precoComissao.replace(",", ".");								
							//console.log("Preço Comissão(2): " + precoComissao);
							precoComissao = precoComissao - (precoComissao * (parseFloat($(".desconto").val())/100));
							//console.log("Preço Comissão(3): " + precoComissao);							
							
							
							var valorPorcentagem = precoComissao * (comissao1/100);						
							
							var precoComissaoLiquida = 0.0925 * valorPorcentagem;	
							//console.log("Comissão Liquida: " + precoComissaoLiquida);
							var valorFinal = (valorPorcentagem - precoComissaoLiquida);
							//console.log(precoComissao + " " + precoComissaoLiquida);
							$(".comissaoLiquida").val(valorFinal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							if(comissao1 == 0){
								var zero = 0; 
								$(".comissaoLiquida").val(zero.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							}
						}		
									
						$("#vuntTotal").val(vunitTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						$("#vmargemTotal").val(vmargemtotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));	
						$("#vtotalTotal").val(vtotalTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						var margemCampo2 = (vmargemtotal / vtotalTotal) * 100;			
						//console.log("MB: " + vmargemtotal + " - Total: " + vtotalTotal);
						var desconto = (resp.desconto * 100);
						
						if(desconto == null){
							desconto = 0;
						}
						
						var margemReal1 = parseFloat(margemCampo2) - parseFloat(desconto);	
						var margemReal = margemReal1 + parseFloat(resp.margemUsuario);
						//console.log("Margem Campo: " + margemCampo2 + " - MB: " + margemReal + " - Desconto: " + desconto);
						
						$(".margemLucro").val(margemReal.toFixed(2) + "%");	
						$(".desconto").val((resp.desconto * 100).toFixed(2) + "%");	
						
						if (resp.desconto == 0){
						$(".desconto").val(0) + "%";	
						}
						
						canSave = 0;						
          }
      });
					canSave = 0;
			});	
	});
	
	$("body").on("click", ".desconto", function() {
		$(this).val("");
	});
	
	$("body").on("click", ".renewField", function() {
	
		console.log("reiniciou");
		
			console.log("RENEW FIELD");
		
			if ($(this).data("type") == "status"){
					if ($(this).find('option:selected').val() != "2"){
					return false;
				} else {
					statusRenew = 1;
					toastr.options = {

						closeButton: true,

						progressBar: true,

						preventDuplicates: true,

						positionClass: 'toast-top-right',

						onclick: null

					};
					toastr.info('Preço atualizado de acordo com o estoque atual!');					
					console.log(statusRenew);
				}
			}
		
			
		
			var url = document.baseURI;
					
			var ufClient = $(".inputUF").val();
		  var ufBranch = $(".uf-branch").val();
			var frete = $(".frete").find('option:selected').val();
			var ufFrete = $(".ufFrete").find('option:selected').val();
			var typeClient = $(".type-client").val();
			var typeOrder = $(".type-order").val();		 
			var paymentMode = $(".paymentMode").find('option:selected').val();
			var useConsume = $(".use-consume").val();
		  var comissao = $(".comissao").val();
			var desconto = $(".desconto").val();
			var margemtotalCampo = $(".margemLucro").val().replace(/[^0-9.,]/g, "");
			var kwp = $("#kwp").val();
			var descontoReal = $(".descontoReal").val();
			var qntPainel = 0;
		  var qntKit = 0;
		  var idKit = 0;
			var recalcProd = 0;
		  var qnt = "";
			
			//console.log(comissao);
			if (ufClient == null || ufBranch == null || typeOrder  == null){
				return false;
			}	
			
			if ($(this).data('type') == "kwp" || $(this).data('type') == "renew"){				
				recalcProd = 1;
			}
		
			// Get ready tags
			$(".selectProduct").each(function() {
			var id = $(this).parent().parent().find('td').find('select').val();				
     	
			if (id == 0){
					return true;
			}
				
			var painelNow = 0;
				
			$("#orderTable tr").each(function() {	
				if ($(this).data('type') == "Painel"){					
					qntPainel = $(this).find('td:nth-child(3)').find('input').val();					
				} else if ($(this).data('type') == "KitdeFixação"){					
					qntKit = $(this).find('td:nth-child(3)').find('input').val();
					idKit = $(this).find('td:nth-child(1)').find('option:selected').val();			
				}
			});
			
			if (recalcProd == 1){
				qnt = "";
			}	else {
				qnt = $(this).parent().parent().find('td:nth-child(3)').find('input').val();
			}
							
			var linha = $(this).parent().parent();
			//console.log(qntPainel);
			var tensao = $("#tensao").val();	
		  var fases = $("#fases").val();
				
			$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "calcValue",
              id: id,
							qnt: qnt,
							painel: qntPainel,
						  kit: qntKit,
						  idkit: idKit,
							desconto: desconto,
							margemtotalCampo: margemtotalCampo,
							typeOrder: typeOrder,
						  comissaoActive: $(".comissaoActive").val(),
							ufClient: ufClient,													
							ufBranch: ufBranch,
							descontoReal: descontoReal,
							frete: frete,
						 	paymentMode: paymentMode,
							typeClient: typeClient,
							useConsume: useConsume,
							comissao: comissao,		
							kwp: kwp,
						  tensao:tensao,
						  fases:fases
          },
          error: function() {
            console.log("Erro de Valor");
          },
          success: function(resp) {
			
// 						//cabo(resp.qnt);
// 						console.log(resp);
						
// 						if (resp.kwpReal != 0){
// 							$(".kwpReal").val(parseFloat(resp.kwpReal));
// 						}	
						
// 						linha.find('td:nth-child(2)').find('a').attr("href", resp.datasheet);
						
// 						if (resp.datasheet != "javascript:void(0)"){
// 							linha.find('td:nth-child(2)').find('a').attr("style", "color:#212121");
// 							linha.find('td:nth-child(2)').find('a').attr("target", "_blank");
// 						}
						
// 						var valorTotal = resp.qnt * resp.value;
// 						console.log(valorTotal);
// 						linha.find('td:nth-child(3)').find('input').val(resp.qnt);
// 						linha.find('td:nth-child(4)').find('input').val(resp.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));					
// 						linha.find('td:nth-child(5)').find('input').val(valorTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
// 						linha.find('td:nth-child(6)').find('input').val(resp.precototalsemjuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
// 					  linha.find('td:nth-child(7)').find('input').val(resp.margemProduto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						
// 						var vunitTotal = 0;						
// 						var vtotalTotal = 0;
// 						var vPriceLiquid = 0;					
// 						var vunitTotalPorcent = 0;
// 						var vmargemtotal = 0;
// 						var vtotalTotalSemJuros = 0;
						
// 						$("#orderTable tr").each(function() {
							
// 							if ($(this).find("input.unitPrice").val() != null){
// 								if ($(this).find("input.unitPrice").val()){
// 									var unittotal = $(this).find("input.unitPrice").val().replace(/[^0-9.,]/g, "");
// 									unittotal = unittotal.replace(".", "");
// 									unittotal = unittotal.replace(",", ".");
// 									vunitTotal += parseFloat(unittotal);				
// 								} 
// 							}	
							
// 							if ($(this).find("input.margemTotal").val() != null){
// 								if ($(this).find("input.margemTotal").val()){
// 											var margemtotal = $(this).find("input.margemTotal").val().replace(/[^0-9,]/g, "");								
// 											margemtotal = margemtotal.replace(".", "");
// 											margemtotal = margemtotal.replace(",", ".");										
// 											vmargemtotal += parseFloat(margemtotal);				
// 									} 
// 							}
							
// 						  if ($(this).find("input.priceLiq").val() != null){
// 								if ($(this).find("input.priceLiq").val()){
// 											var unittotalliquid = $(this).find("input.priceLiq").val().replace(/[^0-9,]/g, "");								
// 											unittotalliquid = unittotalliquid.replace(".", "");
// 											unittotalliquid = unittotalliquid.replace(",", ".");										
// 											vtotalTotalSemJuros += parseFloat(unittotalliquid);				
// 									} 
// 							}


// 							if ($(this).find("input.unitTotal").val() != null){
// 								if ($(this).find("input.unitTotal").val()){
// 									var unittotaltotal = $(this).find("input.unitTotal").val().replace(/[^0-9,]/g, "")
// 									unittotaltotal = unittotaltotal.replace(".", "");
// 									unittotaltotal = unittotaltotal.replace(",", ".");
// 									vtotalTotal += parseFloat(unittotaltotal);
// 									return false;
// 								} 
// 							}
								

// 						});
						
// 						$("#vtotalPriceSemJuros").val(vtotalTotalSemJuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						
// 						if($(".comissaoActive").val() == "2"){
// 							var comissao = $(".comissao").val();
// 							comissao = comissao.replace("R$ ", "");
// 							comissao = comissao.replace(".", "");
// 							comissao = comissao.replace(",", ".");
							
// 							if(comissao == 0){
// 								comissao = "0";
// 							}
							
// 							vtotalTotal += parseFloat(comissao);
// 							console.log("teste " +  vtotalTotal);
// 							var valorJuros = (9.25/100) * comissao;
							
// 							var comissaoLiquida = comissao - valorJuros;	
// 							$(".comissaoLiquida").val(comissaoLiquida.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							
// 						} else if ($(".comissaoActive").val() == "1"){
// 							var comissao1 = $(".comissao").val();
// 							comissao1 = comissao1.replace(".", "");
// 							comissao1 = comissao1.replace(",", ".");
// 							//console.log("Comissão 1: " + comissao1);
						
							
// 							var precoComissao = $("#vtotalPriceSemJuros").val().replace(/[^0-9.,]/g, "");
// 							//console.log("Preço Comissão(0): " + precoComissao);
// 							precoComissao = precoComissao.replaceAll(".", "");							
// 							//console.log("Preço Comissão(1): " + precoComissao);
// 							precoComissao = precoComissao.replace(",", ".");								
// 							//console.log("Preço Comissão(2): " + precoComissao);
// 							precoComissao = precoComissao - (precoComissao * (parseFloat($(".desconto").val())/100));
// 							//console.log("Preço Comissão(3): " + precoComissao);							
							
							
// 							var valorPorcentagem = precoComissao * (comissao1/100);						
							
// 							var precoComissaoLiquida = 0.0925 * valorPorcentagem;	
// 							//console.log("Comissão Liquida: " + precoComissaoLiquida);
// 							var valorFinal = (valorPorcentagem - precoComissaoLiquida);
// 							//console.log(precoComissao + " " + precoComissaoLiquida);
// 							$(".comissaoLiquida").val(valorFinal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
// 							if(comissao1 == 0){
// 								var zero = 0; 
// 								$(".comissaoLiquida").val(zero.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
// 							}
// 						}		
// 								console.log( "Total:" + resp.value);
// 									console.log(vtotalTotal);
// 						$("#vuntTotal").val(vunitTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
// 						$("#vmargemTotal").val(vmargemtotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));	
// 						$("#vtotalTotal").val(vtotalTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
// 						var margemCampo2 = (vmargemtotal / vtotalTotal) * 100;			
// 						console.log("MB: " + vmargemtotal + " - Total: " + vtotalTotal);
// 						var desconto = (resp.desconto * 100);
						
// 						if(desconto == null){
// 							desconto = 0;
// 						}
						
// 						var margemReal = parseFloat(margemCampo2) - parseFloat(desconto);	
// 						console.log("Margem Campo: " + margemCampo2 + " - MB: " + margemReal + " - Desconto: " + desconto);
						
// 						$(".margemLucro").val(margemReal.toFixed(2) + "%");	
// 						$(".desconto").val((resp.desconto * 100).toFixed(2) + "%");	
						
// 						if (resp.desconto == 0){
// 						$(".desconto").val(0) + "%";	
// 						}
						
						canSave = 0;
								calcPrice();	
          }				
      });
				canSave = 0;
					
			});	
		return false;
		
	});
	
	$("body").on("click", ".calculatorKwpOff", function() { 	
		
        var url = document.baseURI;
				
        NextPost.Confirm3({
					confirm: function() {						
						
					}		
 				});
		
		$("body").on("blur", ".fielSearchKwP", function() {
    var url = document.baseURI;
			
		$.ajax({
         url: url,
         type: 'POST',
         dataType: 'jsonp',
         data: {
            action: "states"            
			},error: function() {
			console.log("Erro de Valor");
		},
		success: function(resp) {		
			//console.log(resp);			
			$(".jconfirm-buttons").prepend("<center><select id='stateKwp' style='width:500px !important' type='text' class='input select2 mb-20'></select></center>");
			$(".jconfirm-buttons").prepend("<center>Selecione a Cidade</center>");
			$('#stateKwp').append($("<option selected disabled></option>").attr("value", "0").text("Selecione"));
			$.each(resp.states, function(index, value) {
				$('#stateKwp').append($("<option></option>").attr("value", value.uf).text(value.name));
			});	
	}							       
});	
       
    });
		
		$("body").on("change", "#stateKwp", function() {
    var url = document.baseURI;       
    });
	
 });
	
	
	$("body").on("click", ".duplicar", function() { 	
			//console.log("Entrou");
			if ($(this).attr("id") == "0"){
			toastr.options = {

					closeButton: true,

					progressBar: true,

					preventDuplicates: true,

					positionClass: 'toast-top-right',

					onclick: null

				};

			toastr.warning('Verifique se o orçamento não está vencido ou ainda não foi salvo!');
			} else {
			$("body").addClass("onprogress");
      
      var products = [];				
		
			// Ler Cada Linha de Produto
      $form.find(".selectProduct").each(function() {
          var id = $(this).val();	
					var name = $(this).find('option:selected').text();				
					
					if (id == "0"){
						return true;
					}
					var p = {};             
							p.id = id;
							p.product = name; 
              p.quantidade = $(this).parent().parent().find('td:nth-child(3)').find('input').val();
							p.price = $(this).parent().parent().find('td:nth-child(4)').find('input').val();						
							p.priceTotal = $(this).parent().parent().find('td:nth-child(5)').find('input').val();
							p.margemLucroP = $(this).parent().parent().find('td:nth-child(6)').find('input').val();
          		
							if (p.quantidade == 0 || p.quantidade == null){
								toastr.options = {

									closeButton: true,

									progressBar: true,

									preventDuplicates: true,

									positionClass: 'toast-top-right',

									onclick: null

							};

							toastr.warning('Por favor confira a quantidade dos equipamentos selecionados!');
							return false;
							}
          products.push(p);
      });
		
		
		//console.log("MB: " + $(".margemLucro").val());
		var description = $(".description").val();
			
      
				$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "copy",
							renew: statusRenew,
             	status: $(".status").val(),
             	
							client: $(".selectCliente").val(),
							useConsume: $(".use-consume").val(),
							typeClient: $(".type-client").val(),
							valorFrete: $(".valorFrete").val(),
							ufClient: $(".inputUF").val(),
							margemLucro: $(".margemLucro").val(),
						  kwpReal: $(".kwpReal").val(),
						  comissao: $(".comissao").val(),
						  comissaoActive: $(".comissaoActive").val(),
							seller: $(".seller").find('option:selected').data("id"),
							typeOrder: $(".type-order").val(),
							totalUnitField: $(".totalUnitField").val(),
							description: description,							
							totalTotalField: $(".totalTotalField").val(),
							modelType: $(".model-select").val(),
							producerKit: $(".producerKit").val(),
							desconto: $(".desconto").val(),
							producerInversor: $(".producerInversor").val(),
						  producerCabo: $(".producerCabo").val(),
							power: $(".power").val(),
							branch: $(".uf-branch").val(),
							frete: $(".frete").val(),							
							ufFrete: $(".ufFrete").val(),
							paymentMode: $(".paymentMode").val(),
							products: products
          },
          error: function() {
            console.log("Erro de Valor");
          },
          success: function(resp) {	
						
						if (resp.block == 1){
						toastr.options = {

								closeButton: true,

								progressBar: true,							

								fadeIn: 4000,

								preventDuplicates: true,

								positionClass: 'toast-top-right',

								onclick: null

							};
							$("body").removeClass("onprogress");
							toastr.error('Desconto inválido! Margem minima para orçamento é de 14%' );	
							return false;
						}
						
						toastr.options = {

						closeButton: true,

						progressBar: true,							
							
						fadeIn: 4000,
							
						preventDuplicates: true,

						positionClass: 'toast-top-right',

						onclick: null

					};
										
					
					$("body").removeClass("onprogress");					
						
					toastr.success('Orçamento duplicado com sucesso!');	
						
					setTimeout(function(){
						var url_atual = window.location.origin;
						window.location.replace(url_atual + "/order/" + resp.idOrder);
					},4000);	
					
						
          }			
      });
			}
				
 			
    });
  
	$("body").on("focus", ".calcPrice", function(){
	
		canSave = 1;
		console.log(canSave);
	});
	
	$form.on("submit", function(e) {	
			//console.log(canSave);
			//console.log(canSave);
			if(canSave == 1){	
				toastr.options = {

						closeButton: true,

						progressBar: true,

						preventDuplicates: true,

						positionClass: 'toast-top-right',
						
						onclick: null

				};
					
				toastr.warning('Orçamento ainda em cálculo, aguarde um momento!');
				return false;
			}

			$("body").addClass("onprogress");
			
      e.preventDefault();
		
      var products = [];				
		
			// Ler Cada Linha de Produto
      $form.find(".selectProduct").each(function() {
          var id = $(this).val();	
					var name = $(this).find('option:selected').text();				
					
					if (id == "0"){
						return true;
					}
					var p = {};             
							p.id = id;
							p.product = name; 
              p.quantidade = $(this).parent().parent().find('td:nth-child(3)').find('input').val();
							p.price = $(this).parent().parent().find('td:nth-child(4)').find('input').val();						
							p.priceTotal = $(this).parent().parent().find('td:nth-child(5)').find('input').val();
							p.margemLucroP = $(this).parent().parent().find('td:nth-child(6)').find('input').val();
          		
							if (p.quantidade == 0 || p.quantidade == null){
								toastr.options = {

									closeButton: true,

									progressBar: true,

									preventDuplicates: true,

									positionClass: 'toast-top-right',

									onclick: null

							};

							toastr.warning('Por favor confira a quantidade dos equipamentos selecionados!');
							return false;
							}
          products.push(p);
      });
		
		
		//console.log("MB: " + $(".margemLucro").val());
		var description = $(".description").val();
		var descriptionP = $(".descriptionP").val();
    
		if (url.includes("rascunho")) {
			var urlC =  window.location.origin + "/order/new" ;
			var idRascunho = url.split("/").pop();
					$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "removeRascunho",
							idRascunho: idRascunho,
          
          },
          error: function() {
            console.log("Erro de ras orc");
          },
          success: function(resp) {	
						console.log("Deu certo remover rascunho salvar orçamento");
						
          }			
      });
			
		} else if(url.includes("new") ) {
			var idRascunho = $("#idOC").val();

			console.log(idRascunho);
			console.log(url);
							$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "removeRascunho",
							idRascunho: idRascunho,
          
          },
          error: function() {
            console.log("Erro de ras orc");
          },
          success: function(resp) {	
						console.log("Deu certo remover rascunho salvar orçamento");
						
          }			
      });
			
}
else
{
		var idUrl = url.split("/").pop();
	  var urlC =  window.location.origin + "/order/" + idUrl;
}
		

				$.ajax({
          url: urlC,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "save",
							renew: statusRenew,
             	status: $(".status").val(),
              santri: $(".santri_id").val(),
							client: $(".selectCliente").val(),
							useConsume: $(".use-consume").val(),
							typeClient: $(".type-client").val(),
							valorFrete: $(".valorFrete").val(),
							ufClient: $(".inputUF").val(),
							margemLucro: $(".margemLucro").val(),
						  kwpReal: $(".kwpReal").val(),
						  comissao: $(".comissao").val(),
						  comissaoActive: $(".comissaoActive").val(),
							seller: $(".seller").find('option:selected').data("id"),
							typeOrder: $(".type-order").val(),
							totalUnitField: $(".totalUnitField").val(),
							description: description,	
						  descriptionP: descriptionP,	
							totalTotalField: $(".totalTotalField").val(),
							modelType: $(".model-select").val(),
							producerKit: $(".producerKit").val(),
							desconto: $(".desconto").val(),
							producerInversor: $(".producerInversor").val(),
						  producerCabo: $(".producerCabo").val(),
							power: $(".power").val(),
							branch: $(".uf-branch").val(),
							frete: $(".frete").val(),							
							ufFrete: $(".ufFrete").val(),
							paymentMode: $(".paymentMode").val(),
							products: products,
					 	  tensao: $("#tensao").val(),
						  medir_cc: $("#medir_cc").val(),
					    medir: $("#medir").val(),
						  fases: $("#fases").val(),
          },
          error: function() {
            console.log("Erro de Valor");
          },
          success: function(resp) {	
						
						
						
							if(resp.frete == 1){
								toastr.options = {

									closeButton: true,

									progressBar: true,

									preventDuplicates: true,

									positionClass: 'toast-top-right',

									onclick: null

							};
							$("body").removeClass("onprogress");
						//	toastr.warning('Já existe um pedido de frete para o orçamento, não é possível edição!');
						//	return false;
							}	
						
						if (resp.block == 1){
						toastr.options = {

								closeButton: true,

								progressBar: true,							

								fadeIn: 4000,

								preventDuplicates: true,

								positionClass: 'toast-top-right',

								onclick: null

							};
							$("body").removeClass("onprogress");
							toastr.error('Desconto inválido! Margem minima para orçamento é de 14%' );	
							return false;
						}
						
						toastr.options = {

						closeButton: true,

						progressBar: true,							
							
						fadeIn: 4000,
							
						preventDuplicates: true,

						positionClass: 'toast-top-right',

						onclick: null

					};
										
					
					$("body").removeClass("onprogress");					
						
					toastr.success('Orçamento cadastrado com sucesso!');	
						
					setTimeout(function(){
						var url_atual = window.location.origin;
						window.location.replace(url_atual + "/order");
					},4000);	
					
						
          }			
      });
			
		
		});
}


/**
 * Settings
 */
NextPost.Settings = function() {
    $(".js-settings-menu").on("click", function() {
        $(".asidenav").toggleClass("mobile-visible");
        $(this).toggleClass("mdi-menu-down mdi-menu-up");

        $("html, body").delay(200).animate({
            scrollTop: "0px"
        });
    });


    if ($("#smtp-form").length == 1) {
        $("#smtp-form :input[name='auth']").on("change", function() {
            if ($(this).is(":checked")) {
                $("#smtp-form :input[name='username'], :input[name='password']")
                    .prop("disabled", false);
            } else {
                $("#smtp-form :input[name='username'], :input[name='password']")
                    .prop("disabled", true)
                    .val("");
            }
        }).trigger("change");
    }
 
}


NextPost.Benefits = function() {
	
	//Descçaramdp voriáveis
  var url = document.baseURI;
  var $form = $(".js-ajax-form-benefits");
	
	
	//Fazendo mudança de aba

  $('body').on('click', ".tab-benefits" ,function(e){
		console.log("#"+$(this).attr("id")+ "_tab");
    $(".tab_content").hide();
    $(".tab-benefits").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(this).addClass("active");
  });
	
	
	//Fazendo controle do CheckBox dos Benefits
  $('body').on('change', ".checkBenefit" ,function(e){
  var val =  $(this).is(':checked');
  var name =  $(this).attr("name");
  var completeName =  $(this).data("name");

  if (val == true){
    $("#benefitsRank").sortable();
    var $tag = $("<a></a>");
        $tag.attr({
            "href": "javascript:void(0)",
            "name": completeName ,
            "id": name,
        });
        $tag.addClass("tab-benefits " + name);
        $tag.text(completeName);

        $tag.appendTo($(".af-tab-heads"));

        var $tagRank = $("<span style='margin: 0px 2px 3px 0px;'></span>");
            $tagRank.attr({
                "data-type": "benefitRank",
                "data-id": name ,
                "data-value": completeName,
            });
            $tagRank.addClass("benefitsRank " + name);
            $tagRank.text(completeName);

        $tagRank.appendTo($("#benefitsRank"));
  } else {
    var $taga = $("."+name);

    $taga.remove();
  }

  });
	
	
	//Mostrando conteudo de acordo com escolha
  $('body').on('change', ".tagAbA", function(){
		var val =  $(this).is(':checked');
		
		if (val == true){		
			$(".tagAbA").prop('checked', false);
			$(this).prop('checked', true);
		}
		
		
		$(".apuracaoModTax").hide(); 
		
    $("."+$(this).data("value")+"Apuracao").show(); 
		
		if (val == false){		
		$(".apuracaoModTax").hide(); 
		}
		
		
  });

	
	
	//Monstrando lista de Ncm
  var target_list_popup = $("#target-list-popup");
    $("body").on("click", "a.js-reactions-target-list", function() {

            var target_list_textarea = target_list_popup.find("textarea.target-list");
            var targets_list = target_list_textarea.val();

            target_list_textarea.val("");

            $("body").addClass("onprogress");

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'jsonp',
                data: {
                    action: "insert-ncm",
                    targets_list: targets_list
                },

                error: function() {
                    $("body").removeClass("onprogress");

                    NextPost.Alert({
                        title:  __("Oops..."),
                        content:  __("Um erro aconteceu!"),
                        confirmText: __("Fechar")
                    });
                },

                success: function(resp) {
                    console.log(resp.filtered_targets);
                    if (resp.result == 1) {
                        $("body").removeClass("onprogress");
                        target_list_popup.modal('hide');

                        if (resp.filtered_targets) {
                            var filtered_targets = $.parseJSON(resp.filtered_targets);

                            var target = [];

                            // Get ready tags
                            $(".tag").each(function() {
                                target.push($(this).data("type") + "-" + $(this).data("value"));
                            });

                            $.each(filtered_targets,function(key,value){
                                if (target.indexOf(value.type + "-" + value.value) >= 0) {

                                } else {

                                    var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
                                        $tag.addClass("tag ncms pull-left preadd");
                                        $tag.attr({
                                            "data-type": "ncm",
                                            "data-value": value.value,
                                        });

                                        $tag.text("NCM: " +value.value);

                                        $tag.append("<span class='mdi mdi-close remove'></span>");

                                    $tag.appendTo($("#ncm"));

                                    setTimeout(function(){
                                        $tag.removeClass("preadd");
                                    }, 50);

                                    target.push("ncms");
                                }
                            });
                        }
                    } else {
                        $("body").removeClass("onprogress");

                        NextPost.Alert({
                            title: __("Oops..."),
                            content: resp.msg,
                            confirmText: __("Close"),

                            confirm: function() {
                                if (resp.redirect) {
                                    window.location.href = resp.redirect;
                                }
                            }
                        });
                    }
                }
            });

    });

	
   // Monstando Lista de Varios Ncms
   $('body').on('change', ".inputNcm" ,function(){
     var $inputNcm = $(":input[name='ncm']");
     var query;
     var target = [];

     // Get ready tags
     $(".tag").each(function() {
         target.push($(this).data("type") + "-" + $(this).data("value"));
     });

     if (target.indexOf("ncm" + "-" + $inputNcm.val()) >= 0) {
         return false;
     }

     if (target.indexOf("ncm" + "-" + "Todos") >= 0) {
         return false;
     }

     if($inputNcm.val() == "Todos"){
       // Get ready tags
       $(".ncms").each(function() {
           $(this).remove();
       });
     }

     var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
         $tag.addClass("tag ncms pull-left preadd");
         $tag.attr({
             "data-type": "ncm",
             "data-value": $inputNcm.val(),
         });

         $tag.text("NCM: " + $inputNcm.val());

         $tag.append("<span class='mdi mdi-close remove'></span>");

         $tag.appendTo($("#ncm"));

         setTimeout(function(){
             $tag.removeClass("preadd");
         }, 50);

         target.push("ncms");

         return false;
   });
	
   //Formando a lista do Tax Profile
    $('body').on('change', ".inputTaxProfile" ,function(){
    var $taxProfile = $(":input[name='taxProfile']");
    var query;
    var target = [];

    // Get ready tags
    $(".tag").each(function() {
        target.push($(this).data("type") + "-" + $(this).data("value"));
    });

    if (target.indexOf("taxProfile" + "-" + $taxProfile.val()) >= 0) {
        return false;
    }

    if (target.indexOf("taxProfile" + "-" + "Todos") >= 0) {
        return false;
    }

    if($taxProfile.val() == "Todos"){
      // Get ready tags
      $(".taxProfile").each(function() {
          $(this).remove();
      });
    }

    var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
        $tag.addClass("tag taxProfile pull-left preadd");
        $tag.attr({
            "data-type": "taxProfile",
            "data-value": $taxProfile.val(),
        });

        $tag.text($taxProfile.val());

        $tag.append("<span class='mdi mdi-close remove'></span>");

        $tag.appendTo($("#taxProfile"));

        setTimeout(function(){
          $tag.removeClass("preadd");
        }, 50);

        target.push("taxProfile");

        return false;
    });
	
	
		//Formando a lista do UfDestiny
    $('body').on('change', ".uf-destiny" ,function(){
      var $fieldDestiny = $(":input[name='uf-destiny']");
      var query;
      var target = [];

      // Get ready tags
      $(".tag").each(function() {
          target.push($(this).data("type") + "-" + $(this).data("value"));
      });

      if (target.indexOf("uf" + "-" + $fieldDestiny.val()) >= 0) {
          return false;
      }

      if (target.indexOf("uf" + "-" + "Todos") >= 0) {
          return false;
      }

      if($fieldDestiny.val() == "Todos"){
        // Get ready tags
        $(".ufdestiny").each(function() {
            $(this).remove();
        });
      }

      var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
          $tag.addClass("tag uf-destiny pull-left preadd");
          $tag.attr({
              "data-type": "uf",
              "data-value": $fieldDestiny.val(),
          });

          $tag.text($fieldDestiny.val());

          $tag.append("<span class='mdi mdi-close remove'></span>");

          $tag.appendTo($("#uf_destiny"));

          setTimeout(function(){
            $tag.removeClass("preadd");
          }, 50);

          target.push("uf");

          return false;
    });

  // Remove tags
  $("click", ".tag .remove", function() {
      var $tag = $(this).parents(".tag");

      var index = target.indexOf($tag.data("type") + "-" + $tag.data("value"));
      if (index >= 0) {
          target.splice(index, 1);
      }

      $tag.remove();
  });


  // Submit the form
    $form.on("submit", function(e) {
      e.preventDefault();

      $("body").addClass("onprogress");

      var targets = [];
      var benefitsRank = [];
			var AbaApuracao = [];
			var AbaBase = [];
			var AbaNf = [];
			var AbaAliquota= [];
			var taxAjusts = [];

      $form.find(".tags .tag").each(function() {
          var t = {};
              t.type = $(this).data("type");
              t.value = $(this).data("value");

          targets.push(t);
      });

      $form.find(".benefitsRank").each(function() {
          var t = {};
              t.type = $(this).data("type");
							t.id = $(this).data("id");
              t.value = $(this).data("value");

          benefitsRank.push(t);
      });      
			
			$form.find(".tagNF").each(function() {
          var t = {}; 
							t.type = $(this).data("type");
							t.id = $(this).data("value");
              t.value = $(this).is(":checked");

          AbaNf.push(t);
      });   
			
			$form.find(".tagBase").each(function() {
          var t = {}; 
							t.type = $(this).data("type");
							t.id = $(this).data("id");
              t.value = $(this).val();

          AbaBase.push(t);
      });   
			
			$form.find(".tagAliquota").each(function() {
          var t = {}; 
							t.type = $(this).data("type");
							t.id = $(this).data("id");
              t.value = $(this).val();

          AbaAliquota.push(t);
      });  
			
			$form.find(".tagApuracao").each(function() {
          var t = {}; 
							t.type = $(this).data("type");
							t.id = $(this).data("id");
              t.value = $(this).val();

          AbaApuracao.push(t);
      });

      $.ajax({
          url: $form.attr("action"),
          type: $form.attr("method"),
          dataType: "jsonp",
          data: {
              action: "saveJs",
              targets: JSON.stringify(targets),
							taxNF: JSON.stringify(AbaNf),
							taxBase: JSON.stringify(AbaBase),
							taxApuracao: JSON.stringify(AbaApuracao),
							taxAliquota: JSON.stringify(AbaAliquota),
              benefitsRank: JSON.stringify(benefitsRank),						
              is_active: $(":input[name='is_active']").val(),
              ufOrigin: $(":input[name='ufOrigin']").val(),
              description: $(":input[name='description']").val(),
          },
          error: function() {
              $("body").removeClass("onprogress");
              NextPost.DisplayFormResult($form, "error", __("Oops! An error occured. Please try again later!"));
          },

          success: function(resp) {            
              if (resp.result == 1) {
                  NextPost.DisplayFormResult($form, "success", resp.msg);
              } else {
                  NextPost.DisplayFormResult($form, "error", resp.msg);
              }

              $("body").removeClass("onprogress");
          }
      });
      return false;
  });

}



NextPost.Brand = function() {

    $(':input[name="category_brand"]').on('keypress', function(){
      var targetBranca = [];
      var url = document.baseURI;
    	var $form = $("body").find("form");
    	var query;
      var $category_brand = $("body").find(":input[name='category_brand']");

      // Search input
      $category_brand.devbridgeAutocomplete({
          serviceUrl: url,
          type: "POST",
          dataType: "jsonp",
          minChars: 2,
          appendTo: $form,
          forceFixPosition: true,
          paramName: "q",
      		params: {
      			action: "category_brand",
      		},
          onSearchStart: function() {

          $(this).parent().find(".js-search-loading-icon").removeClass('none');
    			$_tags = $(this).parent().parent().find('.category_brand');
    			input = $(this);

          query = $category_brand.val();

          },
          onSearchComplete: function() {
              $(this).parent().find(".js-search-loading-icon").addClass('none');
          },

          transformResult: function(resp) {
              return {
                  suggestions: resp.result == 1 ? resp.items : []
              };
          },

          beforeRender: function (container, suggestions) {
              for (var i = 0; i < suggestions.length; i++) {
                if (suggestions[i].value >= 0) {
                    container.find(".autocomplete-suggestion").eq(i).addClass('none')
                }
              }
          },

          formatResult: function(suggestion, currentValue){
              var pattern = '(' + currentValue.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&") + ')';

              return suggestion.value
                          .replace(new RegExp(pattern, 'gi'), '<strong>form<;\/strong>')
                          .replace(/&/g, '&amp;')
                          .replace(/</g, '&lt;')
                          .replace(/>/g, '&gt;')
                          .replace(/"/g, '&quot;')
                          .replace(/&lt;(\/?strong)&gt;/g, '<form>;');
          },

          onSelect: function(suggestion){

           input.val('');
           var url = document.baseURI;
           var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
               $tag.addClass("tag pull-left preadd");
               $tag.attr({
                   "data-value": suggestion.value,
               });

               $tag.text(suggestion.value);

               $tag.append("<span class='mdi mdi-close remove'></span>");

            $tag.appendTo($_tags);

           setTimeout(function(){
               $tag.removeClass("preadd");
           }, 50);


  			   return false;
          }
      });
  	});

    // Remove target
    $('body').on("click", ".tag .remove", function() {
      var target = [];
     
        var $tag = $(this).parents(".tag");

        var index = target.indexOf($tag.data("value"));
        if (index >= 0) {
            target.splice(index, 1);
        }

        $tag.remove();


		return false;
    });


}



	$("body").on("blur", ".cepField", function() { 
	
	var cep = $(this).val();
	var url = document.baseURI;	
		
		 $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "searchCep",
							cep: cep,
          },
          error: function() {
              console.log("Erro Consulta CNPJ");
          },

          success: function(resp) {
						console.log(resp);
						$(".estadoField").val("");
						$(".logradouroField").val("");
						$(".bairroField").val("");
						$(".localidadeField").val("");
            $(".estadoField").val(resp.uf[0]).change();
						$(".logradouroField").val(resp.logradouro[0]);
						$(".bairroField").val(resp.bairro[0]);
						$(".localidadeField").val(resp.localidade[0]); 
          }
      })
	});
NextPost.Client = function() {	

	$("body").on("blur", ".cnpjField", function() { 
	
	var cnpj = $(this).val();
	var url = document.baseURI;	
		
		 $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "searchCnpj",
							cnpj: cnpj,
          },
          error: function() {
              console.log("Erro Consulta CNPJ");
          },

          success: function(resp) {
						console.log(resp);
						 $(".razaoField").val("");
						 
             $(".razaoField").val(resp.cnpj);
						 
          }
      })
	});

	
  

    
}



/**
 * Check NCM
 */
NextPost.Ncm = function(data = {}) {

  $("body").on("change", ":input[name='select_cod_ncm']", function() {

    var cod_ncm = $(this).children(":selected").attr("id");

    if(!cod_ncm) {
      return false;
    } else {
      console.log(window.location);
      window.location = cod_ncm;
    }

  });

}


/**
 * JS PRODUCT VIEW
 */
NextPost.Product = function() {

  var url = document.baseURI;
  var $form = $(".js-ajax-form");

  $('body').on('click', ".tab-product" ,function(e){
		console.log("#"+$(this).attr("id")+ "_tab");
    $(".tab_content").hide();
    $(".tab-product").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(this).addClass("active");
  });
	
	$("body").on("click", ".select2", function() {
        $(this).removeClass("error");
  });
	
	$( ".active-icms" ).change(function() {		
		$( ".table-icms" ).slideToggle( "slow", function() {
			// Animation complete.
		});
	});
	
	$('body').on('keyup', ".priceProduct" ,function(e){		
		
		 $.ajax({
            url: url,
            type: 'POST',
            dataType: 'jsonp',
            data: {
                action: 'priceProduct',							
								cust: $(":input[name='cust']").val(),
                margem_product: $(":input[name='margem_product']").val(),
								cred_cofins: $(":input[name='cred_cofins']").val(),
								deb_cofins: $(":input[name='deb_cofins']").val(),
								cred_pis: $(":input[name='cred_pis']").val(),
								deb_pis: $(":input[name='deb_pis']").val(),	
								ipi: $(":input[name='ipi']").val(),	
								cred_icms: $(":input[name='cred_icms']").val(),
								deb_icms: $(":input[name='deb_icms']").val(),							
								liquid_cust: $(":input[name='liquid_cust']").val()
            },

            error: function() {
               console.log("ERROR");
            },

            success: function(resp) {
									console.log(resp);
									var lCust = $('input[name=liquid_cust]').val(resp.valorCust);	
									var price = $('input[name=price]').val(resp.valorPrice);
									formatCurrency(lCust);
									formatCurrency(price);
            }
        });		
  });	

  $(".select2").select2({});
	
}

/**
 * JS Page Product Segments
 */
NextPost.ProductSegments = function() {
	
		//Descçaramdp voriáveis
  var url = document.baseURI;
  var $form = $(".js-ajax-form");

  $('body').on('click', ".tab-product-segments" ,function(e){
		console.log("#"+$(this).attr("id")+ "_tab");
    $(".tab_content").hide();
    $(".tab-product-segments").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(this).addClass("active");
  });
	
	$("body").on("click", ".select2", function() {
        $(this).removeClass("error");
  });
	
	$( ".active-icms" ).change(function() {		
		$( ".table-icms" ).slideToggle( "slow", function() {
			// Animation complete.
		});
	});

    $(".select2").select2({});
}

/**
 * JS Page Product Segments
 */
NextPost.ProductKits = function() {
	
		//Descçaramdp voriáveis
  var url = document.baseURI;
  var $form = $(".js-ajax-form");

  $('body').on('click', ".tab-product-kits" ,function(e){
		console.log("#"+$(this).attr("id")+ "_tab");
    $(".tab_content").hide();
    $(".tab-product-kits").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(this).addClass("active");
  });
	
	$("body").on("click", ".select2", function() {
        $(this).removeClass("error");
  });
	
	$( ".active-icms" ).change(function() {		
		$( ".table-icms" ).slideToggle( "slow", function() {
			// Animation complete.
		});
	});

    $(".select2").select2({});
}

/**
 * Profile
 */
NextPost.Profile = function() {
    $(".js-resend-verification-email").on("click", function() {
        var $this = $(this);
        var $alert = $this.parents(".alert");

        if ($alert.hasClass("onprogress")) {
            return;
        }

        $alert.addClass('onprogress');
        $.ajax({
            url: $this.data("url"),
            type: 'POST',
            dataType: 'jsonp',
            data: {
                action: 'resend-email'
            },

            error: function() {
                $this.remove();
                $alert.find(".js-resend-result").html(__("Oops! An error occured. Please try again later!"));
                $alert.removeClass("onprogress");
            },

            success: function(resp) {
                $this.remove();
                $alert.find(".js-resend-result").html(resp.msg);
                $alert.removeClass("onprogress");
            }
        });
    });
	

  
	 $(".inputFile").on("change", function() {
      $('.inputFile').ajaxForm({
            uploadProgress: function(event, position, total, percentComplete) {
                $('progress').attr('value',percentComplete);
                $('#porcentagem').html(percentComplete+'%');
            },        
            success: function(data) {
                $('progress').attr('value','100');
                $('#porcentagem').html('100%');                
                if(data.sucesso == true){
                    $('#resposta').html('<img src="'+ data.msg +'" />');
                }
                else{
                    $('#resposta').html(data.msg);
                }                
            },
            error : function(){
                $('#resposta').html('Erro ao enviar requisição!!!');
            },
            dataType: 'json',
            url: document.baseURI,
            resetForm: true
        }).submit();
                    $('#formUpload').ajaxForm({
            uploadProgress: function(event, position, total, percentComplete) {
                $('progress').attr('value',percentComplete);
                $('#porcentagem').html(percentComplete+'%');
            },        
            success: function(data) {
                $('progress').attr('value','100');
                $('#porcentagem').html('100%');                
                if(data.sucesso == true){
                    $('#resposta').html('<img src="'+ data.msg +'" />');
                }
                else{
                    $('#resposta').html(data.msg);
                }                
            },
            error : function(){
                $('#resposta').html('Erro ao enviar requisição!!!');
            },
            dataType: 'json',
            url: document.baseURI,
            resetForm: true
        }).submit();
               
    });
  $("#abrirsenha").on("click",function(e){	
	$("#BrancoSenha").hide();
	$("#campoSenha").show();
});
	
	
}


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, "")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);  
    
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "R$ " + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "R$ " + input_val;    
    
    
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}


/* Functions */

/**
 * Validate Email
 */
function isValidEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

/**
 * Get scrollbar width
 */
function scrollbarWidth() {
    var scrollDiv = document.createElement("div");
    scrollDiv.className = "scrollbar-measure";
    document.body.appendChild(scrollDiv);
    var w = scrollDiv.offsetWidth - scrollDiv.clientWidth;
    document.body.removeChild(scrollDiv);

    return w;
}


/**
 * Validate URL
 */
function isValidUrl(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
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
               var regex = /^[0-9,.]+$/;
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


/**
 * Get the position of the caret in the contenteditable element
 * @param  {DOM}  DOM of the input element
 * @return {obj}  start and end position of the caret position (selection)
 */
function getCaretPosition(element) {
    var start = 0;
    var end = 0;
    var doc = element.ownerDocument || element.document;
    var win = doc.defaultView || doc.parentWindow;
    var sel;

    if (typeof win.getSelection != "undefined") {
        sel = win.getSelection();
        if (sel.rangeCount > 0) {
            var range = win.getSelection().getRangeAt(0);
            var preCaretRange = range.cloneRange();
            preCaretRange.selectNodeContents(element);
            preCaretRange.setEnd(range.startContainer, range.startOffset);
            start = preCaretRange.toString().length;
            preCaretRange.setEnd(range.endContainer, range.endOffset);
            end = preCaretRange.toString().length;
        }
    } else if ((sel = doc.selection) && sel.type != "Control") {
        var textRange = sel.createRange();
        var preCaretTextRange = doc.body.createTextRange();
        preCaretTextRange.moveToElementText(element);
        preCaretTextRange.setEndPoint("EndToStart", textRange);
        start = preCaretTextRange.text.length;
        preCaretTextRange.setEndPoint("EndToEnd", textRange);
        end = preCaretTextRange.text.length;
    }
    return { start: start, end: end };
}

function valorTotal(value) {

	
 	var vunitTotal = 0;						
						var vtotalTotal = 0;
						
						$("#orderTable tr").each(function() {
							
							if ($(this).find("input.unitPrice").val() != null){
								if ($(this).find("input.unitPrice").val()){
									var unittotal = $(this).find("input.unitPrice").val().replace(/[^0-9.,]/g, "");
									unittotal = unittotal.replace(".", "");
									unittotal = unittotal.replace(",", ".");
									vunitTotal += parseFloat(unittotal);				
								} 
							}


							if ($(this).find("input.unitTotal").val() != null){
								if ($(this).find("input.unitTotal").val()){
									var unittotaltotal = $(this).find("input.unitTotal").val().replace(/[^0-9.,]/g, "")
									unittotaltotal = unittotaltotal.replace(".", "");
									unittotaltotal = unittotaltotal.replace(",", ".");
									vtotalTotal += parseFloat(unittotaltotal);				
								} 
							}


						});		
//console.log(vtotalTotal);
						$("#vuntTotal").val(vunitTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));						
						$("#vtotalTotal").val(vtotalTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
		 
}

//format cpf/cnpj
function formatField(fieldText) {
	
    if (fieldText.length <= 14) {
        fieldText = maskCpf(fieldText);
    } else {
        fieldText = maskCnpj(fieldText);
    }
return fieldText;
}
function cleanFormat(fieldText) {
    fieldText.value = fieldText.value.replace(/[^0-9]/gi,'');
}
function maskCpf(valor) {
    return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
}
function maskCnpj(valor) {
    return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
}


//format phone
function formatTel(fieldText) {
	
	
	
	if (fieldText.length == 11) {
		fieldText = maskCel(fieldText);
	}	else if (fieldText.length == 10)  {
		fieldText = maskCel(fieldText);
	}	
	
	return fieldText;
}

function maskTel(valor) {
	return valor.replace(/(\d{2})(\d{4})(\d{4})/g,"(\$1) \$2-\$3");
	}
function maskCel(valor) {
	return valor.replace(/(\d{2})(\d{1})(\d{4})(\d{4})/g,"(\$1) \$2 \$3-\$4");
}

function formatCep(fieldText) {
    if (fieldText.length <= 8) {
        fieldText = maskCep(fieldText);
       }
	return fieldText;
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

function AddTableRow(seconds){
		
	
	console.log("entrou reiniciar qtd");
	
		//Verificar se pode já adicionar Produtos
		var ufClient = $(".inputUF").val();
		var ufBranch = $(".uf-branch").val();
		var typeOrder = $(".type-order").val();		
		var kwp = $("#kwp").val();
		var model = $(".model-select").val();
		var producerKit = $(".producerKit").val();
		var producerInversor = $(".producerInversor").val();
		var frete = $(".frete").val();
		var ufFrete = $(".ufFrete").val();
		var paymentMode = $(".paymentMode").val();
	
		if (ufClient == "" || ufBranch == "" || typeOrder == "" || kwp == "" || model == "" || producerKit == "" || producerInversor == "" || frete == "" || ufFrete == "" || paymentMode == ""){	
		toastr.options = {

					closeButton: true,

					progressBar: true,

					preventDuplicates: true,

					positionClass: 'toast-top-right',

					onclick: null

				};

				toastr.warning('Preencha todos os campos a cima!');
				return false;
		}		
		
		
     var newRow = $("<tr id='ProdutoAdicional'>");	    
		 var cols = "";	
		 var url = document.baseURI;			
		 var linhas = $('#orderTable tr').length;
	
		cols += '<td><select class="select-table selectProduct calcPrice" id="'+linhas+'" onchange="javascript:valorTotal(this)"" style="width:100%" name="order_table"><option value="0" selected hidden>Produto Novo</option>';	
					cols += '</select></td>';		
					cols += '<td><a href="javascript:void(0)" style="color:#6b6b6b"><span class="mdi mdi-file-pdf" style="font-size:20px"></span></a></td>';
					cols += '<td><input class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
					if ($(".tipoConta").val() == "integrador"){
							cols += '<td type="hidden" hidden><input type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
							} else {
							cols += '<td><input class="input-table-order unitPrice totalUnit" readonly></td>';	
					}	
					cols += '<td><input class="input-table-order unitTotal totalUnit" readonly></td>';
					cols += '<td type="hidden" hidden><input type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
					cols += '<td type="hidden" hidden><input class="input-table-order margemTotal totalUnit" readonly></td>';					
					cols += '<td>';
					cols += '<a class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
					cols += '</td>';
// 					cols += '<td>Teste</td>';
	
   	var cons = 0;
	
		if ($(".type-order").val() == "1"){
			cons = 1;
		}
	
		$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "selectProduct",
							cons: cons,
          },
          error: function() {
            console.log("Erro de Valor");
          },
          success: function(resp) {	
					console.log(resp);					
						
						$.each(resp.products, function(index, value) {								
								$("#"+linhas).append($("<option></option>").attr("value",value.id).text(value.name));
								$("#"+linhas).select3({});
							});		
					}	
		});
		
    newRow.append(cols);
	
		$("#orderTable tbody").append(newRow);	
    return false;
}


function sleep(ms) {
  return new Promise(
    resolve => setTimeout(resolve, ms)
  );
}

function msg() {
  $("#mensagem").addClass('ver');
  setTimeout(function() {$("#mensagem").removeClass('ver'); }, 3000);
}


NextPost.Confirm2 = function(data = {}) {
    data = $.extend({}, {
            title: "Porque deseja excluir o orçamento? Conte em detalhes abaixo:",
            content: "<textarea class='input detalhesExclusao' type='text'></textarea>",
            confirmText: "Apagar",
            cancelText: "Cancelar",
            confirm: function() {},
            cancel: function() {},
        },
        data);


    $.confirm({
        title: data.title,
        content: data.content,
        theme: 'supervan',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small button button--danger mr-5",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
            cancel: {
                text: data.cancelText,
                btnClass: "small button button--simple",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}


	 $("body").on("click", ".duplicar-orcamento", function() { 	
				var line = $(this).closest("tr");
		 		var numeroOrcamento = $(this).data("value");
        var id = $(this).data("id");
		 		var msg = "Deseja realmente duplicar o orçamento: " + numeroOrcamento + " ?";
        var url = document.baseURI;
		 
				Swal.fire({
				title: msg,
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				cancelButtonText: 'Cancelar',
				confirmButtonText: 'Duplicar',
				showLoaderOnConfirm: true,
				confirmButtonColor: '#00a884',
				cancelButtonColor: '#d33',		 
				preConfirm: (input) => {
		 			$.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'jsonp',
                    data: {
                        action: "duplicarOrcamento",
                        id: id,
                    },error: function() {
										console.log("Erro de Valor");
									},
									success: function(resp) {
									console.log(resp);
									if (resp.result == 1){	
										Swal.fire({
											position: 'top-end',
											icon: 'success',
											title: resp.msg,
											showConfirmButton: false,
											timer: 1500
										})

									} else {
									Swal.fire({
										icon: 'error',		
										title: resp.msg,
										showClass: {
											popup: 'animate__animated animate__fadeInDown'
										},
										hideClass: {
											popup: 'animate__animated animate__fadeOutUp'
										}
									})
								}
									setTimeout(function(){
										var url_atual = window.location.origin;
										window.location.replace(url_atual + "/order");
									},2500);			
							
								}							       
            });


  },
  allowOutsideClick: () => !Swal.isLoading()
});
		 

    });


	 $("body").on("click", ".delete-line", function() { 	
				var line = $(this).closest("tr");
        var id = $(this).data("id");
        var url = document.baseURI;
				console.log("entrou exclusao");
		 
		 Swal.fire({
  title: 'Porque deseja excluir o orçamento? Conte em detalhes abaixo',
  input: 'text',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
	cancelButtonText: 'Cancelar',
  confirmButtonText: 'Excluir',
  showLoaderOnConfirm: true,
	confirmButtonColor: '#00a884',
  cancelButtonColor: '#d33',		 
  preConfirm: (input) => {
		 $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'jsonp',
                    data: {
                        action: "desativar",
                        id: id,
												textExclusao: input
                    },error: function() {
										console.log("Erro de Valor");
									},
									success: function(resp) {
									console.log(resp);
									if (resp.result == 1){	
									
 
								Swal.fire({
									position: 'top-end',
									icon: 'success',
									title: 'Orçamento excluído com sucesso!',
									showConfirmButton: false,
									timer: 1500
								})

									} else {
									Swal.fire({
								icon: 'error',		
								title: resp.msg,
								showClass: {
									popup: 'animate__animated animate__fadeInDown'
								},
								hideClass: {
									popup: 'animate__animated animate__fadeOutUp'
								}
							})
									}
					setTimeout(function(){
						var url_atual = window.location.origin;
						window.location.replace(url_atual + "/order");
					},2500);			
							
								}							       
            });


  },
  allowOutsideClick: () => !Swal.isLoading()
});
		 

    });



function caboKwp(){
	console.log("entrou kwp cabo ");
	
			setTimeout(function(){
				
			var qntPainel = 0;
	
		$("#orderTable tr").each(function() {	
			if ($(this).data('type') == "Painel"){					
				qntPainel = $(this).find('td:nth-child(3)').find('input').val();					
			} 
		});
	cabo(qntPainel);			
	console.log(qntPainel);
					},1500);	
	
}


	
	 function calcPrice(){	

		
			if ($(this).data("type") == "status"){
					if ($(this).find('option:selected').val() != "2"){
					return false;
				} else {
					statusRenew = 1;
					toastr.options = {

						closeButton: true,

						progressBar: true,

						preventDuplicates: true,

						positionClass: 'toast-top-right',

						onclick: null

					};
					toastr.info('Preço atualizado de acordo com o estoque atual!');					
					//console.log(statusRenew);
				}
			}
		
			var url = document.baseURI;
					
			var ufClient = $(".inputUF").val();
		  var ufBranch = $(".uf-branch").val();
			var frete = $(".frete").find('option:selected').val();
			var ufFrete = $(".ufFrete").find('option:selected').val();
			var typeClient = $(".type-client").val();
			var typeOrder = $(".type-order").val();		 
			var paymentMode = $(".paymentMode").find('option:selected').val();
			var useConsume = $(".use-consume").val();
		  var comissao = $(".comissao").val();
			var desconto = $(".desconto").val();
		 console.log(desconto);
			var margemtotalCampo = $(".margemLucro").val().replace(/[^0-9.,]/g, "");
			var kwp = $("#kwp").val();
			var descontoReal = $(".descontoReal").val();
			var qntPainel = 0;
		  var qntKit = 0;
		  var idKit = 0;
			var recalcProd = 0;
		  var qnt = "";
			
			//console.log(comissao);
			if (ufClient == null || ufBranch == null || typeOrder  == null){
				return false;
			}	
			
			if ($(this).data('type') == "kwp" || $(this).data('type') == "renew"){				
				recalcProd = 1;
			}
		
			// Get ready tags
			$(".selectProduct").each(function() {
			var id = $(this).parent().parent().find('td').find('select').val();				
     	
			if (id == 0){
					return true;
			}
				
			var painelNow = 0;
				
			$("#orderTable tr").each(function() {	
				if ($(this).data('type') == "Painel"){					
					qntPainel = $(this).find('td:nth-child(3)').find('input').val();					
				} else if ($(this).data('type') == "KitdeFixação"){					
					qntKit = $(this).find('td:nth-child(3)').find('input').val();
					idKit = $(this).find('td:nth-child(1)').find('option:selected').val();			
				}
			});
			
			if (recalcProd == 1){
				qnt = "";
			}	else {
				qnt = $(this).parent().parent().find('td:nth-child(3)').find('input').val();
			}
							
			var linha = $(this).parent().parent();
			//console.log(qntPainel);
	    var tensao = $("#tensao").val();	
		  var fases = $("#fases").val();			
	
				
			$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "calcValue",
              id: id,
							qnt: qnt,
							painel: qntPainel,
						  kit: qntKit,
						  idkit: idKit,
							desconto: desconto,
							margemtotalCampo: margemtotalCampo,
							typeOrder: typeOrder,
						  comissaoActive: $(".comissaoActive").val(),
							ufClient: ufClient,													
							ufBranch: ufBranch,
							descontoReal: descontoReal,
							frete: frete,
						 	paymentMode: paymentMode,
							typeClient: typeClient,
							useConsume: useConsume,
							comissao: comissao,		
							kwp: kwp,
						  tensao:tensao,
						   fases:fases
          },
          error: function(resp) {
            console.log(resp);
          },
          success: function(resp) {
				
						console.log(resp);
						
						if (resp.kwpReal != 0){
							$(".kwpReal").val(parseFloat(resp.kwpReal.toFixed(2)))
						}	
						
						if (resp.estoque == 1){
							toastr.options = {

								closeButton: true,

								progressBar: true,

								preventDuplicates: true,

								positionClass: 'toast-top-right',

								onclick: null

							};						
							var msg = "Produto sem demanda para o orçamento: <br>" + resp.nomeEstoque + " quantidade atual: " + resp.qntEstoque; 
							toastr.info(msg);	
						}
						
						linha.find('td:nth-child(2)').find('a').attr("href", resp.datasheet);
						
						if (resp.datasheet != "javascript:void(0)"){
							linha.find('td:nth-child(2)').find('a').attr("style", "color:#212121");
							linha.find('td:nth-child(2)').find('a').attr("target", "_blank");				
						}
						
						var valorTotal = resp.qnt * resp.value;
						linha.find('td:nth-child(3)').find('input').val(resp.qnt);
						linha.find('td:nth-child(4)').find('input').val(resp.value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));					
						linha.find('td:nth-child(5)').find('input').val(valorTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						linha.find('td:nth-child(6)').find('input').val(resp.precototalsemjuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
					  linha.find('td:nth-child(7)').find('input').val(resp.margemProduto.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						
						var vunitTotal = 0;						
						var vtotalTotal = 0;
						var vPriceLiquid = 0;					
						var vunitTotalPorcent = 0;
						var vmargemtotal = 0;
						var vtotalTotalSemJuros = 0;
						
						$("#orderTable tr").each(function() {
							
							if ($(this).find("input.unitPrice").val() != null){
								if ($(this).find("input.unitPrice").val()){
									var unittotal = $(this).find("input.unitPrice").val().replace(/[^0-9.,]/g, "");
									unittotal = unittotal.replace(".", "");
									unittotal = unittotal.replace(",", ".");
									vunitTotal += parseFloat(unittotal);				
								} 
							}	
							
							if ($(this).find("input.margemTotal").val() != null){
								if ($(this).find("input.margemTotal").val()){
											var margemtotal = $(this).find("input.margemTotal").val().replace(/[^0-9,]/g, "");								
											margemtotal = margemtotal.replace(".", "");
											margemtotal = margemtotal.replace(",", ".");										
											vmargemtotal += parseFloat(margemtotal);				
									} 
							}
							
						  if ($(this).find("input.priceLiq").val() != null){
								if ($(this).find("input.priceLiq").val()){
											var unittotalliquid = $(this).find("input.priceLiq").val().replace(/[^0-9,]/g, "");								
											unittotalliquid = unittotalliquid.replace(".", "");
											unittotalliquid = unittotalliquid.replace(",", ".");										
											vtotalTotalSemJuros += parseFloat(unittotalliquid);				
									} 
							}


							if ($(this).find("input.unitTotal").val() != null){
								if ($(this).find("input.unitTotal").val()){
									var unittotaltotal = $(this).find("input.unitTotal").val().replace(/[^0-9,]/g, "")
									unittotaltotal = unittotaltotal.replace(".", "");
									unittotaltotal = unittotaltotal.replace(",", ".");
									vtotalTotal += parseFloat(unittotaltotal);
									//console.log( "Total:" + vtotalTotal);
								} 
							}

						});
						
						$("#vtotalPriceSemJuros").val(vtotalTotalSemJuros.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						
						if($(".comissaoActive").val() == "2"){
							var comissao = $(".comissao").val();
							comissao = comissao.replace("R$ ", "");
							comissao = comissao.replace(".", "");
							comissao = comissao.replace(",", ".");
							
							if(comissao == 0){
								comissao = "0";
							}
							
							vtotalTotal += parseFloat(comissao);
							
							var valorJuros = (9.25/100) * comissao;
							
							var comissaoLiquida = comissao - valorJuros;	
							$(".comissaoLiquida").val(comissaoLiquida.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							
						} else if ($(".comissaoActive").val() == "1"){
							var comissao1 = $(".comissao").val();
							comissao1 = comissao1.replace(".", "");
							comissao1 = comissao1.replace(",", ".");
							//console.log("Comissão 1: " + comissao1);
						
							
							var precoComissao = $("#vtotalPriceSemJuros").val().replace(/[^0-9.,]/g, "");
							//console.log("Preço Comissão(0): " + precoComissao);
							precoComissao = precoComissao.replaceAll(".", "");							
							//console.log("Preço Comissão(1): " + precoComissao);
							precoComissao = precoComissao.replace(",", ".");								
							//console.log("Preço Comissão(2): " + precoComissao);
							precoComissao = precoComissao - (precoComissao * (parseFloat($(".desconto").val())/100));
							//console.log("Preço Comissão(3): " + precoComissao);							
							
							
							var valorPorcentagem = precoComissao * (comissao1/100);						
							
							var precoComissaoLiquida = 0.0925 * valorPorcentagem;	
							//console.log("Comissão Liquida: " + precoComissaoLiquida);
							var valorFinal = (valorPorcentagem - precoComissaoLiquida);
							//console.log(precoComissao + " " + precoComissaoLiquida);
							$(".comissaoLiquida").val(valorFinal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							if(comissao1 == 0){
								var zero = 0; 
								$(".comissaoLiquida").val(zero.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
							}
						}		
									console.log(vtotalTotal);
						$("#vuntTotal").val(vunitTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						$("#vmargemTotal").val(vmargemtotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));	
						$("#vtotalTotal").val(vtotalTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
						var margemCampo2 = (vmargemtotal / vtotalTotal) * 100;			
						//console.log("MB: " + vmargemtotal + " - Total: " + vtotalTotal);
						var desconto = (resp.desconto * 100);
						
						if(desconto == null){
							desconto = 0;
						}
						
						var margemReal1 = parseFloat(margemCampo2) - parseFloat(desconto);	
						var margemReal = margemReal1 + parseFloat(resp.margemUsuario);
						//console.log("Margem Campo: " + margemCampo2 + " - MB: " + margemReal + " - Desconto: " + desconto);
						
						$(".margemLucro").val(margemReal.toFixed(2) + "%");	
						$(".desconto").val((resp.desconto * 100).toFixed(2) + "%");	
						
						if (resp.desconto == 0){
						$(".desconto").val(0) + "%";	
						}
						
						canSave = 0;						
          }
      });
					canSave = 0;
			});	
	}


function relatorio(){
	 var dataF = $("#fim").val();
	 var dataI = $("#inicio").val();
	var selectuser = document.getElementById('vendedorS');
	var usuario =  selectuser.value;
	
	var selectFilial = document.getElementById('filial');
	var filial =  selectFilial.value;

		dadosTabela(usuario,dataI,dataF,filial);
	console.log(filial);
}

	
// 			 setTimeout(function(){ 

// 		 var dataF = $("#fim").val();
// 	 var dataI = $("#inicio").val();
// 	var selectuser = document.getElementById('idVendedor');
// 	var usuario =  selectuser.value;
	
// 	var selectFilial = document.getElementById('filial');
// 	var filial =  selectFilial.value;

// 		dadosTabela(usuario,dataI,dataF,filial);
//     console.log( "ready!" );
// 	 	}, 1000);



