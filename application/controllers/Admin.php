<?php
Class Admin extends CI_Controller{
    public function view($page = 'dashboard'){
        if(! file_exists(APPPATH . 'views/admin/' . $page . '.php')){
            show_404();
        }
        $data['title'] = ucfirst($page);
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/admin_navi', $data);
        $this->load->view('admin/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
}