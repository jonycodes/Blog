<?php

session_start();

function checkUser() {
	$username = mysql_real_escape_string($_POST['username']);
	$password = md5($_POST['password']);
	$query = mysql_query("SELECT * FROM users WHERE username='$username'");
	$exists = mysql_num_rows($query);
	$table_users = "";
	$table_password = "";
	if ($exists > 0) {
		while ($row = mysql_fetch_assoc($query)) {
			$table_users = $row['username'];
			$table_password = $row['password'];
		}

		if (($username == $table_users) && ($password == $table_password)) {
			if ($password == $table_password) {
				$_SESSION['user'] = $username;
				header('location:home.php');
			}
		} else {
			return false;
		}
	} else {
		return false;
	}
}

require 'connect.php';
if (checkUser() == false) {
	echo "<script>alert('Wrong user name or password');</script>";
	echo "<script>window.location.assign('login.php');</script>";
}
?>