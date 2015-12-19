<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'connect.php';

function getId() {
	if (isset($_POST['delete'])) {
		return $_POST['delete_post'];
	}
}

function delete() {
	
	$id = getId();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		mysql_query("DELETE FROM list WHERE id='$id'") or mysql_error();
	}

}
delete();
header("location: home.php");

?>

