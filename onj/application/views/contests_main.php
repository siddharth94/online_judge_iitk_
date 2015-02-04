 


 <div class="two wide column">
                            <div class="ui stacked segment">
                                <div class="ui red top attached label">
                                    
                                    <?php

                                    foreach ($contest_details as $detail) {
                                       echo $detail->contest_name ;
                                    }

                                    

                                    ?>


                                </div>
                                
                                      
                                        <!-- <div class="ui top attached tabular menu">
                                        <a class="active item">
                                         Description
                                        </a>
                                        <a class="item">
                                            My Stats
                                        </a>
                                        <a class="item">
                                            Rankings
                                        </a>
                                        
                                        
                                        </div> -->

                                        <div class="ui fluid accordion">
                                          <div class="active title">
                                            <i class="dropdown icon"></i>
                                            Description
                                          </div>
                                          <div class="active content">
                                           <?php

                                        

                                          foreach ($contest_details as $detail) {
                                          echo '<p>'.$detail->contest_desc.'</p>' ;
                                          }
                                                                              
                                        ?>


                                         <div class="ui two column divided grid">
                                            <div class="row">
                                                 <div class="column">
                                                      <div class="ui black label">
                                                          Users <i class="users icon"></i><?php echo $users ; ?>
                                                      </div>
                                                              <br><br>
                                                      <div class="ui black label">
                                                           Total Submissions <i class="cloud upload icon"></i> <?php echo $total_sub ; ?>
                                                      </div>
                                                        <br><br>
                                                      <div class="ui black label">
                                                          Accepted Submissions <i class="checkmark sign icon"></i> <?php echo $accepted_sub ; ?>
                                                      </div>
                                                  </div>
                                                  <div class="column">
                                                        <div class="ui black label">
                                                          Type <i class="browser icon"></i>

                                                          <?php



                                                          foreach ($contest_details as $detail) {
                                                            echo  $detail->contest_type ;
                                                           }

                                                          ?>


                                                      </div>  <br><br>
                                                        <div class="ui black label">
                                                          Start Time <i class="calendar icon"></i>
                                                          <?php
                                                            foreach ($contest_details as $detail) {
                                                            $idate = $detail->start_time ;
                                                           // $sdate = get_date($idate);
                                                            //echo date('',$idate) ;
                                                            echo $idate ;
                                                           
                                                           }
                                                          ?>


                                                      </div> <br><br>
                                                      <div class="ui black label">
                                                          End Time <i class="calendar icon"></i> 
                                                          <?php
                                                            foreach ($contest_details as $detail) {
                                                            $idate = $detail->end_time ;
                                                           // $sdate = get_date($idate);
                                                            echo $idate ;
                                                           }
                                                          ?>


                                                      </div>
                                                  </div>
                                            </div>
                                         </div>  
                                         </div>


                                          