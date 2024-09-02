<?php
include("database/dbcon.php");

$id= $_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM `student` WHERE `id` = '$id'");
    if ($delete) {
        echo "<script> alert('data successfully deleted');</script>";
        echo "<script> window.location.assign('index.php');</script>";
    
    }else{
        echo "something Wrong";
    }

?>