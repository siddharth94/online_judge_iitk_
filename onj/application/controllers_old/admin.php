
<?php

class Admin extends CI_Controller {
    
    function __construct(){
          parent::__construct();
    }  
    
    public function index(){     
		$this->add_problem();
    }

    public function add_problem(){
        $data['title']="Admin Page";
        $data['active']="";
        $data['menu_option_selected'] = $this->uri->segment(2);

        if ($data['menu_option_selected'] == '')
        	$data['menu_option_selected'] = 'add_problem';
        
        $this->load->view("header",$data);
		$this->load->view("body_nav",$data);
		$this->load->view('login');

		$this->load->model("admin_model");

		if ($this->admin_model->check_admin())
		{
			//echo "shit this works!!";
			$data['access'] = true;
			$this->load->view("admin_menu",$data);
			$this->load->view("add_problem",$data);
		}
		else
		{
			redirect(base_url());
		}
	}

		public function new_problem(){

			$data['title']="Admin Page";
        	$data['active']="";
			$this->load->view("header",$data);
			$this->load->view("body_nav",$data);
			$this->load->model("contests_model");

			$contest_id1 = $_POST["contest_id"];
			$contest_id = strtoupper($contest_id1);
	        $problem_name = $_POST["problem_name"];
			$problem_id = $_POST["problem_id"];
			$points = $_POST["points"];
			$problem_statement = $_POST["problem_statement"];
			$short_desc = $_POST["short_desc"];
			$constraints = $_POST["constraints"];
			$input_desc = $_POST["input_desc"];
			$output_desc = $_POST["output_desc"];
			$sample_input = $_POST["sample_input"];
			$sample_output = $_POST["sample_output"];
			$num_input_file = $_POST["num_input_file"];
			$time_limit = $_POST["time_limit"];
			$mem_limit = $_POST["mem_limit"];
			$difficulty = $_POST["difficulty"];
			$username = $this->session->userdata('username');

			//echo "hello";
			//echo $contest_id;
			// echo "<h1>".$contest_id."</h1>";

			$contest_query = "SELECT * FROM contests WHERE contest_id = '".$contest_id."'";
			//echo $contest_query;
			$query = $this->db->query($contest_query);

			if ($query->num_rows == 0)
				$contest_nam = "Practice";
			else
			{
				echo "<h1>".$query->result()[0]->contest_name."</h1>";

				foreach ($query->result() as $row)
				{
					$contest_nam = $row->contest_name;
					echo "<h1>".$contest_nam."</h1>";
					break;
				}
			}

			for ($i = 0; $i < $num_input_file; $i++)
			{
				//Make directory for problem
				$dir = "backend/problems/".$problem_id;
				system("sudo mkdir ".$dir);
				system("sudo chmod 777 -R ".$dir);

				//Get name of uploaded files
				$inname = $_FILES['infile'.$i]['tmp_name'];
				$outname = $_FILES['outfile'.$i]['tmp_name'];

				//If no file!!
				if (empty($inname) || empty($outname))
					exit ("Please upload file number ".($i+1));

				//Move the file
				$out = move_uploaded_file($outname, $dir."/".($i+1).".out");
				$in = move_uploaded_file($inname, $dir."/".($i+1).".in");
				if ((!$in) && (!$out))
				{
					echo "unable to upload";
					exit(0);
				}
				system("sudo chmod 777 -R ".$dir);
			}

			$query = $this->db->query("INSERT INTO `problems`(`id`, `problem_id`, `problem_name`, `contest_id`, `contest_name`, `problem_statement`, `short_desc`, `input_desc`, `output_desc`, `constraints`, `sample_input`, `sample_output`, `total_submissions`, `accepted_submissions`, `num_input_file`, `time_limit`, `mem_limit`, `difficulty`, `points`, `author`) VALUES 
				('".NULL."','".(str_replace("'","\'",$problem_id))."','".(str_replace("'","\'",$problem_name))."','".(str_replace("'","\'",$contest_id))."','".(str_replace("'","\'",$contest_nam))."','".(str_replace("'","\'",$problem_statement))."','".(str_replace("'","\'",$short_desc))."','".(str_replace("'","\'",$input_desc))."','".(str_replace("'","\'",$output_desc))."','".(str_replace("'","\'",$constraints))."','".(str_replace("'","\'",$sample_input))."','".(str_replace("'","\'",$sample_output))."','0','0','".$num_input_file."','".$time_limit."','".$mem_limit."','".$difficulty."','".$points."','".$this->session->userdata('username')."')");

			redirect(base_url().'admin/add_problem');

		}

		function validate_problem_id()
		{
			$pid = $this->input->post('problem_id');
			// $query = $this->db->get_where('problems', array('problem_id' => $pid));
			$query = $this->db->query("SELECT `id` FROM `problems` WHERE `problem_id`='$pid'");
			if ($query->num_rows() > 0)
				$msg = "Problem ID already taken";
			else $msg = "1";
			echo json_encode(array('valid' => $msg));
		}



	public function add_contest(){
		$data['title']="Admin Page";
        $data['active']="";
        $data['menu_option_selected'] = $this->uri->segment(2);

        $this->load->view("header",$data);
		$this->load->view("body_nav",$data);
		$this->load->view('login');

		$this->load->model("admin_model");

		if ($this->admin_model->check_admin())
		{
			//echo "shit this works!!";
			$data['access'] = true;
			$this->load->view("admin_menu",$data);
			$this->load->view("add_contest",$data);
		}
		else
		{
			redirect(base_url());
		}
	}

		public function new_contest(){

			$data['title']="Admin Page";
        	$data['active']="";
			$this->load->view("header",$data);
			$this->load->view("body_nav",$data);
			$this->load->model("admin_model");

			$contest_id = $_POST["contest_id"];
	        $contest_name = $_POST["contest_name"];
			$start_date = $_POST["start_date"];
			$start_hour = $_POST["start_hour"];
			$start_minute = $_POST["start_minute"];
			$start_ampm = $_POST["start_ampm"];
			$end_date = $_POST["end_date"];
			$end_hour = $_POST["end_hour"];
			$end_minute = $_POST["end_minute"];
			$end_ampm = $_POST["end_ampm"];
			$contest_desc = $_POST["contest_desc"];
			$contest_type = $_POST["contest_type"];
			$contest_admins = $this->session->userdata('username');

			$start_time_str = $this->admin_model->convert_time($start_date,$start_hour,$start_minute,$start_ampm);
			$end_time_str = $this->admin_model->convert_time($end_date,$end_hour,$end_minute,$end_ampm);

			if ($this->session->userdata('is_admin') == 1)
				$query = $this->db->query("INSERT INTO `contests`(`id`, `contest_id`, `contest_name`, `contest_type`, `start_time`, `end_time`, `contest_desc`, `contests_admins`) VALUES ('".NULL."','".(str_replace("'","\'",$contest_id))."','".(str_replace("'","\'",$contest_name))."','".(str_replace("'","\'",$contest_type))."','".$start_time_str."','".$end_time_str."','".(str_replace("'","\'",$contest_desc))."','".(str_replace("'","\'",$contest_admins))."')");

			redirect(base_url());

		}

		function validate_contest_id()
		{
			$cid = $this->input->post('contest_id');
			// $query = $this->db->get_where('contests', array('contest_id' => $cid));
			$query = $this->db->query("SELECT `id` FROM `contests` WHERE `contest_id`='$cid'");
			if ($query->num_rows() > 0)
				$msg = "Contest ID already taken";
			else $msg = "1";
			// echo $msg;	
			echo json_encode(array('valid' => $msg));
		}

	public function edit_problem(){
		$data['title']="Admin Page";
        $data['active']="";
        $data['menu_option_selected'] = $this->uri->segment(2);

        $this->load->view("header",$data);
		$this->load->view("body_nav",$data);
		$this->load->view('login');

		$prob_id = $this->uri->segment(3);

		$this->load->model("admin_model");

		if (!empty($prob_id))
		{
			$query1 = $this->db->get_where("problems",array("problem_id" => $prob_id));
			$data['problem_name'] = $query1->result()[0]->problem_name;
			$data['problem_id'] = $query1->result()[0]->problem_id;
			$data['problem_statement'] = $query1->result()[0]->problem_statement;
			$data['short_desc'] = $query1->result()[0]->short_desc;
			$data['constraints'] = $query1->result()[0]->constraints;
			$data['input_desc'] = $query1->result()[0]->input_desc;
			$data['output_desc'] = $query1->result()[0]->output_desc;
			$data['sample_input'] = $query1->result()[0]->sample_input;
			$data['sample_output'] = $query1->result()[0]->sample_output;
			$data['num_input_file'] = $query1->result()[0]->num_input_file;
			$data['time_limit'] = $query1->result()[0]->time_limit;
			$data['mem_limit'] = $query1->result()[0]->mem_limit;
			$data['difficulty'] = $query1->result()[0]->difficulty;
			$data['points'] = $query1->result()[0]->points;

			$this->load->view("edit_p",$data);	
		}

		if ($this->admin_model->check_admin())
		{
			//echo "shit this works!!";
			$data['access'] = true;
			$this->load->view("admin_menu",$data);
			$this->load->view("edit_problem",$data);
		}
		else
		{
			redirect(base_url());
		}
	}

		public function edit_problem_submit(){
			$prob_id = $this->input->post('prob_id_ori');

			$query = $this->db->get_where("problems",array("problem_id" => $prob_id));
			
			$problem_name = $this->input->post('problem_name');
			$problem_id = $this->input->post('problem_id');
			$problem_statement = $this->input->post('problem_statement');
			$short_desc = $this->input->post('short_desc');
			$constraints = $this->input->post('constraints');
			$input_desc = $this->input->post('input_desc');
			$output_desc = $this->input->post('output_desc');
			$sample_input = $this->input->post('sample_input');
			$sample_output = $this->input->post('sample_output');
			$time_limit = $this->input->post('time_limit');
			$mem_limit = $this->input->post('mem_limit');
			$difficulty = $this->input->post('difficulty');
			$points = $this->input->post('points');

			//Update Statement
			echo $update_query = "UPDATE `problems` SET `problem_id`='".$problem_id."',`problem_name`='".$problem_name."',`problem_statement`='".$problem_statement."',`short_desc`='".$short_desc."',`input_desc`='".$input_desc."',`output_desc`='".$output_desc."',`constraints`='".$constraints."',`sample_input`='".$sample_input."',`sample_output`='".$sample_output."',`time_limit`='".$time_limit."',`mem_limit`='".$mem_limit."',`difficulty`='".$difficulty."',`points`='".$points."' WHERE `problem_id`='".$prob_id."'";
			$q = $this->db->query($update_query);
			redirect(base_url()."admin/edit_problem");
		}

		public function edit_file_submit(){
			$i = $this->input->post('num_input_file');
			$problem_id = $this->input->post('problem_id');

			$dir = "backend/problems/".$problem_id;
			// system("sudo mkdir ".$dir);
			system("sudo chmod 777 -R ".$dir);

			//Get name of uploaded files
			$inname = $_FILES['infile'.$i]['tmp_name'];
			$outname = $_FILES['outfile'.$i]['tmp_name'];

			//If no file!!
			if (empty($inname) && empty($outname))
				exit ("Please upload file number ".($i+1));

			//Move the file
			$out = move_uploaded_file($outname, $dir."/".$i.".out");
			$in = move_uploaded_file($inname, $dir."/".$i.".in");
			if ((!$in) && (!$out))
			{
				echo "unable to upload";
				exit(0);
			}
			system("sudo chmod 777 -R ".$dir);
		}

		public function edit_file_append()
		{
			$num_input_file = $_POST["num_input_file"];
			$problem_id = $this->uri->segment(3);
			
			$query = "SELECT * FROM problems WHERE `problem_id` = '$problem_id'";
			$result = $this->db->query($query);
			$i = $result->result()[0]->num_input_file;
			$num = $i;
			$i++;

			for (; $i <= $num_input_file+$num; $i++)
			{
				//Make directory for problem
				$dir = "backend/problems/".$problem_id;
				// system("sudo mkdir ".$dir);
				system("sudo chmod 777 -R ".$dir);

				//Get name of uploaded files
				$inname = $_FILES['infile'.($i-$num-1)]['tmp_name'];
				$outname = $_FILES['outfile'.($i-$num-1)]['tmp_name'];

				//If no file!!
				if (empty($inname) || empty($outname))
					exit ("Please upload file number ".$i);

				//Move the file
				$out = move_uploaded_file($outname, $dir."/".$i.".out");
				$in = move_uploaded_file($inname, $dir."/".$i.".in");
				if ((!$in) && (!$out))
				{
					echo "unable to upload";
					exit(0);
				}
				system("sudo chmod 777 -R ".$dir);
			}

			$tmp = $i-1;
			$query = "UPDATE problems SET `num_input_file` = '$tmp' WHERE `problem_id` = '$problem_id'";
			$this->db->query($query);
		}

		// public function rejudge(){
		// 	$prob_id = $this->uri->segment(3);

		// 	$query = $this->db->query("UPDATE `files_submitted` SET `status`='0' WHERE `prob_id`='".$prob_id."'");
		// 	// redirect(base_url()."admin/edit_problem");
		// }

		public function rejudge(){
		$prob_id = $this->uri->segment(3);

		$subs = $this->db->query("SELECT DISTINCT `username` FROM `files_submitted` WHERE `prob_id`= '$prob_id' AND `status`='111' ");

		if($subs->num_rows > 0)
		{
			$this->load->model('problems_model');
			$this->load->model('ranking_model');

			$contest_id = $this->problems_model->get_contest_of_problem();
			$points = $this->problems_model->get_points($prob_id);

			foreach ($subs->result() as $user) {
				
				$this->ranking_model->update_rankings($user->username,$contest_id,-1*$points);	

			}
		}



		$query = $this->db->query("UPDATE `files_submitted` SET `status`='0' WHERE `prob_id`='".$prob_id."'");
		// redirect(base_url()."admin/edit_problem");
	}


	public function edit_contest(){
		$data['title']="Admin Page";
        $data['active']="";
        $data['menu_option_selected'] = $this->uri->segment(2);

        $this->load->view("header",$data);
		$this->load->view("body_nav",$data);
		$this->load->view('login');

		$contest_id = $this->uri->segment(3);
		
		$this->load->model("admin_model");

		if (!empty($contest_id))
		{
			$this->load->view("admin_menu",$data);
			$query1 = $this->db->get_where("contests",array("contest_id" => $contest_id));
			$data['contest_name'] = $query1->result()[0]->contest_name;
			$data['contest_id'] = $query1->result()[0]->contest_id;
			$data['contest_type'] = $query1->result()[0]->contest_type;
			$data['start_time'] = $query1->result()[0]->start_time;
			$data['end_time'] = $query1->result()[0]->end_time;
			$data['contest_desc'] = $query1->result()[0]->contest_desc;

			// $this->admin_model->explode_date($data);

			$this->load->view("edit_c",$data);	
		}

		else if ($this->admin_model->check_admin())
		{
			//echo "shit this works!!";
			$data['access'] = true;
			$this->load->view("admin_menu",$data);
			$this->load->view("edit_contest",$data);
		}
		else
		{
			redirect(base_url());
		}
	}

	public function control_panel(){
		$data['title']="Admin Page";
        $data['active']="";
        $data['menu_option_selected'] = $this->uri->segment(2);

        $this->load->view("header",$data);
		$this->load->view("body_nav",$data);
		$this->load->view('login');

		$this->load->model("admin_model");

		if ($this->admin_model->check_admin())
		{
			//echo "shit this works!!";
			$data['access'] = true;
			$this->load->view("admin_menu",$data);
			$this->load->view("control_panel",$data);
		}
		else
		{
			redirect(base_url());
		}
	}

		public function remove_problem(){
			$prob_id = $this->uri->segment(3);

			$query = $this->db->query("DELETE FROM `problems` WHERE `problem_id` = '$prob_id'");

			echo "The problem has been deleted";
			// redirect(base_url());
		}
}

?>