

						<div class="ui ribbon label">Submission</div><br><br>

						<!-- <form action="<?php echo base_url() ; ?>backend/upload.php" name="fileupload" >

						<input type="file" name="file" />
						<input type="submit" />
						</form>
	 -->

	 			<!--		<script type="text/javascript" src="<?php echo base_url();?>scripts/form.js"></script>
	 						<script src="http://malsup.github.com/jquery.form.js"></script>
	 						
	-->
							<script type="text/javascript" src="<?php echo base_url();?>scripts/form.js"></script>
	 					
							



						<form action="<?php echo base_url().'submission/upload/'.$this->uri->segment(1).'/'.$this->uri->segment(3) ;?>" method="POST" enctype="multipart/form-data">
						<input type="file" name="file"  id="file" >
						
						<select name="lang" id="name">
				            <option value="c" >C</option>
				            <option value="cpp">C++</option>
				            <option value="java">Java</option>
				        </select>
						<input type="submit" name="submit" value="Submit" >
						</form>	


						<div class="ui small modal submission">
						  <i class="close icon"></i>
						  <div class="header" id="submission_header"></div>
						  <div class="content" id="submission_content"></div>					  
						</div>
						    
	         			



						<script>

							function getstatus(id)
							{
								//alert(id);
								base_url = '<?php echo base_url(); ?>';
								$.post(base_url+'submission/getstatus/'+id, function(data) {
							        //alert(data);  // process results here

							        stat = data%1000;
							        file = (data - stat)/1000 ;

							        if(stat == 0)
							        {
							        	$('#submission_content').html('<div class="ui center aligned segment"><h2>Staging <img src="'+base_url+'styles/images/4.gif"></img></h2></div>');
							        }
							        
							        if(stat==100)
							        {
							        	$('#submission_content').html('<div class="ui blue inverted center aligned segment"><h2>Compiling <img src="'+base_url+'styles/images/4.gif"></img></h2></div>');
							        }
							        if(stat==120)
							        {
							        	$('#submission_content').html('<div class="ui red inverted center aligned segment"><h2>Compilation Error <i class="remove icon"></i></h2></div>');
							        }
							        if(stat==110)
							        {
							        	$('#submission_content').html('<div class="ui teal inverted center aligned segment"><h2>Running ('+file+') <img src="'+base_url+'styles/images/4.gif"></img></h2></div>');
							        }
							        if(stat==112)
							        {
							        	$('#submission_content').html('<div class="ui red inverted center aligned segment"><h2>Wrong Answer <i class="remove icon"></i></h2></div>');
							        }
							        if(stat==113)
							        {
							        	$('#submission_content').html('<div class="ui red inverted center aligned segment"><h2>Runtime Error <i class="remove icon"></i></h2></div>');
							        }
							        if(stat==114)
							        {
							        	$('#submission_content').html('<div class="ui red inverted center aligned segment"><h2>Time Limit Extended <i class="remove icon"></i></h2></div>');
							        }
							         if(stat==111)
							        {
							        	$('#submission_content').html('<div class="ui green inverted center aligned segment"><h2>Accepted <i class="checkmark icon"></i></h2></div>');
							        }

							        if(stat<111)
							        setTimeout(getstatus(id),1000);
							    });
								 
							}

							

						        (function() {

						        	$('.ui.small.modal.submission').modal();

						           

						            $('form').ajaxForm({					                
						                complete: function(data) {
						                    alert(data.responseText);
						                    var parsed = JSON.parse(data.responseText);
						                    //alert(parsed.msg);

						                    if(parsed.uploaded == 0)
						                    {
						                    	//$('#submission_header').html('<h3><i class="attention icon"></i> Error</h3>');
						                    	$('#submission_header').html('<div class="ui red icon message">'+
						                    	'<i class="attention icon"></i>'+
	  											'<div class="content">'+parsed.msg+
	    										'</div></div>');
	    										$('#submission_content').html('');
						                    	
						                    }
						                    else
						                    {
						                    	$('#submission_header').html('<i class="tasks icon"></i> Submission Status');
						                    	getstatus(parsed.id);
						                    	// $('#submission_content').html('hello');
						                    }




						                    $('.ui.modal.submission').modal('show');

						                }
						            });
						        })();

						    </script> 

						    <br><br> <br><br>                 


	                 
