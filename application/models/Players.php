<?php

class Players extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        return $this->db->get('players')->result_array();
    }

    public function get($username)
    {
        $this->db->select('*');
        $this->db->where('username=', $username);
        return $this->db->get('players')->row();
    }

    public function getPlayerEquity($username)
    {
        $this->db->select('*');
        $this->db->where('username=', $username);
        $result = $this->db->get('stockdistribution')->result();

        $this->load->model('stocks');
        $stocks = $this->stocks->all();

        $total = 0;

        foreach($result as $r) {

        }

        return $total;
    }

    public function remove($username) {
        $this->db->where('username', $username);
        $this->db->delete('players');
    }

    public function update($record) {
        // convert object to associative array, if needed
        if (is_object($record)) {
            $data = get_object_vars($record);
        } else {
            $data = $record;
        }
        // update the DB table appropriately
        $key = $data['Username'];
        $this->db->where('Username=', $key);

        return $this->db->update('players', $data);
    }
}
