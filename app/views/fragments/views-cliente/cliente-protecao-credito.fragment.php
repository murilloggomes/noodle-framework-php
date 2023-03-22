<!-- tabs content -->
          <div id="protecao-credito" class="divAba" hidden>				
						
            <div class="card-panel">
							<form class="formValidate" 
                    action="<?= APPURL."/clientes/".($Cliente->isAvailable() ? "edit/" . $Cliente->get("id") : "new") ?>"
                    enctype="multipart/form-data" method="POST">
								
             <input name="action" value="salvarProtecaoCredito" type="hidden">
             <input name="idProtecaoCredito" value="<?= $ClienteProtecaoCredito->get("id") ?>" type="hidden">	
             
              <blockquote>
                <h6>Cadastro </h6>
              </blockquote>
                    <div class="row">
                      <div class="col s12 m6">
                        <div class="input-field mt-19px">    
													<label for="caminho_relatorio" class="label">Anexar Relatório: </label>
                        <input style="margin-top:28px;" name="arquivoRelatorio" class="form-control" type="file" id="formFileMultiple" multiple />
                        </div>                       
                      </div>
                      <div class="col s12 m3">
                        <div class="input-field mt-19px">      
													<input name="classificacao_serasa" value="<?= $ClienteProtecaoCredito->get("classificacao_serasa") ?>">
													<label for="classificacao_serasa" class="label">Classificação Serasa</label>
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
              <div class="card-panel display-grid">
                <blockquote>
                <h6>Meus arquivos enviados</h6>
                </blockquote>
                   <div class="divider" style="margin-bottom:15px;"></div>
                    <div class="col s12 m12">
                        <div class="card-content">
                            <?php $path = ROOTPATH . "/assets/uploads/" . $Cliente->get("id") . "/protecao-credito/" ?>
                            <?php if(is_dir($path)):?>
                              <?php $files = scandir($path); ?>
                              <div class="galeria">
                              <?php foreach ($files as $f): ?>
                                  <?php if($f == '.' or $f == '..'): ?>
                                  <div style="display:none;"></div>
                                  <?php else: ?>
                                    <div class="col s-12 m-6 l-4 center" style="width:min-content;">
                                       <div class="card-content-2">
                                        <embed  width="225px;" height="150px;" style="display:inline-block;object-fit:scale-down;" class="materialboxed" src="<?= APPURL . "/assets/uploads/" .$Cliente->get("id") . "/protecao-credito/" .$f  ?>" >
                                       </div>
                                       <h6><?= $f ?></h6>
                                    </div>
                                  <?php endif; ?>
                              <?php endforeach ?>
                              </div>
                              <?php else:?>
                                <div class="galeria">
                                  <span>Não existe arquivos enviados</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
              </div>
            </div>

            <!-- tabs content -->