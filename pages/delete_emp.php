<?php

include_once ("../includes/connection.php");
$query = "DELETE FROM employee WHERE id={$_GET['delete_id']}";
$rs = mysqli_query($conn,$query);
if(!$rs){
    die(mysqli_error($conn));
}
header("Location: ../employee.php");