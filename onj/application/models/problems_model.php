<?php


class Problems_model extends CI_Model{

	public function get_problems_by_contest_id($contest_id){

		$q=$this->db->query("SELECT `problem_id` , `problem_name` ,`short_desc`,`accepted_submissions`,`difficulty`,`points` FROM `problems` WHERE `contest_id` = '".$contest_id."' ORDER BY `difficulty`");

		return $q->result();

	}

	public function get_problems_by_difficulty($difficulty,$sort_by){

		$q=$this->db->query("SELECT `problem_id` , `problem_name` ,`short_desc`,`accepted_submissions`,`difficulty`, `total_submissions` FROM `problems` WHERE `difficulty` = '".$difficulty."' ORDER BY `".$sort_by."` DESC");

		return $q->result();

	}

	public function get_problem_by_id($problem_id){

		$q=$this->db->query("SELECT * FROM `problems` WHERE `problem_id` = '".$problem_id."'");

		if($q->num_rows > 0)
		return $q->result();
		else 
			return "none" ;
	} 
	public function get_points($problem_id)
	{
		$q=$this->db->query("SELECT `points` FROM `problems` WHERE `problem_id` = '".$problem_id."'");

		if($q->num_rows() > 0)
			return $q->first_row()->points;
		else 
			return 0 ;
	}

	public function get_contest_of_problem(){

		$problem_id = $this->uri->segment(4);
		if($problem_id == "")
		{
			$problem_id = $this->uri->segment(3);
		}
			$q = $this->db->query("SELECT `contest_id` FROM `problems` WHERE `problem_id` = '".$problem_id."'");
		
		return $q->first_row()->contest_id;
	}

}

?>
