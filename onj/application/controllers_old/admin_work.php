<?php

class Admin_work extends CI_Controller {
    
    function __construct(){
          parent::__construct();
    }  
    
    public function index(){     
		$this->add_problem();
    }

    public function add_problem(){
        $data = $_POST["problem_name"];
        echo $data;
        echo "hello";
	}
}
?>