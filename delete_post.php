<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require ('connect.php');
  
function findId(){
    $query = mysql_query("SELECT id FROM list");
    while($row = mysql_fetch_assoc($query)){
       
    }
}
       
function test(){
    
    
    $id = $_POST['id'];
    
    foreach ($id as $key ) {
        print $key;
    }
    
}


function hello(){
    if($_SERVER['REQUEST_METHOD']== 'POST'){
   if(mysql_query("DELETE * FROM list WHERE id='$id'")){
       echo "Deletes sucessful";
    }
    
}

   }

test();
?>

<form action="delete.php" method="POST">
    <input type="submit" value="delete" name="delete">
</form>