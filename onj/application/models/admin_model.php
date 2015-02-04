<?php

class Admin_model extends CI_Model{

	public function check_admin (){
		if ($this->session->userdata('is_admin') == 1)
			return true;
		else return false;
	}

	public function convert_time($date,$hour,$minute,$ampm)
	{
		if($hour != 12)
			$hour+=$ampm;
		else if ($ampm == 0)
			$hour=0;
		$str = $date." ".$hour.":".$minute.":00";
		$time = date('Y-m-d H:i:s',strtotime($str));
		return $time;
	}

}