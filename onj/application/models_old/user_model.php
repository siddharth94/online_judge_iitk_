<?php


class User_model extends CI_Controller{
	
	public function can_log_in(){

		$this->db->where('username',$this->input->post('username'));		
		$this->db->where('password',md5($this->input->post('password')));

		$query = $this->db->get('users');


		

		if($query->num_rows() == 1){
			$data = $query->result();
			foreach($data as $r)
			{
				$user_data['name'] = $r->name ;
				$user_data['is_admin'] = $r->admin ;
				return $user_data ; 
			}
			//return true ;
		}
		else{
			return false ;
		}
	}


	public function add_user(){
		$username = $this->input->post('username');
		$password =  md5($this->input->post('password'));
		$name =  $this->input->post('name');
		$email =  $this->input->post('email');
		$college =  $this->input->post('college');



		$query = $this->db->query("INSERT INTO `users`(`username`, `password`, `name`, `emailId`, `College`) VALUES ('".$username."','".$password."','".$name."','".$email."','".$college."')");
	}

	public function get_user_by_username($username){

		$query = $this->db->query("SELECT `id`, `username`, `password`, `name`, `emailId`, `College` FROM `users` WHERE `username` = '".$username."'");

		if($query->num_rows()==0)
		{
			return 'no such user';
		}
		else
		{
			return $query->result();
		}


	}


}



?>