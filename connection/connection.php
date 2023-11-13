<?php
    $conn = mysqli_connect("localhost", "root", "", "ecommerce");
    if(!$conn){
        die("cannot connect to the database");
    }
?>