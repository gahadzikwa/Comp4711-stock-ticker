<?php
class Stocks extends CI_Model {

    function __contruct() {
        parent::__construct();
    }

    function all() {
        // get stocks stocks data from server
        $data_string = '/data/stocks';

        // setup curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, BSX_URL . $data_string);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // variables for csv string
        $output = curl_exec($curl);
        $csv = str_getcsv($output, "\n");
        $header = str_getcsv($csv[0], ",");;
        $result = array();

        // loop through csv to get array
        for ($i = 1; $i < count($csv); $i++) {
            $row = str_getcsv($csv[$i], ",");
            $row_result = array();
            for ($j = 0; $j < count($row); $j++) {
                $row_result[$header[$j]] = $row[$j];
            }
            $result[] = $row_result;
        }

        return $result;


    }

    function headers()
    {
        return $this->db->list_fields('stocks');
    }

    function get($id)
    {
        $this->db->select('*');
        $this->db->where('ID=', $id);
        return $this->db->get('stocks')->result_array();
    }

    function getPlayerStocks($playerId)
    {
        $this->db->select('*');
        $this->db->from('stockdistribution');
        $this->db->join('stocks', 'stockdistribution.StockID=stocks.ID');
        $this->db->where('PlayerID=', $playerId);
        return $this->db->get()->result_array();
    }
}