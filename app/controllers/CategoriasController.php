<?php

class CategoriasController extends Controller
{
    
    /**
     * Summary of process
     * @return void
     */
    public function process()
    {

        // Pega informações do usuário logado
        $AuthUser = $this->getVariable("AuthUser");
		
        // Checagem se está logado e se é administrador
        if (!$AuthUser) {
            header("Location: ".APPURL."/login");
            exit;
        }
			
		// Chamada de Funções na página
        if (Input::post("action") == "salvarCategorias") {
		      $this->salvarCategorias();
        } else if (Input::post("action") == "deletar") {
          $this->deletar(); 
        } else if (Input::post("action") == "dadosTabelaCategoria") {
          $this->dadosTabelaCategoria();
        } else if (Input::post("action") == "modalCategorias") {
          $this->modalCategorias();
        }   
		
        $this->view("categorias");
    }
   
    public function dadosTabelaCategoria()
    {
      header('Content-Type: application/json; charset=utf-8');
      $Categorias = Controller::model("Categorias");
      $Categorias->fetchData("id","nome");
      $Quantidade = $Categorias->getTotalCount();

      foreach($Categorias->getDataAs("Categoria") as $c){
        $botaoEditar = '<button style="line-height:0.5;margin-right:10px" type="button" class="btn btn-primary botaoModalCategorias" data-bs-toggle="modal" data-bs-target="#modalCategorias" data-value="'.$c->get("id").'">Editar</button><button style="line-height:0.5" type="button" class="btn btn-primary deletar"  data-id="Categoria" data-value="'.$c->get("id").'">Deletar</button>';
        $jsonCategoria[] = [
          $c->get("id"),
          $c->get("nome"),        
          $botaoEditar
        ];
      }
          
     $columns = [	
      "draw" => 1,
      "recordsTotal" => $Quantidade,
       "recordsFiltered" => $Quantidade,
      "data" => $jsonCategoria
    ];
    
   echo json_encode($columns);
   exit;
      
  }

  public function modalCategorias()
    {     
      $Categorias = Controller::model("Categoria", Input::post("id"));
      
      $this->resp->result = 1;	
      $this->resp->id = $Categorias->get("id");
      $this->resp->nome = $Categorias->get("nome");
      $this->jsonecho();

      
  }

  public function salvarCategorias()
  {
    // Pega informações do usuário logado
    $AuthUser = $this->getVariable("AuthUser");

    $NomeCategoria = Input::post('nomeCategoria');
    $Categoria = Controller::model("Categoria", Input::post("idCategoria"));

    $Categoria->set("nome", Input::post("nomeCategoria"));

    try{
      $Categoria->save();
      logs($AuthUser->get("id"),"success","Categoria","O usuário registrou com sucesso a categoria $NomeCategoria"); 
    } catch (\Exception $e) {
      logs($AuthUser->get("id"),"error","Categoria","Ocorreu um erro ao registrar a categoria $NomeCategoria: [ERROR] $e"); 
    }

    header("Location: ".APPURL."/categorias");
    exit;
    
  }

  public function deletar()
  {
    // Pega informações do usuário logado
    $AuthUser = $this->getVariable("AuthUser");
    $idCategoria = Input::post("dado");
    $Tabela = Input::post("tabela");
    $Categoria = Controller::model(Input::post("tabela"), $idCategoria);

    try{
      $Categoria->delete();
      logs($AuthUser->get("id"),"success","Categoria","O usuário deletou com sucesso a categoria $idCategoria"); 
    } catch (\Exception $e) {
      logs($AuthUser->get("id"),"error","Categoria","Ocorreu um erro ao deletar a categoria $idCategoria: [ERROR] $e"); 
    }

    $this->resp->result = 1;	
    $this->jsonecho();
    
  }
  

}