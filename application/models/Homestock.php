<?php
class Homestock extends CI_Model {
    function __contruct() {
        parent::__construct();
    }
    
    function all_stocks() {
        //$query = $this->db->query("<SQL STATEMENT HERE>");
        $this->db->order_by("name");
        $query = $this->db->get('stocks');
        //$query = $this->db->query("SELECT * from stocks");
        return $query->result_array();
    }
}  
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

