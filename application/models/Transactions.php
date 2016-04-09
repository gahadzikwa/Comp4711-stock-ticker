<?php
class Transactions extends CI_Model {

    function __contruct() {
        parent::__construct();
    }

    function all() {
        // get stocks stocks data from server
        $data_string = '/data/transactions';

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
        return $this->db->list_fields('transactions');
    }

    public function getStockTransactions($stockId)
    {
        //get all arrays
        $transactions = $this->all();

        if ($stockId == 1)
        {
            return $transactions;
        }
        
        // create array for results
        $result = array();

        // loop through array
        foreach ($transactions as $r)
        {
            // search array for code that matches stock id and put into result array
            if ($r["stock"] == $stockId)
            {
                $result[] = $r;
            }
        }

        return $result;
    }

    function getPlayerTransactions($playerId)
    {
        $this->db->select('*');
        $this->db->from('transactions');
        $this->db->join('stocks', 'transactions.StockID = stocks.id');
        $this->db->where('PlayerID=', $playerId);
        $this->db->order_by("DateTime", "desc");
        return $this->db->get()->result_array();
    }
}
