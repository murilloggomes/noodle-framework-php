<!-- tabs content -->
          <div id="referencias" class="divAba" hidden>						
								<?php require_once(APPPATH . "/views/fragments/views-cliente/cliente-referencias.pessoais.fragment.php")?>
								<?php require_once(APPPATH . "/views/fragments/views-cliente/cliente-referencias.comerciais.fragment.php")?>
								<?php require_once(APPPATH . "/views/fragments/views-cliente/cliente-referencias.bancarias.fragment.php")?>
					</div>
                
                
<!-- tabs content -->
<!-- Modal Ref Pessoal -->
			<div id="modalRefPessoalGeral" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
					<div class="modal-content modal-color">      
						<form class="formValidate" 
													action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
													method="POST">
			
					 <input name="action" value="salvarReferenciaPessoal" type="hidden">
			
                
              <blockquote>
                <h6>Referência Pessoal </h6>
              </blockquote>
                
                    <div class="row">
                      <div class="col s12 m6">
                        <div class="input-field mt-19px">    
													<input name="nome_referencia" value="">
													<label for="nome_referencia" class="label">Nome do Contato</label>
                        </div>                       
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input  name="telefone_referencia" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);" maxlength="11" value="">
													<label for="telefone_referencia" class="label">Telefone do Contato</label>
                        </div>                
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field ">
                          <select  name="relacao_referencia" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1">Supervisor</option>
                            <option value="2">Trabalho</option>                       
                          </select>
													 <label for="relacao_referencia" class="label active">Relação</label>
                        </div>                       
                      </div> 
                    </div>
                <div class="row">
                  <div class="col s12 m12">
                        <div class="input-field mt-19px">    
													<input name="observacao_referencia" value="">
													<label for="observacao_referencia" class="label">Observação</label>
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
<!-- Modal Ref Comercial -->
			<div id="modalRefComercialGeral" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
					<div class="modal-content modal-color">      
						<form class="formValidate" 
													action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
													method="POST">
			
					 <input name="action" value="salvarReferenciaComercial" type="hidden">
			
                
              <blockquote>
                <h6>Referência Comercial</h6>
              </blockquote>
                    <div class="row">
                          <div class="col s12 m5">
                            <div class="input-field mt-19px">    
                              <input name="empresa_referencia_comercial" value="">
                              <label for="empresa_referencia_comercial" class="label"> Empresa:</label>
                            </div>                       
                          </div>
                          <div class="col s12 m3">
                            <div class="input-field mt-19px">      
                              <input name="telefone_referencia_comercial" onkeypress="onlynumberrealy();" onblur="javascript: formatTel(this);" onfocus="javascript: cleanFormat(this);" maxlength="11" value="">
                              <label for="telefone_referencia_comercial" class="label">Telefone:</label>
                            </div>                
                          </div>
                          <div class="col s12 m4">
                            <div class="input-field mt-19px">      
                              <input name="contato_referencia_comercial" value="">
                              <label for="telefone_referencia_comercial" class="label">Contato da Empresa</label>
                            </div>                
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s12 m5">
                            <div class="input-field mt-19px">    
                              <input name="desde_referencia_comercial" type="date" value="">
                              <label for="desde_referencia_comercial" class="label"> Cliente desde:</label>
                            </div>                       
                          </div>
                          <div class="col s12 m3">
                            <div class="input-field mt-19px">      
                              <input name="maior_compra_referencia_comercial" value="">
                              <label for="maior_compra_referencia_comercial" class="label">Maior Compra:</label>
                            </div>                
                          </div>
                          <div class="col s12 m4">
                            <div class="input-field mt-19px">      
                              <input name="media_referencia_comercial" value="">
                              <label for="media_referencia_comercial" class="label">Média de Compra Mensal:</label>
                            </div>                
                          </div>
                        </div>
                    <div class="row">
                      <div class="col s12 m12">
                            <div class="input-field mt-19px">    
                              <input name="observacao_referencia_comercial" value="">
                              <label for="observacao_referencia_comercial" class="label">Observação</label>
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
<!-- Modal Ref Bancaria -->
			<div id="modalRefBancariaGeral" class="modal modal-fixed-footer" style="height:55% !important;overflow: hidden">
					<div class="modal-content modal-color">      
						<form class="formValidate" 
													action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
													method="POST">
			
					 <input name="action" value="salvarReferenciaBancaria" type="hidden">
							
              <blockquote>
                <h6>Referência Bancária </h6>
              </blockquote>
                    <div class="row">
                      <div class="col s12 m6">
                        <div class="input-field ">
                          <select id="banco_referencia_bancaria" name="banco_referencia_bancaria" class="select2 browser-default">
                           <option value="" disabled selected>Selecione</option>
                           <?php foreach($ConfigBancos->getDataAs("ConfigBanco") as $b) : ?>
                           <option value="<?= $b->get("id")?>"><?=$b->get("nome") ?> </option>
                           <?php endforeach?>
                          </select>
													 <label for="banco_referencia_bancaria" class="label active">Banco:</label>
                        </div>                       
                      </div> 
                      <div class="col s12 m2">
                        <div class="input-field ">
                          <select id="tipo_referencia_bancaria" name="tipo_referencia_bancaria" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1">Conta Corrente</option>
                            <option value="2">Poupança</option>
                            <option value="3">Conta conjunta</option> 
                          </select>
													 <label for="tipo_referencia_bancaria" class="label active">Tipo de Conta:</label>
                        </div>                       
                      </div> 
                      <div class="col s12 m2">
                        <div class="input-field mt-19px">      
													<input id="agencia_referencia_bancaria" name="agencia_referencia_bancaria" value="">
													<label for="agencia_referencia_bancaria" class="label">Agência:</label>
                        </div>                
                      </div>
                      <div class="col s12 m2">
                        <div class="input-field mt-19px">      
													<input id="conta_referencia_bancaria" name="conta_referencia_bancaria" value="">
													<label for="conta_referencia_bancaria" class="label">Conta:</label>
                        </div>                
                      </div>
                    </div>
                <div class="row">
                     <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input id="gerente_conta_referencia_bancaria" name="gerente_conta_referencia_bancaria" value="">
													<label for="gerente_conta_referencia_bancaria" class="label">Gerente da Conta:</label>
                        </div>                
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field ">
                          <select id="tempo_referencia_bancaria" name="tempo_referencia_bancaria" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1">1-2 anos</option>
                            <option value="2">3-5 anos</option>
                            <option value="3">5-10 anos</option> 
                          </select>
													 <label for="tempo_referencia_bancaria" class="label active">Cliente desde:</label>
                        </div>                       
                      </div> 
                      <div class="col s12 m3">
                        <div class="input-field ">
                          <select id="classificacao_referencia_bancaria" name="classificacao_referencia_bancaria" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1" >Banco Digital</option>
                            <option value="2" >Banco Investimentos</option>
                            <option value="3" >Banco de Desenvolvimento</option> 
                          </select>
													 <label for="classificacao_referencia_bancaria" class="label active">Classficação Bancária:</label>
                        </div>                       
                      </div> 
                      <div class="col s12 m3">
                        <div class="input-field ">
                          <select id="movimentacao_referencia_bancaria" name="movimentacao_referencia_bancaria" class="select2 browser-default">
                            <option value="0" disabled selected>Selecione</option>
                            <option value="1">Entre 10.000,00 - 50.000,00</option>
                            <option value="2" >Entre 60.000,00 - 100.000,00</option>
                            <option value="3">Acima de 100.000,00</option> 
                          </select>
													 <label for="movimentacao_referencia_bancaria" class="label active">Movimentação Financeira:</label>
                        </div>                       
                      </div> 
                    </div>
                <div class="row">
                  <div class="col s12 m12">
                        <div class="input-field mt-19px">    
													<input id="observaca_referencia_bancaria" name="observaca_referencia_bancaria" value="">
													<label for="observaca_referencia_bancaria" class="label">Observação</label>
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
