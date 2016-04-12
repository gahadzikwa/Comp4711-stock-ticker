<?php
class Settings extends Application {

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        if ($this->session->userdata('user') == null) {
            redirect('/account/login','refresh');
        }
        $this->load->model('players');

        $user = $this->session->userdata('user');
        $this->data['current_player_username'] = $user->Username;
        $this->data['current_player_cash'] = $user->Cash;
        $this->data['current_player_equity'] = number_format($this->players->getPlayerEquity($user->Username));
        $this->data['curent_player_avatar'] = $user->Avatar;

        $this->data['pagebody'] = 'settings';
        $this->render();
    }

    public function update_password($newpassword, $oldpassword) {
        if($oldpassword == null || $newpassword == null) {
            echo json_encode(false);
            return;
        }

        $record = $this->session->userdata('user');

        if (!password_verify($oldpassword, $record->Password)) {
            echo json_encode(false);
            return;
        }

        $record->Password = password_hash($newpassword, PASSWORD_DEFAULT);

        $this->load->model('players');
        $success = $this->players->update($record);

        if($success) {
            $this->session->set_userdata('user', $record);
        }

        echo json_encode($success);
    }

    public function update_avatar()
    {
        $config['upload_path'] = './assets/images/avatars';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('settings', $error);

        } else {
            $record = $this->session->userdata('user');
            $record->Avatar = '/assets/images/avatars/' . $this->upload->data()['file_name'];
            $this->load->model('players');

            if($this->players->update($record)) {
                $this->session->set_userdata('user', $record);
            }

            redirect('settings', 'refresh');
        }
    }
}