<div class="content-page">
	<div class="content">
		<!-- Start Content-->
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
				<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
					<div class="page-title-box">
						<div class="page-title-right">
							<ol class="breadcrumb m-0">								
								<li class="breadcrumb-item"><a href="javascript: void(0);">Lista de Processos</a></li>
								<li class="breadcrumb-item active">Tarefas</li>
							</ol>
						</div>
						<h4 class="page-title">Processos
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row" id="processosArea" >				
						<?php foreach($Processos->getDataAs("Processo") as $p): ?>
						<?php $cor = $p->get('cor'); ?>
						<?php $criador = ($p->get('criador')); ?>
						<?php $responsavel = ($p->get('criador')); ?>
						<div class="col col-sm-12 col-md-12 col-lg-4 mb-3 card_processos">
							<div class="card mb-0">
								<div class="p-3">
									<a href="<?= APPURL . "/processos/". $p->get("id") ?>">
										<span class="badge" id="<?= "corProcesso".$p->get("id")?>" style='<?= "background-color:$cor; width:7%;height:12px;margin-bottom:4px;margin-right:2px;display:inline-block"?>'></span>
									</a>	
									<h5 class="mt-2 mb-2 d-inline-block">
										<a data-bs-toggle="modal" data-bs-target="#task-detail-modal" class="text-body tituloProcesso" id="<?= "tituloProcesso".$p->get("id")?>"><?= $p->get("nome") ?></a>
									</h5>
									<p class="mb-0">
											<i class="mdi mdi-briefcase-outline text-muted"></i>
										<span class="pe-2 text-nowrap mb-2 d-inline-block" id="<?= "equipeProcesso".$p->get("id")?>">
												<?= $this->consultarEquipe($p->get("equipe")) ?>
										</span>
										<span class="text-nowrap mb-2 d-inline-block">
											<i class="mdi mdi-comment-multiple-outline text-muted"></i>
											<b><?= $this->oportunidades($p->get("id"))?></b> Etapas Cadastradas
										</span>
									</p>
									
									<div class="dropdown float-end">
                    <a href="<?= APPURL . "/processos/". $p->get("id") ?>">
										<i class="mdi mdi-arrow-right-thick font-18"></i>
									</a>	
                   
									</div>

									<p class="mb-0">
										<img src="<?= APPURL . "/assets/images/usuarios/$responsavel.jpg "?>" alt="user-img" class="avatar-xs rounded-circle me-1 fotoResponsavel" id="fotoResponsavel<?=$p->get("criador");?>"/>
										<span class="align-middle" id="nomeResponsavel<?= $p->get("id");?>"><b>Criador por: </b> <?= $this->nomeCriador($responsavel); ?></span>
									</p>
								</div>
								<!-- end card-body -->
							</div>
						</div>
						<?php endforeach; ?>
						
						<span id="elementoFila"></span>
				
					<!-- end .board-->
				</div>
				<!-- end col -->
			</div>
			<!-- end row-->
		</div>
		<!-- container -->
	</div>
	<!-- content -->
</div>