<div id="grid">
             <div class="ui horizontally divided grid">
                      <div class="two column row">
                        <div class="one wide column">
                            <div class="ui raised left aligned segment custom-width">
                            <div class="ui red top attached label"><b>Problem Categories</b></div>
                                <div class="ui divided list">
            
                                  <div class="item">
                                     <i class="edit large <?php if ($practice_type_selected == '' || $practice_type_selected == 'easy') echo "active red"; ?> icon"></i>
                                     <div class="content">
                                    <a class="ui small header <?php if ($practice_type_selected == '' || $practice_type_selected == 'easy') echo "red"; ?>" onclick=<?php echo "\"open_practice_type('easy', '".base_url()."');\""?> >Easy</a><br>
                                    </div>
                                  </div>

                                  <div class="item">
                                     <i class="edit large <?php if ($practice_type_selected == 'medium') echo "active red"; ?> icon"></i>
                                     <div class="content">
                                    <a class="ui small header <?php if ($practice_type_selected == 'medium') echo "red"; ?>" onclick=<?php echo "\"open_practice_type('medium', '".base_url()."');\""?> >Medium</a><br>                                       
                                    </div>
                                  </div>

                                  <div class="item">
                                     <i class="edit large <?php if ($practice_type_selected == 'hard') echo "active red"; ?> icon"></i>
                                     <div class="content">
                                    <a class="ui small header <?php if ($practice_type_selected == 'hard') echo "red"; ?>" onclick=<?php echo "\"open_practice_type('hard', '".base_url()."');\""?> >Hard</a></h7><br>
                                    </div>
                                  </div>


                                  </div>
                            </div>
                        </div>
