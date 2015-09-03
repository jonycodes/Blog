<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register Blog+</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Go Back</a>
        <form action="register.php" method="POST">
            Enter username: <input type='text' name='username' autocomplete="off" required/>
            Enter password: <input type='password' formaction='register.php' name='password' autocomplete="off" required/>
            First Name: <input type='text' name='fName' value="Required" required/>
            Last Name: <input type='text' name='lName' value="Required" required/>
            <input type='submit' value='register'>
         </form>
            
            
         <?php
        if ($_SERVER["REQUEST_METHOD"]  == 'POST'){

                $username = mysql_real_escape_string($_POST["username"]);
                $password = mysql_real_escape_string($_POST["password"]);
             
                  $bool = true;
                  $conn = mysql_connect('localhost', 'root', "");
                       if (!$conn){
                        die ("could not connect".mysql_error());
                       } 
                  mysql_select_db('first_db');
                  $querry = mysql_query('SELECT * FROM users');
                      if(!$querry){
                        die ('could not access data base'.mysql_error());                     
                  while($row = mysql_fetch_array($querry)){
                      $table_users = $row['username'];
                      if($username == $table_users){
                        $bool = false;
                         echo "username exists";
                         //print '<script>windo.location.assign("register.php");</script>';
                      }
                    }
                      if($bool){
                        mysql_query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
                        echo "Successfully enrolled";
                        //print "<script>windows.location.assign('register.php');</script>";
                      }
                }

        
        ?>
    </body>
</html>
