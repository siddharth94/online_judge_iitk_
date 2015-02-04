function add_problems()
{
	// var contest_id = $('#contest_to_add_to').val();
	// var problem_name = $('#problem_name').val();
	// var problem_id = $('#problem_id').val();
	// var points = $('#points').val();
	// var problem_statement = $('#problem_statement').val();
	// var short_desc = $('#short_desc').val();
	// var constraints = $('#constraints').val();
	// var input_desc = $('#input_desc').val();
	// var output_desc = $('#output_desc').val();
	// var sample_input = $('#sample_input').val();
	// var sample_output = $('#sample_output').val();
	// var num_input_file = $('#num_input_file').val();
	// var time_limit = $('#time_limit').val();
	// var mem_limit = $('#mem_limit').val();
	// var difficulty = $('#difficulty').val();

	// if ( (problem_name)== "" || (problem_id)== "" || (problem_statement)== "" || (short_desc)== "" || (constraints)== "" || (input_desc)== "" || (output_desc)== ""
	// 	|| (sample_input)== "" || (sample_output)== "" || (num_input_file)== "" || (time_limit)== "" || (mem_limit)== "" || (difficulty)== "" )
	// {
	// 	$('#errormsg').show()
	// 	$('#add_problem_error').html("One or more fields are empty or invalid!!"); 
	// }
	// else
		$('#add_problem').submit();
}

function add_input(num)
{
	// alert("thats irritating me!!");
	var str="<div class = 'ui label'><b>Add Input Files : </b></div><br>";
	for (var i = 0; i < num.value; i++)
	{
		str += "<input type='file' name='infile"+i+"' id='infile"+i+"' ><br> ";
	}	
	$('#add_input_file').html(str);
}

function add_output(num)
{
	// alert("thats irritating me!!");
	var str="<div class = 'ui label'><b>Add Output Files : </b></div><br>";
	for (var i = 0; i < num.value; i++)
	{
		str += "<input type='file' name='outfile"+i+"' id='outfile"+i+"' ><br> ";
	}
	$('#add_output_file').html(str);
}

function show_input(base_url,prob_id)
{
	// alert("fish!!");
	$.ajax({
		url : base_url + 'admin/get_num_input_files' ,
		type : 'POST' ,
		data : {
			problem_id : ('#problem_id').val()
		} ,
		success : function(data){
			var parsed = JSON.parse(data);
			var str="<div class = 'ui label'><b>Input Files : </b></div><br>";
			for (var i = 0; i < parsed.num; i++)
			{
				//edit here
				str += "<a href='backend/problems/'"+parsed.problem_id+"/"+(i+1)+".in>"+(i+1)+".in</a><br> ";
			}
			$('#edit_input_file').html(str);
		}
	});
	
}

function show_output(num)
{
	$.ajax({
		url : base_url + 'admin/get_num_output_files' ,
		type : 'POST' ,
		data : {
			problem_id : ('#problem_id').val()
		} ,
		success : function(data){
			var parsed = JSON.parse(data);
			var str="<div class = 'ui label'><b>Output Files : </b></div><br>";
			for (var i = 0; i < parsed.num; i++)
			{
				//edit here
				str += "<a href='backend/problems/'"+parsed.problem_id+"/"+(i+1)+".out>"+(i+1)+".out</a><br> ";
			}
			$('#edit_output_file').html(str);
		}
	});
}

function validat_problem_id(base_url)
{
	// alert(base_url);
	// alert($('#problem_id').val());
	return $.ajax({
	 	url : base_url + 'admin/validate_problem_id' ,
	 	type : 'POST' ,
	 	data : {	        //Syntax : username : $('#<id of element>').val()
	 		problem_id : $('#problem_id').val()
		}
	});
}

function validate_pid(base_url)
{
	var bol = validat_problem_id(base_url);
	bol.success(function (data){
 			// alert(data);
 			var grab = -1;
 			var parsed = JSON.parse(data);
			if(parsed.valid == "1")
			{
				$('#icon').html("<i class='ui green checkmark icon'><label>Valid</label></i>");
				//alert ("1");
				grab = 1;
			}
			else 
			{
				$('#icon').html("<i class='ui red warning icon'><label>ID already used!</label></i>");
				grab = 0;
	 		}
	//alert(grab);
	if(grab==1)
		{add_problems();}
	else {alert("Problem ID already occupied! Please choose some other ID.");}
	 	});
}

function validat_contest_id(base_url)
{
	// alert(base_url);
	// alert($('#problem_id').val());
	return $.ajax({
	 	url : base_url + 'admin/validate_contest_id' ,
	 	type : 'POST' ,
	 	data : {	        //Syntax : username : $('#<id of element>').val()
	 		contest_id : $('#contest_id').val()
		}
	});
}

function add_contests()
{
	var contest_id = $('#contest_id').val();
	var contest_name = $('#contest_name').val();
	var start_date = $('#start_date').val();
	var start_hour = $('#start_hour').val();
	var start_minute = $('#start_minute').val();
	var start_ampm = $('#start_ampm').val();
	var end_date = $('#end_date').val();
	var end_hour = $('#end_hour').val();
	var end_minute = $('#end_minute').val();
	var end_ampm = $('#end_ampm').val();
	var contest_desc = $('#contest_desc').val();
	var contest_type = $('#contest_type').val();

	$('#add_contest').submit();
}

function validate_cid(base_url)
{
	var bol = validat_contest_id(base_url);
	bol.success(function (data){
			var grab = -1;
 			// alert(data);
 			var parsed = JSON.parse(data);
			if(parsed.valid == "1")
			{
				$('#icon').html("<i class='ui green checkmark icon'><label>Valid</label></i>");
				grab = 1;
				//alert (grab);
			}
			else 
			{
				$('#icon').html("<i class='ui red warning icon'><label>ID already used!</label></i>");
				grab = 0;
				//alert(grab);
	 		}
		//alert(grab);
		if(grab==1)
			{add_contests();}
		else {alert("Contest ID already occupied! Please choose some other ID.");}
	 	});
}


//Edit Problem scripts

// function populate_files(base_url,prob_id,num_input_file)
// {

// 	for($i=1;$i<=num_input_file;$i++)
// 	$('#populate_in').html="<a href='"+base_url+"backend/problems/"+prob_id+"/"+i+".in'> "+i+".in</a> <input type='file' name='infile"+i+"' id='infile"+i+"'><br>";
// 	for($i=1;$i<=num_input_file;$i++)
// 	$('#populate_out').html="<a href='"+base_url+"backend/problems/"+prob_id+"/"+i+".out'> "+i+".out</a> <input type='file' name='outfile"+i+"' id='outfile"+i+"'><br>";

// }

function submit_edit_problem()
{
	$('#edit_problem').submit();
}

function submit_edit_file(form_name)
{
	$('#'+form_name).submit();
}

function submit_append_file()
{
	$('#append_file').submit();
}

function rejudge_problem(base_url,prob_id)
{
	// alert("Shits");
	if(confirm("Are you sure you want to rejudge problem"+prob_id+"!"))
	{
		var win = window.open(base_url+"admin/rejudge/"+prob_id,'_self');
		win.focus();
	}
}

//Control Panel

function confirm_remove(base_url,prob_id)
{
	var ans = confirm("Are you sure you want to delete "+prob_id);
	// alert (ans);
	if (ans == true)
	{
		//alert("kuch bhi");
		$.ajax({
			url: base_url+"admin/remove_problem/"+prob_id,
			type : 'POST' ,
			data : {
				problem_id: prob_id
			} ,
			success: function(data){
				// alert(data);
			}
		});
	}
	else
		return 0;
}


