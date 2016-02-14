<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stocks extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_stock_list()
    {
        $this->db->select('code');
        $this->db->from('stocks');
        $query = $this->db->get();
        $result = $query->result();

        return $result;

    }
//        $query = $this->db->get('stocks');
////        $this->db->order_by('code');
////        $result = $this->db->get();
////        $stocks = array();
////        if($result->num_rows() > 0)
////        {
////            foreach($result->result_array() as $row)
////            {
////                $stocks[$row['id']] = $row['code'];
////            }
////        }
//        return $query->result_array();
//    }
}