<?php
$conn = mysqli_connect("localhost", "root", "", "school");

if (!$conn) {
    echo "error: " . mysqli_connect_error();
}

?>