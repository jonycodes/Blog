<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require('init.php');

$delete = new add_post();
$id = $delete->findId();

 function delete($id){
 	
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
   	echo $id;
   if(mysql_query("DELETE FROM list WHERE id='$id'")){
       echo "Delete sucessful";
     }
     else{
     	echo mysql_error();
     }
    }
}
delete($id);
header ("location: home.php");

?>

