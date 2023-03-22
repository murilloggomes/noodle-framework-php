 <h4 class="header-title">Configurações de equipe</h4>
        <p class="text-muted font-14 mb-3">Gerencie e adicione equipes para o sistema. </p>
        <form action="" id="general-settings-form" class="general-form dashed-row" role="form" method="post" accept-charset="utf-8">
          <div class="card">
            <div class="card-header">
              <h4 class="d-inline-block">Equipes</h4>
              <div class="d-inline-block float-end" style="margin-top:4px;">
                <button type="button" class="btn btn-primary btn-sm ms-3 bs-none" data-bs-toggle="modal" data-bs-target="#modalEquipe">Adicionar nova equipe</button>
              </div>
            </div>
            <table id="equipes-table" class="table dt-responsive nowrap w-100">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Status</th>
                  <th>Nome</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($equipes->getDataAs("CentroCusto") as $e): ?>
                <tr>
                  <td>
                    <?= $e->get("id"); ?>
                  </td>
                  <?php if($e->get("status") == "1"): ?>
                  <td><span class="badge badge-success-lighten"><span class="green-text">Ativo</span></span>
                  </td>
                  <?php else: ?>
                  <td><span class="badge badge-danger-lighten"><span class="red-text">Desativado</span></span>
                  </td>
                  <?php endif; ?>
                  <td>
                    <?= $e->get("nome"); ?>
                  </td>
                  <td>
                    <button style="background: transparent; border: none;" type="button" data-bs-toggle="modal" data-bs-target="#modalEditEquipe<?= $e->get("id"); ?>">		<i class="fa fa-pencil" aria-hidden="true"></i>	</button>
                    <a href="javascript:void(0)" class="tooltipped" data-type="User" data-position="top" data-tooltip="Remover"><i class="fa fa-times" aria-hidden="true"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <!--                       <div class="card-footer">
                          <button type="submit" class="btn btn-primary bs-none"><span data-feather="check-circle"></span> Salvar</button>
                      </div> -->
          </div>
        </form>

<!-- Modals -->
<!--   Modal equipe     -->
<div id="modalEquipe" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Cadastro de equipe</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
            <label class="active" for="nome-equipe">Nome<span> *</span></label>
            <input name="nome-equipe" type="text" class="form-control nome" value="" required>
          </div>
          <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
            <label class="active status-equipe" for="status-equipe">Status<span> *</span></label>
            <select required name="status-equipe" class="form-control select2 status" required>                 
              <option selected disabled="">Selecione</option>
              <option value="1">Ativo</option>
              <option value="2">Desativado</option>
            </select>
          </div>
          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
            <label class="active" for="descricao-equipe">Descrição</label>
            <textarea name="descricao-equipe" class="form-control descricao" row="6"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input value="" class="idConfig" hidden>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
        <button type="button" data-id="CentroCusto" data-value="" class="btn btn-primary bs-none salvarConfig">Salvar</button>
      </div>
    </div>
  </div>
</div>
<!--  fim modal equipe       -->
<!--   Modal edit equipe     -->
<?php foreach($equipes->getDataAs("CentroCustos") as $e): ?>
<div id="modalEditEquipe<?=$e->get("id"); ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Cadastro de equipe</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
            <label class="active" for="nome-equipe">Nome<span> *</span></label>
            <input name="nome-equipe" type="text" class="form-control nome" value="<?= $e->get("nome"); ?>" required>
          </div>
          <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
            <label class="active status-equipe" for="status-equipe">Status<span> *</span></label>
            <select required name="status-equipe" class="form-control select2 status" required>                 
              <option selected disabled="">Selecione</option>
              <option <?= $e->get("status") == "1" ? "selected" : "" ?> value="1">Ativo</option>
              <option <?= $e->get("status") == "2" ? "selected" : "" ?> value="2">Desativado</option>
            </select>
          </div>
          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
            <label class="active" for="descricao-equipe">Descrição</label>
            <textarea name="descricao-equipe" class="form-control descricao" row="6"><?= $e->get("descricao"); ?></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input value="" class="idConfig" hidden>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
        <button type="button" data-id="CentroCusto" data-value="<?= $e->get("id") ?>" data-bs-dismiss="modal" data-value="" class="btn btn-primary bs-none salvarConfig">Salvar</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!--  fim modal edit equipe       -->