<!-- tabs content -->
          <div id="inf-estrategia" class="divAba" hidden>				
						
            <div class="card-panel">
							<form class="formValidate" 
                    action="<?= APPURL."/clientes/".($Cliente->isAvailable() ? "edit/" . $Cliente->get("id") : "new") ?>"
                    method="POST">
								
             <input name="action" value="salvarInfoEstrategica" type="hidden">
             <input name="idInfoEstrategica" value="<?= $ClienteInfEstrategia->get("id") ?>" type="hidden">
								
              <blockquote>
                <h6>Cadastro de Informações Estratégicas</h6>
              </blockquote>
                    <div class="row">
                       <div class="col s12 m6">
                          <div class="input-field mt-19px">
                            <?php $atividade = json_decode($ClienteInfEstrategia->get("atividade_principal")); $socios = json_decode($ClienteInfEstrategia->get("socios")) ?>
                           <select data-placeholder="Atividade principal" name="atividade_principal[]" class="select2 browser-default" multiple>
                              <?php foreach($AtividadeEmpresa->getDataAs("ConfigEmpresa") as $ae): ?>
                               <option <?php if($atividade != null) {                                       
                                              foreach ($atividade as $at){
                                               if ($at->atividade == $ae->get("id")){
                                               echo "selected"; 
                                              } else {
                                            echo ""; 
                                               }
                                              }
                                             }
                                       ?>
                                       value="<?= $ae->get("id") ?>"><?= $ae->get("atividade")?></option>
                              <?php endforeach; ?> 
                            </select>
														<label class="label" for="atividade_principal" class="active">Atividade Principal</label>
                          </div>
                        </div> 

                      <div class="col s12 m2">
                        <div class="input-field mt-19px">      
													<input class="precoBRL" name="capital_social"  onfocus="javascript: cleanFormatMoney(this);"  value="<?= $ClienteInfEstrategia->get("capital_social") ?>">
													<label for="capital_social" class="label">Capital Social:</label>
                        </div>                       
                      </div>

                      <div class="col s12 m2">
                        <div class="input-field mt-19px">
                          <input class="precoBRL" name="faturamento_anual"  onfocus="javascript: cleanFormatMoney(this);"  value="<?=$ClienteInfEstrategia->get("faturamento_anual") ?>">
													<label for="faturamento_anual" class="label">Faturamento Anual:</label>
                        </div>
                      </div>
                      
                       <div class="col s12 m2 m-last">
                       <div class="input-field mt-19px">
                        <input name="volume_compras" value="<?= $ClienteInfEstrategia->get("volume_compras") ?>">
												<label for="volume_compras" class="label">Volume Compras:</label>
                       </div>      
                      </div>    
                     </div>
								
										<div class="row">
                      <div class="col s12 m6">
                        <div class="input-field mt-19px">    
													<select data-placeholder="Sócios" name="socios[]" class="select2 browser-default" multiple>
                           <?php foreach($ClientesFuncionarios->getDataAs("ClienteFuncionario") as $cf): ?>
                            <option <?php if ($socios != null) {
                                    foreach($socios as $s){                                       
                                          if ($s->socio == $cf->get("id")){
                                            echo "selected"; 
                                          } else {
                                            echo ""; }
                                          }
                                    }
                                       ?> value="<?= $cf->get("id")?>"><?= $cf->get("nome_funcionario") ?></option>
                          <?php endforeach; ?>
                          </select>                          
													<label for="socios" class="label">Socios:</label>
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