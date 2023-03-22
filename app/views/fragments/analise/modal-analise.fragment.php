 

<div class="modal fade " class="UserEdit" id="Analise" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<form class="formValidate" action="<?= APPURL . "/users/"  ?>" method="POST">
					<input type="hidden" id="user" >
					<div class="modal-dialog modal-xl modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Solicita Análise <strong style="font-weight: bold">  </strong></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<input type="password" style="display:none">
								<div class="row">
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
										<label for="senha-usuario">CNPJ</label>
										<input id="cnpj" name="cnpj" type="text" class="validate form-control"  onfocus="javascript: formatField(this);" onblur="javascript: formatField(this);"  onfocus="javascript: cleanFormat(this);"   onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="14">
									</div>
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">

										<label for="senha-usuario">Valor:</label>
										<input id="valor" name="valor" type="text" class="validate form-control" onKeyPress="return(moeda(this,'.',',',event))" maxlength="10" >
									</div>
           
								</div>
							</div>
							<div class="modal-footer">
								<button id="fecharModalUsuario" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
								<button type="submit" id="solicita" class="btn btn-primary">Solicitar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
