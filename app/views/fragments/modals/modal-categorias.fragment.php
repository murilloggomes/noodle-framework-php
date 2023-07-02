<div id="modalCategorias" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body"> 
              
                <form class="ps-3 pe-3" action="<?= APPURL . "/categorias" ?>" method="POST">
                  <input type="hidden" value="salvarCategorias" name="action" id="action" hidden>
                  <input type="hidden" value="" name="idCategoria" id="idCategoria" hidden>
                  <div class="container-fluid">  
                    <div class="row">
                  
                      <div class="col-md-12 mb-3 mt-3">
                          <label for="nomeCategoria" class="form-label">Nome Categoria</label>
                          <input class="form-control" type="text" id="nomeCategoria" name="nomeCategoria" required placeholder="Escreva a Categoria do Produto">
                      </div>  
                        
                  </div>
                    
                  </div>
                     <div class="row" style="justify-content: center;">                     
                      <div class="col-md-3 mb-3 text-center">
                          <button class="btn btn-primary" type="submit">Salvar</button>
                      </div>
                    </div>
                
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
