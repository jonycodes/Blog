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
        <link rel="stylesheet" href="css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <div class="header text-center">
            <h2>Registration Page</h2>

        </div>
        <div class="register-form align-center text-right">
            <form action="register.php" method="POST">
                Enter username: <input type='text' name='username' autocomplete="off" required/><br/>
                Enter password: <input type='password' formaction='register.php' name='password' autocomplete="off" required/><br/>
                Enter Email Address' <input type="email" name="email" required/><br/>
                <input type='submit' value='register' class="align-center">
            </form>
            <a href="index.php">Go Back Here</a>
        </div>    

        <?php
        $username;
        $password;
        $email;

        function getrMethod() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                return true;
            }
            return false;
        }

        function getformData() {
            global $username, $password, $email;
            if (getrMethod()) {
                $username = htmlentities($_POST["username"]);
                $password = md5($_POST["password"]);
                $email = htmlentities($_POST['email']);
            }
        }

        function checkUser($username) {

            $querry = mysql_query('SELECT username FROM users');
            while ($row = mysql_fetch_array($querry)) {
                $table_users = $row['username'];
                if ($username == $table_users) {
                    return false;
                }
            }
            return true;
        }

        function addData($username, $password, $email) {
            if (checkUser($username)) {
                mysql_query("INSERT INTO users (username, password, email) VALUES ('$username', '$password','$email')");
                echo "You signed up successfully";
                header("location:login.php");
            } else {
                echo "Username taken";
            }
        }

        function sendEmail() {
            $to = $email;
            $subject = "Blog+";
            $message = "<h1>Welcome to Blog+</h1>";
            $message = "<b>You have signed up for Blog+</b>";
            $sent = mail($to, $subject, $message, $header);
            if ($sent) {
                Print "<script>alert('We have sent you and email');</script>";
            }
        }

        require('connect.php');
        getformData();
        addData($username, $password, $email);
        ?>
    </body>
</html>
