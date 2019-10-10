<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function view($page = 'home')
	{
        if(! file_exists(APPPATH . 'views/home/' . $page . '.php')){
            show_404();
        }

        $data['title'] = "VRS - HOME";

        $this->load->view('home/templates/header', $data);
		$this->load->view('home/home');
		$this->load->view('home/templates/footer');
	}
}
?>