<?php
class Movements extends CI_Model {

    function __contruct() {
        parent::__construct();
    }

    function all() {
        // get stocks stocks data from server
        $data_string = '/data/movement';

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
        return $this->db->list_fields('movements');
    }


    public function getStockMovements($stockId)
    {
        //get all arrays
        $movements = $this->all();

        // return all stocks if no stock was selected
        if ($stockId == 1)
        {
            return $movements;
        }

        // create array for results
        $result = array();

        // loop through array
        foreach ($movements as $r)
        {
            // search array for code that matches stock id and put into result array
            if ($r["code"] == $stockId)
            {
                $result[] = $r;
            }
        }

        return $result;
    }
}
