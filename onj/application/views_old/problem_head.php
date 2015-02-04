<div id="grid">

<script type="text/javascript" src="<?php echo base_url();?>scripts/submissions.js"></script>

        <div class="ui horizontally divided grid">
             
             <div class="row">
                <div class="column">
                    <div class="ui red center aligned inverted segment ">
                        <p>
                            <?php

                            foreach ($problem_details as $p) {
                                echo '<strong>'.$p->contest_name.'</strong>' ;
                            }

                            ?>

                        </p>
                    </div>
                 </div> 
            </div>  
        <div class="row">
          <div class="eleven wide column">
                <div class="ui raised segment">
                <div class="ui black top attached label custom-font-light header"><strong>
                    <?php

                            foreach ($problem_details as $p) {
                                echo '<strong>'.$p->problem_name.'</strong>' ;
                            }

                    ?>

                </strong></div>
  