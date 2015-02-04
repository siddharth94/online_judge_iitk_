<?php

class Ranking_model extends CI_Model {
    
   public function update_rankings($username,$contest_id,$points)
	{
		echo "<h1>".$points."</h1>";
		$q=$this->db->query("SELECT * FROM `rankings` WHERE `username` = '$username' AND `contest_id` = '$contest_id'");
		if($q->num_rows() == 0)
		{
			$this->db->query("INSERT INTO `rankings` (`username`,`contest_id`,`score`) VALUES ('$username','$contest_id','$points')");
		}
		else
		{
			$score = $q->frist_row()->score + $points ;

			$this->db->query("UPDATE `rankings` SET `score`='$score' WHERE `username` = '$username' AND `contest_id` = '$contest_id'");

		}

		$q=$this->db->query("SELECT * FROM `rankings` WHERE `username` = '$username' AND `contest_id` = 'overall'");
		if($q->num_rows() == 0)
		{
			$this->db->query("INSERT INTO `rankings` (`username`,`contest_id`,`score`) VALUES ('$username','overall','$points')");
		}
		else
		{
			$score = $q->first_row()->score + $points ;
			$this->db->query("UPDATE `rankings` SET `score`='$score' WHERE `username` = '$username' AND `contest_id` = 'overall'");


		}



	}

	public function get_user_rank()
	{

	}

	public function get_rankings($contest_id,$n)
	{
		//return "Hell Yeah" ;

		$q = $this->db->query("SELECT * FROM `rankings` WHERE `contest_id` = '$contest_id' ORDER BY `score` DESC , `update_time` ASC");

		return $q;

	}



    

}


?>
