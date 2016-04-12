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

    public function management()
    {
        if ($this->session->userdata('user') == null) {
            redirect('/account/login','refresh');
        }
        $this->load->model('players');
        $this->data['players'] = $this->players->all();

        $this->data['pagebody'] = 'management';
        $this->render();
    }

    public function buy($stock_code, $qty, $value) 
    {
        // Validate user data
//        if (! $player = $this->session->userdata('username')){
//            echo json_encode(array('message' => 'Please Sign In'));
//            return;
//        }

        // Validate data
        // Check if stock_code exists
        // Check if qty is valid
        // 
//        $data_string = '/data/stocks';
//
//        $curl = curl_init();
//
//        curl_setopt($curl, CURLOPT_URL, BSX_URL . $data_string);
//        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        // curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
//
//        $output = curl_exec($curl);
//
//        curl_close($curl);
//
//        // Process the return output from the API
//        $csv = str_getcsv($output, "\n");
//
//        $header = str_getcsv($csv[0], ",");
//
//        for ($i = 1; $i < count($csv); $i++){
//
//            $row = str_getcsv($csv[$i], ",");
//
//            $row_result = array();
//
//            for ($j=0; $j < count($row); $j++) {
//                $row_result[$header[$j]] = $row[$j];
//            }
//
//            if (strcmp($row_result["code"], $stock_code) == 0 && $row_result['value'] == $value)
//                $result = $row_result;
//        }
//
//        // return a string message if stock code or quantity is invalid
//        if( !isset($result) )
//        {
//            echo json_encode(array('message' => 'Stock code or quantity is invalid'));
//            return;
//        }
        

        // POST buy request
        $player = $this->session->userdata('user');

        $params = array(
            'team' => TEAM_CODE,
            'token' => AGENT_TOKEN,
            'player' => $player->Username,
            'stock' => $stock_code,
            'quantity' => $qty,
         );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, BSX_URL . '/buy');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

        $response = curl_exec($curl);

        curl_close($curl);

        // Process the return output from the API        
        $xml_resp = new SimpleXMLElement($response);

        // If error occur return error, otherwise insert the certificate into database and return success messsage
        if (!empty($xml_resp->error)) {
            echo json_encode($xml_resp);
        }
        else {
            // Insert certificate into database
            echo json_encode( array(
                    'message' => 'success',
                    'datetime' => $xml_resp->datetime->__toString()
            ) );
        }

        return;
    }

    public function sell() {

    }

    public function register_agent($teamid, $teamname, $password) {
        $params = array(
            'team' => $teamid,
            'name' => $teamname,
            'password' => $password,
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, BSX_URL . '/register');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        // Process the return output from the API
        $xml_resp = new SimpleXMLElement($response);

        echo $response;
    }

    public function delete_player($username) {
        $this->load->model('players');
        echo $this->players->remove($username);
    }
}
