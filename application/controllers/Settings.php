<?php
class Settings extends Application {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['pagebody'] = 'settings';
        $this->render();
    }
}