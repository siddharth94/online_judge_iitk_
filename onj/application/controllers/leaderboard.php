<?php


class Leaderboard extends CI_Controller{
	public function index(){
		$this->main();
	}

	public function main(){
		$data['title'] = "Leaderboard";
		$data['active'] = "Leaderboard" ;

		$this->load->view("header",$data);
		$this->load->view("body_nav",$data);
		$this->load->view("login");



		$contest_id = $this->uri->segment(3);
		if($contest_id=="")
			$contest_id = "overall" ;

		$this->load->model('contests_model');
		$data['contests_short_list']= $this->contests_model->get_all_contests_name_and_id();
	
		$this->load->model('ranking_model');
		$data['rankings'] = $this->ranking_model->get_rankings($contest_id,1000);
		 if($data['rankings']->num_rows ==0)
		 	redirect(base_url().'leaderboard/main');
		// echo "<pre>" ;
		// print_r($rankings);
		// echo "</pre>";

		$this->load->view('body_leaderboard',$data);


	}

	public function update_ranking(){

		$id = $this->uri->segment(3);

		$this->load->model('submission_model');
		$sub = $this->submission_model->get_submission_by_id($id) ;

		echo "<pre>";
		print_r($sub);


		if($sub->num_rows() >0)
		{
			$s =$sub->first_row();
			if($s->status == 111 && $s->contestid != "practice")
			{
				$this->load->model('contests_model');
				$contest = $this->contests_model->get_contest_by_id($s->contestid)->first_row() ;
				$stime = $contest->start_time ;
				$etime = $contest->end_time ;

				if($s->time > $stime && $s->time < $etime)
				{
					echo "<h1>".$this->submission_model->no_of_submissions($s->username,$s->prob_id,'%',111)."</h1>";

					if($this->submission_model->no_of_submissions($s->username,$s->prob_id,'%',111) == 1)
					{
						$this->load->model('problems_model');
						$points = $this->problems_model->get_points($s->prob_id);

						$this->load->model('ranking_model');
						$rankings = $this->ranking_model->update_rankings($s->username,$s->contestid,$points);

					}

				}

			}
			
		}



		
	}

	

}



?>
