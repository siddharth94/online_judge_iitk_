<?php

	class  Submission_model extends CI_Model {

	public function get_latest_id(){
		$q = $this->db->query("SELECT `id` FROM `files_submitted` ORDER BY `id` DESC");
		
		return $q->first_row()->id;
	}

	public function add_submission($name,$prob_id,$ext,$user,$contest_id){

		$this->db->query("INSERT INTO `files_submitted`(`id`, `prob_id`, `lang`,  `status`, `username`, `runtime`, `memory`, `contestid`, `points`) VALUES ('$name', '$prob_id', '$ext', '0', '$user', '-1', '-1', '$contest_id', '0') ");

	}

	public function get_status(){
		$id = $this->uri->segment(3);

		$q = $this->db->query("SELECT `status` FROM `files_submitted` WHERE `id` = $id");

		return $q->first_row()->status ;
	}

	public function no_of_submissions($username,$problem,$contest,$status){

		$q = $this->db->query("SELECT `id` FROM `files_submitted`
							   WHERE `username` LIKE '$username' AND 
							   		  `status` LIKE '$status' AND
							   		  `prob_id` LIKE '$problem' AND
							   		  `contestid` LIKE '$contest' ");

		return $q->num_rows() ;



	}

	public function no_of_users($contest_id){
		$q = $this->db->query("SELECT DISTINCT `username` FROM `files_submitted`
							   WHERE  `contestid` = '$contest_id' ");

		return $q->num_rows() ;
	}

	public function get_submission_by_id($id)
	{

		$q = $this->db->query("SELECT * FROM `files_submitted` WHERE `id` = $id");

		return $q ;
	}

	public function get_distinct_contests($username)
	{

		$q = $this->db->query("SELECT DISTINCT `contestid` FROM `files_submitted` WHERE `username` LIKE '$username' ");

		return $q ;
	}


	public function get_submissions($username,$status,$start_index,$n,$s,$contest,$problem){

		$select="*";
		

		if($s == 1)
			$select = " `id`, `username` , `status` , `lang` , `runtime` ";
		if($s == 2)
			$select = " `id` , `runtime` , `prob_id` , `contestid` , `lang` ";
		 if($s==3)
		 	$select = " `id` , `runtime` , `prob_id` , `status` , `lang` ";


		$q = $this->db->query("SELECT $select FROM `files_submitted`
							   WHERE `username` LIKE '$username' AND 
							   		  `status` LIKE '$status' AND
							   		  `prob_id` LIKE '$problem' AND
							   		  `contestid` LIKE '$contest'
							    ORDER BY `id` DESC
		 					   LIMIT $start_index,$n");
		// echo "<h1>"."SELECT $select FROM `files_submitted`
		// 					   WHERE `username` LIKE '$username' AND 
		// 					   		  `status` LIKE '$status' AND
		// 					   		  `prob_id` LIKE '$problem' AND
		// 					   		  `contestid` LIKE '$contest'
		//  					   LIMIT $start_index , $n "."</h1>" ;

		return $q;

	}

	public function check_submissions(){
		
		$user = $this->session->userdata('username') ;
		$sub30=0; $sub5min=0;
		$dval=0;
		date_default_timezone_set('Asia/Calcutta');

		$time = date('Y-m-d H:i:s', time()-30);
		$q = $this->db->query("SELECT `time` FROM `files_submitted` WHERE `time` >= '$time' AND `username` = '$user' ORDER BY `time` ASC");
		//echo $q->num_rows() ;
		//print_r ($q->first_row());
		//echo $time ;
		if($q->num_rows()>0)
			$sub30=1;

		$time = date('Y-m-d H:i:s', time()-300);
		$q = $this->db->query("SELECT `time` FROM `files_submitted` WHERE `time` >= '$time' AND `username` = '$user' ORDER BY `time` DESC");
		//echo $q->num_rows()."<br>";
		//echo $time." " ;
		//echo $q->num_rows()." " ;
		//echo $q->first_row()->time." ";
		if($q->num_rows()>7)
		{	$sub5min=1;


			$q = $this->db->query("SELECT `disabled` FROM `users` WHERE  `username` = '$user' ");


			$r=$q->first_row()->disabled;
			if($r <=9)
			{
				$dval = $r +1 ;
				$this->db->query( "UPDATE `users` SET `disabled`= '$dval' WHERE `username`='$user'");
			}
			else
			{
				$dval=10;
				$this->db->query( "UPDATE `users` SET `disabled`= '10' WHERE `username`='$user'");
			}
		}
		return ($dval*100 + $sub5min*10 + $sub30) ;




		//$diff = $date - $q->first_row()->time;

		//echo $q->num_rows()().'<br>';
		//echo $diff;



	}


}

?>
