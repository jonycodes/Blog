<!DOCTYPE html>
<!--
Created by Joannier Pinales

Sept. 1 2015
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog+</title>
        <link rel="stylesheet" href="css/bootstrap-3.3.4-dist/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="welcome-msg container text-center">
            <?php
            echo "<h1>Welcome to Blog+</h2>";
            ?>
            <form action="register.php" class="align-center">
                <input type="submit" value="Register">
                <input type="submit" formaction="login.php" value="Login">
            </form>
        </div>
    </body>
</html>
