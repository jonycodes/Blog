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
        <link rel="stylesheet" href="../css/bootstrap-3.3.4-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
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
                <input type='submit' value='register' name="submit_data" lass="align-center">
            </form>
            <a href="../index.php">Go Back Here</a>
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
function check() {
        if (isset($_POST['submit_data'])) {
                return true;
        }
        return false;
}
function getformData() {

        global $username, $password, $email;

        if (getrMethod() && check()) {

                $username = htmlentities($_POST["username"]);

                $password = md5($_POST["password"]);

                $email = htmlentities($_POST['email']);

                return true;
        }
        return false;
}
function checkUser($username) {

        $querry = mysql_query('SELECT username FROM users');

        while ($row = mysql_fetch_array($querry)) {
                $table_users = $row['username'];
                if ($username == $table_users) {
                        return true;
                }
        }
        return false;
}
function addData($username, $password, $email) {

        if (!checkUser($username)) {
                if (mysql_query("INSERT INTO users (username, password, email) VALUES ('$username', '$password','$email')")) {
                        return true;
                }
        } else {
                return false;
        }
}

if (getformData()) {
        require 'connect.php';
        if (addData($username, $password, $email)) {
                echo "<script> alert('You're in, Welcome!'); </script>";
        } else {
                echo "<script> alert('Something went wrong'); </script>";
        }
}
?>
    </body>
</html>