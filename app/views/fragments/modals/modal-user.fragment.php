<div id="modalProdutos" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body"> 
              
                <form class="ps-3 pe-3" action="<?= APPURL . "/produtos" ?>" method="POST">
                  <input type="hidden" value="salvarProdutos" name="action" id="action" hidden>
                  <input type="hidden" value="" name="idProduto" id="idProduto" hidden>
                  <div class="container-fluid">  
                    <div class="row">
                  
                      <div class="col-md-6 mb-3 mt-3">
                          <label for="nomeProduto" class="form-label">Nome Produto</label>
                          <input class="form-control" type="text" id="nomeProduto" name="nomeProduto" required placeholder="Escreva o nome do Produto">
                      </div>  

                      <div class="col-md-3 mb-3 mt-3">
                          <label for="skuProduto" class="form-label">SKU Produto</label>
                          <input class="form-control" type="text" id="skuProduto" name="skuProduto" required placeholder="SKU Produto">
                      </div>

                      <div class="col-md-3 mb-3 mt-3">
                          <label for="qntProduto" class="form-label">Quantidade</label>
                          <input class="form-control" type="text" id="qntProduto" name="qntProduto" required placeholder="Quantidade Produto">
                      </div>

                      <div class="col-md-4 mb-3 mt-3">
                          <label for="precoProduto" class="form-label">Preço Produto</label>
                          <input class="form-control" type="text" id="precoProduto" name="precoProduto" required placeholder="Preço Produto">
                      </div>

                      <div class="col-md-8 mb-3 mt-3">
                        <label for="categoriasProduto" class="form-label">Categorias do Produto</label>
                          <select class="js-example-basic-multiple" name="categoriasProduto[]" id="categoriasProduto" multiple="multiple">
                            <?php foreach($Categorias->getDataAs("Categoria") as $c): ?>
                            <option value="<?= $c->get("id") ?>"><?= $c->get("nome") ?></option>
                            <?php endforeach; ?>
                            </select>
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
