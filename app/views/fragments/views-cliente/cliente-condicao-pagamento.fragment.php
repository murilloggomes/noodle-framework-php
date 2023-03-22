<!-- tabs content -->
          <div id="condicaoPagamento" class="divAba" hidden>				
						
            <div class="card-panel">
							<form class="formValidate" 
                    action="<?= APPURL."/clientes/".($Cliente->isAvailable() ? "edit/" . $Cliente->get("id") : "new") ?>"
                    method="POST">
								
             <input name="action" value="salvarCondicaoPagamento" type="hidden">
             <input name="idCondicaoPagamento" value="<?= $ClienteCondicaoPagamento->get("id") ?>" type="hidden">
								
              <blockquote>
                <h6>Condição de Pagamento </h6>
              </blockquote>
                <?php $condicao = json_decode($ClienteCondicaoPagamento->get("condicao_autorizada")); ?>              
                    <div class="row">
                      <div class="col s12 m4">
                        <div class="input-field ">
                          <select name="condicao_pagamento" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione</option>
                            <?php foreach($ConfigCondicao->getDataAs("CondicaoPagamento") as $cp):  ?>
                            <option <?= $ClienteCondicaoPagamento->get("condicao_pagamento") == $cp->get("id") ? "selected" : "" ?> value=" <?= $cp->get("id")?>"><?= $cp->get("nome") ?> </option>
                            <?php endforeach; ?>
                          </select>
													 <label for="condicao_pagamento" class="label active">Condição de Pagamento Padrão:</label>
                        </div>                       
                      </div>
                       <div class="col s12 m4">
                        <div class="input-field ">
                          <select name="condicao_exclusiva" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione</option>
                            <?php foreach($ConfigCondicao->getDataAs("CondicaoPagamento") as $cp):  ?>
                            <option <?= $ClienteCondicaoPagamento->get("condicao_exclusiva") == $cp->get("id") ? "selected" : "" ?> value=" <?= $cp->get("id")?>"><?= $cp->get("nome") ?> </option>
                            <?php endforeach; ?>                      
                          </select>
													 <label for="condicao_exclusiva" class="label active">Condição Exclusiva de Pagamento:</label>
                        </div>                       
                      </div>
                       <div class="col s12 m4">
                        <div class="input-field ">
                          <select data-placeholder="Selecione as condições" name="condicao_autorizada[]" class="select2 browser-default" multiple>
                           <?php foreach($ConfigCondicao->getDataAs("CondicaoPagamento") as $cp): ?>
                            <option <?php 
                                      if ($condicao != null) {
                                     foreach($condicao as $c){                                       
                                          if ($c->condicao == $cp->get("id")){
                                            echo "selected"; 
                                          } else {
                                            echo ""; }
                                          }
                                      }
                                       ?> value="<?= $cp->get("id")?>"><?= $cp->get("nome") ?></option>
                          <?php endforeach; ?>
                          </select>
                          <label for="condicao_autorizada" class="label active">Formas de Pagamentos Autorizados:</label>
                        </div>                       
                      </div>
  									</div>
										<div class="row">  
											<div class="col s12 display-flex justify-content-end">
												<button type="submit" class="btn waves-effect waves-light mr-2">Salvar</button>
											</div>  
										</div>									
          			</form>
            
            </div>
</div>
            <!-- tabs content -->