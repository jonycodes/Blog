<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require ('connect.php');
require('add_post.php');

$delete = new Post();
$id = $delete->findId();

 function delete(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
   if(mysql_query("DELETE * FROM list WHERE id='$id'")){
       echo "Delete sucessful";
     }
    }
}
delete();


?>

