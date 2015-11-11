<?php
require_once('connect.php');

$time = date('g:i:s', time());
$date = date('D M Y');
$data = "";

session_start();
if (!(isset($_SESSION["user"]))) {
    header('location:index.php');
}


function getrMethod() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    }
    return false;
}

function getPost() {
    if (getrMethod()) {
        global $data;
        $data = htmlentities($_POST['text'], ENT_QUOTES);
    }
}

function addData($data, $time, $date, $user) {
    echo $date;
    mysql_query("INSERT INTO list (details, time_posted,date_posted, user) VALUES ('$data', '$time', '$date', '$user')")
            or die(mysql_error());
}

getPost();
$user = $_SESSION['user'];
addData($data, $time, $date, $user);
header("location: home.php");
?>
