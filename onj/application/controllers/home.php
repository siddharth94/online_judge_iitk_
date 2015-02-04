<!--

This controller is meant to control the views , models and scipts related to Home tab 



-->




<?php


class Home extends CI_Controller{
	public function index(){
		$this->homepage();
	}

	public function homepage(){
		$data['title'] = "Home";
		$data['active'] = "Home" ;

		$this->load->view("header",$data);
		$this->load->view("body_nav",$data);
		$this->load->view('login');

		$this->load->view('home_video');
	

		// $this->session->sess_destroy();

		//  echo "<h1>".$this->session->userdata('is_logged_in')."</h1>" ;

	}
}



?>