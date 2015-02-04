			<div class = "four wide column">
				<div class="ui form">
					<div class="ui form segment">
						
					<div class = "ui top attached label red"><b>Edit Problem</b></div>

						<form name="edit_problem" id="edit_problem" method="post" action="<?php echo base_url();?>admin/edit_problem_submit" enctype="multipart/form-data">
								  
							<div class="three fields">

								<div class="field">
							    	<label><h3>Problem Name: </h3></label>
								    <input type="text" name="problem_name" id="problem_name" value="<?php echo $problem_name;?>">
							  	</div>

								<div class="field">
							    	<label><h3>Problem ID: </h3></label>
								    <input type="text" name="problem_id" id="problem_id" value="<?php echo $problem_id;?>">
								    <div id="icon"></div>
							  	</div>

							  	<div class="field">
							    	<label><h3>Points: </h3></label>
								    <input type="text" name="points" id="points" value="<?php echo $points;?>">
							  	</div>							  	
						  	
						 	</div>

						 	<div class="field">
						 		<input name = "prob_id_ori" id = "prob_id_ori" style = "display:none" value="<?php echo $problem_id;?>"></input>
						 	</div>

						  	<div class="field">
						    	<label><h3>Problem Statement: </h3></label>
							    <textarea class="rich" name="problem_statement" id="problem_statement"><?php echo $problem_statement;?></textarea>
						  	</div>

						  	<div class = "ui horizontally divided grid">

							  	<div class="eleven wide column field">
							    	<label><h3>Short Description: </h3></label>
								    <textarea name="short_desc" id="short_desc"><?php echo $short_desc;?></textarea>
							  	</div>

							  	<div class="five wide column field">
							    	<label><h3>Constraints: </h3></label>
								    <textarea name="constraints" id="constraints"><?php echo $constraints;?></textarea>
							  	</div>

							</div>

						  	<div class="two fields">

							  	<div class="field">
							    	<label><h3>Input Description: </h3></label>
								    <textarea name="input_desc" id="input_desc"><?php echo $input_desc;?></textarea>
							  	</div>

							  	<div class="field">
							    	<label><h3>Output Description: </h3></label>
								    <textarea name="output_desc" id="output_desc"><?php echo $output_desc;?></textarea>
							  	</div>	  	

							</div>

							<div class="two fields">

							  	<div class="field">
							    	<label><h3>Sample Input: </h3></label>
								    <textarea name="sample_input" id="sample_input"><?php echo $sample_input;?></textarea>
							  	</div>

								<div class="field">
							    	<label><h3>Sample Output: </h3></label>
								    <textarea name="sample_output" id="sample_output"><?php echo $sample_output;?></textarea>
							  	</div>

							</div>

							<div class="four fields">

							  	<!-- <div class="field">
							    	<label><h3>Number of input files: </h3></label>
								    <input type="number" name="num_input_file" id="num_input_file" onchange="edit_input(this);edit_output(this);"></input>
							  	</div> -->							
								<div class="field">
							    	<label><h3>Time Limit</h3></label>
								    <input type="number" name="time_limit" id="time_limit" placeholder="in seconds" value="<?php echo $time_limit;?>"></input>
							  	</div>

							  	<div class="field">
							    	<label><h3>Memory Limit: </h3></label>
								    <input type="number" name="mem_limit" id="mem_limit" placeholder="in MB" value="<?php echo $mem_limit;?>"></input>
							  	</div>
								
								<div class="field">
							    	<label><h3>Difficulty: </h3></label>
								    <input type="number" name="difficulty" id="difficulty" placeholder="'1' : Easy . . . '3' : Difficult" value="<?php echo $difficulty;?>"></input>
							  	</div>				  	

						  	</div>

						  	<div class="ui small error red icon message" id="errormsg">
		            			<i class="attention icon"></i>
		                		<div class="content" id = "edit_problem_error"> 
		                		<!-- Javascript works here -->
		                		</div>
          					</div>

          					<!--<script>$(populate_files('<?php echo base_url(); ?>','<?php echo $problem_id; ?>','<?php echo $num_input_file; ?>'));</script>

							<div id="populate_in"></div>
							<div id="populate_out"></div>
-->
						  	<div class="ui red submit button" onclick="submit_edit_problem(); ">edit Problem</div>
					</form>


						<?php
							$prob_id = $this->uri->segment(3);
							$query = $this->db->get_where("problems",array("problem_id" => $prob_id));
							$num_file = $query->result()[0]->num_input_file;
							for ($i = 1; $i <= $num_file; $i++)
							{
								// echo '<h1>'.$num_file.'</h1>';
								// echo "<div class = 'ui label'><b>Add Input Files : </b></div><br>";
								// echo "";
								echo'<form name="edit_file'.$i.'" id="edit_file'.$i.'" method="post" action="'.base_url().'admin/edit_file_submit" enctype="multipart/form-data"> ';
								echo '<div class="two fields">';
								echo '<div class="field">';
								echo "<a href='".base_url()."backend/problems/".$prob_id."/".$i.".in'> input file ".$i.".in</a>";
	          					echo '</div><br>';
								echo '<div id="edit_input_file'.$i.'" class="field">';
								echo "<input type='file' name='infile".$i."' id='infile".$i."'>".$i.".in</input><br>";
	          					echo '</div><br>';
								echo '<div class="field">';
	          					echo "<a href='".base_url()."backend/problems/".$prob_id."/".$i.".out'> output file".$i.".out</a> ";
	          					echo '</div><br>';
								echo '<div id="edit_output_file'.$i.'" class="field">';
								echo "<input type='file' name='outfile".$i."' id='outfile".$i."'>".$i.".out </input><br>";
	          					echo '</div><br>';
								echo '<input  name="file_id" id="file_id" style="display:none" value="'.$i.'"></input>';
								echo '</div>';
								echo '<div class="field">';
	                        	echo '<input  name="num_input_file" id="num_input_file" style="display:none" value="'.$i.'"></input>';
	                        	echo '</div>';
	                        	echo '<div class="field">';
	                        	echo '<input name="problem_id" id="problem_id" style="display:none" value="'.$prob_id.'"></input>';
	                        	echo '</div>';
								echo '<div class="ui red submit button" onclick="submit_edit_file(';
								echo "'";
								echo 'edit_file'.$i;
								echo "'";
								echo '); ">upload file</div>';
								echo '</form>';
							}
						?>

						<form name="append_file" id="append_file" method="post" action="<?php echo base_url();?>admin/edit_file_append/<?php echo ($this->uri->segment(3)); ?>" enctype="multipart/form-data"> 
							<div class="field">
						    	<label><h3>Number of input files: </h3></label>
							    <input type="number" name="num_input_file" id="num_input_file" onchange="add_input(this);add_output(this);"></input>
						  	</div>	

						  	<div class="two fields">
								
								<div id="add_input_file" class="field">
	          					</div><br>

	          					<div id="add_output_file" class="field">
	          					</div>
          					</div>
						  	<div class="ui red submit button" onclick="submit_append_file();">Append Files</div>
						</form>



						<!-- <div class="ui small red icon message">
		            			<i class="attention icon"></i>
		                		<div class="content" id = "edit_problem_error">  You are wrong. 
		                		
		                		</div>
          					</div> -->

				  	</div>
						<br>
						<br>

				</div>
			</div>