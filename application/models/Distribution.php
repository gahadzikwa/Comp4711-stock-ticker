<?php

class Distribution extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function headers()
    {
        return $this->db->list_fields('stockdistribution');
    }

    public function all()
    {
        return $this->db->get('stockdistribution')->result_array();
    }

    public function get($username, $stock_code = NULL, $qtyOrder = FALSE)
    {
        $this->db->select('*');

        $sql = "Username = '" . $username . "'";
        
        if (!is_null($stock_code))
            $sql .= " AND StockCode = '" . $stock_code . "'";    

        $this->db->where( $sql, NULL );

        if ( $qtyOrder == TRUE )
            $this->db->order_by( "Quantity", "asc" );

        return $this->db->get('stockdistribution')->result_array();
    }
}
