<style>
	.form-label {
		font-size: 13px;
	}
</style>
<div class="container-fluid">
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Peep</a></li>
						<li class="breadcrumb-item active"><a href="javascript: void(0);">Meu perfil</a></li>
					</ol>
				</div>
				<h4 class="page-title font-24">Meus dados</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-xl-4 col-lg-5">
			<div class="card text-center">
				<div class="card-body">
					<img src="assets/images/usuarios/<?=$AuthUser->get("id"); ?>.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
	
					<h4 class="mb-0 mt-2">
						
						<?=$AuthUser->get("firstname"); ?>
					</h4>
					<p class="text-muted font-14"><?= $AuthUser->get("empresa") ?></p>

					<!--                                    <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                                        <button type="button" class="btn btn-danger btn-sm mb-2">Message</button> -->

					<div class="text-start mt-3">
						<h4 class="font-13 text-uppercase">Sobre:</h4>
						<p class="text-muted font-13 mb-3">
							<?= $AuthUser->get("biografia"); ?>
						</p>
						<p class="text-muted mb-2 font-13"><strong>Nome :</strong> <span class="ms-2"><?=$AuthUser->get("firstname"); ?></span></p>

						<p class="text-muted mb-2 font-13"><strong>Telefone:</strong><span class="ms-2"><?=$AuthUser->get("phone"); ?></span></p>

						<p class="text-muted mb-2 font-13"><strong>E-mail:</strong> <span class="ms-2 "><?= $AuthUser->get("email"); ?></span></p>

<!-- 						<p class="text-muted mb-1 font-13"><strong>Endereço:</strong> <span class="ms-2"><?=$AuthUser->get("endereco") ?> </span></p> -->
					</div>

					<ul class="social-list list-inline mt-3 mb-0">
						<?php if($AuthUser->get("facebook") != ""):?>
						<li class="list-inline-item">
							<a href="<?= $AuthUser->get("facebook"); ?>" class="social-list-item border-blue text-primary"><i class="mdi mdi-facebook"></i></a>
						</li>
						<?php endif; ?>
						<?php if($AuthUser->get("instagram") != ""):?>
						<li class="list-inline-item">
							<a href="<?= $AuthUser->get("instagram"); ?>" class="social-list-item border-danger text-danger"><i class="mdi mdi-instagram"></i></a>
						</li>
						<?php endif; ?>
						<!-- 				<li class="list-inline-item">
							<a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
						</li> -->
						<?php if($AuthUser->get("linkedin") != ""):?>
						<li class="list-inline-item">
							<a href="<?= $AuthUser->get("linkedin"); ?>" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-linkedin"></i></a>
						</li>
						<?php endif; ?>
					</ul>
				</div>
				<!-- end card-body -->
			</div>
			<!-- end card -->
		</div>
		<!-- end col-->

		<div class="col-xl-8 col-lg-7">
			<div class="card">
				<div class="card-body">
					<ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
<!-- 		    	<li class="nav-item">
								<a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
										About
								</a>
						</li> -->
