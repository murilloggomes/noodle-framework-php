<div class="content">
	<div class="row">	
			<div class="page-title-box col-6">					
				<h4 class="page-title">Nome Cadastrados</h4>
			</div>
			<div class="page-title-box col-6">		
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUsers" data-value="0" style="margin-top:25px;float:right">Cadastrar Pessoas</button>			
			</div>
			<table id="tabelaUsers" class="table table-striped dt-responsive nowrap w-100">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>						
						<th>E-mail</th>
						<th>Ativo</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($Users->getDataAs("User") as $u): ?>
					<tr>
						<td><?= $u->get("id") ?></td>
						<td><?= $u->get("fisrtname") ?></td>
						<td><?= $u->get("email") ?></td>
						<td><?= $u->get("is_active") ?></td>
						<td>Botões</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
	</div>
</div>