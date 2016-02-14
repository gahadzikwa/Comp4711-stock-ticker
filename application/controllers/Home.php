<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{        
            $this->load->model('homestock');             
            $stockloader = $this->homestock->all_stocks();
                $stocks = array();
                foreach($stockloader as $tempstock) {
                $temp = array(
                    'id' => $tempstock['ID'], 
                    'code' => $tempstock['Code'], 
                    'name' => $tempstock['Name'], 
                    'category' => $tempstock['Category'], 
                    'value' => $tempstock['Value']
                ); 
                $stocks[$tempstock['ID']] = $temp;                 
            }          
            $this->data['stocks'] = $stocks;
            
            
            $playerloader = $this->homestock->all_players();
                $players = array();
                foreach($playerloader as $tempplayer) {
                $temp = array(
                    'id' => $tempplayer['ID'], 
                    'player' => $tempplayer['Player'], 
                    'cash' => $tempplayer['Cash'], 
                ); 
                $players[$tempplayer['ID']] = $temp;                 
            }          
            $this->data['players'] = $players;
            
            
            
            $this->data['pagebody'] = 'home';
            $this->render();
	}
        
        
}
