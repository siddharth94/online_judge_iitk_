<?php


class Users extends CI_Controller{
	
	function __construct(){
          parent::__construct();
          //$this->load->model('submission_model');
          $this->load->model('submission_model');
    }

	public function login (){
		// echo 'im here ' ; 

		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->input->post('username'),'Username','required | trim | xss_clean | callback_validate');
		$this->form_validation->set_rules($this->input->post('password'),'Password','required | trim | md5');

		

		if($this->form_validation->run() == FALSE){
		//echo "fuck its wrong";
				echo json_encode(array( 'logged' => 0  )) ;
			
		}
		else{
		echo json_encode(array('logged' => 1 ,'user' => $this->input->post('username') ,  'name' => $this->session->userdata('name') , 'admin' => $this->session->userdata('is_admin') )) ;
		}
		// echo $this->input->post('username').'->'.$this->input->post('password');
	}

	public function validate(){
		$this->load->model('user_model');

		

		if($user_data =  $this->user_model->can_log_in()){

			$data = array(
				'name' => $user_data['name'] ,
				'username' => $this->input->post('username'),
				'is_logged_in' => 1,
				'is_admin' => $user_data['is_admin']

				);

			$this->session->set_userdata($data);


			return true;
		}
		else{
			$this->form_validation->set_message('validate','Incorrect username/password.');
			return false ;
		}

	}

	public function logout (){
		$this->session->sess_destroy();
		
	}

	public function register(){
		//echo "i'm here" ;
		 $this->load->library('form_validation');
		//echo $this->input->post('name').'->'.$this->input->post('email');

		$res = $this->r_validation();

		//echo $res ;
		 // $res = "valid";

		if( $res == "valid" )
		{
			// $key = md5(uniqid());
			// $this->load->library('email');

			//  //$config['protocol'] = 'sendmail';
			// // $config['mailpath'] = '/usr/sbin/sendmail';
			// // $config['charset'] = 'iso-8859-1';
			// // $config['wordwrap'] = TRUE;

			// // $this->email->initialize($config);



			// // $config['protocol'] = 'smtp'; // mail, sendmail, or smtp    The mail sending protocol.
			// // $config['smtp_host'] = 'ssl://smtp.gmail.com'; // SMTP Server Address.
			// // $config['smtp_user'] = 'hayataadil@gmail.com'; // SMTP Username.
			// // $config['smtp_pass'] = 'itstratswidonething'; // SMTP Password.
			// // $config['smtp_port'] = '587'; // SMTP Port.
			// // $config['smtp_timeout'] = '5'; // SMTP Timeout (in seconds).
			// // $config['wordwrap'] = TRUE; // TRUE or FALSE (boolean)    Enable word-wrap.
			// // $config['wrapchars'] = 76; // Character count to wrap at.
			// // $config['mailtype'] = 'html'; // text or html Type of mail. If you send HTML email you must send it as a complete web page. Make sure you don't have any relative links or relative image paths otherwise they will not work.
			// // $config['charset'] = 'utf-8'; // Character set (utf-8, iso-8859-1, etc.).
			// // $config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
			// // $config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
			// // $config['crlf'] = "\r\n"; // "\r\n" or "\n" or "\r" Newline character. (Use "\r\n" to comply with RFC 822).
			// // $config['newline'] = "\r\n"; // "\r\n" or "\n" or "\r"    Newline character. (Use "\r\n" to comply with RFC 822).
			// // $config['bcc_batch_mode'] = FALSE; // TRUE or FALSE (boolean)    Enable BCC Batch Mode.
			// // $config['bcc_batch_size'] = 200; // Number of emails in each BCC batch.
			// // $config['send_multipart'] = FALSE;

			// //$this->email->initialize($config);
			
			// $this->email->from('hayataadil@gmail.com','Registration Bot');
			// //$this->email->to($this->input->post('email'));
			// $this->email->to('hayataadil@gmail.com');
			// $this->email->subject('Email Verification');
			// $message = base_url().'loginnup/verify/'.$key ;
			// $this->email->message($message);

			// echo mail("aadilh@iitk.ac.in","My subject",$message);
			// if($this->email->send())
			// {

			// }
			// else{
			// 	echo $this->email->print_debugger();
			// }
			$this->load->model('user_model');
			$this->user_model->add_user() ;

			echo json_encode(array('result' => 1 ,'email' => $this->input->post('email'))) ;					
		}
		else
			echo json_encode(array('result' => 0 , 'msg' => $res));


	}


	public function r_validation(){

		 $this->load->library('form_validation');
		
		$username = $this->input->post('username');
		$password =  $this->input->post('password');
		$cpassword =  $this->input->post('cpassword');
		$name =  $this->input->post('name');
		$email =  $this->input->post('email');
		$college =  $this->input->post('college');

		if($this->form_validation->min_length($name,'2')==false)
		{
			return "<p>Name is too short</p><p>Name must have more than 2 characters</p>";
		}

		if($this->form_validation->max_length($name,'20')==false)
		{
			return  "<p>Name too long</p>" ;
		}


		if($this->form_validation->valid_email($email)==false)
		{
			return "<p>Invalid Email Address</p>";
		}

		if($this->form_validation->is_unique($email,'users.emailId')==false)
		{
			return "<p>Email address already registered</p>";
		}


		if($this->form_validation->min_length($username,'5')==false)
		{
			return  "<p>Username too short</p>" ;
		}

		if($this->form_validation->max_length($username,'10')==false)
		{
			return  "<p>Username too long</p>" ;
		}

		if($this->form_validation->is_unique($username,'users.username')==false)
		{
			return "<p>Username already registered</p>";
		}

		if($this->form_validation->min_length($password,'5')==false)
		{
			return  "<p>Password too short</p>" ;
		}

		if($this->form_validation->max_length($password,'10')==false)
		{
			return  "<p>Password too long</p>" ;
		}
		

		if($password!=$cpassword)
		{
			return "<p>Passwords are not matching</p>";
		}

		return "valid" ;


	}

	function account (){

		$username = $this->uri->segment(3);
		$data['logged_in'] = 0;

		if($username=="")
		{
			 if($this->session->userdata('is_logged_in')==0)
			 {	
			 	redirect(base_url());
			 }
			 else
			{
			$username = $this->session->userdata('username');
			}
		}
		
		if($username == $this->session->userdata('username'))
			$data['logged_in'] = 1;

		//echo "<h1>".$username."</h1>";

		$this->load->model('user_model');

		$data['user'] = $this->user_model->get_user_by_username($username);
		if($data['user']!='no such user')
		{
			$data['is_user'] = 1;
			foreach( $data['user'] as $u)
			{
				//echo '<h1>'.$u->name.'</h1>';
				// $name = $u->name;
				$data['title']=$u->name;
				break;
			}

		}
		else
		{
			$data['is_user'] = 0;
			$data['title']="No Such User";
			//echo '<h1>No Such User</h1>';
		}


		
            $data['active']="";
          
        $this->load->view('header',$data);
        $this->load->view('body_nav',$data);    
       // $this->load->view("body_contests");
        $this->load->view('login');
        //$this->load->view('body_account',$data);
        $this->load->view('account_head',$data);




        if($data['is_user'] == 1)
        {
        	
        	$data['accepted_sub'] = $this->submission_model->get_submissions($username,111,0,100,2,'%','%');

        	$data['sub_t'] = $this->submission_model->no_of_submissions($username,'%','%','%');
        	$data['sub_a'] = $this->submission_model->no_of_submissions($username,'%','%',111);
        	$data['sub_ce'] = $this->submission_model->no_of_submissions($username,'%','%',120);
        	$data['sub_wa'] = $this->submission_model->no_of_submissions($username,'%','%',112);
        	$data['sub_rte'] = $this->submission_model->no_of_submissions($username,'%','%',113);
        	$data['sub_tle'] = $this->submission_model->no_of_submissions($username,'%','%',114);

        	$data['a_contest'] = $this->submission_model->get_distinct_contests($username);

        	$data['recent_sub'] = $this->submission_model->get_submissions($username,'%',0,10,3,'%','%');

        	// $i=0;

        	// foreach ($data['a_contest']->result() as $r) {
        	// 	$data['a_contest_t'][i] = $this->submission_model->no_of_submissions($username,'%',$r->contestid,'%');
        	// 	$data['a_contest_a']
        	
        	// 	$i++;
        	// }

        	$this->load->view('account_body',$data);
    	}



	}




}


?>