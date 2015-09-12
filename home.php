<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->    
<head>
		<meta charset="UTF-8">
        <title>Blog+ Home</title>
        <link rel="stylesheet" href="css/bootstrap-3.3.4-dist/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
    <body>
        
        <?php
        	session_start();
        	if(!($_SESSION['user']))
        	{
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
            		Print "<h2>".$username."</h2>";
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
        	<div class="post-box align-center">
        		<form action="add.php" method="POST">	
				      <textarea name="text" id="text-post" value="Enter Post" cols="55" rows="10"></textarea><br/><br/>
              
				      <input type="submit" value="Add Post" class="button" />
        		</form>
        	</div>

        	<?php 
        		  require("connect.php");
        		  $post = '';
              $id = 0;
              $query = mysql_query("SELECT * FROM list");
              while($row = mysql_fetch_assoc($query))
              {
                $id = $row['id'];
              }
              
              $count = 1;
              while($count <= $id)
              {
                if($id > 0)
                {
                  $query = mysql_query("SELECT * FROM list WHERE id='$count'");
                  $row = mysql_fetch_assoc($query);
                  $post = $row["details"];
                  $time = $row["time_posted"];
                  $date = $row["date_posted"];
                  $user = $row["user"];
                  echo "<br/>
                  <div class='align-center min-h-small min-small post-box'>Posted by ".$user." at ".$time." on ".$date."<br/><div class='post'>"
                  .$post.
                  "</div></div>";
                }
                  $count++;
              }
          ?>
        		 
		</section>

    </body>
</html>
