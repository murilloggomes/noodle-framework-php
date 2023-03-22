<?php
error_reporting(E_ERROR | E_PARSE);

class UsersController extends Controller
{
    /**
     * Process
     */
    public function process()
    {

        // Pega informações do usuário logado
        $AuthUser = $this->getVariable("AuthUser");
		  	$this->setVariable("Usuario", 1);
        //
      
        // Checagem se está logado e se é administrador
        if (!$AuthUser) {
            header("Location: ".APPURL."/login");
            exit;
        }
        
       $Usuarios = Controller::model("Users");
			 
				if(!$AuthUser->isAdmin()){
       $query = " account_type > 2 ";
			 $usuarioPermissao = json_decode($AuthUser->get("p_usuarios"), true);
			 $filialPermissao = json_decode($AuthUser->get("p_filiais"), true);
			 $departamentoPermissao = json_decode($AuthUser->get("p_departamentos"), true);
		
				
			if($usuarioPermissao != null){
			 $usuarioPermissao = "(" . implode(',', $usuarioPermissao) . ")";
			 $query .= " AND ( id IN $usuarioPermissao ) ";
			}
	
			if($filialPermissao != null){
				
			 if($usuarioPermissao != null){
				 $cond = "OR";
			 }	else {
				 $cond = "AND";
			 }
			 $filialPermissao = "(" . implode(',', $filialPermissao) . ")";
			 $query .= " $cond ( office IN $filialPermissao )";
			}			
			
			if($departamentoPermissao != null){
				
			if($filialPermissao != null){
				 $condd = "OR";
			 }	else {
				 $condd = "AND";
			 }	
				
	
			 $departamentoPermissao = "(" . implode(',', $departamentoPermissao) . ")";
			 $query .= " $condd (team IN $departamentoPermissao )";
			}
		
			}else {
				
		 $query = "id <> '' ";
			}

        $Usuarios->where(DB::raw("$query")) 
					       ->orderBy("team","DESC")
                 ->fetchData();
        $this->setVariable("Users", $Usuarios); 
			
				 // Chamada de Funções na página
        if (Input::post("action") == "salvarUsuario") {
					$this->salvarUsuario();
        } else if (Input::post("action") == "remover") {
           $this->remover(); 
        } else if (Input::post("action") == "permissoes") {
           $this->permissoes(); 
        } else if (Input::post("action") == "login") {
            $this->login();
        } else if (Input::post("action") == "modalUsuario") {
            $this->modalUsuario();
        } else if (Input::post("action") == "modalPermissao") {
            $this->modalPermissao();
        } else if ($_POST['action'] == 'otimizar') {				
					$this->otimizar();
			}
  
        if(!$AuthUser->isAdmin()){
					
        $UnidadesNegocios = Controller::model("UnidadesNegocios");
        $UnidadesNegocios->orderBy("id","DESC")
                         ->fetchData();
        $this->setVariable("UnidadesNegocios", $UnidadesNegocios); 
        
        
        $Cargos = Controller::model("Cargos");
        $Cargos->where("id",">","2")
					     ->orderBy("id","DESC")
               ->fetchData();
        $this->setVariable("Cargos", $Cargos);
        
      
        $CentroCusto = Controller::model("CentroCustos");
        $CentroCusto->orderBy("id","DESC")
              ->fetchData();
        $this->setVariable("CentroCusto", $CentroCusto);
				} else if($AuthUser->isAdmin()){
				$UnidadesNegocios = Controller::model("UnidadesNegocios");
        $UnidadesNegocios->orderBy("id","DESC")
                         ->fetchData();
        $this->setVariable("UnidadesNegocios", $UnidadesNegocios); 
        
        
        $Cargos = Controller::model("Cargos");
        $Cargos->where("id",">","1")
					     ->orderBy("id","DESC")
               ->fetchData();
        $this->setVariable("Cargos", $Cargos);
        
      
        $CentroCusto = Controller::model("CentroCustos");
        $CentroCusto->orderBy("id","DESC")
              ->fetchData();
        $this->setVariable("CentroCusto", $CentroCusto);
					
				}else {
			 $UnidadesNegocios = Controller::model("UnidadesNegocios");
        $UnidadesNegocios->orderBy("id","DESC")
                         ->fetchData();
        $this->setVariable("UnidadesNegocios", $UnidadesNegocios); 
        
        
        $Cargos = Controller::model("Cargos");
        $Cargos->orderBy("id","DESC")
              ->fetchData();
        $this->setVariable("Cargos", $Cargos);
        
      
        $CentroCusto = Controller::model("CentroCustos");
        $CentroCusto->orderBy("id","DESC")
              ->fetchData();
        $this->setVariable("CentroCusto", $CentroCusto);
					
					
				}
        acessoPag($_SERVER["REQUEST_URI"],$AuthUser->get("permissoes_paginas"));
        $this->view("users");
    }
  
    
	
