<?php 
/**
 * Users model
 *
 * @version 1.0
 * @author Onelab <hello@onelab.co> 
 * 
 */
class ClientesModel extends DataList
{	
	/**
	 * Initialize
	 */
	public function __construct()
	{
		$this->setQuery(DB::table(TABLE_PREFIX.TABLE_CLIENT));        
	}

    public function search($search_query)
    {
        parent::search($search_query);
        $search_query = $this->getSearchQuery();

        if (!$search_query) {
            return $this;
        }

        $query = $this->getQuery();
        $search_strings = array_unique((explode(" ", $search_query)));
        foreach ($search_strings as $sq) {
            $sq = trim($sq);

            if (!$sq) {
                continue;
            }

            $query->where(function($q) use($sq) {
                $q->where(TABLE_PREFIX.TABLE_CLIENT.".cnpj", "LIKE", $sq."%");
                $q->orWhere(TABLE_PREFIX.TABLE_CLIENT.".name", "LIKE", "%". $sq."%");
								$q->orWhere(TABLE_PREFIX.TABLE_CLIENT.".cod_santri", "LIKE", $sq."%");
                $q->orWhere(TABLE_PREFIX.TABLE_CLIENT.".client_type", "LIKE", $sq."%");
                $q->orWhere(TABLE_PREFIX.TABLE_CLIENT.".uf", "LIKE", $sq."%");                  
            });
        }

        return $this;
    }

    public function fetchData()
    {
        $this->paginate();

        $this->getQuery()
             ->select(TABLE_PREFIX.TABLE_CLIENT.".*");             
        $this->data = $this->getQuery()->get();
        return $this;
    }
}
