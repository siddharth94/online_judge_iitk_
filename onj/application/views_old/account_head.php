<div id="grid">

	<div class="ui two column divided grid">
		<div class="row">
			<div class="column">
				<div class="ui red inverted center aligned segment">
 				<h3>
 				<?php
 				if($is_user==1)
 					echo $user[0]->name."'s  Acccount";
 				else
 					echo "No Such User Registered" ;
 				 ?>
 				 </h3>
				</div>

			</div>
		</div>
