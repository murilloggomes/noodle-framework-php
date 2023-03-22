 <h4 class="header-title">Configurações de atividades</h4>
        <p class="text-muted font-14 mb-3">Gerencie e ajuste as atividades relacionadas as oportunidades. </p>
        <form action="" id="general-settings-form" class="general-form dashed-row" role="form" method="post" accept-charset="utf-8">
          <div class="card">
            <div class="card-header">
              <h4 class="d-inline-block">Atividades</h4>
              <div class="d-inline-block float-end" style="margin-top:4px;">
                <button type="button" class="btn btn-primary btn-sm ms-3 bs-none" data-bs-toggle="modal" data-bs-target="#modalAtividade">Adicionar nova atividade</button>
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
                <?php foreach($atividades->getDataAs("ConfigAtividade") as $a): ?>
                <tr>
                  <td>
                    <?= $a->get("id"); ?>
                  </td>
                  <?php if($a->get("status") == "1"): ?>
                  <td><span class="badge badge-success-lighten"><span class="green-text">Ativo</span></span>
                  </td>
                  <?php else: ?>
                  <td><span class="badge badge-danger-lighten"><span class="red-text">Desativado</span></span>
                  </td>
                  <?php endif; ?>
                  <td>
                    <?= $a->get("nome"); ?>
                  </td>
                  <td>
                    <button style="background: transparent; border: none;" type="button" data-bs-toggle="modal" data-bs-target="#modalEditAtividade<?= $a->get("id"); ?>">		<i class="fa fa-pencil" aria-hidden="true"></i>	</button>
                    <a href="javascript:void(0)" class="tooltipped remover-dados" data-type="ConfigAtividade" data-id="<?=$a->get("id"); ?>" data-position="top" data-tooltip="Remover"><i class="fa fa-times" aria-hidden="true"></i></a>
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
<div id="modalAtividade" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Cadastro de atividade</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
            <label class="active" for="nome">Nome<span> *</span></label>
            <input name="nome" type="text" class="form-control nome" value="" required>
          </div>
          <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
            <label class="active status" for="status">Status<span> *</span></label>
            <select required name="status" class="form-control select2 status" required>                 
              <option selected disabled="">Selecione</option>
              <option value="1">Ativo</option>
              <option value="2">Desativado</option>
            </select>
          </div>
          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
            <label class="active" for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control descricao" row="6"></textarea>
          </div>
                    
<!--           <div class="col col-sm-2 col-md-2 col-lg-2">
              <label for="example-color" class="active">Icone</label>
              <input class="form-control cor" type="color" name="cor" value="">
          </div> -->
        </div>
      </div>
      <div class="modal-footer">
        <input value="" class="idConfig" hidden>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
        <button type="button" data-id="ConfigAtividade" data-value="" data-bs-dismiss="modal" class="btn btn-primary bs-none salvarConfig">Salvar</button>
      </div>
    </div>
  </div>
</div>
<!--  fim modal equipe       -->
<!--   Modal edit equipe     -->
<?php foreach($atividades->getDataAs("ConfigAtividade") as $a): ?>
<div id="modalEditAtividade<?=$a->get("id"); ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Cadastro de atividade</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
            <label class="active" for="nome">Nome<span> *</span></label>
            <input name="nome" type="text" class="form-control nome" value="<?= $a->get("nome"); ?>" required>
          </div>
          <div class="col col-sm-12 col-md-6 col-lg-6 mb-3">
            <label class="active" for="status">Status<span> *</span></label>
            <select required name="status" class="form-control select2 status" required>                 
              <option <?= $a->get("status") == "0" ? "selected" : "" ?> disabled="">Selecione</option>
              <option <?= $a->get("status") == "1" ? "selected" : "" ?> value="1">Ativo</option>
              <option <?= $a->get("status") == "2" ? "selected" : "" ?> value="2">Desativado</option>
            </select>
          </div>
          <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
            <label class="active" for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control descricao" row="6"><?= $a->get("descricao"); ?></textarea>
          </div>
<!--           <div class="col col-sm-2 col-md-2 col-lg-2">
              <label for="example-color" class="active">Icone</label>
              <input class="form-control cor" type="color" name="cor" value="">
          </div> -->
        </div>
      </div>
      <div class="modal-footer">
        <input value="" class="idConfig" hidden>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fechar</button>
        <button type="button" data-id="ConfigAtividade" data-value="<?= $a->get("id") ?>" data-bs-dismiss="modal" data-value="" class="btn btn-primary bs-none salvarConfig">Salvar</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!--  fim modal edit equipe       -->