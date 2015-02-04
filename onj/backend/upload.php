<?php

//NOT YET WORKING FOR JAVA

//To be made dynamic
$user='sid';
$prob_id = 'sum';
//

//Load "files" database
require("connect_db.php");

//Get name of uploaded file
$name = $_FILES['file']['name'];

//If no file!!
if (empty($name))
	exit ("Please upload a file");

//Get size
$size = $_FILES['file']['size'];

if ($size > 50000)
	exit ("Your source is too large!");


//Get temporary name for location change
$tmpname = $_FILES['file']['tmp_name'];

//Get language of code to compile
$extension = $_POST['lang'];

$query = mysql_query("SELECT `id` FROM `files_submitted` ORDER BY `id` DESC");
$q = mysql_fetch_assoc($query);
if (mysql_num_rows($query)!=0)
	$name = $q['id'];
else $name = 2;
$name++;
echo $name;

//Move the file
if (!move_uploaded_file($tmpname, 'users/sid/'.$name.".".$extension))
{
	echo "unable to upload";
	exit(0);
}
else echo "Evaluating...<br>";

date_default_timezone_get();
$date = date('m/d/Y h:i:s a', time());
echo $date;

//Push the file into database.
$query = "INSERT INTO `files_submitted`(`id`, `prob_id`, `lang`, `time`, `status`, `username`, `runtime`, `memory`, `contestid`, `points`) VALUES (NULL, '$prob_id', '$extension', '$date', '-1', '$user', '-1', '-1', 'MayLT', '0') ";
mysql_query($query);

?>