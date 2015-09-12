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
        	<div class="col-md-5 container post-box">
        		<form action="add.php" method="POST">	
				      <textarea name="text" id="text-post" value="Enter Post" cols="30" rows="10"></textarea><br/><br/>
				      <input type="submit" value="Add Post" class="button" />
        		</form>
        	</div>

        	<div class="col-md-5 container post-box right">
        		<p>
        		<?php 
        		  mysql_connect("localhost", "root");
        		  mysql_select_db("first_db");
        		  $query = mysql_query("SELECT * FROM list");
        		  
              while($row = mysql_fetch_assoc($query))
        		  {
                    $post = $row["details"];
                    $time = $row["time_posted"];
                    $date = $row["date_posted"];
              }
              echo "<p class=''>".$post."</p>";

        		 ?>
        		 </p>
        	</div>
		</section>

    </body>
</html>
