<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        class add_post{
          
         private $id = 0;

        function __construct(){
        require("connect.php");
        $query = mysql_query("SELECT * FROM list");
        while ($row = mysql_fetch_assoc($query)) {
            $this->id = $row['id'];
        }       
       }

       function addText($User, $time, $date, $post, $id){
             echo "<br/>
                  <div class='align-center min-h-small min-small post-box'>Posted by <strong> " . $User . 
                            " </strong> at " . $time . " on " . $date . "<br/><div class='post'>"
                    . $post .
                    "</div>
                    <form action='add.php' method='POST'>
                    <textarea name = 'comment-data' cols='30' rows='1'>Comment on ".$User.htmlentities("'", ENT_QUOTES)."s post</textarea><br><br>
                    <input type='submit' value='Comment' class='button' name='comment'>
                    </form>
                    <form action='delete_post.php' method='POST'> 
                    <input type='submit' value = 'delete post' name = ".$id.">  
                    </form> 
                    </div>";
        }

        function addPicture($User, $time, $date, $file_location, $id){
              echo "<br/>
                  <div class='align-center min-h-small min-small post-box'>Posted by <strong> " . $User . 
                            " </strong> at " . $time . " on " . $date . "<br/>"
                            . "<div class='post img align-center'><img src='".urldecode($file_location)."' alt = 'Error loading this file'></div>     
                            <form action='delete_post.php' method='POST'> 
                        <input type='submit' value = 'delete post' name = ".$id.">  
                     </form>    
                          </div>";
        }
       
       
        public function addPost(){
                $id = $this->id;
                $sessionuser = $_SESSION['user'];
                
                while ($id >= 1) {
                $query = mysql_query("SELECT * FROM list WHERE id='$id'");
                $row = mysql_fetch_assoc($query);
                $post = $row["details"];
                $time = $row["time_posted"];
                $date = $row["date_posted"];
                $user = $row["user"];
                $file_location = $row["file_location"];
                $User = strtoupper(substr($user, 0, 1)).substr($user,1);
                if ($post != null && $sessionuser == $user ) {
                        $this->addText($User, $time, $date, $post, $id);
                }else if($file_location != null){
                        $this->addPicture($user, $time, $date, $file_location, $id);
                }
            $id--;
                }   
        }    

        public function findId(){
                $id = $this->id;
                while(!(isset($_POST[$id]))){
                       $id--; 
                }
            return $id;    
        }


 }

 
