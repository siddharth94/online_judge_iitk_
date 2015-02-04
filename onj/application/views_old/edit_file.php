<div class = "five wide column">
				<div class="ui form">
					<div class="ui form segment">
						
					<div class = "ui top attached label red"><b>Edit Input/Output Files</b></div>

						<form name="edit_file" id="edit_file" method="post" action="<?php echo base_url();?>admin/edit_file_submit" enctype="multipart/form-data">

						    <div class="ui label"><h3>
						      Edit file of problem:</h3>
						    </div>

                            <div class="ui selection dropdown" name="problem_to_change" id="problem_to_change">
                          		<div class="default text">Problem ID</div>
                          		<i class="dropdown icon"></i>
                          		<div class="menu">

 	                      		<?php 

                      				$problem_list = "SELECT * FROM problems ORDER BY problem_id ASC";
                      				$query = $this->db->query($problem_list);
                      				foreach($query->result() as $row)
                      				{
                      					echo "<div class='item' value='".$row->problem_id."'>".$row->problem_id."</div>";
                      				}

                      			?>
                            	</div>
                        	</div>
                        	
                        	<br><br>
                        	<br><br>
                        	<br><br>
                        	<br><br>
                        	<br><br>
                        	<br><br>
                        	<br><br>
                        	<br><br>
                        	<br><br>
                        	<br><br>
                        	<br><br>
<!-- style="display:none" -->
	                        <div class="field" id="problem_id_div">
	                        	<input  name="problem_id" id="problem_id" style="display:none" value="" onchange="show_input(<?php echo base_url(); ?>,this);show_output(<?php echo base_url(); ?>,this);"></input>
	                        </div>

	                        <div class="two fields">
								
								<div id="edit_input_file" class="field">
	          					</div><br>

	          					<div id="edit_output_file" class="field">
	          					</div>
          					</div> 