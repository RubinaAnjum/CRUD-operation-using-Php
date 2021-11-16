<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="record";


//creating connection
$conn = mysqli_connect($servername, $username, $password,$db);

//checking connection
if(!$conn){
    die("connection failed due to " .mysqli_connect_error());
}

?>