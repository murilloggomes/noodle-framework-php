<div class="row mt-3">
<!-- Menu tabs   -->
  <div class="col-sm-3 col-lg-2">
    <div class="nav nav-tabs nav-pills vertical settings d-block menu-config" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="border:none;">

      <div class="mt-2 mb-2 font-16 collapsed settings_menu" style="padding-top:13px;" data-bs-toggle="collapse" data-bs-target="#settings-tab-oportunidades">
        Configuração do sistema
      </div>
       <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<!--            <a class="list-group-item" id="menu-funil-tab" data-bs-toggle="pill" href="#funil-tab" role="tab" aria-controls="v-pills-profile1" aria-selected="false">
               <i class="mdi mdi-account-circle d-md-none d-block"></i>
               <span class="d-none d-md-block">Funis e etapas</span>
             </a> -->
          <a class="list-group-item" id="menu-geral" data-bs-toggle="pill" href="#geral-tab" role="tab" aria-controls="v-pills-profile" aria-selected="false">
               <i class="mdi mdi-account-circle d-md-none d-block"></i>
               <span class="d-none d-md-block">Geral</span>
             </a>
<!--           <a href='' class='list-group-item '>SMTP</a> -->
<!--           <a href='' class='list-group-item '>Notificações de E-mail</a> -->
           <a href='<?= APPURL . "/users" ?>' class='list-group-item'>Usuário</a>
         
          <a class="list-group-item" id="menu-cargo" data-bs-toggle="pill" href="#cargos-tab" role="tab" aria-controls="v-pills-profile" aria-selected="false">
               <i class="mdi mdi-account-circle d-md-none d-block"></i>
               <span class="d-none d-md-block">Cargos</span>
          </a>        
          <a class="list-group-item" id="menu-equipe" data-bs-toggle="pill" href="#equipes-tab" role="tab" aria-controls="v-pills-profile" aria-selected="false">
               <i class="mdi mdi-account-circle d-md-none d-block"></i>
               <span class="d-none d-md-block">Equipes</span>
          </a>
          <a class="list-group-item" id="menu-tags-tab" data-bs-toggle="pill" href="#tags-tab" role="tab" aria-controls="v-pills-profile2" aria-selected="false">
               <i class="mdi mdi-account-circle d-md-none d-block"></i>
               <span class="d-none d-md-block">Tags</span>
          </a>
          <a class="list-group-item" id="menu-motivo-tab" data-bs-toggle="pill" href="#motivo-tab" role="tab" aria-controls="v-pills-profile3" aria-selected="false">
               <i class="mdi mdi-account-circle d-md-none d-block"></i>
               <span class="d-none d-md-block">Motivo de perda</span>
          </a>
          <a class="list-group-item" id="menu-atividade-tab" data-bs-toggle="pill" href="#atividade-tab" role="tab" aria-controls="v-pills-profile" aria-selected="false">
               <i class="mdi mdi-account-circle d-md-none d-block"></i>
               <span class="d-none d-md-block">Atividade</span>
          </a>
          <a class="list-group-item tabFunil" id="menu-funis-tab" data-bs-toggle="pill" href="#etapas-tab" role="tab" aria-controls="v-pills-profile" aria-selected="false">
               <i class="mdi mdi-account-circle d-md-none d-block"></i>
               <span class="d-none d-md-block">Funis e etapas</span>
          </a>
          <a class="list-group-item tabFunil" id="pagina-tab" data-bs-toggle="pill" href="#paginas-tab" role="tab" aria-controls="v-pills-profile" aria-selected="false">
               <i class="mdi mdi-account-circle d-md-none d-block"></i>
               <span class="d-none d-md-block">Páginas</span>
          </a>
      </div>
    </div>
  </div>
