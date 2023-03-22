<!-- tabs content -->
          <div id="limitecredito" class="divAba" hidden>				
						
            <div class="card-panel">
							<form class="formValidate" 
                    action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                    method="POST">
								
             <input name="action" value="salvarLimite" type="hidden">
						 <input name="idLimite" value="<?= $ClienteLimiteCredito->get("id") ?>" type="hidden">		
              <blockquote>
                <h6>Cadastro Limite de Crédito</h6>
              </blockquote>
                
                    <div class="row">
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">    
													<input class="precoBRL" name="limite_total"  onfocus="javascript: cleanFormatMoney(this);"  value="<?= $ClienteLimiteCredito->get("limite_total") ?>">
													<label for="limite_total" class="label">Limite de Crédito Total:</label>
                        </div>                       
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input class="precoBRL" name="limite_mensal" onfocus="javascript: cleanFormatMoney(this);" value="<?= $ClienteLimiteCredito->get("limite_mensal") ?>">
													<label for="limite_mensal" class="label">Limite de Crédito Mensal:</label>
                        </div>                       
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">
                          <input name="data_aprovacao" type="date" value="<?= $ClienteLimiteCredito->get("data_aprovacao") ?>">
													<label for="data_aprovacao" class="label">Data de Aprovação:</label>
                        </div>
                      </div>
                       <div class="col s12 m3 m-last">
                       <div class="input-field mt-19px">
                        <input name="data_validade" type="date" value="<?= $ClienteLimiteCredito->get("data_validade") ?>">
												<label for="data_validade" class="label">Validade do Limite:</label>
                       </div>      
                      </div>    
                    </div>
										<div class="row">                     
                      <div class="col s12 m3">
                        <div class="input-field ">
                          <select name="renovacao_automatica" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1" <?= $ClienteLimiteCredito->get("renovacao_automatica") == 1 ? "selected" : "" ?>>Ativado</option>
                            <option value="2" <?= $ClienteLimiteCredito->get("renovacao_automatica") == 2 ? "selected" : "" ?>>Desativado</option>                       
                          </select>
													 <label for="renovacao_automatica" class="label active">Renovação Automática</label>
                        </div>                       
                      </div>
                        <div class="col s12 m3">
                        <div class="input-field mt-19px">    
													<input name="cashback" type="number" value="<?= $ClienteLimiteCredito->get("cashback") ?>">
													<label for="cashback" class="label active">Cashback (%):</label>
                        </div>                       
                      </div>
											 <div class="col s12 m6 m-last">
                        <div class="input-field mt-19px">  													
													<input name="liberado" value="<?= $ClienteLimiteCredito->get("liberado") == "" ?  $AuthUser->get("firstname") : $ClienteLimiteCredito->get("liberado")?>">
													<label for="liberado" class="label">Liberado por:</label>
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