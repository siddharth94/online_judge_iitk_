<body>


             <!--  <?php echo "<h1>".$this->session->userdata('name')."</h1>" ;?> -->
             <div id="head">
             <div class="ui inverted center aligned segment raised large custom-font ">


                      
                    ONLINE JUDGE IIT KANPUR

                   <!--  <div class="ui small right menu buttons">
                        <div class="ui button">Login</div>
                        <div class="or"></div>
                        <div class="ui positive button">Register</div>
                    </div> -->
                    
                </div>

                <div class="ui raised red right floated segment">
               <!--  <?php echo '<p>'.$this->session->userdata('name').'</p>';?>
                -->   <div class="ui small horizontal list" id="loginbar">
                    <?php


                    if($this->session->userdata('is_logged_in') == 1){
                      echo '<div class="item">
                     
                      <div class="content">
                        Welcome '.$this->session->userdata('name').' !
                      </div>
                    </div> ';
                        if($this->session->userdata('is_admin') == 1)
                        {
                           echo '
                           <div class="item">
                      <i class= "lock icon"></i>
                      <div class="content">
                        <div class="header" onclick="admin(\''.base_url().'\');"><a>Admin Panel</a></div>
                        
                      </div>
                    </div>' ;
                        }



                      echo '
                       <div class="item">
                      <i class= "lock icon"></i>
                      <div class="content">
                        <div class="header" onclick="account(\''.base_url().'\');"><a>My Account</a></div>
                        
                      </div>
                    </div>
                    <div class="item">
                     <i class= "lock icon"></i>
                      <div class="content">
                        <div class="header" onclick="user_logout(\''.base_url().'\')"><a >Logout</a></div>
                        
                      </div>
                    </div>   ' ;

                

                    }
                    else{
                      echo '
                       <div class="item">
                      <i class= "lock icon"></i>
                      <div class="content">
                        <div class="header" onclick="showLogin();"><a>Login</a></div>
                        
                      </div>
                    </div>
                    <div class="item">
                     <i class= "lock icon"></i>
                      <div class="content">
                        <div class="header" onclick="showRegister();"><a >Register</a></div>
                        
                      </div>
                    </div>  ' ;

                    }

                      ?>
                   
                    
                  </div>


                </div>
                <br><br>
                </div>


          
          <div class="nav" >
            <div class="ui small vertical labeled icon menu">

                   
                    <a class="red item <?php if ($active=="Home")echo "active";?>" href="<?php echo base_url();?>home">
                        <i class="home icon"></i>
                        Home
                    </a>
                    <a class="red item <?php if ($active=="Contests")echo "active";?>" href="<?php echo base_url();?>contests">
                        <i class="checkered flag icon"></i>
                       Contests
                    </a>
                    <a class="red item <?php if ($active=="Practice")echo "active";?>" href="<?php echo base_url();?>practice">
                        <i class="edit icon"></i>
                        Practice
                    </a>
                   
                     <a class="red item <?php if ($active=="Leaderboard")echo "active";?>" href="<?php echo base_url();?>leaderboard">
                        <i class="dashboard icon"></i>
                        Leaderboard
                    </a>
                    <a class="red item <?php if ($active=="Forum")echo "active";?>" href="<?php echo base_url();?>forum">
                        <i class="comment icon"></i>
                        Forum
                    </a>
                    <a class="red item <?php if ($active=="About")echo "active";?>" href="<?php echo base_url();?>about">
                       <i class="info icon"></i>
                       About
                    </a>

                    

                     <!-- <a class="red item " id="log" onclick="showLogin();">
                       <i class="lock icon"></i>
                       Login
                    </a> -->
                    

            </div>
        </div>
        
        
        
