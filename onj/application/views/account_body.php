


  		<div class="two column row">
    		<div class="ten wide column">
		    		<div class="ui fluid accordion">

						  <div class="active title ui header">
						    <i class="user icon"></i>		   
				  			Profile			
						  </div>
						  <div class="active content">

						  		<table class="ui large basic two column table segment">
								 
								  <tbody>
								    <tr>
								      <td>Name</td>
								      <td><?php foreach($user as $u){echo $u->name;}?></td>
								      
								    </tr>
								    <tr>
								      <td>Email Id</td>
								      <td><?php foreach($user as $u){echo $u->emailId;}?></td>
								      
								    </tr>
								    <tr>
								      <td>College</td>
								      <td><?php foreach($user as $u){echo $u->College;}?></td>
								      
								    </tr>
								  </tbody>
								  <!-- <tfoot>
								    <tr><th colspan="3">
								    <?php
								    	if($logged_in ==1)
								    		echo '<div class="ui mini red labeled icon button"><i class="edit icon"></i> Edit Profile</div>';
								    ?>
								      
								    </th>
								  </tr></tfoot> -->
								</table>


						   </div>
						  <div class="title ui header">
						    <i class="checkmark icon "></i>
						    Succesful Submissions
						  </div>
						  <div class="content">

						  	<table class="ui basic table">
							  <thead>
							    <tr><th>Problem Id</th>
							    <th>Contest/Practice</th>
							    <th>Lang</th>
							    <th>Time</th>
							    <th>Code<th>
							  </tr></thead>
							  <tbody>
							  <?php

							  if($accepted_sub->num_rows > 0)
							  	foreach ($accepted_sub->result() as $sub) {
							  	echo '<tr>
							      <td>'.$sub->prob_id.'</td>
							      <td>'.$sub->contestid.'</td>
							      <td>'.strtoupper($sub->lang).'</td>
							      <td>'.$sub->runtime.' s</td>
							      <td><a href="'.base_url().'submission/show_code/'.$sub->id.'"" target="_blank"><div class="ui red icon button"><i class="code icon"></i></div></a></td>
							    </tr>' ;
							  	}
							  else
							  	echo '<tr>
							  		<td colspan="3">No Succesful Submissions Yet...</td>
							  	</tr>';
							    
							   ?>
							  </tbody>
							</table>
						  
						  </div>

						  <div class="title ui header">
						    <i class="checkered flag icon "></i>
						   Contests Attempted
						  </div>
						  <div class="content">

							  <table class="ui basic table">
								  	<thead>
								    <tr><th>Contest Name</th>
								    <!-- <th>Problems Submitted</th>
								    <th>Submissions Accepted</th> -->
								    <th>Rank</th>
								  </tr>
								  </thead>
								  
								  <tbody>
								  <?php

								    if($a_contest->num_rows > 0)
									  	foreach ($a_contest->result() as $r) {
									  	if($r->contestid != "practice")
									  	echo '<tr>
										      <td><a href="'.base_url().'contests/main/'.$r->contestid.'">'.$r->contestid.'</a></td>										     
										      <td>3</td>
										      
										    </tr>' ;
								  	}
								  else
								  	echo '<tr>
								  		<td colspan="3">No Contests Attempted Yet...</td>
								  	</tr>';
							    

								    
								   ?> 
								    
								  </tbody>
							</table>

							 

						  </div>


						  <!-- <div class="title ui header">
						    <i class="users icon "></i>
						   Teams
						  </div>

						  <div class="content">

						  	<div class="accordion">
							  <div class="title ui small header">
							    <i class="users icon"></i>
							    Illuminaties
							  </div>
							  <div class="content">
							  <h5 class="ui dividing header">
								  Members
								</h5>
								<div class="ui list">
								  <a class="item">
								    <i class="user icon"></i>
								    Triveni Mahatha
								  </a>
								  <a class="item">
								    <i class="user icon"></i>
								   Proneet Verma
								  </a>
								  <a class="item">
								    <i class="user icon"></i>
								   Siddharth Gupta
								  </a>
								  <a class="item">
								    <i class="user icon"></i>
								    Aadil Hayat
								  </a>
								</div>

								<h5 class="ui diving header">
								Contests Attempted
								</h5>
								<div class="ui list">
								  <p class="item">
								    <i class="checkered flag icon"></i>
								    May Long Challenge
								  </p>
								  <p class="item">
								    <i class="checkered flag icon"></i>
								  May Lunchtime
								  </p>
								  <p class="item">
									<i class="checkered flag icon"></i>
								   May Cookoff
								  </p>								  
								</div>


							     </div>
							  <div class="title ui small header">
							    <i class="users icon"></i>
							    Dark Knights
							  </div>
							  <div class="content">

							  	<h5 class="ui dividing header">
								  Members
								</h5>
								<div class="ui list">
								  <a class="item">
								    <i class="user icon"></i>
								    Triveni Mahatha
								  </a>
								  <a class="item">
								    <i class="user icon"></i>
								   Proneet Verma
								  </a>
								  <a class="item">
								    <i class="user icon"></i>
								   Siddharth Gupta
								  </a>
								  <a class="item">
								    <i class="user icon"></i>
								    Aadil Hayat
								  </a>
								</div>

								<h5 class="ui diving header">
								Contests Attempted
								</h5>
								<div class="ui list">
								  <p class="item">
								    <i class="checkered flag icon"></i>
								    May Long Challenge
								  </p>
								  <p class="item">
								    <i class="checkered flag icon"></i>
								  May Lunchtime
								  </p>
								  <p class="item">
									<i class="checkered flag icon"></i>
								   May Cookoff
								  </p>								  
								</div>


							   </div>
							  <div class="title ui small header">
							    <i class="users icon"></i>
							   The A Team
							  </div>
							  <div class="content">

							  <h5 class="ui dividing header">
								  Members
								</h5>
								<div class="ui list">
								  <a class="item">
								    <i class="user icon"></i>
								    Triveni Mahatha
								  </a>
								  <a class="item">
								    <i class="user icon"></i>
								   Proneet Verma
								  </a>
								  <a class="item">
								    <i class="user icon"></i>
								   Siddharth Gupta
								  </a>
								  <a class="item">
								    <i class="user icon"></i>
								    Aadil Hayat
								  </a>
								</div>

								<h5 class="ui diving header">
								Contests Attempted
								</h5>
								<div class="ui list">
								  <p class="item">
								    <i class="checkered flag icon"></i>
								    May Long Challenge
								  </p>
								  <p class="item">
								    <i class="checkered flag icon"></i>
								  May Lunchtime
								  </p>
								  <p class="item">
									<i class="checkered flag icon"></i>
								   May Cookoff
								  </p>								  
								</div>


							      </div>
							</div>


						  </div>

 -->
						  <div class="title ui header">
						    <i class="tasks icon "></i>
						   Statistics
						  </div>
						  <div class="content">
						  	<table class="ui basic table">
							  
							  <tbody>
							    <tr class="active">
							      <td>Total Submissions</td>
							      <td><?php echo $sub_t;?></td>
							      
							    </tr>
							    <tr class="positive">
							      <td>Submissions Accepted</td>
							      <td><?php echo $sub_a;?></td>
							      
							    </tr>
							    <tr class="negative">
							      <td>Submissions Rejected</td>
							      <td><?php echo $sub_t - $sub_a;?></td>
							    </tr>
							    <tr class="negative">
							      <td>Compilation Errors</td>
							      <td><?php echo $sub_ce;?></td>
							    </tr>
							    <tr class="negative">
							      <td>Wrong Answers</td>
							      <td><?php echo $sub_wa;?></td>
							    </tr>
							    <tr class="negative">
							      <td>Runtime Errors</td>
							      <td><?php echo $sub_rte;?></td>
							    </tr>
							    <tr class="negative">
							      <td>Time Limit Exceeded</td>
							      <td><?php echo $sub_tle;?></td>
							    </tr>
							  </tbody>
							</table>
						    </div>

						  
					</div>
    		</div>

    		<div class="six wide column">
    		
	    		<div class="ui fluid accordion">
				  <div class="active title ui header">
				    <i class="dropdown icon"></i>
				   Rankings
				  </div>
				  <div class="active content">
				   </div>
				  <div class="title ui header">
				    <i class="dropdown icon"></i>
				    Recent Submissions
				  </div>
				  <div class="content">

						<table class="ui large table segment">
		                     <thead>
		                    <tr>
		                    <th>Problem</th>
		                     <th>Lang</th>
		                    <th>Status</th><th>Code</th>
		                    </tr>
		                  </thead> 
		                    <tbody>

		                    <?php


		                    foreach($recent_sub->result() as $s)
		                    {

		                      switch ($s->status) {
		                        case 0:
		                          $status="Staging...";
		                          break;
		                        case 100:
		                          $status="Compiling...";
		                          break;
		                        case 110:
		                          $status="Running...";
		                          break;
		                        case 120:
		                          $status="Compilation Error";
		                          break;
		                        case 111:
		                          $status="Accepted";
		                          break;
		                        case 112:
		                          $status="Wrong Answer";
		                          break;
		                        case 113:
		                          $status="RunTime Error";
		                          break;
		                        case 114:
		                          $status="TLE";
		                          break;
		                        
		                        
		                      }
		                      if($s->status>111)
		                        $class="negative";
		                      else if($s->status==111)
		                        $class="positive";
		                      else
		                        $class="active";

		                      echo '<tr class="'.$class.'">';
		                      echo '<td >'.$s->prob_id.'</td>';
		                      echo '<td>'.strtoupper($s->lang).'</td>';
		                      echo '<td >'.$status.'</td>';
							  echo '<td><a href="'.base_url().'submission/show_code/'.$sub->id.'"" target="_blank"><div class="ui red icon button"><i class="code icon"></i></div></a></td>';

		                      // if($this->uri->segment(1)=="practice")
		                      // echo '<td><a href="#" onclick="alert(\'code is blocked\');" ><i class="code icon"></i></a></td>';
		                      echo '</tr>';
		                    }

		                    ?>


		                      
		                      
		                    </tbody>
		                    <tfoot>
		                      <?php
		                      if($recent_sub->num_rows==0)
		                        echo "<tr><th colspan='3'>No Submissions Yet</th></tr>" ;
		                      else
		                      {
		                       // if($this->session->userdata('is_logged_in')==1)
		                       // echo "<tr><th colspan='3'><div class='blue fluid ui button' onclick='show_submissions(\"".base_url()."\",\"submission/get_recent_submissions/null/".$problem_id."/all/0/0/10\");'>View All</div></th></tr>" ;
		                       // echo '<div class="ui icon button"><i class="refresh icon"></i></div>';
		                        //\'".base_url()."submissions/get_submissions/null/".$problem_id."/all/0/0/25\'

		                      }
		                      ?>

		                    </tfoot>
		                </table>


				     </div>
				  <!-- <div class="title ui header">
				    <i class="dropdown icon"></i>
				    Notifications
				  </div>
				  <div class="content">
				   	  </div> -->
				</div>

    		
    	</div>
    	</div>
    	

    </div>

	

</div>