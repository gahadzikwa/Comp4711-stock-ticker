<?php
/**
 * Created by PhpStorm.
 * User: brandon
 * Date: 08/04/16
 * Time: 1:10 PM
 */
class Agent extends Application
{
    function __contruct() {
        parent::__construct();  
    }

    public function game_status() {
        $this->load->model('Gamestatus');

        // 1. initialize
        $curly = curl_init();

        // 2. set the options, including the url
        curl_setopt($curly, CURLOPT_URL, BSX_URL . 'status');
        curl_setopt($curly, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curly, CURLOPT_HEADER, 0);

        // 3. execute and fetch the resulting HTML output
        $response = curl_exec($curly);

        // 4. free up the curl handle
        curl_close($curly);

        $xml_resp = new SimpleXMLElement($response);

        $gamestatus = new GameStatus(
            $xml_resp->state->__toString(),
            $xml_resp->round->__toString(),
            $xml_resp->countdown->__toString(),
            $xml_resp->desc->__toString()
        );

        header('Content-Type: application/json');
        echo json_encode( $gamestatus );
    }

    public function buy($stock_code, $qty) 
    {
        // Validate user data
        if (! $player = $this->session->userdata('UID'))
            return;

        var_dump($player);
        // Validate data
        // Check if stock_code exists
        // Check if qty is valid
        // 
        $data_string = '/data/stocks';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, BSX_URL . $data_string);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $output = curl_exec($curl);

        curl_close($curl);

        // Process the return output from the API        
        $csv = str_getcsv($output, "\n");
        
        $header = str_getcsv($csv[0], ",");
        
        for ($i = 1; $i < count($csv); $i++){
        
            $row = str_getcsv($csv[$i], ",");

            $row_result = array();

            for ($j=0; $j < count($row); $j++) { 
                $row_result[$header[$j]] = $row[$j];
            }

            if (strcmp($row_result["code"], $stock_code) == 0 && $row_result['value'] >= $qty)
                $result = $row_result;
        }

        // return a string message if stock code or quantity is invalid
        if(isset($result))
            var_dump($result);
            // return;
        

        // POST buy request
        $data_string = '/buy';

        $params = array(
            'team' => TEAM_CODE,
            'token' => AGENT_TOKEN,
            'player' => $player,
            'stock' => $stock_code,
            'quantity' => $qty,
         );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, BSX_URL . $data_string);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

        $output = curl_exec($curl);

        curl_close($curl);

        // Process the return output from the API        
        var_dump($output);     

        // Check response status
        // If response good store data into stockdistribution table
        // else return an error

        /*
            <?xml version="1.0"?>
            <certificate>
                <token>9ff24</token>
                <stock>BOND</stock>
                <agent>g01</agent>
                <player>poop_face</player>
                <amount>5</amount>
                <datetime>2016-04-08T16:57:01-04:00</datetime>
            </certificate>
         */
    }

    public function sell() {

    }
}
