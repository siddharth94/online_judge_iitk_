<?php


class Submission extends CI_Controller{

	function __construct(){
          parent::__construct();
    }

/*	public function do_upload()
	{
		$config['upload_path'] = '/var/www/online_judge_iitk/onj/backend/submissions/';
	//	$config['allowed_types'] = '';
		$config['max_size']	= '5';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
print_r($error);return false;
		//	$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
print_r($data);return true;
		//	$this->load->view('upload_success', $data);
		}
	}
*/
    public function upload(){
	//	echo "<h1>bal</h1>";
    	

    	if($this->session->userdata('is_logged_in')==0)
    		exit(json_encode(array('uploaded' => 0,'msg' => "Please Log in to submit the file" ))) ;

    	if(!isset($_FILES['file']))
		{
			$return = json_encode(array('uploaded' => 0,'msg' => "Please select a file" )) ;
			exit ($return);
		}

    	$this->load->model('submission_model');
    	$substat = $this->submission_model->check_submissions();

    	//echo $substat ;

    	if($substat>0)
    	{
    		if($substat/100 > 1)
    		{
    			$wno = ($substat - $substat%100 )/100 ;

    			if($wno<=9)
    			exit(json_encode(array('uploaded' => 0,
    									'msg' => "Warning $wno/10 !<br> You have exceeded submissions limit.<br>If you will continue submitting your account will be blocked" ))) ;
    			else
    			{
    				echo json_encode(array('uploaded' => 0,'msg' => "Your account has been blocked. <br> Please contact any admin to resume your account..." )) ;
    							$this->session->sess_destroy();
    							redirect(base_url());
    			}

    					
    			
    		}
    		else if($substat/10 > 1)
    		{
    			exit(json_encode(array('uploaded' => 0,'msg' => "You have exceeded submissions limit <br> Any more submissions will lead to blocking of your account" ))) ;
    		}
    		else
    			exit(json_encode(array('uploaded' => 0,'msg' => "Time gap between 2 submissions should be more than 30 seconds" ))) ;
    	}

		//To be made dynamic
		$user=$this->session->userdata('username');
		$prob_id = $this->uri->segment(4);


		if($this->uri->segment(3) == 'contests')
		{
			$this->load->model('problems_model');
			$contest_id = $this->problems_model->get_contest_of_problem();
		}
		else
		{
			$contest_id = 'practice' ;
		}

		//

		//Load "files" database
		//require("connect_db.php");

		//Get name of uploaded file

		


		$name = $_FILES['file']['name'];

		//If no file!!
		// if (empty($name))
		// {
		// 	$return = json_encode(array('uploaded' => 0,'msg' => "Please upload a file" )) ;
		// 	exit ($return);
		// }

		//Get size
		$size = $_FILES['file']['size'];

		if ($size > 50000)
		{
			$return = json_encode(array('uploaded' => 0,'msg' => "Your source is too large!" )) ;
			exit ($return);
		}

		//Get temporary name for location change
		$tmpname = $_FILES['file']['tmp_name'];

		//Get language of code to compile
		$ext = $_POST['lang'];

		// $query = mysql_query("SELECT `id` FROM `files_submitted` ORDER BY `id` DESC");
		// $q = mysql_fetch_assoc($query);
		// if (mysql_num_rows($query)!=0)
		// 	$name = $q['id'];
		// else $name = 2;
		// $name++;
		$this->load->model('submission_model');
		$name = $this->submission_model->get_latest_id() + 1;
		//echo $name;

		//Move the file

/*
		$config['upload_path'] = '/var/www/online_juge_iitk/onj/backend/submissions/';
		$config['file_name'] = $name.".".$ext;
	//	$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0.050';
	//	$config['max_width']  = '1024';
	//	$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
print_r($error);

//			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
print_r($data);
$this->submission_model->add_submission($name,$prob_id,$ext,$user,$contest_id);

                        $return = json_encode(array('uploaded' => 1,'msg' => "Evaluating...",'id' => $name )) ;
                        echo $return;

//			$this->load->view('upload_success', $data);
		}
*/




		if (!move_uploaded_file($tmpname,getcwd().'/backend/submissions/'.$name.".".$ext))
	//	if (!do_upload())
		{
			print_r($_FILES);
			$return = json_encode(array('uploaded' => 0,'msg' => "unable to upload" )) ;
			exit ($return);
		}
		else
		{ 
			//date_default_timezone_set('Asia/Calcutta');
			//$date = date('YY "-" MM "-" DD " " HH ":" II ":" SS', time());
			//$date = strtotime(time());
			//echo $date;

			//Push the file into database.
			$this->submission_model->add_submission($name,$prob_id,$ext,$user,$contest_id);

			$return = json_encode(array('uploaded' => 1,'msg' => "Evaluating...",'id' => $name )) ;
			echo $return;
		}

		// date_default_timezone_get();
		// $date = date('m/d/Y h:i:s a', time());
		// echo $date;

		// //Push the file into database.
		// $this->submission_model->add_submission($name,$prob_id,$ext,$date,$user,$contest_id);

		// $query = "INSERT INTO `files_submitted`(`id`, `prob_id`, `lang`, `time`, `status`, `username`, `runtime`, `memory`, `contestid`, `points`) VALUES (NULL, '$prob_id', '$extension', '$date', '-1', '$user', '-1', '-1', '$contest_id', '0') ";
		// mysql_query($query);




    }