    public function consultarCentroCusto($id)
    {        
      $AuthUser = $this->getVariable("AuthUser");
      $Dados = Controller::model("CentroCusto", $id);
      
      $CentroCusto = $Dados->get("nome");
      
      return $CentroCusto;       
    }
   
	
  
    public function consultarUnidadeNegocio($id)
    {        
      $AuthUser = $this->getVariable("AuthUser");
      $Dados = Controller::model("UnidadeNegocio", $id);
      
      $UnidadeNegocio = $Dados->get("nome");
      
      return $UnidadeNegocio;       
    }
  
	
    
    public function consultarCargo($id)
    {        
      $AuthUser = $this->getVariable("AuthUser");
      $Dados = Controller::model("Cargo", $id);
      
      $Cargo = $Dados->get("nome");
      
      return $Cargo;       
    }
  
	
	
    private function salvarUsuario()
    {        
//       // Pega informações do usuário logado
       $AuthUser = $this->getVariable("AuthUser");
			
				$this->resp->result = 0;
			
				$idcrip = Input::post("user");
			  $nome = Input::post("nome");
			  $cpf = Input::post("cpf");
			  $telefone = Input::post("telefone");
			  $unidade = Input::post("unidade");
			  $mail = Input::post("email");
			  $tipo = Input::post("tipo");
			  $cargo = Input::post("cargo");
			  $senha = Input::post("senha");
			  $confirmeSenha = Input::post("confirmacaoSenha");
			  $status = Input::post("status");
			
		  	$cpfNumeros = preg_replace('/[^0-9]/', '', $cpf);
		  	$telefoneNumeros = preg_replace('/[^0-9]/', '', $telefone);
			
       if($cpf == "" || $nome = "" || $telefone == "" || $mail = "" || $unidade == "" || $tipo = "" || $cargo = "" ){
           $this->resp->msg = "Verifique se todos os campos obrigatorios foram preenchidos!";
           $this->resp->result = 2;	
           $this->jsonecho();		

        } else {

            $idcrip = Input::post("user");
            $nome = Input::post("nome");
            $cpf = Input::post("cpf");
            $telefone = Input::post("telefone");
            $unidade = Input::post("unidade");
            $mail = Input::post("email");
            $tipo = Input::post("tipo");
            $cargo = Input::post("cargo");
            $senha = Input::post("senha");
            $confirmeSenha = Input::post("confirmacaoSenha");
            $status = Input::post("status");

            $cpfNumeros = preg_replace('/[^0-9]/', '', $cpf);
            $telefoneNumeros = preg_replace('/[^0-9]/', '', $telefone);	
        }
	
            $tamSenha = strlen($senha);
      
            if ($tamSenha > 0) {
                if ($tamSenha < 6) {
                  $msg = "Senha necessita possuir 6 caracteres";
                  $this->resp->msg = $msg;
                  $this->resp->result = 2;	
                  $this->jsonecho();
                }
                if ($confirmeSenha != $senha) {
                  $msg = "Senhas não conferem";
                  $this->resp->msg = $msg;
                  $this->resp->result = 2;	
                  $this->jsonecho();
                }
            }
			  
				      $idDecrip = decrypt($idcrip);
            try {
                $Usuario = Controller::model("User");	
                $Usuario->select("$idDecrip","id");
                $Usuario->set("firstname", $nome)
                         ->set("cpf/cnpj", $cpfNumeros)
                         ->set("phone", $telefoneNumeros)
                         ->set("email", $mail)
                         ->set("account_type", $cargo)
                         ->set("is_active", $status)
                         ->set("office", $unidade)
                         ->set("team", $tipo)
                         ->set("owner", $AuthUser->get("id"));

                               //Insere senha no banco
              if (mb_strlen($senha) > 0) {
                    $passhash = password_hash($senha, PASSWORD_DEFAULT);
                    $Usuario->set("password", $passhash);
                    $Usuario->set("start_pw", 1);
                }
                $Usuario->save();
                $LogMensagem = "Usuário '" . $nome . "' salvo com sucesso: pelo usuário: " . $AuthUser->get("firstname");   
                logs($AuthUser->get("id"),"success",Input::post("type"),$LogMensagem);

             } catch (Exception $e){
              $LogMensagem = "Erro ao modificar o usuário: " . $nome . " pelo usuário: " . $AuthUser->get("firstname") . " " . $e->getMessage();   
              logs($AuthUser->get("id"),"erro",Input::post("type"),$LogMensagem);  

              $this->resp->result = 2;
              $this->jsonecho();	
              }
              $this->resp->msg = $LogMensagem;
              $this->resp->result = 1;
              $this->jsonecho();	
 
		     	exit;
    }
  
	
	
	
    private function permissoes()
    {        
			$this->resp->result = 0;
			
      // Pega informações do usuário logado
      $AuthUser = $this->getVariable("AuthUser");
			$idcrip = Input::post("user");
		  $idDecrip = decrypt($idcrip);
    		
			
      // Pegar Model da Equipe
      $Usuario = Controller::model("User");
		  $Usuario->select($idDecrip,"id");

		  $usuarios = Input::post("usuarios");	 
		  $filiais = Input::post("filiais");
			$departamentos = Input::post("departamentos");
      $paginas = Input::post("paginas");
			$senha = Input::post("senha");
      
				 
			$encodeFiliais = json_encode($filiais, true);
			$encodeUsuarios = json_encode($usuarios, true);
			$encodeDepartamentos = json_encode($departamentos, true);
      $encodePaginas = json_encode($paginas, true);
			
                if (!password_verify($senha, $AuthUser->get("password"))){
                   $this->resp->result = 2;
				           $this->jsonecho();	 
                }
			
      try {
			
				$Usuario->set("p_filiais",$encodeFiliais)
                ->set("p_usuarios", $encodeUsuarios)
					      ->set("p_departamentos", $encodeDepartamentos)
                ->set("permissoes_paginas", $encodePaginas);
       
									$Usuario->save();  

									$LogMensagem = "Permissão do usuário '" . Input::post("nome-usuario") . "' modificado com sucesso: pelo usuário: " . $AuthUser->get("firstname");   
									logs($AuthUser->get("id"),"success",Input::post("type"),$LogMensagem); 
				 } catch (Exception $e){
									$LogMensagem = "Erro ao modificar Permissão do usuário: " . Input::post("nome-usuario") . " pelo usuário: " . $AuthUser->get("firstname") . " " . $e->getMessage();   
                  logs($AuthUser->get("id"),"erro",Input::post("type"),$LogMensagem);
					}
     
         
        $this->resp->result = 1;
				$this->jsonecho();	
      exit;
    }
  

