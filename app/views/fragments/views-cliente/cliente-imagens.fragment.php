<!-- tabs content -->
        <div id="cliente-imagens" class="divAba" hidden>				

          <div class="card-panel">
            <form class="formValidate" 
                  action="<?= APPURL."/clientes/".($Cliente->isAvailable() ? "edit/" . $Cliente->get("id") : "new") ?>"
                  enctype="multipart/form-data"  method="POST">

           <input name="action" value="salvarImagem" type="hidden">

            <blockquote>
              <h6>Upload de Imagem</h6>
            </blockquote>
               <div class="row">
                  <div class="col s12 m6">
                    <div class="input-field mt-19px">    
                      <label class="label">Anexar Imagem: </label>
                      <input style="margin-top:28px;" name="clienteImagem" class="form-control" type="file" id="formFileMultiple" multiple />
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
                <h6>Galeria</h6>
                </blockquote>
                   <div class="divider" style="margin-bottom:15px;"></div>
                    <div class="col s12 m12">
                        <div class="card-content">
                            <?php $path = ROOTPATH . "/assets/uploads/" . $Cliente->get("id") . "/cliente-imagem/" ?>
                            <?php if(is_dir($path)):?>
                              <div class="popup-gallery">
                                <div class="gallery-sizer"></div>
                              <?php $files = scandir($path); ?>
                                <?php foreach ($files as $f): ?>
                                    <?php if($f == '.' or $f == '..'): ?>
                                    <div style="display:none;"></div>
                                    <?php else: ?>
                                      <div class="col s-12 m-6 l-4 center" style="width:min-content;">
                                         <div class="card-content-2">
                                          <a href="<?= APPURL . "/assets/uploads/" .$Cliente->get("id") . "/cliente-imagem/" .$f  ?>">
                                          <img  width="225px;" height="150px;" style="object-fit: scale-down;" src="<?= APPURL . "/assets/uploads/" .$Cliente->get("id") . "/cliente-imagem/" .$f  ?>" >
                                          </a>   
                                         </div>
                                         <h6><?= $f ?></h6>
                                      </div>
                                    <?php endif; ?>
                                <?php endforeach ?>
                              </div>
                              <?php else:?>
                                <div class="galeria">
                                  <span>Não existe imagens na galeria</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
              </div>
            </div>