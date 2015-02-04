			<div class = "five wide column">
				<div class="ui form">
					<div class="ui form segment">
						
					<div class = "ui top attached label red"><b>Add New Problem</b></div>

						<form name="add_problem" id="add_problem" method="post" action="<?php echo base_url();?>admin/new_problem" enctype="multipart/form-data">

							<!--Dropdown menu-->
	                        <!-- <div class="ui left aligned segment"> -->
								  <!-- <div class="inline field"> -->
								    <div class="ui label"><h3>
								      Add problem to:</h3>
								    </div>

	                            <div class="ui selection dropdown" name="contest_to_add_to" id="contest_to_add_to">
	                          		<div class="default text">Contest Name</div>
	                          		<i class="dropdown icon"></i>
	                          		<div class="menu">

	                            		<div class="item" value="practice">Practice</div>
	 	                      			<?php 

                          				$contest_list = "SELECT * FROM contests";
                          				$query = $this->db->query($contest_list);
                          				foreach($query->result() as $row)
                          				{
                          					echo "<div class='item' value='".$row->contest_id."'>".$row->contest_id."</div>";
                          				}

                          			?>
	                            	</div>
	                        	</div> 

	                        	
	                        	<br><br>
<!-- style="display:none" -->
	                        <div class="field" id="contest_id_div">
	                        	<input  name="contest_id" id="contest_id" style="display:none" value=""></input>
	                        </div>

							<div class="four fields">

								<div class="field">
							    	<label><h3>Problem Name: </h3></label>
								    <input type="text" name="problem_name" id="problem_name">
							  	</div>

								<div class="field">
							    	<label><h3>Problem ID: </h3></label>
								    <input type="text" name="problem_id" id="problem_id" >
								    <div id="icon"></div>
							  	</div>

							  	<div class="field">
							    	<label><h3>Points: </h3></label>
								    <input type="text" name="points" id="points">
							  	</div>
							  	
						  	
						 	</div>

						  	<div class="field">
						    	<label><h3>Problem Statement: </h3></label>
							    <textarea class="rich" name="problem_statement" id="problem_statement"></textarea>
						  	</div>

						  	<div class = "ui horizontally divided grid">

							  	<div class="eleven wide column field">
							    	<label><h3>Short Description: </h3></label>
								    <textarea name="short_desc" id="short_desc"></textarea>
							  	</div>

							  	<div class="five wide column field">
							    	<label><h3>Constraints: </h3></label>
								    <textarea name="constraints" id="constraints"></textarea>
							  	</div>

							</div>

						  	<div class="two fields">

							  	<div class="field">
							    	<label><h3>Input Description: </h3></label>
								    <textarea name="input_desc" id="input_desc"></textarea>
							  	</div>

							  	<div class="field">
							    	<label><h3>Output Description: </h3></label>
								    <textarea name="output_desc" id="output_desc"></textarea>
							  	</div>	  	

							</div>

							<div class="two fields">

							  	<div class="field">
							    	<label><h3>Sample Input: </h3></label>
								    <textarea name="sample_input" id="sample_input"></textarea>
							  	</div>

								<div class="field">
							    	<label><h3>Sample Output: </h3></label>
								    <textarea name="sample_output" id="sample_output"></textarea>
							  	</div>

							</div>

							<div class="four fields">

							  	<div class="field">
							    	<label><h3>Number of input files: </h3></label>
								    <input type="number" name="num_input_file" id="num_input_file" onchange="add_input(this);add_output(this);"></input>
							  	</div>

								<div class="field">
							    	<label><h3>Time Limit</h3></label>
								    <input type="number" name="time_limit" id="time_limit" placeholder="in seconds"></input>
							  	</div>

							  	<div class="field">
							    	<label><h3>Memory Limit: </h3></label>
								    <input type="number" name="mem_limit" id="mem_limit" placeholder="in MB"></input>
							  	</div>
								
								<div class="field">
							    	<label><h3>Difficulty: </h3></label>
								    <input type="number" name="difficulty" id="difficulty" placeholder="'1' : Easy . . . '3' : Difficult"></input>
							  	</div>				  	

						  	</div>

						  	<div class="ui small error red icon message" id="errormsg">
		            			<i class="attention icon"></i>
		                		<div class="content" id = "add_problem_error"> 
		                		<!-- Javascript works here -->
		                		</div>
          					</div>

          					<div class="two fields">
								
								<div id="add_input_file" class="field">
	          					</div><br>

	          					<div id="add_output_file" class="field">
	          					</div>
          					</div>

						  	<div class="ui red submit button" onclick="validate_pid(' <?php echo base_url();?>'); ">Add Problem</div>

						</form>

						<!-- <div class="ui small red icon message">
		            			<i class="attention icon"></i>
		                		<div class="content" id = "add_problem_error">  You are wrong. 
		                		
		                		</div>
          					</div> -->

				  	</div>
				</div>
			</div>