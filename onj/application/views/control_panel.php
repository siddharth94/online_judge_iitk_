			<div class = "four wide column">

				<div class="ui fluid accordion">
					<div class="active title">
                    	<i class="dropdown icon"></i>
                    	Remove Problems
    	            </div>
	                
	                <div class="active content">
	                	<table class="ui inverted table segment">
						  <thead>
						    <tr>
						    	<th></th>
							    <th>Problem Name</th>
							    <th>Problem ID</th>
							    <th>Contest Name</th>
							    <th>Contest ID</th>
						  </tr></thead>
						  <tbody>
						<?php 

							$query = $this->db->get('problems');

							$i=0;
							
							// echo $i;
							$num = $query->num_rows();
							for (; $i < $num; $i++)
							{
								echo "<tr>"; 
								echo "<td>".($i+1)."</td>";
								echo '<td><a href="" id="edit_on_table"><div onclick="confirm_remove(';
								echo "'".base_url()."','".$query->result()[$i]->problem_id."');";
								echo '">';
								//echo '<td><a id="edit_on_table href="'.base_url()."admin/remove_problem/".$query->result()[$i]->problem_id.'""><div onclick="confirm(';
								//echo "'You are about to delete ".$query->result()[$i]->problem_id	."')";
								//echo ';">';
								echo $query->result()[$i]->problem_name.'</div></a></td>';
								echo "<td>".$query->result()[$i]->problem_id."</td>";
								echo "<td>".$query->result()[$i]->contest_name."</td>";
								echo "<td>".$query->result()[$i]->contest_id."</td>";
								echo "</tr>";	
							}
						
						?>
						  </tbody>
						  <!-- <tfoot>
						    <tr><th>3 People</th>
						    <th>2 Approved</th>
						    <th></th>
						  </tr></tfoot> -->
						</table>
					</div>


			</div>
