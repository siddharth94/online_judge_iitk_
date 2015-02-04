
                  <div class="ui ribbon label">Problem Statement</div>
                 <p>

                 <?php
                             echo nl2br( ( $problem_details[0]->problem_statement) );
                 ?>
                  

                 </p>
                 <div class="ui clearing divider"></div>

                  <div class="ui ribbon label">Input</div>

                  <p>
                    <?php
                    
                             echo nl2br( htmlspecialchars( $problem_details[0]->input_desc) );
                    
                    ?>
                  </p>

                  <div class="ui clearing divider"></div>

                  <div class="ui ribbon label">Output</div>
                   <p>
                    <?php
                  
                             echo nl2br(htmlspecialchars( $problem_details[0]->output_desc) );
                    
                    ?>
                  </p>

                  <div class="ui clearing divider"></div>

                  <div class="ui ribbon label">Contraints</div>

                   <p>
                    <?php
                    
                             echo nl2br(htmlspecialchars( $problem_details[0]->constraints ));
                    
                    ?>
                  </p>

                  <div class="ui clearing divider"></div>

                  <div class="ui ribbon label">Sample</div>

                   <p>
                    <?php
                    
                             echo '<h3>Input : </h3><br>';
                             echo nl2br(htmlspecialchars( $problem_details[0]->sample_input) );
                             echo '<br><h3>Output : </h3>';                             
                             echo nl2br( htmlspecialchars( $problem_details[0]->sample_input ) ).'<br>';
                             

                    
                    ?>
                  </p>

                  <div class="ui clearing divider"></div>

                  <div class="ui ribbon label">Extra Info</div><br><br>
                    <table class="ui two column basic table">
                      <tbody>
                        <tr>
                          <td>Time Limit</td>
                          <td><?php echo $problem_details[0]->time_limit.' seconds' ; ?></td>                                   
                        </tr>
                        <tr>
                          <td>Memory Limit</td>
                          <td><?php echo $problem_details[0]->time_limit.' MB' ; ?></td>
                        </tr>
                        <tr>
                          <td>Problem Discussion</td>
                          <td><?php
                          echo '<a class="ui green label" ' ;
                          echo 'href="'.base_url().'index.php/forum/problem/'.$problem_details[0]->problem_id.'" target="_blank" >Click Here</a>' ;
                          ?></td>
                        </tr>
                        <tr>
                          <td>Problem Author</td>
                          <td><?php echo $problem_details[0]->author ; ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="ui clearing divider"></div>
                    

                          


