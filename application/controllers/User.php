<?php
Class User extends CI_Controller{
    public function view($page = 'dashboard'){
        if(! file_exists(APPPATH . 'views/user/' . $page . '.php')){
            show_404();
        }
        $data['title'] = ucfirst($page);

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_navi', $data);
        $this->load->view('user/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
}