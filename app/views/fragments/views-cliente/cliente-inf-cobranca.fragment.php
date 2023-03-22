<!-- tabs content -->
          <div id="infCobranca" class="divAba" hidden>				
						
            <div class="card-panel">
							<form class="formValidate" 
                    action="<?= APPURL."/clientes/".($Cliente->isAvailable() ? "edit/" . $Cliente->get("id") : "new") ?>"
                    method="POST">
								
             <input name="action" value="salvarInfoCobranca" type="hidden">
						<input name="idInfCobranca" value="<?= $ClienteInfCobranca->get("id") ?>" type="hidden">	
                
              <blockquote>
                <h6>Cadastro de Informações de Cobranças</h6>
              </blockquote>
                
                    <div class="row">
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">
                          <select name="aceita_protesto" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione uma opção</option>
                            <option value="1" <?= $ClienteInfCobranca->get("aceita_protesto") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("aceita_protesto") == 2 ? "selected" : "" ?>>Não</option>                       
                          </select>
													 <label for="aceita_protesto" class="label active">Aceita Protesto</label>
                        </div>                          
                      </div>
                      <div class="col s12 m2">
                        <div class="input-field mt-19px">
                          <select name="boletos_correio" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione uma opção</option>
                            <option value="1" <?= $ClienteInfCobranca->get("boletos_correio") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("boletos_correio") == 2 ? "selected" : "" ?>>Não</option>                
                          </select>
													 <label for="boletos_correio" class="label active">Boletos por Correio</label>
                        </div>                        
                      </div>
                      <div class="col s12 m2">
                        <div class="input-field mt-19px">
                          <select name="consultar_cheques" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione uma opção</option>
                            <option value="1" <?= $ClienteInfCobranca->get("consultar_cheques") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("consultar_cheques") == 2 ? "selected" : "" ?>>Não</option>                        
                          </select>
													 <label for="consultar_cheques" class="label active">Consultar Cheque</label>
                        </div>   
                      </div>
                       <div class="col s12 m2">
                       <div class="input-field mt-19px">
                          <select name="calcular_juros_multa" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione uma opção</option>
                            <option value="1" <?= $ClienteInfCobranca->get("calcular_juros_multa") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("calcular_juros_multa") == 2 ? "selected" : "" ?>>Não</option>                      
                          </select>
													 <label for="calcular_juros_multa" class="label active">Calcular Juros e Multa</label>
                        </div>        
                      </div> 
                       <div class="col s12 m3">
                        <div class="input-field mt-19px">
                          <select name="cobranca_domiciliar" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione uma opção</option>
                           <option value="1" <?= $ClienteInfCobranca->get("cobranca_domiciliar") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("cobranca_domiciliar") == 2 ? "selected" : "" ?>>Não</option>                       
                          </select>
													 <label for="cobranca_domiciliar" class="label active">Permitir Cobrança Domiciliar</label>
                        </div>                         
                      </div>
                    </div>
                <div class="row">
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">
                          <select name="vendas_sem_no" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione uma opção</option>
                            <option value="1" <?= $ClienteInfCobranca->get("vendas_sem_no") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("vendas_sem_no") == 2 ? "selected" : "" ?>>Não</option>                       
                          </select>
													 <label for="vendas_sem_no" class="label active">Bloquear Vendas sem Nº de Ordem</label>
                        </div>                          
                      </div>
                      <div class="col s12 m2">
                        <div class="input-field mt-19px">
                          <select name="consulta_sefaz" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione uma opção</option>
                            <option value="1" <?= $ClienteInfCobranca->get("consulta_sefaz") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("consulta_sefaz") == 2 ? "selected" : "" ?>>Não</option>                
                          </select>
													 <label for="consulta_sefaz" class="label active">Consulta SEFAZ</label>
                        </div>                        
                      </div>
                      <div class="col s12 m2">
                        <div class="input-field mt-19px">
                          <select name="prioriza_entrega" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione uma opção</option>
                           <option value="1" <?= $ClienteInfCobranca->get("prioriza_entrega") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("prioriza_entrega") == 2 ? "selected" : "" ?>>Não</option>                        
                          </select>
													 <label for="prioriza_entrega" class="label active">Priorizar Entregas</label>
                        </div>   
                      </div>
                       <div class="col s12 m2">
                       <div class="input-field mt-19px">
                          <select name="blacklist" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione uma opção</option>
                            <option value="1" <?= $ClienteInfCobranca->get("blacklist") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("blacklist") == 2 ? "selected" : "" ?>>Não</option>                      
                          </select>
													 <label for="blacklist" class="label active">Blacklist</label>
                        </div>        
                      </div> 
                       <div class="col s12 m3">
                        <div class="input-field mt-19px">
                          <select name="grupo_cobranca" class="select2 browser-default">
                            <option value="0" disabled selected>Escolha um grupo</option>
                            <option value="1" <?= $ClienteInfCobranca->get("grupo_cobranca") == 1 ? "selected" : "" ?>>Sim</option>
                            <option value="2" <?= $ClienteInfCobranca->get("grupo_cobranca") == 2 ? "selected" : "" ?>>Não</option>                       
                          </select>
													 <label for="grupo_cobranca" class="label active">Grupo de Cobrança</label>
                        </div>                         
                      </div>
                    </div>
										<div class="row">
                      <div class="col s12 m12">
                        <div class="input-field mt-19px">      
													<input name="observacao_info_cobranca" type="text" value="<?= $ClienteInfCobranca->get("observacao_info_cobranca") ?>">
													<label for="observacao_info_cobranca" class="label">Observação:</label>
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