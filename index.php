<?php

// create database
/*$sql = "CREATE DATABASE record";*/

//checking database
/*if(mysqli_query($conn, $sql)){
    echo "database created";
}*/

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contact_no = $_POST['contact_no'];
$city = $_POST['city'];
$gender = $_POST['gender'];

$sql = "INSERT INTO `record`registered_info`(`firstname`, `lastname`, `email`, `contact_no`, `city`, `gender`) VALUES ('$firstname','$lastname','$email','$contact_no','$city','$gender')";
if($conn->query($sql) == true){
    }
$conn->close();
?>