 

<div class="modal fade userGeral" class="UserEdit" id="UserEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<form class="formValidate" action="<?= APPURL . "/users/"  ?>" method="POST">
					<input type="hidden" id="user" >
					<div class="modal-dialog modal-xl modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Edição Usuário: <strong style="font-weight: bold">  </strong></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								
								<input type="password" style="display:none">
								<blockquote>
									<h6>Edição de Usuário</h6>
								</blockquote>
								<input type="hidden" name="pw" value="0">
								<div class="row">
									<div class="col col-sm-12 col-md-2 col-lg-2 mb-3">
										<label class="label active" for="nome-usuario">Status:</label>
										<select id="statusU" required name="statusU" class=" form-control" data-placeholder="Selecione a Unidade:">  
														
											 	<option value="0" >Desativado</option>
											  <option value="1" >Ativado</option>
															                                     
										</select>
									</div>
									<div class="col col-sm-12 col-md-10 col-lg-10 mb-3">
										<label class="label active" for="nome-usuario">Nome Completo:</label>
										<input id="nome" required name="nome-usuario" type="text" class=" form-control" value="">
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
										<label for="cpf-usuario">CPF:</label>
										<input  onkeypress="onlynumberrealy();"
                                                   placeholder= "Ex: 000.000.000-00"
                                                   onblur="javascript: formatField(this);"                                                   
                                                   onfocus="javascript: cleanFormat(this);" id="cpf" required name="cpf-usuario" type="text" class="validate cpf_cnpj form-control" maxlength="11" placeholder="Ex: 000.000.000-00" value="" required>
									</div>
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
										<label for="fone-usuario">Telefone:</label>
										<input   onkeypress="onlynumberrealy();"
                                                   onblur="javascript: formatTel(this);" 
                                                   onfocus="javascript: cleanFormat(this);" id="telefone" name="fone-usuario" type="tel" class="validate telefone form-control" maxlength="11" value="">
									</div>
									<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
										<label for="email-usuario">E-mail:</label>
										<input id="email" required name="email-usuario" type="email" class="validate form-control" value="">
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12 col-md-4 col-lg-4 mb-3">

										<label class="label active">Unidade de Negócio:</label>
										<select id="unidade" required name="filial-usuario" class=" form-control" data-placeholder="Selecione a Unidade:">  
															<?php foreach($UnidadesNegocios->getDataAs("UnidadeNegocio") as $uN): ?>
															 <option value="<?= $uN->get("id")?>" ><?= $uN->get("nome")?></option>
															<?php endforeach; ?>                                        
										</select>
									</div>
									<div class="col col-sm-12 col-md-4 col-lg-4 mb-3">
										<label class="label active">Equipe:</label>
										<select id="tipo" required name="centro-custo-usuario" class=" form-control" data-placeholder="Selecione a Centro de Custo"> 
											   <option value="" selected disabled hidden>Selecione:</option>
													<?php foreach($CentroCusto->getDataAs("CentroCusto") as $cC): ?>
													<option   value="<?= $cC->get("id")?>"><?= $cC->get("nome")?></option>
													<?php endforeach; ?>                                        
									 </select>
									</div>
									<div class="col col-sm-12 col-md-4 col-lg-4 mb-3">
										<label class="label active">Cargo:</label>

										<select id="cargo" required name="cargo-usuario" class=" form-control" data-placeholder="Selecione o cargo:">
													<?php foreach($Cargos->getDataAs("Cargo") as $c): ?>
													 <option  value="<?= $c->get("id")?>"><?= $c->get("nome")?></option>
													<?php endforeach; ?>        
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
										<label for="senha-usuario">Senha</label>
										<input id="senha" name="senha-usuario" type="password" class="validate form-control" placeholder="">
									</div>
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">

										<label for="senha-usuario">Confirmar Senha:</label>
										<input id="confirmacaoSenha" name="confirma-senha" type="password" class="validate form-control" placeholder="">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="fecharModalUsuario" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
								<button type="submit" id="salvarUsuario" class="btn btn-primary">Salvar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