<!-- Menu Content   -->
  <div class="col-sm-9 col-lg-10">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade active show" style="padding-top:13px;" id="geral-tab" role="tabpanel" aria-labelledby="geral-tab">
        <h4 class="header-title">Configurações gerais do sistema</h4>
        <p class="text-muted font-14 mb-3">Parametrize e ajuste o sistema conforme sua necessidade.</p>
        <form action="" id="general-settings-form" class="general-form dashed-row" role="form" method="post" accept-charset="utf-8">
          <div class="card">
            <div class="card-header">
              <h4>Configurações Gerais</h4>
            </div>
            <div class="card-body post-dropzone">
              <div class="form-group">
                <div class="row mb-2">
                  <label for="app_title" class=" col-md-2">Título do Sistema</label>
                  <div class=" col-md-10">
                    <input type="text" name="app_title" value="Horus - Processo" id="app_title" class="form-control" placeholder="Título do Sistema" data-rule-required="1" data-msg-required="Este campo é obrigatório." />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row mb-2">
                  <label for="accepted_file_formats" class=" col-md-2">Descrição do site</label>
                  <div class=" col-md-10">
                    <input type="text" name="descricao" value="Painel para realização de orçamentos" class="form-control" placeholder="Separados por vírgula" data-rule-required="1" data-msg-required="Este campo é obrigatório." />
                    <small class="fst-italic">* Extensão recomendada da descrição em 150-160 caracteres</small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row mb-2">
                  <label for="palavra-chave" class=" col-md-2">Palavras chaves</label>
                  <div class="col-md-10">
                    <input type="text" name="palavra-chave" value="crm,kanban,funil,tarefas" class="form-control" placeholder="Separados por vírgula" data-rule-required="1" data-msg-required="Este campo é obrigatório." />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary bs-none"><span data-feather="check-circle"></span> Salvar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="tab-pane fade" id="cargos-tab" role="tabpanel" aria-labelledby="v-pills-profile-tab">
       <?php require(APPPATH.'/views/fragments/views-config/config-cargos.fragment.php'); ?>
      </div>
    <!--   config equipe     -->
      <div class="tab-pane fade" id="equipes-tab" role="tabpanel" aria-labelledby="v-pills-profile-tab">
       <?php require(APPPATH.'/views/fragments/views-config/config-equipe.fragment.php'); ?>
      </div>
    <!--   config tag     -->
      <div class="tab-pane fade" id="tags-tab" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <?php require(APPPATH.'/views/fragments/views-config/config-tags.fragment.php'); ?>
      </div>
   <!--   config funil     -->
      <div class="tab-pane fade" id="funil-tab" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <?php require(APPPATH.'/views/fragments/views-config/config-funil.fragment.php'); ?>
      </div>
    <!--   config motivo     -->   
       <div class="tab-pane fade" id="motivo-tab" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <?php require(APPPATH.'/views/fragments/views-config/config-motivo.fragment.php'); ?>
      </div>
    <!--   config atividade     -->  
      <div class="tab-pane fade" id="atividade-tab" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <?php require(APPPATH.'/views/fragments/views-config/config-atividades.fragment.php'); ?>
      </div>
    <!--   config etapa     -->  
      <div class="tab-pane fade" id="etapas-tab" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <?php require(APPPATH.'/views/fragments/views-config/config-etapas.fragment.php'); ?>
      </div>
      <div class="tab-pane fade" id="paginas-tab" role="tabpanel" aria-labelledby="v-pills-profile-tab">
       <?php require(APPPATH.'/views/fragments/views-config/config-paginas.fragment.php'); ?>
      </div>
    </div>
  </div>
</div>




<!-- <script type='text/javascript'  src='https://crm.storgetec.com.br/assets/js/cropbox/cropbox-min.js?v=3.2.2'></script><div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="cropModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="crop-box">
                    <div class="thumb-box"></div>
                    <div class="spinner" style="display: none">Loading...</div>
                </div>
            </div>
            <div class="modal-footer clearfix">
                <button  id="image-zoomout-button" type="button" class="btn btn-default float-start mr10"><i data-feather="minus" class="icon-16"></i></button>
                <button id="image-zoomin-button" type="button" class="btn btn-default float-start"><i data-feather="plus" class="icon-16"></i></button>

                <button type="button" class="btn btn-default" data-bs-dismiss="modal"> <i data-feather="x" class="icon-16"></i> Fechar</button>
                <button id="image-crop-button" type="button" class="btn btn-primary" data-bs-dismiss="modal"> <i data-feather="check-circle" class="icon-16"></i> Cortar</button>
            </div>
        </div>
    </div>
</div>
 -->
