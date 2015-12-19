<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Comments Feature is Turned Off

 */
require 'init.php';
class add_post {

        private $id;

        /*
         *Counts the number of Posts to be loaded from
         *the Data Base
         *stores counter on id variable
         */

        function __construct() {

                require "connect.php";

                $query = mysql_query("SELECT * FROM list");

                while ($row = mysql_fetch_assoc($query)) {
                        $this->id = $row['id'];
                }

        }

        private function addPicture($file_location) {

                return "<img src='" . urldecode($file_location) . "' alt = 'Error loading this file'>";

        }

        private function adddeleteBox($id, $user) {

                $sessionuser = $_SESSION['user'];

                if ($sessionuser == $user) {
                        return "<form action='delete_post.php' method='POST'>
                        <input type='hidden' value = '" . $id . "' name='delete_post'>
                        <input type='submit' value='Delete' name = 'delete'>
                     </form>";

                } else {
                        return "";
                }

        }

        private function addimageWrapper($user, $time, $date, $file_location, $id) {

                return "<br/>

                    <div class='align-center min-h-small min-medium post-box'>

                        Posted by <strong> " . $this->toUpper($user) . " </strong> at " . $time . " on " . $date . "<br/>" .

                "<div class='post img align-center'>"

                . $this->addPicture($file_location) .

                /*$this->addcommentBox($id) .*/

                "</div>" . $this->adddeleteBox($id, $user) . "

             </div>";
        }

        private function addtextWrapper($user, $time, $date, $post, $id) {

                return "<br/>

                    <div class='align-center min-h-small min-medium post-box'>

                        Posted by <strong> " . $this->toUpper($user) . " </strong> at " . $time . " on " . $date . "<br/>

                            <div class='post'>"

                . $post . /*$this-> addCommentBox($id) . */"</div>"

                . $this->adddeleteBox($id, $user) .

                        "</div>";
        }

        private function toUpper($string) {

                return strtoupper(substr($string, 0, 1)) . substr($string, 1);

        }

        public function addPost() {

                $id = $this->id;

                $sessionuser = $_SESSION['user'];

                while ($id >= 1) {
                        $query = mysql_query("SELECT * FROM list WHERE id='$id'");

                        $row = mysql_fetch_assoc($query);

                        $user = $row["user"];

                        $post = $row["details"];

                        $status = $row['status'];

                        $file_location = $row["file_location"];

                        if ($post != null && ($status == "public" || $sessionuser == $user)) {
                                echo $this->addtextWrapper($row["user"], $row["time_posted"], $row["date_posted"], $post, $id);
                        } else if ($file_location != null && ($status == "public" || $sessionuser == $user)) {
                                echo $this->addimageWrapper($user, $row["time_posted"], $row['date_posted'], $file_location, $id);
                        }

                        $id--;

                }

        }

        /* Comments Turn Off

private function getccommentId() {

$query = mysql_query("SELECT id FROM list_details");

while ($row = mysql_fetch_assoc($query)) {

$id = $row['id'];

}

return $id;

}

Comments Turned Off

private function addcommentWrapper($User, $time, $date, $post, $id) {

return "<br/>

<div class='align-center min-h-small min-small comment-box'>

Comment by <strong> " . $User . " </strong> at " . $time . " on " . $date . "<br/>

<div class='post'>"

. $post . $this->adddeleteBox($id) .

"</div>" . "

</div>";

}

private function addcommentBox($id) {

return "<form action='add.php' method='POST'>

<textarea name  = 'comment-data' cols='30' rows='1'>Comment on post</textarea><br><br>

<input type='hidden' name='post_id' value='" . $id . "'>

<input type='submit' value='Comment' class='button' name='comment'>

</form>";

}

Comments Feature Turned Off

private function addComments($post_id) {

$this->linklist = new linklist();

$id = $this->getccommentId();

$sessionuser = $_SESSION['user'];

while ($id >= 1) {

$query = mysql_query("SELECT * FROM list_details WHERE id='$id' AND post_id='$post_id'");

$row = mysql_fetch_assoc($query);

$post = $row["details"];

$time = $row["time_posted"];

$date = $row["date_posted"];

$user = $row["user"];

$User = strtoupper(substr($user, 0, 1)) . substr($user, 1);

if ($post != null && $sessionuser == $user) {

$this->linklist->insert($this->addcommentWrapper($User, $time, $date, $post, $id));

}

$id--;

}

}

 */

}
