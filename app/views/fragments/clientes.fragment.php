<div class="content-page">
	<div class="content">
		<div class="container-fluid">
			<div class="col mt-3">
				<div class="row">
					<div class="col col-sm-12 col-md-12 col-lg-12">
						<blockquote class="d-inline-block">
							<h3>Clientes cadastrados</h3>
						</blockquote>
						<div class="text-xl-end mt-xl-0 mt-2 d-inline-block float-end">
							<button type="button" data-value="0" data-bs-toggle="modal" data-bs-target="#modalInformacoes" class="abrirModal btn btn-dark mb-2 me-2"><i class=" uil-user-plus me-1"></i> Cadastrar cliente</button>
						</div>
					</div>
				</div>
				<div class="tabelaUser">
					<table style="width:100%; text-align-last: left;" id="clientes" class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
                <th>Status</th>
								<th>Nome</th>
								<th>Tipo Cliente</th>
								<th>UF</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($Clientes->getDataAs("Cliente") as $cliente): ?>
							<tr>
								<td>
									<?= $cliente->get("id") ?>
								</td>
                <td>
                  <?php if($cliente->get("status") == 1):  ?>
							     <span class='badge badge-success-lighten'><span class='green-text'>Ativo</span></span>
							    <?php else: ?>
										 <span class='badge badge-danger-lighten'><span class='red-text'>Desativado</span></span>
                  <?php endif; ?>
								</td>
								<td>
									<?= $cliente->get("nome") ?>
								</td>
								<td>
									<?= $cliente->get("tipo_cliente") ?>
								</td>
								<td>
									<?= $cliente->get("uf") ?>
								</td>
								<td>
									<button style="background: transparent; border: none;" type="button" data-bs-toggle="modal" data-bs-target="#modalInformacoes" data-value="<?= $cliente->get("id") ?>" class="abrirModal">	<i class="fa fa-pencil" aria-hidden="true"></i>	</button>
									<!-- 									<button style="background: transparent; border: none;" type="button" data-bs-toggle="modal" data-bs-target="#Permissoes<?= $id ?>">	<i class="fa fa-key" aria-hidden="true"></i>	</button> -->
									<a href="javascript:void(0)" onclick="removerCliente(<?= $cliente->get("id") ?>)" class="tooltipped  red-text" data-type="User" data-position="top" data-tooltip="Remover"><i class="fa fa-times" aria-hidden="true"></i></a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

