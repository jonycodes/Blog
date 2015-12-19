<?php

/*
 *This form is set up to handle Text and Images inputs,
 *as well as Comments input in case you want to implement it
 *Only image posts and Text posts are turned on
 */

require_once 'connect.php';

$time = date('g:i:s', time());

$date = date('D M Y');

$data = "";

session_start();

if (!(isset($_SESSION["user"]))) {
        header('location: ../index.php');
}

function checkformName() {
        if (isset($_POST['text'])) {
                return true;
        }

        return false;
}

function find_Id() {
        $id = new add_post();
        return $id->findId();
}

function getrMethod() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                return true;
        }

        return false;
}

function getData($form_name) {
        if (getrMethod()) {
                return htmlentities($_POST[$form_name], ENT_QUOTES);
        }
}

function addData($table_name, $data, $time, $date, $user) {

        $status = isPublic();

        if ($table_name == "list") {
                mysql_query("INSERT INTO $table_name (details, time_posted , date_posted , user, status) VALUES ('$data', '$time', '$date', '$user', '$status')")
                or die(mysql_error());
        } else {
                $post_id = getData('post_id');
                mysql_query("INSERT INTO $table_name (details, time_posted , date_posted , user, post_id) VALUES ('$data', '$time', '$date', '$user', '$post_id')") or die(mysql_error());
        }
}

function getTable() {
        if (checkformName()) {
                return "list";
        }

        return "list_details";
}

function getformName() {
        if (checkformName()) {
                return "text";
        }
        return "comment-data";
}

function isPublic() {

        if (isset($_POST['public'])) {
                return 'public';
        } else {
                return 'private';
        }

}

//HANDLES FILE UPLOADS

$name = "";

$size = "";

$type = "";

$location = "";

if (isset($_POST['file']) && $_SESSION['user']) {

        global $time, $date, $name, $size, $type;

        $time = date("g:i:s", time());

        $date = date('D M Y');

        $name = $_FILES['file']['name'];

        $size = $_FILES['file']['size'];

        $type = $_FILES['file']['type'];

        if (empty($name)) {
                print "No file set for upload";
                header("location: home.php");
        }

}

function checkfileType() {

        global $name, $type;

        $extension = strtolower(substr($name, strpos($name, '.') + 1));

        if (($type == "image/jpeg" || $type == "image/jpg") && ($extension == "jpg" || $extension = "jpeg")) {
                return true;
        }
        return false;

}

function uploadFile() {

        global $location, $name, $size, $time, $date;

        if (checkfileType() && $size < 4194304) {
                $location = "../uploads/" . $_FILES['file']['name'];
                $name = $_FILES['file']['tmp_name'];
                if (is_uploaded_file($name)) {
                        move_uploaded_file($name, $location);
                        addtoServer($time, $date, $location);
                        return true;
                }
        }
        return false;

}

function addtoServer($time, $date, $location) {

        $status = isPublic();

        $user = $_SESSION['user'];

        mysql_query("INSERT INTO list(time_posted, date_posted, file_location, user, status) VALUES ('$time', '$date', '$location', '$user', '$status')") or
        die("Could not insert image into data base" . mysql_error());
}

if (isset($_POST["text-post"])) {

        $data = getData(getformName());

        $user = $_SESSION['user'];

        addData(getTable(), $data, $time, $date, $user);

} else if ($_POST["file"]) {

        uploadFile();

}

header("location: home.php");
