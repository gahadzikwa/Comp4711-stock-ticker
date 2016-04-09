<?php

class Gamestatus extends CI_MODEL
{
    public $state = '';
    public $round = '';
    public $countdown = '';
    public $desc = '';

    public function __construct($aState = '', $aRound = '', $aCountDown = '', $aDesc = '')
    {
        parent::__construct();
        $this->state = $aState;
        $this->round = $aRound;
        $this->countdown = $aCountDown;
        $this->desc = $aDesc;
    }
}