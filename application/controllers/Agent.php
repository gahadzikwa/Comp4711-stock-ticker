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

    public function buy($stock_code, $qty, $player_name) {

        // Validate data
        // Check if stock_code exists
        // Check if qty is valid
        // Check if $player_name exists

        $data_string = '/data/stocks';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, BSX_URL . $data_string);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);

        var_dump($result);
            

        // POST buy request

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
