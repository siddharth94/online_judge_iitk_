<!-- account_title.php starts -->

<div id="grid">

	<div class="ui two column divided grid">
		<div class="row">
			<div class="column">
				<div class="ui red inverted center aligned segment">
 				<h3>
 				<?php
 				if($is_user==1)
 				 foreach($user as $u){echo $u->name."'s  Acccount";}
 				else
 					echo "No Such User Registered" ;
 				 ?>
 				 </h3>
				</div>

			</div>
		</div>

<!-- account_title.php ends -->
<!-- account_body.php starts -->




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
								  <tfoot>
								    <tr><th colspan="3">
								    <?php
								    	if($logged_in ==1)
								    		echo '<div class="ui mini red labeled icon button"><i class="edit icon"></i> Edit Profile</div>';
								    ?>
								      
								    </th>
								  </tr></tfoot>
								</table>


						   </div>
						  <div class="title ui header">
						    <i class="checkmark icon "></i>
						    Succesful Submissions
						  </div>
						  <div class="content">

						  	<table class="ui basic table">
							  <thead>
							    <tr><th>Problem Name</th>
							    <th>Contest/Practice</th>
							    <th>Time</th>
							  </tr></thead>
							  <tbody>
							    <tr>
							      <td>Compiler and Parsers</td>
							      <td>May long Challenge</td>
							      <td>0.2 s</td>
							    </tr>
							    <tr>
							      <td>Ups and Downs</td>
							      <td>Medium</td>
							      <td>1.3 s</td>
							    </tr>
							    <tr>
							      <td>Build the tree</td>
							      <td>May Cook Off</td>
							      <td>1.5 s</td>
							    </tr>
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
								    <th>Problems Submitted</th>
								    <th>Submissions Accepted</th>
								    <th>Rank</th>
								  </tr>
								  </thead>
								  
								  <tbody>
								    <tr>
								      <td>May Long Challenge</td>
								      <td>38</td>
								      <td>7</td>
								      <td>14</td>
								      
								    </tr>
								    <tr>
								      <td>May Cook Off</td>
								      <td>38</td>
								      <td>7</td>
								      <td>14</td>
								      
								    </tr>
								    <tr>
								      <td>May Lunchtime</td>
								      <td>38</td>
								      <td>7</td>
								      <td>14</td>
								    </tr>
								    
								  </tbody>
							</table>

							 

						  </div>


						  <div class="title ui header">
						    <i class="users icon "></i>
						   Teams
						  </div>

						  <div class="content">

						  	<div class="accordion">
							  <div class="active title ui small header">
							    <i class="users icon"></i>
							    Illuminaties
							  </div>
							  <div class="active content">
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


						  <div class="title ui header">
						    <i class="tasks icon "></i>
						   Statistics
						  </div>
						  <div class="content">
						  	<table class="ui basic table">
							  
							  <tbody>
							    <tr>
							      <td>Problems Submitted</td>
							      <td>38</td>
							      
							    </tr>
							    <tr>
							      <td>Problems Accepted</td>
							      <td>18</td>
							      
							    </tr>
							    <tr>
							      <td>Problems Rejected</td>
							      <td>20</td>
							    </tr>
							    <tr>
							      <td>Compilation Errors</td>
							      <td>5</td>
							    </tr>
							    <tr>
							      <td>Wrong Answers</td>
							      <td>13</td>
							    </tr>
							    <tr>
							      <td>Runtime Errors</td>
							      <td>2</td>
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
				     </div>
				  <div class="title ui header">
				    <i class="dropdown icon"></i>
				    Notifications
				  </div>
				  <div class="content">
				   	  </div>
				</div>

    		
    	</div>
    	</div>
    	

    </div>

	

</div>

<!-- account_body.php ends -->
