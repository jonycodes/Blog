
<?php
 class upload{
private $name = "";
private $size = "";
private $type = "";
private $location = "";
private $time = "";  
private $date = ""; 

    public function __construct(){
    if (isset($_POST['file'])) {
        $this->time = date("g:i:s", time());
        $this->date = date('D M Y');
        $this->name = $_FILES['file']['name'];
        $this->size = $_FILES['file']['size'];
        $this->type = $_FILES['file']['type'];
        if (!empty($name)) {
            return true;
        } else {
            echo "<script>alert('Please choose  file first');</script>";
            echo "<script>window.location.assign('home.php');</script";
        }
    }
}


private function checkfileType() {
    $extension = strtolower(substr($this->name, strpos($this->name, '.') + 1));
    if (($this->type == "image/jpeg" || $this->type == "image/jpg") && ($extension == "jpg" || $extension = "jpeg")) {
        return true;
    }
    return false;
}

private function checkfileSize() {
    if ($this->size > 4194304) {
        return false;
    }
    return true;
}

public function uploadFile() {       
        if (!$this->checkfileSize()) {
                echo "<script>alert('File is over 4MB');</script>";
                echo "<script>window.location.assign('home.php');</script>";
                return false;
            }else
            
        if ($this->checkfileType()) {
            $this->location = "uploads/" . $_FILES['file']['name'];
            $this->name = $_FILES['file']['tmp_name'];
            move_uploaded_file($name, $location);
            addtoServer();
            echo "<script>alert('File Upload Sucessful');</script>";
            echo "<script>window.location.assign('home.php');</script>";
            return true;
        } 
    }


private function addtoServer() {
    session_start();
    require('connect.php');
    $user = $_SESSION['user'];
    mysql_query("INSERT INTO list(time_posted, date_posted, file_location, user) VALUES ('$this->time', '$this->date', '$this->location', '$user')") or
            die("Could not insert image into data base".mysql_error());
}

}
?>
<form action='upload.php' method='POST' enctype='multipart/form-data'>
    
    <input type='file' name='file'>
    <input type="submit" value="Add Image" name='file'>

</form>
