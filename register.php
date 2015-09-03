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
            Enter username: <input type='text' name='username'  required/>
            Enter password: <input type='password' name='username' required/>
            First Name: <input type='text' name='fName' value="Required" required/>
            Last Name: <input type='text' name='lName' value="Required" required/>
            <input type='submit' value='register'>
         </form>
            
            
         <?php
        if ($_SERVER["REQUEST_METHOD"]  == 'POST'){
                $username = mysql_real_escape_string($_POST['username']);
                $password = mysql_real_escape_string($_POST['password']);
                /*echo 'Username enter is : '. $username . "<br/>";
                echo 'Password entered is: ' . $password ;
                  */
                  $bool = true;
                  mysql_connect('localhost', 'root', ""); or die (mysql_error());
                  mysql_select_db('first_db') pr die('Cannot Connect to the server');
                $query =mysql_query("Select * from suers"); 
        }
        ?>
    </body>
</html>
