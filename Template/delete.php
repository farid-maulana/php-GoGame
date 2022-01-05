<?php

include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM game WHERE id = $id";
mysqli_query($connect, $sql);

header('location: index.php');
?>