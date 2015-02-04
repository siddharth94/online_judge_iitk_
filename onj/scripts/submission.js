function show_submissions(base_url,get_url){
	//alert(get_url);
	//custom_reload();
	 $('.modal.r_submissions').modal({
   	closable    : false,
   	offset : 40
	 });
	$('.modal.r_submissions').modal('hide others');
	//$('.modal.r_submissions').attr('style')
	$('.modal.r_submissions').modal('show');
	//alert($('.modal.r_submissions').attr('style'));

	 // if($('.modal.r_submissions').modal('can fit')==false)
	 // 	alert("cant fit");
	// 	$('.modal.r_submissions').modal('show');


	$('#recent_subm_content').html('Please Wait while submissions are loading <img src="'+base_url+'styles/images/4.gif">');
	$('.modal.r_submissions').modal('refresh');

	$.ajax({
		url : base_url+get_url ,
		type : 'POST' ,
		success : function (data){
			// alert(data);
			  var parsed = JSON.parse(data);
			 // alert(parsed.length);  

			  if(parsed.length==0)
			  {
			  	$('#recent_subm_content').html('No submissions yet');
			  }
			  else
			  {

			  	ihtml = "<table class='ui small table segment'>" ;
			  	ihtml += "<thead>";
			  	ihtml += "<th>Time</th>";
			  	ihtml += "<th>Username</th>";			  	
			  	ihtml += "<th>Language</th>";			  	
			  	ihtml += "<th>RunTime</th>";
			  	ihtml += "<th>Memory</th>";			  	
			  	ihtml += "<th>Status</th>";
			  	ihtml += "<th>Code</th>";
			  	ihtml += "</thead>";
			  	ihtml += "<tbody>";

			  	for(i=0;i<parsed.length;i++)
			  	{
			  		//alert(parsed[i].status);
			  		if(parsed[i].status>111)
                        rclass="negative";
                      else if(parsed[i].status==111)
                        rclass="positive";
                      else
                        rclass="";


			  		ihtml += "<tr class='"+rclass+"'>";

			  		ihtml += "<td>"+parsed[i].time+"</td>";			  		
			  		ihtml += "<td><a href='"+base_url+"users/account/"+parsed[i].username+"'>"+parsed[i].username+"</a></td>";
			  		ihtml += "<td>"+parsed[i].lang.toUpperCase()+"</td>";
			  		ihtml += "<td>"+parsed[i].runtime+"</td>";
			  		ihtml += "<td>"+parsed[i].memory+"</td>";
			  		gstatus = get_status(parsed[i].status);
			  		ihtml += "<td>"+gstatus+"</td>";
			  		ihtml += "<td><a href='"+base_url+"submission/show_code/"+parsed[i].id+"' target='_blank'><div class='ui red icon button'><i class='code icon'></i></div></a></td>";



			  		ihtml += "</tr>";

			  	}
			  	

			  	ihtml +="</tbody>";

			  	ihtml += "<table>";

			  	$('#recent_subm_content').html(ihtml);
			  	$('.modal.r_submissions').modal('refresh');

			  }

		}





	});
	//$('.modal.r_submissions').modal('refresh');
}

function get_status(stat){

	 //status = "Staging..." ;
	 //alert(stat);



	 


	

        if(stat== 0)
          return "Staging...";
         
        if(stat== 100)
          return "Compiling...";
         
        if(stat== 110)
          return "Running...";
         
        if(stat== 120)
          return "Compilation Error";
         
        if(stat== 111)
          return "Accepted";
          
        if(stat== 112)
          return "Wrong Answer";
          
        if(stat== 113)
          return "RunTime Error";
          
        if(stat== 114)
          return "TLE";
          
                        
                        
    

   // return status ;
}

