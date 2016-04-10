<?php
class Stocks extends CI_Model {

    function __contruct() {
        parent::__construct();
    }

    // gets all stocks
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

    // gets selected stock
    function getStock($id)
    {
        // get stocks stocks data from server
        $data_string = '/data/stocks/' . $id;

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


    function getStockName($id, $value)
    {
        // get stock
        $stocks = $this->getStock($id);
        $result = null;
        
        // loop through array
        foreach ($stocks as $r)
        {
            switch ($value)
            {
                // search array for code that matches stock id and put into result array
                case "stockname":
                    $result = $r["name"];
                    break;
                case "stockcode":
                    $result = $r["code"];
                    break;
                case "stockvalue":
                    $result = $r["value"];
                    break;
            }
        }

        return $result;
        
    }

    // returns an array of stocks
    function get($id)
    {
        //get stock
        $stocks = $this->getStock($id);

        // create array for results
        $result = array();

        // loop through array
        foreach ($stocks as $r)
        {
            $result[] = $r;
        }

        return $result;
    }

    function getPlayerStocks($playername)
    {
        $this->db->select('*');
        $this->db->from('stockdistribution');
        $this->db->where('Username=', $playername);
        return $this->db->get()->result_array();
    }
}