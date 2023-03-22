
	<div class="modal fade userGeral" id="Permissoes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<form class="formValidate" id="form" action="<?= APPURL . "/users/"  ?>" method="POST">
					<input type="hidden" id="user" >
					<div class="modal-dialog modal-xl modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Permissões do usuário: <strong style="font-weight: bold">   </strong></h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<input name="action" value="permissoes" type="hidden">
								
								<input type="password" style="display:none">
								<blockquote>
									<h6>Edição de Usuário</h6>
				
								</blockquote>
								<input type="hidden" name="pw" value="0">

	
						<div class="modalP">
							  <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
										<label class="label active">Usuários permitidos:</label>
			  	          <select id="permissaoUsuario" style="width:100%" required  name="usuariosPermissoes[]" class="select2 form-control" multiple> </select>
								</div>
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
										<label class="label active">Páginas permitidas:</label>
			  	          <select id="paginasPermitidas" style="width:100%" required  name="paginasPermitidas[]" class="select2 form-control" multiple> </select>
								</div>
								<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
							  <label class="label active">Filial permitidos :</label>
			  	        <select id="permissaoFiliais" style="width:100%" required  name="filiaisPermissoes[]" class="select2 form-control" multiple></select>
								</div>
								<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
							    <label class="label active">Departamentos Permitidos:</label>
			  	        <select id="permissaoCargo" style="width:100%" required  name="departamentosPermitidos[]" class="select2 form-control" multiple> </select>
								</div>
							<div class="col col-sm-12 col-md-12 col-lg-12 mb-3">
							  <label class="label active">Sua Senha:</label>
			  	<input type="password" id="senhaA" style="width:100%" required  name="senhaA" class=" form-control" >  
							
								                     <a href="javascript:void(0)">                                   
                                       <svg style="bottom: 119px;
    right: 20px;
    padding: 1px;
    width: 25px;
    height: 20px;
    color: #fff;
    border-radius: 50px;
    cursor: pointer;
    position: absolute;
    filter: opacity(0.5);" data-value="text" class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium css-vubbuv hidePass textPass" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="EyeOutlineIcon"><path d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z"></path></svg> 
                                        <svg style="bottom: 119px;
    right: 20px;
    padding: 1px;
    width: 25px;
    height: 20px;
    color: #fff;
    border-radius: 50px;
    cursor: pointer;
    position: absolute;
    filter: opacity(0.5);" data-value="pass" class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium css-vubbuv hidePass codePass" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="EyeOffOutlineIcon"><path d="M2,5.27L3.28,4L20,20.72L18.73,22L15.65,18.92C14.5,19.3 13.28,19.5 12,19.5C7,19.5 2.73,16.39 1,12C1.69,10.24 2.79,8.69 4.19,7.46L2,5.27M12,9A3,3 0 0,1 15,12C15,12.35 14.94,12.69 14.83,13L11,9.17C11.31,9.06 11.65,9 12,9M12,4.5C17,4.5 21.27,7.61 23,12C22.18,14.08 20.79,15.88 19,17.19L17.58,15.76C18.94,14.82 20.06,13.54 20.82,12C19.17,8.64 15.76,6.5 12,6.5C10.91,6.5 9.84,6.68 8.84,7L7.3,5.47C8.74,4.85 10.33,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C12.69,17.5 13.37,17.43 14,17.29L11.72,15C10.29,14.85 9.15,13.71 9,12.28L5.6,8.87C4.61,9.72 3.78,10.78 3.18,12Z"></path></svg>
                                      </a> 
										</div>
						
								</div>
							<div class="modal-footer">
								<button id="fecharModalPermissao" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
								<button id="salvarPermissoes" type="submit" class="btn btn-primary submitPermissao">Salvar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
	