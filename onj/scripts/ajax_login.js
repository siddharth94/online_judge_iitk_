function user_login(base_url,page){
	//alert(base_url);
	//alert(page);
	//console.log($('#username').val()+"\n");
	//console.log($('#password').val()+'\n');

	//alert(location);

	$.ajax({
		url : base_url + 'users/login' ,
		type : 'POST' ,
		data : {	        //Syntax : username : $('#<id of element>').val()
			username : $('#username').val() ,
			password : $('#password').val() 
		},
		success : function (data){
			  //alert(data);
			  var parsed = JSON.parse(data);
			 // alert(parsed.name);
			// $('#log').html(' <i class="lock icon"></i>Logout');
			// $('#log').attr('onclick','alert("fuck");');
			// $('.small.modal.login').modal('hide');
			if(parsed.logged == 1)
			{
				var admin = "";

				if(parsed.admin == 1)
				{
					admin = '<div class="item">'+
                      '<i class= "lock icon"></i>'+
                      '<div class="content">'+
                        '<div class="header" onclick="admin(\''+base_url+'\');"><a>Admin Panel</a></div>'+                        
                      '</div>'+
                    '</div>'
				} 
			 
			 $('#loginbar').html(
			 	'<div class="item">'+
                     
                      '<div class="content">'+
                        'Welcome '+parsed.name+' !'+
                      '</div>'+
                      '</div> '+
                      admin+

			 	 '<div class="item">'+
                      '<i class= "lock icon"></i>'+
                      '<div class="content">'+
                        '<div class="header" onclick="account(\''+base_url+'\');"><a>My Account</a></div>'+                        
                      '</div>'+
                    '</div>'+
                    '<div class="item">'+
                     '<i class= "lock icon"></i>'+
                      '<div class="content">'+
                        '<div class="header" onclick="user_logout(\''+base_url+'\')"><a >Logout</a></div>'+                        
                      '</div>'+
                    '</div>' 
			 	);
			 $('#message_header').html('Welcome '+ parsed.name);
			  $('#msg').html('You are succesfully Logged In');
			 $('.small.modal.msg').modal('show');
			 if(page=="problem")
			 custom_reload();

			}
			else {

			 $('.small.modal.error').modal('show');
			}

		}



	});

	

	//window.location.reload();
	// if(page=="problem")
	// 	location.reload(true);

	//return false;

} ;

function custom_reload(){
	window.location.href = location;
}


function user_logout(base_url){
	//alert(base_url);


	$.ajax({
		url : base_url + 'users/logout' ,
		
		success : function (data){
			//  alert(data);
			//   var parsed = JSON.parse(data);
			//  // alert(parsed.name);
			// // $('#log').html(' <i class="lock icon"></i>Logout');
			// // $('#log').attr('onclick','alert("fuck");');
			// // $('.small.modal.login').modal('hide');
			// if(parsed.logged == 1)
			// {
			//  $('#loginmain').html('My Account');
			//  $('#loginmenu').html(
			//  	 '<a class="item" onclick="showLogin();"><i class="dashboard icon"></i>Dashboard</a>'+
   //                '<a class="item"><i class="lock icon"></i> Logout</a>'
			//  	);
			//  $('#name').html('Welcome '+ parsed.name);
			//  $('.small.modal.welcome').modal('show');
			// }
			// else {

			//  $('.small.modal.error').modal('show');
			// }

			 
			 $('#loginbar').html(
			 	  '<div class="item">'+
                      '<i class= "lock icon"></i>'+
                      '<div class="content">'+
                        '<div class="header" onclick="showLogin();"><a>Login</a></div>'+                        
                      '</div>'+
                    '</div>'+
                    '<div class="item">'+
                     '<i class= "lock icon"></i>'+
                      '<div class="content">'+
                        '<div class="header" onclick="showRegister();"><a >Register</a></div>'+                        
                      '</div>'+
                    '</div>'
			 	);

			 if(page=="problem")
			 	custom_reload();
		}
	});
};

function user_register(base_url)
{
	//alert(base_url);

	

	$.ajax({
		url : base_url + 'users/register' ,
		type : 'POST' ,
		data : {
			username : $('#r_username').val(),
			password : $('#r_password').val(),
			cpassword : $('#r_cpassword').val(),
			college : $('#r_college').val(),
			name : $('#r_name').val() ,
			email : $('#r_email').val() 
		},
		success : function (data){
			 //alert(data);
			  var parsed = JSON.parse(data);
			  if(parsed.result == 1)
			  {
			  	//alert(parsed.email);
			  	$('#rmessage_header').html('Email Verification');
			  	$('#rmsg').html('An email has been sent to <strong>' + parsed.email+'</strong> please check your inbox to complete your registeration');
				$('.small.modal.rmsg').modal('show');



			  }
			  else
			  {
			  //	alert(parsed.msg);
			  	$('.error.red.message').show();
			  	$('#register_error').html(parsed.msg);
			  }
			

		}



	});


}