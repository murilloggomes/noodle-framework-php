<?php

class ProdutosController extends Controller
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
        if (Input::post("action") == "salvarProdutos") {
		      $this->salvarProdutos();
        } else if (Input::post("action") == "deletar") {
          $this->deletar(); 
        } else if (Input::post("action") == "dadosTabelaProdutos") {
          $this->dadosTabelaProdutos();
        } else if (Input::post("action") == "modalProdutos") {
          $this->modalProdutos();
        }   

        $Categorias = Controller::model("Categorias");
        $Categorias->fetchData();
        $this->setVariable("Categorias", $Categorias);
        $this->view("produtos");
    }
   
    public function dadosTabelaProdutos()
    {
      header('Content-Type: application/json; charset=utf-8');
      $Produtos = Controller::model("Produtos");
      $Produtos->fetchData("id","nome","sku","preco","quantidade");
      $Quantidade = $Produtos->getTotalCount();

      foreach($Produtos->getDataAs("Produto") as $p){
        $botaoEditar = '<button style="line-height:0.5;margin-right:10px" type="button" class="btn btn-primary botaoModalProdutos" data-bs-toggle="modal" data-bs-target="#modalProdutos" data-value="'.$p->get("id").'">Editar</button><button style="line-height:0.5" type="button" class="btn btn-primary deletar"  data-id="Produto" data-value="'.$p->get("id").'">Deletar</button>';
        $jsonProduto[] = [
          $p->get("id"),
          $p->get("nome"),
          $p->get("sku"),
          $p->get("preco"),
          $p->get("quantidade"),
          $botaoEditar
        ];
      };
          
     $columns = [	
      "draw" => 1,
      "recordsTotal" => $Quantidade,
      "recordsFiltered" => $Quantidade,
      "data" => $jsonProduto
    ];
    
   echo json_encode($columns);
   exit;
      
  }

  public function modalProdutos()
    {    
      $Produtos = Controller::model("Produto", Input::post("id"));
      
      $this->resp->result = 1;	
      $this->resp->id = $Produtos->get("id");
      $this->resp->nome = $Produtos->get("nome");
      $this->resp->sku = $Produtos->get("sku");
      $this->resp->qnt = $Produtos->get("quantidade");
      $this->resp->preco = $Produtos->get("preco");
      $arrayCategoria = json_decode($Produtos->get("categoria"));
      foreach($arrayCategoria as $ar){
        $Categoria = Controller::model("Categoria", $ar);
        $arrayCa[] = [
          "id" => $ar,
          "text" => $Categoria->get("nome")
        ];
      }
      $this->resp->categoria = $arrayCa;
      $this->jsonecho();
  }

  public function salvarProdutos()
  {
    // Pega informações do usuário logado
    $AuthUser = $this->getVariable("AuthUser");

    $NomeProduto = Input::post('nomeProduto');
    $Produto = Controller::model("Produto", Input::post("idProduto"));
    $Categorias = Input::post("categoriasProduto");

    foreach($Categorias as $c){
      $arrayCategoria[] = [
        $c
      ];
    }
    $arrayCategoria = json_encode($arrayCategoria);
    $Produto->set("nome", $NomeProduto)
              ->set("sky", Input::post("skuProduto"))
              ->set("quantidade", Input::post("qntProduto"))
              ->set("preco", Input::post("precoProduto"))
              ->set("categoria", $arrayCategoria);

    try{
      $Produto->save();
      logs($AuthUser->get("id"),"success","Categoria","O usuário registrou com sucesso o produto $NomeProduto"); 
    } catch (\Exception $e) {
      logs($AuthUser->get("id"),"error","Categoria","Ocorreu um erro ao registrar o produto $NomeProduto: [ERROR] $e"); 
    }
    $this->jsToast("Hellow");

    
  }

  public function deletar()
  {
    // Pega informações do usuário logado
    $AuthUser = $this->getVariable("AuthUser");
    $idProduto = Input::post("dado");
    $Tabela = Input::post("tabela");
    $Categoria = Controller::model(Input::post("tabela"), $idProduto);

    try{
      $Categoria->delete();
      logs($AuthUser->get("id"),"success","Categoria","O usuário deletou com sucesso o produto $idProduto"); 
    } catch (\Exception $e) {
      logs($AuthUser->get("id"),"error","Categoria","Ocorreu um erro ao deletar o produto $idProduto: [ERROR] $e"); 
    }

    $this->resp->result = 1;	
    $this->jsonecho();
    
  }
  

}