    private function remover()
    {        
			
			$this->resp->result = 0;
			
      $AuthUser = $this->getVariable("AuthUser");
			$IDUsuario = Input::post("id");
			$motivo = Input::post("motivo");
			$senha = Input::post("senha");
			$idDecrip = decrypt($IDUsuario);
			
			 if (!password_verify($senha, $AuthUser->get("password"))){
				   $LogMensagem = "Senha divergente da cadastrada no banco, corrija e tente novamente!";
				   $this->resp->msg = $LogMensagem ;
					 $this->resp->result = 2;
					 $this->jsonecho();	 
       }
			
			
      $Dados = Controller::model("User", $idDecrip);

      try{
      $Dados->set("is_active", 3)
				    ->set("motivo", $motivo);
      $Dados->save();
      
      $LogMensagem = "[" . $Dados->get("firstname") . "]  excluido com sucesso pelo Usuário: " . $AuthUser->get("firstname");   
      logs($AuthUser->get("id"),"success",Input::post("type"),$LogMensagem);         
      } catch (Exception $e){
      $LogMensagem = "[Erro ao excluir]: " . $Dados->get("firstname") . " pelo [Usuário]: " . $AuthUser->get("firstname") . " " . $e->getMessage();   
      logs($AuthUser->get("id"),"erro",Input::post("type"),$LogMensagem);
      }      
     
			  $this->resp->msg = $LogMensagem ;
			  $this->resp->result = 1;
				$this->jsonecho();	
			
    }