    public function getstatus(){
    	//echo "fuck yeah i'm not here" ;
    	


    	$this->load->model('submission_model');
    	$status = $this->submission_model->get_status();

    	echo $status ;
    }


    public function get_recent_submissions(){

    	//uri => /submission/get_recent_submissions/MAYLONG14/COMPNPARSE/aadilh/0/10/20
    	//	  => /submission/get_recent_submissions/P/COMPNPARSE/aadilh/0/10/20		
    	//    => /submission/get_recent_submissions/MAYLONG14/COMPNPARSE/all/0/10/20    	
    	//    => /submission/get_recent_submissions/MAYLONG14/all/all/0/10/20
    	//    => /submission/get_recent_submissions/null/COMPNPARSE/all/0/10/20
        //    => /submission/get_recent_submissions/null/all/all/0/10/20


    	if($this->uri->segment(3) == "P")
    		$contest="practice";
    	else if($this->uri->segment(3) == "null")
    		$contest = "%";
    	else
    		$contest =$this->uri->segment(3) ;
    		

    	$problem_id = $this->uri->segment(4) ;

        if($problem_id=="all")
            $problem_id='%' ;

    	$user = $this->uri->segment(5);



    	if($user=="all")
    		$user="%" ;

    	if($this->uri->segment(6)==0)
    		$status="%";
    	else
    		$status=111;

    	$n = $this->uri->segment(8);

    	$start_index = $this->uri->segment(7);

    	$this->load->model('submission_model');

    	$result = $this->submission_model->get_submissions($user,$status,$start_index,$n,0,$contest,$problem_id);

    	print_r( json_encode($result->result()));





    }

    public function show_code(){
    	//echo "<h1>YOU ARE NOT ALLOWED TO SEE THIS SOURCE CODE</h1>" ;
    	$data['title']="Source Code ";
         $data['active']="";
         $data['is_visible'] = 1;
         $data['exists'] = 1;
          
        $this->load->view('header',$data);
         $this->load->view('body_nav',$data);
         $this->load->view('login');

         $id = $this->uri->segment(3);

         if($id!="")
         {
         	$this->load->model('submission_model');
         	$data['sub_data'] = $this->submission_model->get_submission_by_id($id);

         	if($data['sub_data']->num_rows() == 1 )
         	{
         		$contest_id = $data['sub_data']->first_row()->contestid;
         		if($contest_id != "practice")
         		{
         			$this->load->model('contests_model');
         			$data['contest_data'] = $this->contests_model->get_contest_by_id($contest_id)->first_row();

         			//$sub_time = $data['sub_data']->result()[0]->time ;
         			date_default_timezone_set('Asia/Calcutta');

					$time = date('Y-m-d H:i:s', time()-60);
         			 

         			$c_start = $data['contest_data']->start_time ;
         			$c_end = $data['contest_data']->end_time ;

         			//$time = date('Y-m-d H:i:s', $c_end-60);

         			if($time < $c_end)
         				$data['is_visible'] = 0;

         			if($this->session->userdata('username') == $data['sub_data']->first_row()->username)
						{
							$data['is_visible'] = 1;
						}
         			//else
         				//echo "<h1> $time Fuck Yeah $c_end</h1>";

         		}

         	}
         	else
         		$data['exists'] = 0;

         }
         else
         	$data['exists'] = 0;


         
         $this->load->view('source_code_head',$data);

         if($data['exists']==1 && $data['is_visible']==1)
         $this->load->view('source_code_body',$data);

    	//readfile("uploads/1.c");


    }
}




?>
