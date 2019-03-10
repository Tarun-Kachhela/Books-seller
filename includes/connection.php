<?php

include_once ("config.php");
$conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);
//echo $conn;
if(!$conn){
    die(mysqli_connect_error());
}

?>