<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        require("connect.php");
        $post = '';
        $id = 0;
        $query = mysql_query("SELECT * FROM list");
        while ($row = mysql_fetch_assoc($query)) {
            $id = $row['id'];
        }

        while ($id >= 1) {
            if ($id > 0) {
                $query = mysql_query("SELECT * FROM list WHERE id='$id'");
                $row = mysql_fetch_assoc($query);
                $post = $row["details"];
                $time = $row["time_posted"];
                $date = $row["date_posted"];
                $user = $row["user"];
                $file_location = $row["file_location"];
                if ($post != null) {
                    echo "<br/>
                  <div class='align-center min-h-small min-small post-box'>Posted by <strong> " . strtoupper(substr($user, 0, 1)).substr($user,1) . 
                            " </strong> at " . $time . " on " . $date . "<br/><div class='post'>"
                    . $post .
                    "</div><form action='delete_post.php' method='POST'> 
                        <input type='submit' value = 'delete post' name = ".$id.">  
                     </form> </div>";
                }else{
                    echo "<br/>
                  <div class='align-center min-h-small min-small post-box'>Posted by <strong> " . strtoupper(substr($user, 0, 1)).substr($user,1)  . 
                            " </strong> at " . $time . " on " . $date . "<br/>"
                            . "<div class='post img align-center'><img src='".urldecode($file_location)."' alt = 'File not found'></div>     
                            <form action='delete_post.php' method='POST'> 
                        <input type='submit' value = 'delete post' name = ".$id.">  
                     </form>    
                          </div>";
                }
            }
            $id--;
        }


