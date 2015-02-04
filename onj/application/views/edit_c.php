			<div class = "four wide column" id="add_contest_column">
				<div class="ui form">
					<div class="ui form segment">
						
					<div class = "ui top attached label red"><b>Edit Problem</b></div>

						<form name="edit_contest" id="edit_contest" method="post" action="<?php echo base_url();?>admin/edit_contest_submit">
								  
							<div class="two fields">

								<div class="field">
							    	<label><h3>Contest Name: </h3></label>
								    <input type="text" name="contest_name" id="contest_name" value="<?php echo $contest_name;?>">
							  	</div>

								<div class="field">
							    	<label><h3>Contest ID: </h3></label>
								    <input type="text" name="contest_id" id="contest_id" value="<?php echo $contest_id;?>">
								    <div id="icon"></div>
							  	</div>							  	
						  	
						 	</div>

							<div class="four fields">

								<div class="ten wide field">
							    	<label><h3>Start Date: </h3></label>
								    <input type="text" name="start_date" id="start_date" value="<?php echo $start_time;?>">
							  	</div>

								<div class="two wide field">
									<label><h3>Start Time: </h3></label>
									<div class="ui selection dropdown" id="start_time_hour">
			                        	<div class="default text">Hour</div>
	            			            <i class="dropdown icon"></i>
	                        			<div class="menu">
	                        				<?php
	                        				for($i=1;$i<13;$i++)
		                        				echo '<div class="item" data-value="'.$i.'">'.$i.'</div>';
	                        				?>
							  			</div>
							  		</div>
							  	</div>
	                        		<input  name="start_hour" id="start_hour" style="display:none" value=""></input>
							  	
							  	<div class="two wide field">
							  		<label><h3><pre> </pre> </h3></label>
							  		<div class="ui selection dropdown" id="start_time_minute">
			                        	<div class="default text">Minute</div>
	            			            <i class="dropdown icon"></i>
	                        			<div class="menu">
	                        				<?php
	                        				for($i=0;$i<60;$i+=15)
		                        				echo '<div class="item" data-value="'.$i.'">'.$i.'</div>';
	                        				?>
							  			</div>
							  		</div>
							  	</div>
	                        		<input  name="start_minute" id="start_minute" style="display:none" value=""></input>

							  	<div class="one wide field">
							  		<label><h3><pre> </pre> </h3></label>
							  		<div class="ui selection dropdown" id="start_time_ampm">
			                        	<div class="default text">AM/PM</div>
	            			            <i class="dropdown icon"></i>
	                        			<div class="menu">
	                        				<div class="item" data-value="0">AM</div>
	                        				<div class="item" data-value="12">PM</div>
							  			</div>
							  		</div>
							  	</div> 
							  </div>
	                        		<input  name="start_ampm" id="start_ampm" style="display:none" value=""></input>

							<div class="four fields">

								<div class="ten wide field">
							    	<label><h3>End Date: </h3></label>
								    <input type="text" name="end_date" id="end_date">
							  	</div>

								<div class="two wide field">
									<label><h3>End Time: </h3></label>
									<div class="ui selection dropdown" id="end_time_hour">
			                        	<div class="default text">Hour</div>
	            			            <i class="dropdown icon"></i>
	                        			<div class="menu">
	                        				<?php
	                        				for($i=1;$i<13;$i++)
		                        				echo '<div class="item" data-value="'.$i.'">'.$i.'</div>';
	                        				?>
							  			</div>
							  		</div>
							  	</div>
	                        		<input  name="end_hour" id="end_hour" style="display:none" value=""></input>
							  	
							  	<div class="two wide field">
							  		<label><h3><pre> </pre> </h3></label>
							  		<div class="ui selection dropdown" id="end_time_minute">
			                        	<div class="default text">Minute</div>
	            			            <i class="dropdown icon"></i>
	                        			<div class="menu">
	                        				<?php
	                        				for($i=0;$i<60;$i+=15)
		                        				echo '<div class="item" data-value="'.$i.'">'.$i.'</div>';
	                        				?>
							  			</div>
							  		</div>
							  	</div>
	                        		<input  name="end_minute" id="end_minute" style="display:none" value=""></input>

							  	<div class="one wide field">
							  		<label><h3><pre> </pre> </h3></label>
							  		<div class="ui selection dropdown" id="end_time_ampm">
			                        	<div class="default text">AM/PM</div>
	            			            <i class="dropdown icon"></i>
	                        			<div class="menu">
	                        				<div class="item" data-value="0">AM</div>
	                        				<div class="item" data-value="12">PM</div>
							  			</div>
							  		</div>
							  	</div> 
							  </div>
	                        		<input  name="end_ampm" id="end_ampm" style="display:none" value=""></input>

							  
						 	</div>
						  	
						  	<div class="ui small error red icon message" id="errormsg">
		            			<i class="attention icon"></i>
		                		<div class="content" id = "edit_problem_error"> 
		                		<!-- Javascript works here -->
		                		</div>
          					</div>

          					<script>$(populate_files('<?php echo base_url(); ?>','<?php echo $problem_id; ?>','<?php echo $num_input_file; ?>'));</script>

							<div id="populate_in"></div>
							<div id="populate_out"></div>

						  	<div class="ui red submit button" onclick="submit();">edit Problem</div>

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