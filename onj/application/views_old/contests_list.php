<div id="grid">
             <div class="ui horizontally divided grid">
                      <div class="two column row">
                        <div class="one wide column">
                            <div class="ui raised left aligned segment">
                            <div class="ui red top attached label">Contests</div>
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
                                                $temp.= "red" ;
                                              $temp.=' small header" onclick="open_contest(\''.$contest_id.'\',\''.base_url().'\');" >'.$name.'</a><br>' ; 
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
                                                $list.= "red" ;
                                              $list.=' small header" onclick="open_contest(\''.$contest_id.'\',\''.base_url().'\');" >'.$name.'</a><br>' ; 
                                              
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