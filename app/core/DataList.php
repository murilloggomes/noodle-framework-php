<?php
/**
 * Lista de dados
 *
 * 
 */
class DataList
{
    protected $data;
    protected $data_as_model = null;
    protected $page_size = null;
    protected $page = null;
    protected $page_count = null;
    protected $total_count = 0;
    protected $query = null;
    protected $search_query = null;
    protected $search_performed = false;

    /**
     * Initialize
     */
    public function __construct()
    {
    }


    /**
     * Pegar Contagem da Pagína
     * @return int 
     */
    public function getPageCount()
    {
        return $this->page_count;
    }


    /**
     * Setar Contagem da Pagína
     * @param int|null $count
     */
    protected function setPageCount($count)
    {
        $this->page_count = $count;
        return $this;
    }


    /**
     * Obter contagem total de resultados
     * @return [tipo] [descrição]
     */
    public function getTotalCount()
    {
        return $this->total_count;
    }


    protected function setTotalCount($count)
    {
        $this->total_count = (int)$count > 0 ? (int)$count : 0;
        return $this;
    }


    /**
     * Definir página atual
     * @param int $page Numéro da Página
     */
    public function setPage($page)
    {
        $this->page = (int)$page > 0 ? (int)$page : 1;
        return $this;
    }


    /**
     * Pegar página atual
     * @return int 
     */
    public function getPage()
    {
        return $this->page;
    }


    /**
     * Seta tamanho de página
     * @param integer $page_size 
     */
    public function setPageSize($page_size = 20)
    {
        if (is_null($page_size) || (is_int($page_size) && $page_size > 0)) {
            $this->page_size = $page_size;
        }

        return $this;
    }

    /**
     * Buscar tamanho de página
     * @return int|null 
     */
    public function getPageSize()
    {
        return $this->page_size;
    }


    /**
     * Buscar query
     */
    public function getQuery()
    {
        return $this->query;
    }


    /**
     * Seta query
     */
    protected function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }



    /**
     * Paginação 
     * @return self
     */
    public function paginate()
    {
        $this->setTotalCount($this->getQuery()->count());
        
        if ($this->getPageSize() > 0) {
            $this->setPageCount(ceil($this->getTotalCount() / $this->getPageSize()));

            if ($this->getPage() > $this->getPageCount()) {
                $this->setPage($this->getPageCount());
            }

            if ($this->getPage() < 1) {
                $this->setPage(1);
            }

            $this->getQuery()
                ->limit($this->getPageSize())
                ->offset(($this->getPage() - 1) * $this->getPageSize());
        } else {
            $this->setPage(0);
            $this->setPageCount(0);
        }

        return $this;
    }


    /**
     * Realizar uma pesquisa
     * @param [string] $q consulta de pesquisa
     * @return self 
     */
    public function search($search_query)
    {
        $search_query = trim((string)$search_query);
        if ($search_query) {
            $this->setSearchQuery($search_query);   
            $this->searchPerformed(true);
        }


        return $this;
    }


    /**
     * Definir cadeia de caracteres de consulta de pesquisa (depois de processá-la no método self::search())
     * A validação da consulta é de responsabilidade do método self::serch()
     * @param [tipo] $q [descrição]
     */
    protected function setSearchQuery($search_query) 
    {
        $this->search_query = $search_query;
    }


    /**
     * Obter sequência de consulta de pesquisa processada
     * @return string|null 
     */
    public function getSearchQuery()
    {
        return $this->search_query;
    }


    /**
     * Definir o status da propriedade search_performed
     * @param  boolean $status 
     * @return self          
     */
    public function searchPerformed($status = true)
    {
        $this->search_performed = (bool)$status;
        return $this;
    }


    /**
     * Obter o status de serch_performed
     * @return boolean 
     */
    public function isSearchPerformed()
    {
        return $this->search_performed;
    }


    /**
     * Solicitar dados do banco de dados
     * @return self
     */
    public function fetchData()
    {
        $this->paginate();
        $this->getQuery()->select("*");
        $this->data = $this->getQuery()->get();
        return $this;
    }


    /**
     * Get Informações
     * @return [tipo] [descrição]
     */
    public function getData()
    {
        return $this->data;
    }


    public function getDataAs($modelname, $force_new = false)
    {
        if (is_null($this->data_as_model) || $force_new) {
            $data = array();

            foreach ($this->data as $r) {
                $model = Controller::model($modelname);
                foreach ($r as $key => $value) {
                    $model->set($key, $value);
                }

                $model->markAsAvailable();
                $data[] = $model;
            }

            $this->data_as_model = $data;
        }

        return $this->data_as_model;
    }


    /**
     * Verificar se o método inacessível é um método acessível no objeto de consulta
     * @param  string $method Nome sensível do método ASE
     * @param  mixed $args   
     * @return DataList|Exception
     */
    public function __call($method, $args)
    {
        if (method_exists($this->getQuery(), $method)) {
            call_user_func_array(array($this->getQuery(), $method), $args);
            return $this;
        } else {
            throw new Exception('Undefined method: '.$method);
        }
    }
}
