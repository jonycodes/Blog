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
        <h2>Login</h2>
        <form action='checklogin.php' method='POST'>
            Username: <input type='text' name='username' required/>
            Password: <input type='password' name='password' required/>
            <input type='submit' value="Login"/>
        </form>
    </body>
</html>