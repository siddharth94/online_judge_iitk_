<div id = "grid">

  <div class="ui horizontally divided grid">
    
    <div class="six wide column">
    	<div class="row">
    	<?php
    	 echo '<div class="fluid ui ';
    	 if($this->uri->segment(3)=="")
    	 	echo 'red';
    	 else 
    	 	echo 'black';
    	 echo '  button" ';
    	 echo ' onclick="open_ranking(\'\',\''.base_url().'\');"';
    	 echo '>Overall Rankings</div>';
    	?>
    	<br>

    	</div>
    	<div class="row">

    		<div class="ui raised left aligned segment ">
                <div class="ui red top attached label">Contests-Wise Rankings</div>
                    <div class="ui small divided list">
                           <?php
	                            $list ="";


	                            date_default_timezone_set('Asia/Calcutta');

	                            $time = date('Y-m-d H:i:s', time());

	                              foreach ($contests_short_list as $short_list) {
	                                $name = $short_list->contest_name ;
	                                $contest_id = $short_list->contest_id ;

	                                $start = abs(strtotime($time) - strtotime($short_list->start_time));
	                                $end = abs(strtotime($time) - strtotime($short_list->end_time));


	                                if($time>$short_list->start_time && $time<$short_list->end_time)
	                                {
	                                  $yrs = floor($end / (365*60*60*24));
	                                  $months = floor(($end - $yrs * 365*60*60*24) / (30*60*60*24));
	                                  $days = floor(($end - $yrs * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	                                  $hrs = floor(($end - $yrs * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/(60*60));
	                                  $min = floor(($end - $yrs * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hrs*60*60)/60);
	                                  



	                                  $temp = '<div class="item"><br>' ;
	                                  $temp .= ' <i class="checkered large flag icon"></i>' ;
	                                  $temp .= '<div class="right floated tiny green ui label"> Running' ;
	                                  //if()
	                                  $temp .= '</div>';
	                                  $temp .= ' <div class="content">';
	                                  $temp .= '<a class="ui ';
	                                  if($this->uri->segment('3')==$contest_id)
	                                    {
	                                    	$temp.= "red" ;
	                                    	$contest_name = $name ;
	                                    }
	                                  $temp.=' small header" onclick="open_ranking(\''.$contest_id.'\',\''.base_url().'\');" >'.$name.'</a><br>' ; 
	                                    //$temp.='about ';
	                                    if($yrs>0) $temp.= $yrs.' Years ' ;
	                                    if($months>0) $temp.= $months.' Months ' ;
	                                    if($days>0) $temp.= $days.' Days ' ;
	                                    if($hrs>0) $temp.= $hrs.' Hours ' ;
	                                    else
	                                    {
	                                    if($min==0 ) $temp.= '1 minutes ' ;
	                                    else $temp.= $min.' minutes ';
	                                    }
	                                    $temp.=' to end' ;

	                                  $temp .= '</div></div>' ;

	                                  $list = $temp.$list ;
	                                }
	                                else
	                                {
	                                  $yrs = floor($start / (365*60*60*24));
	                                  $months = floor(($start - $yrs * 365*60*60*24) / (30*60*60*24));
	                                  $days = floor(($start - $yrs * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	                                  $hrs = floor(($start - $yrs * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/(60*60));
	                                  $min = floor(($start - $yrs * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hrs*60*60)/60);
	                                  

	                                  $list .= '<div class="item"><br>' ;
	                                  $list .= ' <i class="checkered large flag icon"></i>' ;
	                                  
	                                  if($time<$short_list->start_time)
	                                  {
	                                    $list .= '<div class="right floated tiny blue ui label"> Upcoming' ;
	                                  }                                              
	                                  else
	                                  {
	                                    $list .= '<div class="right floated tiny ui label"> Past' ;
	                                  }
	                                  $list .= '</div>';
	                                  $list .= ' <div class="content">';
	                                  $list .= '<a class="ui ';
	                                  if($this->uri->segment('3')==$contest_id)
	                                  {
	                                    $list.= "red" ;
	                                    $contest_name=$name;
	                                  }
	                                  $list.=' small header" onclick="open_ranking(\''.$contest_id.'\',\''.base_url().'\');" >'.$name.'</a><br>' ; 
	                                  
	                                    if($yrs>0) $list.= $yrs.' Years ' ;
	                                    if($months>0) $list.= $months.' Months ' ;
	                                    if($days>0) $list.= $days.' Days ' ;
	                                    if($hrs>0) $list.= $hrs.' Hours ' ;
	                                    else
	                                    {
	                                    if($min==0 ) $list.= '1 minutes ' ;
	                                    else $list.= $min.' minutes ';
	                                    }

	                                    if($time<$short_list->start_time)
	                                    {
	                                      $list .= ' to go ' ;
	                                    }                                              
	                                    else
	                                    {
	                                      $list .= ' ago ' ;
	                                    }


	                                  //if()                                       
	                                  $list .= '</div></div>' ;
	                                }


	                              }   

	                              echo $list ;               
	                            
	                          ?>


                </div>
           </div>


    	</div>
    </div>
    <div class="ten wide column">
		<div class="row">

		<div class="ui red inverted center aligned segment ">
		<p class="ui small header">
		  <?php 
		  if($this->uri->segment(3)=="")
		  	echo 'Overall Rankings';
		  else
		  	echo $contest_name ;
		  ?>
		  </p>
		</div>
		<table class="ui table segment">
		  <thead>
		    <tr><th>Rank</th>
		    <th>Username</th>
		    <th>Score</th>
		  </tr></thead>
		  <tbody>

		  <?php 

		  		$i=1;
		  		$rank = -1 ;
		  		$class = "" ;
		  		$username = "" ;
		  		if($this->session->userdata('is_logged_in')==1)
		  			{
		  				$username = $this->session->userdata('username') ;
		  				$class = "negative" ;
		  			}

		  		foreach ($rankings->result() as $r) {
		  			
		  			if($r->username == $username)
		  			{
		  				$class = "active";
		  				$rank=$i;
		  			}
				  	echo	'<tr class="'.$class.'">
				      		<td>'.$i.'</td>
				      		<td>'.$r->username.'</td>
				      		<td>'.$r->score.'</td>
				    		</tr>' ;

				    if($r->username == $username)
		  				$class = "positive";



		  			$i++;

		  		}

		  ?>

		    <!-- <tr class="negative">
		      <td>1</td>
		      <td>triveni</td>
		      <td>320</td>
		    </tr>
		    <tr class="negative">
		      <td>2</td>
		      <td>abhilash</td>
		      <td>300</td>
		    </tr>
		    <tr class="active">
		      <td>3</td>
		      <td>sidgupta</td>
		      <td>220</td>
		    </tr>
		    <tr class="positive">
		      <td>4</td>
		      <td>vandii</td>
		      <td>200</td>
		    </tr>
		    <tr class="positive">
		      <td>5</td>
		      <td>kriti</td>
		      <td>200</td>
		    </tr>
		  </tbody> -->
		  <tfoot>
		  
		  <?php

		  	if($this->session->userdata('is_logged_in')==1)
		  			{
		  				if($rank == -1)
		  					echo '<tr><th colspan="3">
								     You have not qualified for leaderboard
								    </th>
								  </tr></tfoot> ' ;
						else 
						{
							$suf = 'th' ;
							switch($rank%10)
							{
								case 1 : $suf="st" ; break;
								case 2 : $suf="nd" ; break;
								case 3 : $suf="rd" ; break;
							}

						 echo '<tr><th colspan="3">
							      Your rank is '.$rank.$suf.'
							    </th>
							  </tr></tfoot>' ;
						}


		  			}


		  ?>

		    <!-- <tr><th colspan="3">
		      Your rank is 3rd
		    </th>
		  </tr></tfoot> -->
		</table>

		</div>    
    </div>


  </div>




</div>