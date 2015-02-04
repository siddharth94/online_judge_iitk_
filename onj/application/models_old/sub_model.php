<?php

class Sub_model extends CI_Model
{
	public function no_of_submissions($username,$problem,$contest,$status){

//		echo "SELECT `id` FROM `files_submitted`
  //                                                         WHERE `username` LIKE '$username' AND
    //                                                                      `status` LIKE '$status' AND
      //                                                                    `prob_id` LIKE '$problem' AND
        //                                                                  `contestid` LIKE '$contest' ";

                $q = $this->db->query("SELECT `id` FROM `files_submitted`
                                                           WHERE `username` LIKE '$username' AND
                                                                          `status` LIKE '$status' AND
                                                                          `prob_id` LIKE '$problem' AND
                                                                          `contestid` LIKE '$contest' ");

                return $q->num_rows() ;



//	echo "<h1>sdfi</h1>";

//	echo "SELECT `id` FROM `files_submitted`
  //                                                         WHERE `username` LIKE '$username' AND
    //                                                                      `status` LIKE '$status' AND
      //                                                                    `prob_id` LIKE '$problem' AND
        //                                                                  `contestid` LIKE '$contest' ";
//	echo "SELECT `id` FROM `files_submitted` WHERE `username` LIKE '$username' AND `status` LIKE '$status' AND `prob_id` LIKE '$problem' AND `contestid` LIKE '$contest'" ;
        }
	
	public function no_of_users($contest_id){

//		echo "SELECT DISTINCT `username` FROM `files_submitted`
  //                                                         WHERE  `contestid` = '$contest_id' ";

                $q = $this->db->query("SELECT DISTINCT `username` FROM `files_submitted`
                                                         WHERE  `contestid` = '$contest_id' ");

                return $q->num_rows() ;
        }




}


?>
