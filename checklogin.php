<?php 
session_start();

$username = mysql_real_escape_string($_POST['username']);

$password = mysql_real_escape_string($_POST['password']);

mysql_connect('localhost','root','') or die(mysql_error());

mysql_select_db('first_db');

$query = mysql_query("SELECT * FROM users WHERE username='$username'");

$table_users='';

$table_password='';

$exists = mysql_num_rows($query);

	if($exists > 0){
		while ($row=mysql_fetch_assoc($query)){
    		$table_users=$row['username'];
			$table_password=$row['password'];
      	}
     	if(($username == $table_users) && ($password == $table_password)){
      		if($password == $table_password){
      			$_SESSION['user'] = $username;
      			header('location: home.php');	
      		}
      		$user = $_SESSION['user'];
      	}
      	else{
      		Print "<script>alert('Invalid Password');</script>";
      		Print "<script>window.location.assign('login.php');</script>";
      	}
      }
 	else{
      		Print "<script>alert('Invalid Username');</script>";
      		Print "<script>window.location.assign('login.php');</script>"; 
    }
?>