<?php

class Leaderboard_model extends CI_Model{

	public function get_rank (){

		$q = $this->db->query("SELECT `usrnm` ,`score`  FROM `leader` ORDER BY `score` DESC ");

		return $q->result();
}}
?>