<!-- 						<li class="nav-item">
								<a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
										Permissões
								</a>
						</li> -->
						<li class="nav-item">
							<a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
              Configurações
              </a>
						</li>
					</ul>
					<div class="tab-content">
						<!-- end about me section content -->
						<div class="tab-pane show active" id="settings">
							<form enctype="multipart/form-data" action="<?= APPURL . "/perfil"?>" method="POST" id="profileForm" >
								<input name="action" value="salvarPerfil" type="hidden">
								<h5 class="mb-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle me-1"></i> Informações pessoais</h5>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="nome-usuario" class="form-label fw-bold">Nome <b>*</b> </label>
											<input type="text" class="form-control nome-usuario" name="nome-usuario" placeholder="" value="<?= $AuthUser->get("firstname"); ?>" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="cpf-usuario" class="form-label fw-bold">CPF <b>*</b></label>
											<input onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);" type="text" class="form-control cpf-usuario" name="cpf-usuario" value="<?= formata_cpf_cnpj($AuthUser->get("cpf/cnpj")) ?>" maxlength="11" placeholder="" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="telefone-usuario" class="form-label fw-bold">Telefone <b>*</b></label>
											<input type="text" class="form-control telefone-usuario" name="telefone-usuario" value="<?=$AuthUser->get("telefone"); ?>" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);" maxlength="11"  placeholder="(00) 0000-0000" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="celular-usuario" class="form-label fw-bold">Celular</label>
											<input type="text" class="form-control celular-usuario" name="celular-usuario" value="<?= $AuthUser->get("phone")?>" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);" maxlength="11"  placeholder="(00) 0 0000-0000">
										</div>
									</div>
								</div>
								<!-- end row -->
								<div class="row">
									<div class="col-12">
										<div class="mb-3">
											<label for="biografia-usuario" class="form-label fw-bold">Biografia</label>
											<textarea class="form-control biografia-usuario" name="biografia-usuario" rows="4" placeholder=""><?= $AuthUser->get("biografia"); ?></textarea>
										</div>
									</div>
									<!-- end col -->
								</div>
								<!-- end row -->
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="email-usuario" class="form-label fw-bold">E-mail <b>*</b></label>
											<input type="email" class="form-control email-usuario" name="email-usuario" value="<?= $AuthUser->get("email"); ?>" placeholder="email@horus.com.br" required>
											<span class="form-text text-muted"><small> <a href="javascript: void(0);"> Alterar e-mail.</a></small></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="userpassword" class="form-label fw-bold">Senha</label>
											<input type="password" class="form-control" name="password" placeholder="Adicione uma senha">
											<span class="form-text text-muted"><small><a href="javascript: void(0);">Alterar a senha</a></small></span>
										</div>
									</div>
									<!-- end col -->
								</div>
								<!-- end row -->
								<h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Informações adicionais</h5>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="empresa-usuario" class="form-label fw-bold">Empresa</label>
											<input type="text" class="form-control empresa-usuario" name="empresa-usuario" value="<?= $AuthUser->get("empresa"); ?>" placeholder="Nome da empresa">
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="cargo-usuario" class="form-label fw-bold">Cargo</label>
											<input type="text" class="form-control cargo-usuario" name="cargo-usuario"  value="<?=$AuthUser->get("cargo") ?>"placeholder="Cargo">
										</div>
									</div>
									<!-- end col -->
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="team-usuario" class="form-label fw-bold">Equipe</label>
											<select name="equipe-usuario" class="form-control select2 equipe-usuario" >                 
												<option value="" selected disabled="">Selecione a equipe</option>
												  <?php foreach($Equipe->getDataAs("CentroCusto") as $e): ?>
												  <option <?= $e->get("id") == $AuthUser->get("team") ? "selected" : "" ?> value="<?= $e->get("id") ?>"> <?= $e->get("nome") ?> </option>
												<?php endforeach; ?>		
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="permissao-usuario" class="form-label fw-bold">Nível de Permissão</label>
											<input type="text" class="form-control" name="permissao-usuario" value="<?=$AuthUser->get("account_type"); ?>" placeholder="" disabled>
										</div>
									</div>
									<!-- end col -->
								</div>
								<!-- end row -->
								<h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i>Midias Sociais</h5>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="social-fb" class="form-label fw-bold">Facebook</label>
											<div class="input-group">
												<span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
												<input type="text" class="form-control facebook-usuario" name="facebook-usuario" value="<?= $AuthUser->get("facebook"); ?>"  placeholder="Url">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="social-tw" class="form-label fw-bold">Twitter</label>
											<div class="input-group">
												<span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
												<input type="text" class="form-control twitter-usuario" name="twitter-usuario" value="<?= $AuthUser->get("twitter"); ?>" placeholder="Url">
											</div>
										</div>
									</div>
									<!-- end col -->
								</div>
								<!-- end row -->
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="social-insta" class="form-label fw-bold">Instagram</label>
											<div class="input-group">
												<span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
												<input type="text" class="form-control instagram-usuario" name="instagram-usuario" placeholder="Url" value="<?= $AuthUser->get("instagram"); ?>">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="social-lin" class="form-label fw-bold">Linkedin</label>
											<div class="input-group">
												<span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
												<input type="text" class="form-control linkedin-usuario" name="linkedin-usuario" value="<?=$AuthUser->get("linkedin"); ?>" placeholder="Url">
											</div>
										</div>
									</div>
									<!-- end col -->
								</div>
								<!-- end row -->
								<div class="text-end">
									<button type="submit" class="btn btn-success btn-perfil mt-2"><i class="mdi mdi-content-save"></i> Salvar</button>
								</div>
							</form>
							
						</div>
						<!-- end settings content-->

					</div>
					<!-- end tab-content -->
				</div>
				<!-- end card body -->
			</div>
			<!-- end card -->
		</div>
		<!-- end col -->
	</div>
	<!-- end row-->

</div>
<!-- container -->

</div>