<?php

//echo "start<br>";
$conn_error = "Unable to connect.";

$mysql_host = "localhost";
$mysql_user = "sidgupta";
$mysql_password = "teamonjpassword";
$db = "btronj";

if (!@mysql_connect($mysql_host,$mysql_user,$mysql_password) || !@mysql_select_db($db))
	die("Could not connect"); 
//echo "connected!";
//NOT YET WORKING FOR JAVA

/*
Status = -1 : in queue
		  0 : correct
		  1 : wrong ans
		  2 : compilation error
		  3 : TLE

New Status Codes : 0 -> in queue
				  100 -> Compiling
				  120 -> Compilation Error
				  x*1000 + 110 -> Program is running on x th input file
				  112 -> Wrong Answer
				  113 -> Runtime Error
				  114 -> Time Limit Extended 
*/

$j=0;
while ($j<10)
{
	$j++;
	sleep(1);

	//Get problems to be judged.
	if (!($query = mysql_query("SELECT * FROM `files_submitted` WHERE `status` ='0' ORDER BY `id` ASC")))
		echo "Error in loading table";

	$num_queries = mysql_num_rows($query);

	while ($num_queries!=0)
	{
		$num_queries--;
	//	echo "queries left = ".mysql_num_rows($query);
		$to_judge = mysql_fetch_assoc($query);
	//	echo "<pre>"; print_r($to_judge); echo "</pre>";
		$id = $to_judge['id'];
		$extension = $to_judge['lang'];
		$name = $to_judge['id'];
		$prob_id = $to_judge['prob_id'];
		$status = $to_judge['status'];
		$user = $to_judge['username'];
		echo "<br> id=".$id;
		echo "<br> lang=".$extension;
		echo "<br> name=".$name;
		echo "<br> probid=".$prob_id;
		echo "<br> status=".$status;
		echo "<br> user=".$user;

		//updating to database that submission is staged
		$sql = "UPDATE `files_submitted` SET `status`='100' WHERE `id`='$id'";
		mysql_query($sql);
		//To know the user who runs this php file and make it superuser in visudo (daemon in this case)
		//www-data was not the superuser bcoz i didnt install apache using terminal in ubuntu but via lampp.
		$uid = posix_getpwuid(posix_geteuid());
		echo "<br> uid = ".$uid['name']."<br>";

		if ($extension == "java")
		{
			echo "java";
			system("sudo cp /var/www/online_judge_iitk/onj/backend/submissions/".$name.".java /var/chroot/Main.java");
			system("sudo chmod 777 /var/chroot/Main.java");

			//Compiling the file
			echo "<br>Compiling...<br>";
			system("sudo javac /var/chroot/Main.java");
			system("sudo chmod 777 /var/chroot/Main.class");

			//echo "<br>/var/www/onj/upload/compiler ".$filename." /var/www/onj/users/".$user."/".$name.".".$extension." ".$extension."<br>";			
			//system("sudo /var/www/onj/upload/compiler ".$filename." /var/www/onj/users/".$user."/".$name.".".$extension." ".$extension);
			// echo "sudo /var/www/online_judge_iitk/onj/backend/upload/compiler /var/www/online_judge_iitk/onj/backend/submissions/".$name.".".$extension." ".$extension;
			// system("sudo /var/www/online_judge_iitk/onj/backend/upload/compiler ".$filename." /var/www/online_judge_iitk/onj/backend/submissions/".$name.".".$extension." ".$extension);

			if (!file_exists("/var/chroot/Main.class"))
			{
				echo "compilation error";
				//updating to database that submission has compilation error
				$sql = "UPDATE `files_submitted` SET `status`='120' WHERE `id`='$id'";
				mysql_query($sql);
				continue;
			}

			$filename = "Main.class";
		}

		else
		{
			echo "c";
			//Random file name generation
			$chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
			$length = 8;
			$filename = '';
			for($i = 0; $i < $length; $i++)
			{
				$filename .= $chars[mt_rand(0, 35)];
			}
		
			//Compiling the file
			//echo "<br>/var/www/onj/upload/compiler ".$filename." /var/www/onj/users/".$user."/".$name.".".$extension." ".$extension."<br>";
			echo "<br>Compiling...<br>";
			//system("sudo /var/www/onj/upload/compiler ".$filename." /var/www/onj/users/".$user."/".$name.".".$extension." ".$extension);
			echo "sudo /var/www/online_judge_iitk/onj/backend/upload/compiler ".$filename." /var/www/online_judge_iitk/onj/backend/submissions/".$name.".".$extension." ".$extension;
			system("sudo /var/www/online_judge_iitk/onj/backend/upload/compiler ".$filename." /var/www/online_judge_iitk/onj/backend/submissions/".$name.".".$extension." ".$extension);


			//Check if executable is formed.
			if (!file_exists("/var/chroot/".$filename))
				{
					echo "compilation error";
					//updating to database that submission has compilation error
					$sql = "UPDATE `files_submitted` SET `status`='120' WHERE `id`='$id'";
					mysql_query($sql);
					continue;
				}
			else
				{
					system("sudo chmod 777 ./".$filename);
				}
		}

		//updating to database that program is succesfully compiled and is currently running
		$sql = "UPDATE `files_submitted` SET `status`='1110' WHERE `id`='$id'";
		mysql_query($sql);

		//Get number of input files to test the submission on
		if (!($query1 = mysql_query("SELECT `num_input_file`, `time_limit`, `mem_limit` FROM `problems` WHERE `problem_id`='$prob_id'")))
			echo "Unable to fetch problem data";

		$prob_data = mysql_fetch_array($query1);
			
		$in=1;
		$ans = true;
		
		while ($in<=$prob_data['num_input_file'] && $ans)
		{	
			//shell_exec ("chmod 777 /var/chroot/".$filename);
		//	$trunc = fopen("/var/chroot/error","w");
                       // system ("sudo chmod 777 /var/chroot/error");
                       // fclose($trunc);
			//Structure of arguments
			// ./judge <file to execute> <input file> <extension> <time limit> <memory limit> <file to save output in>
	    	
			//updating to database that program is being run on ($in)th output file 
	    	$sql = "UPDATE `files_submitted` SET `status`='".(1000*$in+110)."'' WHERE `id`='$id'";
			mysql_query($sql);


	    	echo "<br>Running judge...<br>";
	    	//system ("sudo /var/chroot/judge ".$filename." /var/www/onj/problems/".$prob_id."/".$in.".in ".$extension." ".$prob_data['time_limit']." ".$prob_data['mem_limit']." out.txt");
	    	system ("sudo /var/chroot/judge ".$filename." /var/www/online_judge_iitk/onj/backend/problems/".$prob_id."/".$in.".in ".$extension." ".$prob_data['time_limit']." ".$prob_data['mem_limit']." out.txt");
			echo "<br>sudo /var/chroot/judge ".$filename." /var/www/online_judge_iitk/onj/backend/problems/".$prob_id."/".$in.".in ".$extension." ".$prob_data['time_limit']." ".$prob_data['mem_limit']." out.txt<br>";	    	

	    	// exec ("rm /var/chroot/".$filename);

	    	//truncate the file
			$trunc = fopen("/var/chroot/check", "w");
			system ("sudo chmod 777 /var/chroot/check");
			fclose($trunc);
			
			//redirect differences in output generated and ideal output to file 'check'
			//system ("diff /var/chroot/out.txt /var/www/onj/problems/".$prob_id."/".$in.".out >/var/chroot/check");
			system ("diff -B /var/chroot/out.txt /var/www/online_judge_iitk/onj/backend/problems/".$prob_id."/".$in.".out >/var/chroot/check");
			
			//Correct answer: Size of check = 0
			if (filesize("/var/chroot/check")==0)
			{
				echo "<br>correct!<br>";
				// $sql = "UPDATE files_submitted SET `status`='111', `runtime`='$mttime'  WHERE `id`='$id'";
				// mysql_query($sql);
				$ans = true;
			}
			else if (readfile("/var/chroot/tle_check")==5)
			{
				echo "<br>TLE!!<br>";
				$sql = "UPDATE files_submitted SET status='114' WHERE id='$id'";
				mysql_query($sql);
				$ans = false;
			}
			else if (readfile("/var/chroot/tle_check")==4)
			{
				echo "<br>Runtime Error!!<br>";
				$sql = "UPDATE files_submitted SET status='113' WHERE id='$id'";
				mysql_query($sql);
				$ans = false;
			}
			//Wrong Answer
			else
			{
				echo "<br>Wrong ans<br>";
				$sql = "UPDATE files_submitted SET status='112' WHERE id='$id'";
				mysql_query($sql);
				$ans = false;
			}
			$in++;
		}

		if($ans==true)
		{
			$file = fopen("/var/chroot/usage.txt","r");
			$mtime = fread($file, filesize("/var/chroot/usage.txt"));
			$mttime = substr($mtime, -9, 8);
			echo "<h1>".$mttime."</h1>";
			// $sql = "UPDATE files_submitted SET status='111' WHERE id='$id'";
			$sql = "UPDATE files_submitted SET `status`='111', `runtime`='$mttime'  WHERE `id`='$id'";
			mysql_query($sql);
			
			$url = "http://localhost/online_judge_iitk/onj/leaderboard/update_ranking/".$id ;
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HEADER, false);
			$data = curl_exec($curl);
			// echo $data; 
			curl_close($curl);
		}
	}
}
?>
