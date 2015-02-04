<div class="ui small modal login">

  <i class="close icon"></i>
  <div class="header">

  <div class="ui black inverted center aligned segment">
  <i class="lock icon"></i>
   LOGIN TO YOUR ACCOUNT
  </div>

   
  </div>
  <div class="content">
    <div class="ui red  form segment">
    <form action="javascript: <?php echo '"user_login(\''.base_url().'\');"' ;?>" method="POST" name="login"  >

          <div class="field">
            <label>Username</label>
            <div class="ui left labeled icon input">
              <input type="text" name="username" id="username" placeholder="Username">
              <i class="user icon"></i>
              
            </div>
          </div>


          <div class="field">
            <label>Password</label>
            <div class="ui left labeled icon input">
              <input type="password" id="password" name="password">
              <i class="lock icon"></i>
              
            </div>
          </div>


      
        <input type="submit" onKeyPress="return alert('hi')" onClick=<?php echo '"user_login(\''.base_url().'\');"' ;?> style="display : none"/>

        <div class="ui red animated button"  onclick=<?php echo '"user_login(\''.base_url().'\');"' ;?> >
            <div class="visible content">Login

            </div>
            <div class="hidden content">
              <i class="right arrow icon"></i>
            </div>
        </div>

        </form>
</div>
  </div>
 

</div>


<div class="ui small modal msg">
  <i class="close icon"></i>
  <div class="header">
    <p id="message_header"></p>
  </div>
  <div class="content" id="msg">    
  </div>
  <div class="actions">
    
    <div class="ui button">OK</div>
  </div>
</div>

<div class="ui small modal rmsg">
  <i class="close icon"></i>
  <div class="header">
    <p id="rmessage_header"></p>
  </div>
  <div class="content" id="rmsg">    
  </div>
  <div class="actions">
    
    <div class="ui button">OK</div>
  </div>
</div>

<div class="ui small modal error">
  <i class="close icon"></i>
  <div class="header">
    <p id="error"> Wrong User Credentials  </p>
  </div>
  <div class="content">
    Please try again with valid credentials 
  </div>
  
  <!-- <div class="actions">    
    <div class="ui button"  >Login</div>
  </div> -->
</div>


<div class="ui large modal register">
  <i class="close icon"></i>
  <div class="header">
    <div class="ui inverted center aligned segment">
    Register New Account
    </div>
  </div>
  <div class="content ui red segment">

          <div class="ui small red error icon message">
            <i class="attention icon"></i>
                <div class="content" id = "register_error">   
                </div>
          </div>
    
    
        <div class="ui form segment">
        <form action="javascript: <?php echo '"user_register(\''.base_url().'\');"' ;?>" method="POST" name="register">
          
          <div class="two fields">
            <div class="field">
              <label>Name</label>
              <input name="r_name" id="r_name" placeholder="Name" type="text">
            </div>
            <div class="field">
              <label>Email Id</label>
              <input name="r_email" id="r_email" placeholder="something@nothing.com" type="text">
            </div>
          </div>
         

         <div class="two fields">

              <div class="field">
                <label>Username</label>
                <input name="r_username" id="r_username" placeholder="Username" type="text">
              </div>

              <div class="field">
                <label>College</label>
                <input name="r_college" id="r_college" placeholder="College Name" type="text">
              </div>

          </div>


          <div class="two fields">
              <div class="field">
                <label>Password</label>
                <input name="r_password" id="r_password" type="password">
              </div>

              <div class="field">
                <label>Confirm Password</label>
                <input name="r_cpassword" id="r_cpassword" type="password">
              </div>

          </div>

           <input type="submit" onKeyPress="return alert('hi')" onClick=<?php echo '"user_register(\''.base_url().'\');"' ;?> style="display : none"/>

          
          <div class="ui red submit button"  onclick=<?php echo '"user_register(\''.base_url().'\');"' ;?>>Submit</div>

           </form>
        </div>


   
  </div>
  
</div>