    private function login()
    {   
				$this->resp->result = 0;
			
				$SessaoAntiga = Input::post("sessaoAntiga");
				$IDUsuario = Input::post("id");
			  $idDecrip = decrypt($IDUsuario);
			
				$Usuario = Controller::model("User", $idDecrip);		
			
				setcookie("nplhA", "52.8f0dd87bf1e97d8afe7f97f4f89a38a3", time()+36000);
			
				setcookie("nplh", $Usuario->get("id").".".md5($Usuario->get("password")), time()+36000);
				
				$this->resp->result = 1;
			
				$this->jsonecho();			
			exit;
        
    }
	
		    private function modalPermissao()
    {   
				$this->resp->result = 0;
			  $AuthUser = $this->getVariable("AuthUser");
				$idcrip = Input::post("id");
				$idDecrip = decrypt($idcrip);
 				$Usuario = Controller::model("User");	
				$Usuario->select($idDecrip,"id");
					
					
			if($AuthUser->isDesenvolvedor()){
				$Usuarios = Controller::model("Users");	
				$Usuarios->where(DB::raw("id <> ''"))
						      ->fetchData();
					
				$Departamentos = Controller::model("Cargos");	
				$Departamentos->where(DB::raw("id <> ''"))
						      ->fetchData();
				
			}else if($AuthUser->isAdmin()){
					
				$Usuarios = Controller::model("Users");	
				$Usuarios->where(DB::raw("account_type <> '1'"))
						     ->fetchData();
					
				$Departamentos = Controller::model("Cargos");	
				$Departamentos->where(DB::raw("id <> '1'"))
						      ->fetchData();
        
        $Paginas = Controller::model("Paginas");	
				$Paginas->where(DB::raw("status = '1'"))
						    ->fetchData();
        
				}else if(!$AuthUser->isAdmin()){
      	$Usuarios = Controller::model("Users");	
				$Usuarios->where(DB::raw("account_type > '2'"))
						     ->fetchData();
					
				$Departamentos = Controller::model("Cargos");	
				$Departamentos->where(DB::raw("id > '2'"))
						      ->fetchData();
					
					
				}
				$Filiais = Controller::model("UnidadesNegocios");	
				$Filiais->where(DB::raw("id <> ''"))
						      ->fetchData();
					
					
					
					
					
					
	
					
					
		$arrayDecodePermissaoUsuario = json_decode($Usuario->get("p_usuarios"),true);
		foreach($Usuarios->getDataAs("User") as $u){
					$id = $u->get("id");
			    if($arrayDecodePermissaoUsuario != null){
					 if (in_array($id, $arrayDecodePermissaoUsuario)) { 
            	$tipo = "true";
					 }	else {
              $tipo = "false";
					 }
					} else {
						$tipo = "false";
					}
			
					$arrayUsuarios[] = array(
					"id" => $u->get("id"),
					"nome" => $u->get("firstname"),
					"selecionado" => $tipo,
					);
				}	
			
			  $arrayDecodePermissaoFiliais = json_decode($Usuario->get("p_filiais"),true);
			  foreach($Filiais->getDataAs("UnidadeNegocio") as $un){
					$id_Unidade = $un->get("id");
			    if($arrayDecodePermissaoFiliais != null){
					 if (in_array($id_Unidade, $arrayDecodePermissaoFiliais)) { 
            	$tipoUnidade = "true";
					 }	else {
              $tipoUnidade = "false";
					 }
					} else {
						$tipoUnidade = "false";
					}
			
					$arrayUnidade[] = array(
					"id" => $un->get("id"),
					"nome" => $un->get("nome"),
					"selecionado" => $tipoUnidade,
					);
					
				}
					
					
			  $arrayDecodePermissaoDepartamentos = json_decode($Usuario->get("p_departamentos"),true);
				foreach($Departamentos->getDataAs("Cargo") as $ca){
					$id_cargo = $ca->get("id");
			    if($arrayDecodePermissaoDepartamentos != null){
					 if (in_array($id_cargo, $arrayDecodePermissaoDepartamentos)) { 
            	$tipoCargo = "true";
					 }	else {
              $tipoCargo = "false";
					 }
					} else {
						$tipoCargo = "false";
					}
			
					$arrayCargo[] = array(
					"id" => $ca->get("id"),
					"nome" => $ca->get("nome"),
					"selecionado" => $tipoCargo,
					);
					
				}
        
    $arrayDecodePermissaoPaginas = json_decode($Usuario->get("permissoes_paginas"),true);
		foreach($Paginas->getDataAs("Pagina") as $pag){
					$id = $pag->get("id");
			    if($arrayDecodePermissaoPaginas != null){
					 if (in_array($id, $arrayDecodePermissaoPaginas)) { 
            	$tipo = "true";
					 }	else {
              $tipo = "false";
					 }
					} else {
						$tipo = "false";
					}
			
					$arrayPaginas[] = array(
					"id" => $pag->get("id"),
					"nome" => $pag->get("nome"),
					"selecionado" => $tipo,
					);
				}	    
          
					
					
				
			  $this->resp->id = $idcrip;
			  $this->resp->arrayUsuarios = $arrayUsuarios;
				$this->resp->departamentos = $arrayCargo;
				$this->resp->filiais = $arrayUnidade;
        $this->resp->paginas = $arrayPaginas;
			
			
				$this->resp->result = 1;
			
				$this->jsonecho();			
			exit;
        
    }
	
	
	
