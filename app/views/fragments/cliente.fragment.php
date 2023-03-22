 <?php require_once(APPPATH.'/inc/estados.inc.php'); ?>
<div class="modal fade userGeral" id="modalInformacoes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<form class="formValidate" action="<?= APPURL . "/users/" ?>" method="POST" autocomplete="off">
					<div class="modal-dialog modal-xl modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Edição de Cliente<strong style="font-weight: bold"></strong></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<input name="action" value="salvarUsuario" type="hidden">
								<input name="idConta" type="hidden" id="idConta" value="">
								
								<input type="password" style="display:none" value="">
								<input type="email" style="display:none" value="">	
								<input type="hidden" name="pw" value="0">
								<div class="row">
                  <div class="col col-sm-12 col-md-4 col-lg-4 mb-3">
										<label for="cpf-usuario">Status:</label>
                     <select id="status" name="status" class="form-control select2 " required>
											<option value="null" selected disabled >Selecione</option>
                      <option value="1" >Ativo</option>
                      <option value="0" >Inativo</option>
											
										</select>
									</div>
									<div class="col col-sm-12 col-md-12 col-lg-4 mb-3">
										<label class="label active" for="nome-usuario">Razão Social:</label>
										<input required name="nome-usuario" type="text" class="form-control" id="nomeCompleto" value="">
									</div>
									<div class="col col-sm-12 col-md-12 col-lg-4 mb-3">
										<label class="label active" for="tipo-conta">Tipo de cliente:</label>
										<select required name="tipo-conta" class="select2 form-control" data-placeholder="Selecione:" id="tipo_cliente">  
											<option value="select" selected disabled hidden>Selecione</option>
                      <option value="Revenda">Revenda</option> 
                      <option value="Construtora">Construtora</option> 
                      <option value="Instalador">Instalador</option> 
                      <option value="Não Contribuinte">Não Contribuinte</option> 
                      <option value="Hospital / Clínica">Hospital / Clínica</option>                       
										</select>
									</div>
								</div>
								<div class="row">
                  <div class="col col-sm-12 col-md-4 col-lg-6 mb-3">
										<label for="cpf-usuario">CPF/CNPJ:</label>
										<input required name="cpf-usuario" type="text" class="validate cpf_cnpj form-control" maxlength="11" placeholder="Ex: 000.000.000-00" value="" id="cnpj" required>
									</div>
									<div class="col col-sm-12 col-md-4 col-lg-6 mb-3">
										<label for="fone-usuario">Telefone:</label>
										<input name="fone-usuario" type="tel" class="validate telefone form-control" maxlength="11" id="telefoneConta" value="">
									</div>
									<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
										<label for="email-usuario">E-mail:</label>
										<input required name="email-usuario" type="email" class="validate form-control" id="emailConta" value="" autocomplete="off">
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
										<label for="senha-usuario">Cep:</label>
										<input id="cep" name="cep" type="text" class="cepField form-control" placeholder="">
									</div>
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
										<label for="senha-usuario">Endereço</label>
								 <input id="endereco" name="endereco" type="text" class="logradouroField form-control" placeholder="">
									</div>
                  <div class="col col-sm-12 col-md-4 col-lg-4 mb-3">
										<label for="senha-usuario">Bairro:</label>
							     	<input id="bairro" name="bairro" type="text" class="bairroField form-control" placeholder="">
									</div>
                  <div class="col col-sm-12 col-md-4 col-lg-4 mb-3">
										<label for="senha-usuario">Cidade:</label>
										<input id="cidade" name="cidade" type="text" class="localidadeField form-control" placeholder="">
									</div>
                  <div class="col col-sm-12 col-md-4 col-lg-4 mb-3">
										<label for="senha-usuario">Estado:</label>
								    <select id="estadoField" name="estado" class="form-control select2 estadoField" required>
											<option value="null" selected disabled hidden>Selecione o estado</option>
											<?php foreach($Estados as $key => $k):?>
												<option value="<?= $key ?>"><?= $k ?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary salvarCliente">Salvar</button>
							</div>
						</div>
					</div>
				</form>
			</div>