<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Player extends Application
{

    /**
     * This page shows a player information.
     *
     */
    public function index()
    {
        $this->load->model('players');
        
        $source = $this->players->all();

        $this->data['dropdown'] = $source;

        $this->data['players'] = $source;

        $this->data['pagebody'] = 'player';
        
        $this->render();
    }

    public function GetPlayer($id)
    {
        $this->load->model('players');

        $this->data['dropdown'] = $this->players->all();

        $this->data['players'] = $this->players->GetPlayer($id);

        $this->data['pagebody'] = 'player';
        
        $this->render();
    }
    
}
