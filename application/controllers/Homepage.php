<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller 
{
    public function index()
	{
        $data['title'] = "VRS - HOME";

        $this->load->view('home/templates/header', $data);
		$this->load->view('home/home');
		$this->load->view('home/templatesfooter');
	}
}
?>