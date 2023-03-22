<div class="content-page">
	<div class="content">
		<div class="container-fluid">
		
						<div class="modal fade userGeral" id="UserEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<form class="formValidate" action="<?= APPURL . "/users/"  ?>" method="POST">
					<div class="modal-dialog modal-xl modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Edição Usuário: <strong style="font-weight: bold">  </strong></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<input name="action" value="salvarUsuario" type="hidden">
								<input name="idUsuario" type="hidden" value="">
								<input type="password" style="display:none">
								<blockquote>
									<h6>Edição de Usuário</h6>
								</blockquote>
								<input type="hidden" name="pw" value="0">
								<div class="row">
									<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
										<label class="label active" for="nome-usuario">Nome Completo:</label>
										<input required name="nome-usuario" type="text" class=" form-control" value="">
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
										<label for="cpf-usuario">CPF:</label>
										<input required name="cpf-usuario" type="text" class="validate cpf_cnpj form-control" maxlength="11" placeholder="Ex: 000.000.000-00" value="" required>
									</div>
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
										<label for="fone-usuario">Telefone:</label>
										<input name="fone-usuario" type="tel" class="validate telefone form-control" maxlength="11" value="">
									</div>
									<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
										<label for="email-usuario">E-mail:</label>
										<input required name="email-usuario" type="email" class="validate form-control" value="">
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12 col-md-4 col-lg-4 mb-3">

										<label class="label active">Unidade de Negócio:</label>
										<select required name="filial-usuario" class=" form-control" data-placeholder="Selecione a Unidade:">  
															<?php foreach($UnidadesNegocios->getDataAs("UnidadeNegocio") as $uN): ?>
															 <option  value=""><?= $uN->get("nome")?></option>
															<?php endforeach; ?>                                        
										</select>
									</div>
									<div class="col col-sm-12 col-md-4 col-lg-4 mb-3">
										<label class="label active">Tipo:</label>
										<select required name="centro-custo-usuario" class=" form-control" data-placeholder="Selecione a Centro de Custo"> 
											   <option value="" selected disabled hidden>Selecione:</option>
													<?php foreach($CentroCusto->getDataAs("CentroCusto") as $cC): ?>
													<option   value=""><?= $cC->get("nome")?></option>
													<?php endforeach; ?>                                        
									 </select>
									</div>
									<div class="col col-sm-12 col-md-4 col-lg-4 mb-3">
										<label class="label active">Cargo:</label>

										<select required name="cargo-usuario" class=" form-control" data-placeholder="Selecione o cargo:">
													<?php foreach($Cargos->getDataAs("Cargo") as $c): ?>
													 <option  value=""><?= $c->get("nome")?></option>
													<?php endforeach; ?>        
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
										<label for="senha-usuario">Senha</label>
										<input name="senha-usuario" type="password" class="validate form-control" placeholder="">
									</div>
									<div class="col col-sm-12 col-md-6 col-lg-6 mb-3">

										<label for="senha-usuario">Confirmar Senha:</label>
										<input name="confirma-senha" type="password" class="validate form-control" placeholder="">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary">Salvar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			
			
</div>
	</div>
</div>