			<div class = "three wide column">


			<table class="ui inverted table segment">
			  <thead>
			    <tr>
			    	<th></th>
				    <th>Problem Name</th>
				    <th>Problem ID</th>
				    <th>Contest Name</th>
				    <th>Contest ID</th>
				    <th>Rejudge</th>
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
					echo '<td><a id="edit_on_table" href="'.base_url()."admin/edit_problem/".$query->result()[$i]->problem_id.'">';
					echo $query->result()[$i]->problem_name.'</div></a></td>';
					echo "<td>".$query->result()[$i]->problem_id."</td>";
					echo "<td>".$query->result()[$i]->contest_name."</td>";
					echo "<td>".$query->result()[$i]->contest_id."</td>";
					echo '<td> <div class="ui red icon button" onclick="rejudge_problem(';
					echo "'".base_url()."','";
					echo $query->result()[$i]->problem_id;
					echo "'";
					echo '); "><i class = "refresh icon"> </i></div>';
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