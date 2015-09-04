<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        
        if($_SESSION['user']){
        
        }
        else{
        		Print "<script>alert('Please Log in');</script>;";
        	header('location:index.php');
        }
        $user = $_SESSION['user'];
        
        ?>

        <a href="logout.php">Click here to logout</a>



    </body>
</html>
