<?php

$time =  date('g:i', time());  
$date = date ('D M Y');
$data;

	session_start();
	if(!($_SESSION["user"])){
		header('location:index.php');
	}

 
     require('connect.php');
  		
     function getrMethod(){
       	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			return true;
     	}
		return false;
     }
  

 	function getPost()
 	{
 		if(getrMethod())
 		{
 		global $data;
 		$data = mysql_real_escape_string($_POST['text']);
    	}
    	
    }
    
	function addData($data, $time, $date) 
	{
 		mysql_query("INSERT INTO list (details, date_posted, time_posted) VALUES ('$data', '$date', '$time')") or die("Could not Connect to Data base".mysql_error());
  	    }

	getPost();
    addData($data, $time, $date);
	header("location: home.php");

?>