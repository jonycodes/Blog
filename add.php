<?php

$time = date('g:i:s', time());
$date = date('D M Y');
$data = "";

session_start();
if (!(isset($_SESSION["user"]))) {
    header('location:index.php');
}


require('connect.php');

function getrMethod() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    }
    return false;
}

function getPost() {
    if (getrMethod()) {
        global $data;
        /* @var $_POST type */
        $data = htmlentities($_POST['text']);
    }
}

function addData($data, $time, $date, $user) {
    mysql_query("INSERT INTO list (details, date_posted, time_posted, user) VALUES ('$data', '$date', '$time', '$user')")
            or die("Could not Connect to Data base" . mysql_error());
}

getPost();
$user = $_SESSION['user'];
addData($data, $time, $date, $user);
header("location: home.php");

?>
