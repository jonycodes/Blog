<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<head>
    <meta charset="UTF-8">
    <title>Blog+ Home</title>
    <link rel="stylesheet" href="../css/bootstrap-3.3.4-dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
    <?php

session_start();

if (!($_SESSION['user'])) {
        
        Print "<script>alert('Please Log in');</script>;";
        
        header('location:index.php');
}

$user = $_SESSION['user'];

?>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-3 label label-primary">
                <h2>Blog+</h2>
            </div>
            <div class="col-md-1 right">
                <?php

                $username = $_SESSION['user'];

                Print "<h2>" . $username . "</h2>";

                ?>
            </div>
            <div class="col-md-1 right user">
                <a href="#profile" class="profile" id="profile">
                    <button type="button"  class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-user"></span>
                    </button>
                </a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default">
        <div class="container col-md-12">
        </div>
    </div>
    <section class="main side-padding">
        <div class="post-box min-medium align-center">
            <form action="add.php" method="POST">
                <textarea name="text" id="text-post" value="Enter Post" cols="55" rows="10"></textarea><br/><br/>
                Public? <input type="checkbox" name="public" value="public">
                <input type="submit" value="Add Post" class="button" name="text-post"><br>
            </form>
            <form action='add.php' method='POST' enctype='multipart/form-data'>
                <input type='file' name='file'>
                Public? <input type="checkbox" name="public" value="public">
                <input type="submit" value="Add Image" name='file'>
            </form>
        </div>
        <?php 

        require 'init.php';
        
        $add = new add_post();

        $add->addPost();

        ?>

    </section>
</body>
</html>