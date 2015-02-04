<div id="grid">

<div class="ui grid">
	<div class="row">
			<div class="column">
				<div class="ui red center aligned  inverted segment small header">
					<?php

					

					if($exists == 0)
					{
						echo 'No Such File Exists' ;
						
					}
					else if ($is_visible == 0)
					{
							echo 'Permission Denied' ;
							
					}
					else
						echo 'Source Code' ;

					

					?>
				</div>
			</div>
	</div>
