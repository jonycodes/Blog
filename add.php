<?php
require_once('connect.php');

$time = date('g:i:s', time());
$date = date('D M Y');
$data = "";
session_start();
if (!(isset($_SESSION["user"]))) {
    header('location:index.php');
}

function checkformName(){
    if(isset($_POST['text']))
        return true;
    return false;
}


function getrMethod() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        return true;
  return false;
}

function getData($form_name) {
    if (getrMethod()) 
        return htmlentities($_POST[$form_name], ENT_QUOTES);
    
}

function addData($table_name,$data, $time, $date, $user) {
    mysql_query("INSERT INTO $table_name (details, time_posted , date_posted , user) VALUES ('$data', '$time', '$date', '$user')")
            or die(mysql_error());
}

function getTable(){
    if(checkformName())
        return "list";
    return "list_details";
}

function getformName(){
 if(checkformName())
    return "text";
return "comment-data";
}

$data = getData(getformName());
$user = $_SESSION['user'];
echo $data;
addData(getTable(),$data, $time, $date, $user);
header("location: home.php");
?>
