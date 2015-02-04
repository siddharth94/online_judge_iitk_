<!--

This controller is meant to control the views , models and scipts related to Contests tab

_contruct() : is constructor which is used to call parent constructor 
I added this contructor because without it views were not loading 
if you have same problem with other controller please add this constructor


main() : function displays the main contest page on screen grabing data from  the two models 
              namely 'contest_model.php' and 'problem_model.php'


problem() : function displays clicked problem on screen grabbing data from 'problem_model.php' model





-by Aadil Hayat
-->




<?php

class Contests extends CI_Controller {
    
    function __construct(){
          parent::__construct();
    }  
    
    public function index(){
              
          $this->main();
     
    }
    public function main(){
            $data['title']="Contests";
            $data['active']="Contests";
          
        $this->load->view('header',$data);
        $this->load->view('body_nav',$data);    
       // $this->load->view("body_contests");
        $this->load->view('login');

         $this->load->model("contests_model");
         $data['contests_short_list']= $this->contests_model->get_all_contests_name_and_id();

        $this->load->view('contests_list',$data);
        
        $contest_id = $this->uri->segment(3);

       // echo '<h1>'.$contest_id.'</h1>';
       if($contest_id=="")           
            $contest_id = $data['contests_short_list'][0]->contest_id;



        $contest_data['contest_details'] = $this->contests_model->get_contest_by_id($contest_id); 


       // print_r($contest_data['contest_details']);

        if($contest_data['contest_details']=="none")
            redirect(base_url().'contests/main');
        else
        {

            $this->load->model('submission_model');
             $contest_data['users'] = $this->submission_model->no_of_users($contest_id);
             $contest_data['accepted_sub'] = $this->submission_model->no_of_submissions('%','%',$contest_id,111);
             $contest_data['total_sub'] = $this->submission_model->no_of_submissions('%','%',$contest_id,'%');

                $this->load->view('contests_main',$contest_data);
                //$this->load->view('contests_main_details',$contest_data);


                date_default_timezone_set('Asia/Calcutta');

                $time = date('Y-m-d H:i:s', time()-30);

                if($contest_data['contest_details'][0]->start_time < $time || $this->session->userdata('username')=="admin")
                {

                        $this->load->model("problems_model");
                        $problem_data['problems_list'] = $this->problems_model->get_problems_by_contest_id($contest_id);

                        
                        if($this->session->userdata('is_logged_in')==1)
                        {
                            $i=0;
                            foreach ($problem_data['problems_list'] as $p) 
                            {
                                //echo '<h1>'.$this->submission_model->no_of_submissions($this->session->userdata('username'),$p->problem_id,'%',111).'</h1>';
                                if($this->submission_model->no_of_submissions($this->session->userdata('username'),$p->problem_id,'%',111)>0)
                                    $problem_data['status'][$i] =1;
                                else if($this->submission_model->no_of_submissions($this->session->userdata('username'),$p->problem_id,'%','%')>0)
                                {
                                    if($this->submission_model->no_of_submissions($this->session->userdata('username'),$p->problem_id,'%',120)>0)
                                         $problem_data['status'][$i] =2;                   
                                    else if($this->submission_model->no_of_submissions($this->session->userdata('username'),$p->problem_id,'%',112)>0)
                                        $problem_data['status'][$I] =2;
                                    else if($this->submission_model->no_of_submissions($this->session->userdata('username'),$p->problem_id,'%',113)>0)
                                        $problem_data['status'][$i] =2;
                                    else if($this->submission_model->no_of_submissions($this->session->userdata('username'),$p->problem_id,'%',114)>0)
                                        $problem_data['status'][$i] =2;
                                    else
                                        $problem_data['status'][$i] =0;
                                }
                                else
                                    $problem_data['status'][$i] = 0;
                                //echo '<h1>'.$problem_data['status'].'</h1>';

                                $i++;
                            }
                        }


                        $this->load->view('contests_problems',$problem_data);

                    }


        }
    }
    public function problem (){
          
                
       // $this->load->view('body_problem') ;


        $this->load->model('problems_model');
        $problem_id = $this->uri->segment(3);

        if($problem_id !="")
        {

            $problem_data['problem_details'] = $this->problems_model->get_problem_by_id($problem_id);

            if($problem_data['problem_details']=="none")
                redirect(base_url().'contests/main');

            $data['title']="Problem";
            $data['active']="Contests";
          
            $this->load->view('header',$data);
            $this->load->view('body_nav',$data);
            $this->load->view('login');
            $this->load->view('problem_head',$problem_data);
            $this->load->view('problem_desc',$problem_data);
            if($this->session->userdata('is_logged_in')==1)
            {
                $this->load->view('problem_submission');
            }
            $this->load->model('submission_model');
            $r_subm['submissions'] = $this->submission_model->get_submissions('%','%','0','5','1','%',$problem_id);
            $r_subm['problem_name'] = $problem_data['problem_details'][0]->problem_name ;
            $r_subm['problem_id'] = $problem_data['problem_details'][0]->problem_id ;
            $r_subm['total_sub'] = $this->submission_model->no_of_submissions('%',$problem_id,'%','%');
            $r_subm['accepted_sub'] = $this->submission_model->no_of_submissions('%',$problem_id,'%',111);
            // echo '<h1>';
            // print_r($r_subm['submissions']->result());
            // echo '</h1>';

            $this->load->view('problem_recent_submissions',$r_subm);
           // $this->load->view('problem_user_submissions');
        }
        else
        {
            redirect(base_url().'contests/main');
        }

    }
    
}

?>