	    private function modalUsuario()
    {   
				$this->resp->result = 0;
			
				$idcrip = Input::post("id");
				$idDecrip = decrypt($idcrip);
				
 				$Usuario = Controller::model("User");	
				$Usuario->select($idDecrip,"id");
				
			  $this->resp->id = $idcrip;
				$this->resp->nome = $Usuario->get("firstname");
				$this->resp->cpf = $Usuario->get("cpf/cnpj");
				$this->resp->telefone = $Usuario->get("phone");
				$this->resp->email = $Usuario->get("email");
				$this->resp->unidade = $Usuario->get("office");
				$this->resp->tipo = $Usuario->get("team");
				$this->resp->cargo = $Usuario->get("account_type");
				$this->resp->status = $Usuario->get("is_active");
			
				$this->resp->result = 1;
			
				$this->jsonecho();			
			exit;
        
    }
	
	
	    private function otimizar()
    {			
			
			header('Content-Type: application/json; charset=utf-8');			
	   $AuthUser = $this->getVariable("AuthUser");
			
		  $dados_requisicao = $_REQUEST;
			$colunas = [
			0 => 'id',
			1 => 'id',
			2 => 'id',
			3 => 'id',
			4 => 'id',
			5 => 'id',
			];
			
			$Linhas = (int)$_POST['length'];
			$Start = (int)$_POST['start'];
			$Pagina = ($Start / $Linhas) + 1;
			$colun = "date";
			$colun = $colunas[$dados_requisicao['order'][0]['column']];
			$ordenacao = "DESC";
			$ordenacao = $dados_requisicao['order'][0]['dir'];
			$Search = $_POST['search'];
			$Search = $Search['value'];
			if($Search == ""){
				$Search = "";
			}	
			
     
			

			
			
			if(!$AuthUser->isAdmin()){
       $query = " account_type > 2 ";
			 $usuarioPermissao = json_decode($AuthUser->get("p_usuarios"), true);
			 $filialPermissao = json_decode($AuthUser->get("p_filiais"), true);
			 $departamentoPermissao = json_decode($AuthUser->get("p_departamentos"), true);
		
				
			if($usuarioPermissao != null){
			 $usuarioPermissao = "(" . implode(',', $usuarioPermissao) . ")";
			 $query .= " AND ( id IN $usuarioPermissao ) ";
			}
	
			if($filialPermissao != null){
				
			 if($usuarioPermissao != null){
				 $cond = "OR";
			 }	else {
				 $cond = "AND";
			 }
			 $filialPermissao = "(" . implode(',', $filialPermissao) . ")";
			 $query .= " $cond ( office IN $filialPermissao )";
			}			
			
			if($departamentoPermissao != null){
				
			if($filialPermissao != null){
				 $condd = "OR";
			 }	else {
				 $condd = "AND";
			 }	
				
	
			 $departamentoPermissao = "(" . implode(',', $departamentoPermissao) . ")";
			 $query .= " $condd (team IN $departamentoPermissao )";
			}
				
						 
				
			}else {
				
		 $query = "id <> '' ";
			}
			 $Cotacoes = Controller::model("Users");			
						 $Cotacoes->search($Search)
						 ->where(DB::raw("$query"))
						 ->where(DB::raw(" is_active <> '3'"))
						 ->setPageSize($Linhas)
						 ->setPage($Pagina)
						 ->orderBy($colun,$ordenacao)
						 ->fetchData();
						 $QntCotacoes = $Cotacoes->getTotalCount();	
			
			
			
			
			
			
			
		
			$url = APPURL . "/order";
			foreach($Cotacoes->getDataAs('User') as $c) {	
				$id = $c->get("id");
				$nomeUsuario = $c->get("firstname");
				$filial =  $this->consultarUnidadeNegocio($c->get("office")); 								
				$cargo = $this->consultarCargo($c->get("account_type"));
				

				
						 switch ($c->get("is_active")){
					 case 0:
							 $status = "<span class='badge badge-danger-lighten'><span class='red-text'>Desativado</span></span>";
							 break;
					 case 1:
							 $status = "<span class='badge badge-success-lighten'><span class='green-text'>Ativo</span></span>";
							 break;
					 
}
				
	$idCRIPTOGRAFADO = '"' . encrypt($c->get("id")) . '"';

 				$Acoes = "
				 <a href='javascript:void(0)' onclick='loginUsuario($idCRIPTOGRAFADO)'  class='tooltipped' data-type='User' data-position='top' data-tooltip='Logar'><i class='fa fa-arrow-circle-right' aria-hidden='true'></i></a>
				<button onclick='modalUsuario($idCRIPTOGRAFADO)'  style='background: transparent; border: none;' type='button' data-bs-toggle='modal' data-bs-target='#UserEdit'>		<i class='fa fa-pencil' aria-hidden='true'></i>	</button>
 			 	<button onclick='modalPermissao($idCRIPTOGRAFADO)' style='background: transparent; border: none;' type='button' data-bs-toggle='modal' data-bs-target='#Permissoes'>		<i class='fa fa-key' aria-hidden='true'></i>	</button>
				<a href='javascript:void(0)' onclick='remov($idCRIPTOGRAFADO)'  class='tooltipped' data-type='User' data-position='top' data-tooltip='Remover'><i class='fa fa-times' aria-hidden='true'></i></a>

				";
				
// 				$encoding = 'UTF-8';
				$colm[] = [
					"U-".rand( 10,99).$id.rand( 10,99),
					$nomeUsuario,
					$filial,
					$cargo,
					$status,
					$Acoes,
				
				];
			
			};
			if(!isset($colm)){
						$colm[] = [
					"",
					"",
					"",
					"",
					"",
					"",
				
				];
			}
			$columns = [				
  			"recordsTotal" => $QntCotacoes,
 				"recordsFiltered" => $QntCotacoes,
  			"data" => $colm
			];
			
			echo json_encode($columns);
			exit;
    }
	


}