<div id = "grid">
	<div class = "ui horizontally divided grid">
		<div class = "two column row">
			<div class = "two wide column">
				<div class = "ui raised left aligned segment custom-width">

					<div class = "ui top attached label red"><b>Menu</b></div>
					
					<div class = "ui divided list">
						
						<div class = "item">
							<i class = "add large <?php if ($menu_option_selected == 'add_problem') echo "active red"; ?> icon"></i>
							<div class = "content">
								<a class = "ui small header <?php if ($menu_option_selected == 'add_problem') echo "red"; ?>" onclick = "open_admin_menu('add_problem','<?php echo base_url(); ?>');">
									 Add Problem 
								</a>
							</div>
						</div>

						<div class = "item">
							<i class = "add sign large <?php if ($menu_option_selected == 'add_contest') echo "active red"; ?> icon"></i>
							<div class = "content">
								<a class = "ui small header <?php if ($menu_option_selected == 'add_contest') echo "red"; ?>" onclick = "open_admin_menu('add_contest','<?php echo base_url(); ?>');">
									 New Contest
								</a>
							</div>
						</div>

						<div class = "item">
							<i class = "edit large <?php if ($menu_option_selected == 'edit_problem') echo "active red"; ?> icon"></i>
							<div class = "content">
								<a class = "ui small header <?php if ($menu_option_selected == 'edit_problem') echo "red"; ?>" onclick = "open_admin_menu('edit_problem','<?php echo base_url(); ?>');">
									 Edit Problem 
								</a>
							</div>
						</div>

						
						<div class = "item">
							<i class = "edit sign large <?php if ($menu_option_selected == 'edit_contest') echo "active red"; ?> icon"></i>
							<div class = "content">
								<a class = "ui small header <?php if ($menu_option_selected == 'edit_contest') echo "red"; ?>" onclick = "open_admin_menu('edit_contest','<?php echo base_url(); ?>');">
									 Edit Contest
								</a>
							</div>
						</div>


						<div class = "item">
							<i class = "setting large <?php if ($menu_option_selected == 'control_panel') echo "active red"; ?> icon"></i>
							<div class = "content">
								<a class = "ui <?php if ($menu_option_selected == 'control_panel') echo "red"; ?> small header" onclick = "open_admin_menu('control_panel','<?php echo base_url(); ?>');">
									Control Panel
								</a>
							</div>
						</div>

					</div>
				</div>
			</div>
