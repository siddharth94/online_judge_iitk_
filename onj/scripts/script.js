function open_contest(contest_id,base_url)
{
    //alert(base_url);
         //var win=window.open("http://www.google.com", '_blank');  // For opening in new tab
   // var win=window.open(base_url+"index.php/contests/main/"+contest_id, '_self');  // For opening in same tab
    var win=window.open(base_url+"contests/main/"+contest_id, '_self');      
    win.focus();
}

function open_ranking(contest_id,base_url)
{
    //alert(base_url);
         //var win=window.open("http://www.google.com", '_blank');  // For opening in new tab
   // var win=window.open(base_url+"index.php/contests/main/"+contest_id, '_self');  // For opening in same tab
    var win=window.open(base_url+"leaderboard/main/"+contest_id, '_self');      
    win.focus();
}

function open_practice_type(practice_type,base_url)
{
    //alert(base_url);
         //var win=window.open("http://www.google.com", '_blank');  // For opening in new tab
    var win=window.open(base_url+"practice/"+practice_type, '_self');  // For opening in same tab
         
    win.focus();
}

function open_problem(problem_id,base_url)
{
	//alert(base_url);
	var win = window.open(base_url+"contests/problem/"+problem_id,'_blank');
	win.focus();
}

function open_practice_page_number(practice_type,page_num,base_url,current_page_num)
{
    var current_url = document.URL;
    var new_url = current_url.replace("/"+current_page_num+"/","/"+page_num+"/");
         //var win=window.open("http://www.google.com", '_blank');  // For opening in new tab

    var win=window.open(new_url, '_self');  // For opening in same tab
         
    win.focus();
}

function open_problem_practice(practice_type,problem_id,base_url)
{
	//alert(base_url);
	var win = window.open(base_url+"practice/problem/"+problem_id,'_self');
	win.focus();
}

function open_practice_sorted(current_url,sortby)
{
	var index = current_url.indexOf("/sort_");
	var base = current_url.substr(0,index);
	// alert (base+"/"+sortby);

	var win = window.open(base+"/"+sortby,'_self');
	win.focus();
}

function open_admin_menu(page_to_direct,base_url)
{
	var win = window.open(base_url+"admin/"+page_to_direct,'_self');
	win.focus();
}

function account(base_url){

	//alert("showing my account");
	//alert(base_url);
	 var win = window.open(base_url+"users/account",'_self');
	 win.focus();
}

function admin(base_url){
	var win = window.open(base_url+"admin/add_problem",'_self');
	win.focus();
}

// function edit_contest_id(val)
// {
// 	var ins = '<input  name="contest_id" id="contest_id" style="display:none" value="'+val+'"></input>';
// 	$('#contest_id_div').html(ins);
// }

$(function(){

	$('#mysubmit').bind('click', function(){
		$('#add_problem').submit();
	});

	$("#contest_to_add_to").dropdown({
    	onChange: function (val) {
    		// alert(val);
       		$('#contest_id').val(val);
       	}	
	});

	$("#problem_to_change").dropdown({
    	onChange: function (val) {	
       		$('#problem_id').val(val);
       	}	
	});

	$("#start_time_hour").dropdown({
    	onChange: function (val) {	
       		$('#start_hour').val(val);
       	}	
	});

	$("#start_time_minute").dropdown({
    	onChange: function (val) {	
       		$('#start_minute').val(val);
       	}	
	});

	$("#start_time_ampm").dropdown({
    	onChange: function (val) {	
       		$('#start_ampm').val(val);
       	}	
	});

	$("#end_time_hour").dropdown({
    	onChange: function (val) {	
       		$('#end_hour').val(val);
       	}	
	});

	$("#end_time_minute").dropdown({
    	onChange: function (val) {	
       		$('#end_minute').val(val);
       	}	
	});

	$("#end_time_ampm").dropdown({
    	onChange: function (val) {	
       		$('#end_ampm').val(val);
       	}	
	});

	//$('.ui.dropdown').dropdown();
	$("#practice_type").dropdown({
    	onChange: function (val) {	
       		open_practice_sorted(document.URL,val);
    	}	
	});

	$('.ui.accordion').accordion();

	$('#start_date').datepicker();
	$('#end_date').datepicker();

	// $(".ui.dropdown").dropdown({
 //    	onChange: function (val) {	
 //       		open_practice_sorted(document.URL,val);
 //    	}
	// });

	//alert("javascript working");
	$('.ui.accordion').accordion();

	$('.ui.modal.submission').modal({
  	closable    : false
	});

	

	$('.modal.r_submissions').modal({
  	closable    : false
	});

	$('.ui.modal.submission').modal();
	$('.small.modal.login').modal();
	$('.large.modal.register').modal();
	//$('.error.red.message').modal();
	$('.modal.r_submissions').modal();

});

