<?php
include_once "connection.php";

$id = $_GET['id'];

$q = " DELETE FROM `registered_info` WHERE id = $id ";

mysqli_query($conn, $q);

header('location:display.php');
?>