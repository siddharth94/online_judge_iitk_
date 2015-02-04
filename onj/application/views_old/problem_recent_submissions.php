              </div>

            </div>
            



          <div class="ten wide column">
              

                <div class="ui fluid accordion">
                  <div class="active title ui small header">
                    <i class="tasks icon"></i>
                   Problem Statistics
                  </div>
                  <div class="active content">

                  <table class="ui table segment">
                    <tbody>
                      <tr>
                        <td>Total Submissions</td>
                        <td><?php echo $total_sub ; ?></td>
                        
                      </tr>
                      <tr class="positive">
                        <td>Problems Accepted</td>
                        <td><?php echo $accepted_sub ; ?></td>
                        
                      </tr>
                      <tr class="negative">
                        <td>Submissions Rejected</td>
                        <td><?php echo ($total_sub - $accepted_sub) ; ?></td>
                      </tr>
                      <tr >
                        <td>Accuracy</td>
                        <td><?php 
                        if($total_sub >0)
                          echo round((($accepted_sub/$total_sub)*100),2).'%' ; 
                        else 
                        echo '-' ;

                        ?></td>

                      </tr>
                      
                     
                    </tbody>
                </table>
                  
                  </div>
                  <div class="title ui small header">
                    <i class="upload icon"></i>
                  Recent Submissions
                  </div>
                  <div class="content">
                  
                  <!-- <div class="ui active dimmer"><div class="ui text loader"></div></div>
                  Please wait while your recent submissions are loading... -->

                  <table class="ui large table segment">
                    <thead>
                    <tr>
                    <th>User</th>
                    <th>Lang</th>
                    <th>Status</th>
                    </tr>
                  </thead>
                    <tbody>

                    <?php
                    $status="";

                    foreach($submissions->result() as $s)
                    {

                      //echo (($s->status)%1000).' ';
                      switch (($s->status)%1000) {
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
                      if((($s->status)%1000)>111)
                        $class="negative";
                      else if((($s->status)%1000)==111)
                        $class="positive";
                      else
                        $class="active";

                      echo '<tr class="'.$class.'">';
                      echo '<td ><a href="'.base_url().'users/account/'.$s->username.'">'.$s->username.'</a></td>';
                      echo '<td>'.strtoupper($s->lang).'</td>';
                      echo '<td >'.$status.'</td>';
                      // if($this->uri->segment(1)=="practice")
                      // echo '<td><a href="#" onclick="alert(\'code is blocked\');" ><i class="code icon"></i></a></td>';
                      echo '</tr>';
                    }

                    ?>


                      
                      
                    </tbody>
                    <tfoot>
                      <?php
                      if($submissions->num_rows==0)
                        echo "<tr><th colspan='3'>No Submissions Yet</th></tr>" ;
                      else
                      {
                        if($this->session->userdata('is_logged_in')==1)
                        echo "<tr><th colspan='3'><div class='blue fluid ui button' onclick='show_submissions(\"".base_url()."\",\"submission/get_recent_submissions/null/".$problem_id."/all/0/0/10\");'>View All</div></th></tr>" ;
                       // echo '<div class="ui icon button"><i class="refresh icon"></i></div>';
                        //\'".base_url()."submissions/get_submissions/null/".$problem_id."/all/0/0/25\'

                      }
                      ?>

                    </tfoot>
                </table>





                  <script type="text/javascript">
                  $(function(){

                    $('.ui.fluid.accordion').accordion({
                        onOpen: function () {  
                           //alert("fuck yeah") ;
                        }
                      });
                  });

                  </script>

                  
                  </div>
                  
                </div>

                

             
                
          </div>
        </div>
      </div> 
      <div class="ui large modal r_submissions">
        <i class="close icon"></i>
                  <div class="header">
                    Submissions of <?php echo '<strong>'.$problem_name.'</strong>';?>
                     </div>
                  <div class="content"  >
                  <div style="height:550px;,overflow-y:scroll" id="recent_subm_content">
                  </div>
                  </div>
                  <div class="actions">
                  <div class="ui red button" onclick="$('.modal.r_submissions').modal('close');">Close</div>                  
                </div>
                  
                </div>    
            
</body>
</html>