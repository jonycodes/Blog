

<?php
 
 $name = "";
 $size = "";
 $type = "";
 $location = "";
 $time = "";  
 $date = ""; 

   
    if (isset($_POST['file'])) {
        global $time, $date, $name, $size, $type;
        $time = date("g:i:s", time());
        $date = date('D M Y');
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        if (!empty($name)) {
            return true;
        } else {
           return false;
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

 function checkfileSize() {
     global $size;
    if ($size > 4194304) {
        return true;
    }
    return false;
}

 function uploadFile() {    
     global $location, $name;
        if ($checkfileSize()) {
                return false;
            }else
            
            if ($checkfileType()) {
            $location = "uploads/" . $_FILES['file']['name'];
            $name = $_FILES['file']['tmp_name'];
                if(is_uploaded_file($name)){
                move_uploaded_file($name, $location);
                addtoServer(); 
                return true;
                }
             }  else
            return false;
    }


 function addtoServer() {
    session_start();
    require('connect.php');
    $user = $_SESSION['user'];
    mysql_query("INSERT INTO list(time_posted, date_posted, file_location, user) VALUES ('$time', '$date', '$location', '$user')") or
            die("Could not insert image into data base".mysql_error());
}

uploadFile();

header("location: home.php");

?>
