<div class = "three wide column">


			<table class="ui inverted table segment">
			  <thead>
			    <tr>
			    	<th></th>
				    <th>Contest Name</th>
				    <th>Contest ID</th>
			  </tr></thead>
			  <tbody>
			<?php 

				$query = $this->db->get('contests');

				$i=0;
				
				// echo $i;
				$num = $query->num_rows();
				for (; $i < $num; $i++)
				{
					echo "<tr>"; 
					echo "<td>".($i+1)."</td>";
					echo '<td><a id="edit_on_table" href="'.base_url()."admin/edit_contest/".$query->result()[$i]->contest_id.'">';
					echo $query->result()[$i]->contest_name.'</div></a></td>';
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