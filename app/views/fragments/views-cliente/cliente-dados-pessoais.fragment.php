<!-- tabs content -->
          <div id="dados-pessoais" class="divAba" hidden>				
						
            <div class="card-panel">
							<form class="formValidate" 
                    action="<?= APPURL."/clientes/edit/".($Cliente->isAvailable() ? $Cliente->get("id") : "new") ?>"
                    method="POST">
								
             <input name="action" value="salvarDadoPessoal" type="hidden">
								
              <blockquote>
                <h6>Cadastro dos Dados Pessoais do Cliente</h6>
              </blockquote>
                
                    <div class="row">
                      
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">    
													<input name="rg_cliente" onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);" value="<?= $ClienteDadoPessoal->get("rg_cliente") ?>">
													<label class="active" for="rg_cliente">RG Do Cliente</label>
                        </div>                       
                      </div>

                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input name="orgao_expedidor_rg"  value="<?= $ClienteDadoPessoal->get("orgao_expedidor_rg") ?>">
													<label class="active" for="orgao_expedidor_rg">Orgão Expedidor do RG</label>
                        </div>                       
                      </div>

                      <div class="col s12 m3">
                        <div class="input-field">
                          <select name="estado_expedidor_rg" class="select2 browser-default">
														<option value="" selected disabled hidden>Estado</option> 
														<?php foreach($Estados as $uf => $nome): ?>
														<option <?= $uf == $ClienteDadoPessoal->get("estado_expedidor_rg") ? "selected": "" ?> value="<?= $uf ?>"><?= $nome ?></option>
														<?php endforeach;?>
													</select>	
													<label for="estado_expedidor_rg" class="active">Orgão Expedidor do RG</label>
                        </div>
                      </div>
                      
                       <div class="col s12 m3 l-last">
                       <div class="input-field mt-19px">
                        <input name="data_emissao_rg" type="date" value="<?= $ClienteDadoPessoal->get("data_emissao_rg") ?>">
												<label for="data_emissao_rg">Data Emissão do RG</label>
                       </div>      
                      </div>    

                    </div>
								
										<div class="row">
                      
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">    
													<input name="data_nascimento_cliente" type="date" value="<?= $ClienteDadoPessoal->get("data_nascimento_cliente") ?>">
													<label for="data_nascimento_cliente">Data de Nascimento</label>
                        </div>                       
                      </div>

                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input name="nacionalidade_cliente" value="<?= $ClienteDadoPessoal->get("nacionalidade_cliente") ?>">
													<label class="active" for="nacionalidade_cliente">Nacionalidade</label>
                        </div>                       
                      </div>

                      <div class="col s12 m3">
                        <div class="input-field mt-19px">
                  				<input name="nome_pai_cliente" value="<?= $ClienteDadoPessoal->get("nome_pai_cliente") ?>">
													<label class="active" for="nome_pai_cliente">Nome do Pai do Cliente</label>
                        </div>
                      </div>
                      
                       <div class="col s12 m3 l-last">
                       <div class="input-field mt-19px">
                        <input name="nome_mae_cliente" value="<?= $ClienteDadoPessoal->get("nome_mae_cliente") ?>">
												<label class="active" for="nome_mae_cliente">Nome Mãe do Cliente</label>
                       </div>      
                      </div>    
                    </div>
								
										<div class="row">                      
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">  
													<label>
													<input name="casado" class="casado" type="checkbox" <?= $ClienteDadoPessoal->get("casado") == 1 ? "checked" : ""  ?>>
													<span>Cliente é Casado</span>
													</label>
                        </div>                       
                      </div>
											<div class="col s12 m6 camposConjuge" <?= $ClienteDadoPessoal->get("casado") == 1 ? "" : "hidden" ?>>
                        <div class="input-field mt-19px"> 
													<input name="nome_conjuge_cliente"  value="<?= $ClienteDadoPessoal->get("nome_conjuge_cliente") ?>">	
													<label class="active" for="nome_conjuge_cliente">Nome do Conjuge</label>
                        </div>                       
                      </div>
											<div class="col s12 m3 m-last camposConjuge" <?= $ClienteDadoPessoal->get("casado") == 1 ? "" : "hidden" ?>>
                        <div class="input-field mt-19px">    
													<input name="cpf_conjuge_cliente" onkeypress="onlynumberrealy();" onblur="javascript: formatField(this);" onfocus="javascript: cleanFormat(this);" value="<?= $ClienteDadoPessoal->get("cpf_conjuge_cliente") ?>">
													<label class="active" for="cpf_conjuge_cliente">CPF do Conjuge</label>
                        </div>                       
                      </div>
                    </div>
									
										<div class="row camposConjuge" <?= $ClienteDadoPessoal->get("casado") == 1 ? "" : "hidden" ?>>                      
                      											
											<div class="col s12 m2">
                        <div class="input-field mt-19px">    
													<input name="rg_conjuge_cliente"  value="<?= $ClienteDadoPessoal->get("rg_conjuge_cliente") ?>">
													<label class="active" for="rg_conjuge_cliente">RG do Conjuge</label>
                        </div>                       
                      </div>
											<div class="col s12 m3">
                        <div class="input-field mt-19px">    
													<input name="orgao_expedidor_conjuge_rg"  value="<?= $ClienteDadoPessoal->get("orgao_expedidor_conjuge_rg") ?>">
													<label class="active" for="orgao_expedidor_conjuge_rg">Orgão Exp. do RG</label>
                        </div>                       
                      </div>
											<div class="col s12 m3">
                        <div class="input-field">    
													<select name="estado_expedidor_conjuge_rg" class="select2 browser-default">
														<option value="" selected disabled hidden>Estado</option> 
														<?php foreach($Estados as $uf => $nome): ?>
														<option <?= $uf == $ClienteDadoPessoal->get("estado_expedidor_conjuge_rg") ? "selected": "" ?> value="<?= $uf ?>"><?= $nome ?></option>
														<?php endforeach;?>
													</select>	
													<label for="estado_expedidor_conjuge_rg" class="active">Estado Exp. do RG</label>
                        </div>                       
                      </div>
											<div class="col s12 m4 m-last">
                        <div class="input-field mt-19px">    
													<input name="nome_mae_conjuge_cliente" value="<?= $ClienteDadoPessoal->get("nome_mae_conjuge_cliente") ?>">
													<label class="active" for="nome_mae_conjuge_cliente">Nome Mãe do Conjuge</label>
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