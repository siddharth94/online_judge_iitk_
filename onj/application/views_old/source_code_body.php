
	<div class="row">

		<div class=" five wide column">
			
			<div class="ui raised segment">
			<div class="ui top black attached label">Submission Details</div>
			<table class="ui large  table segment">
			  
			  <tbody>
			    <tr class="">
			      <td>User</td>
			      <td><a href = <?php echo '"'.base_url().'users/account/'.$sub_data->result()[0]->username.'">'.$sub_data->result()[0]->username ; ?></a></td>
			      
			    </tr>
			    <tr class="">
			      <td>Problem Id</td>
			      <td><?php echo $sub_data->result()[0]->prob_id ;?></td>
			      
			    </tr>
			    <tr class="">
			      <td>Contest Id</td>
			      <td><?php 
			      if($sub_data->result()[0]->contestid == "practice")
			      	echo "Practice" ;
			      else 
			      	echo $sub_data->result()[0]->contestid ;

			       ?></td>
			      
			    </tr>
			  </tbody>
			 
			</table>

			<table class="ui large  table segment">
			  
			  <tbody>
			    <tr class="">
			      <td>Status</td>
			      <td
			      <?php
			      echo 'class ="' ;

			      if($sub_data->result()[0]->status%1000>111)
			      	echo 'negative';
			      else if($sub_data->result()[0]->status%1000 == 111)
			      	echo 'positive' ;
			      else 
			      	echo 'active';



			      echo '">' ;

			      	switch ($sub_data->result()[0]->status%1000) {
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

                         echo $status ;

                    ?>

			      </td>
			      
			    </tr>
			    <tr class="">
			      <td>Language</td>
			      <td><?php echo strtoupper($sub_data->result()[0]->lang) ;?></td>
			      
			    </tr>
			    <tr class="">
			      <td>Run Time</td>
			      <td><?php 
			      	if($sub_data->result()[0]->status ==111)
			      		echo $sub_data->result()[0]->runtime;
			      	else 
			      		echo '-';

			      		 ;?></td>
			      
			    </tr>
			    <tr class="">
			      <td>Memory</td>
			      <td>
			      <?php 
			      	if($sub_data->result()[0]->status ==111)
			      		echo $sub_data->result()[0]->memory;
			      	else 
			      		echo '-';

			      ?></td>
			      
			    </tr>
			    <tr class="">
			      <td>Points</td>
			      <td>
			      <?php 
			      	
			      		echo $sub_data->result()[0]->points;
			      	

			      ?></td>
			      
			    </tr>
			  </tbody>
			 
			</table>



			</div>
		</div>
		<div class="eleven wide column">


			<div class="ui raised segment">
			<div class="ui top black attached label">Code</div>
			<link href="<?php echo base_url();?>prism.css" rel="stylesheet" />
			<script src="<?php echo base_url();?>prism.js"></script>

			<br><br>
			
			<pre><code class="language-<?php echo $sub_data->result()[0]->lang; ?>"><?php $file = file_get_contents("backend/submissions/".$sub_data->result()[0]->id.".".$sub_data->result()[0]->lang); echo htmlspecialchars(trim($file, '\t\n')) ;
			//echo htmlspecialchars(readfile("uploads/1.c"));		
			?> </code></pre>
<!-- .$sub_data->result()[0]->status.".".$sub_data->result()[0]->lang -->

<!-- #include <stdio.h>

int main (){

	int i , j ;

	scanf ("%d %d",&i,&j);
	
	printf ("%d\n",i+j);
	
	return 0;

}
 -->
			
			 </div>

		</div>

	</div>

</div>


</div>

</body>
</html>