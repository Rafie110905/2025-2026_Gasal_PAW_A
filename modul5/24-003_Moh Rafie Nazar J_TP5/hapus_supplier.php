<?php
include 'config.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM supplier WHERE id='$id'");

header("Location: supplier.php");
?>