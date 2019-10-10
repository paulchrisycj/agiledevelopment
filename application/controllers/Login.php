<?php
Class Login extends CI_Controller{
    public function view($page = 'login_user'){
        if(! file_exists(APPPATH . 'views/login/' . $page . '.php')){
//            show_404();
//            echo APPPATH . "views/login/$page.php";
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->helper('url');
        $this->load->view('login/'.$page, $data);
    }
}