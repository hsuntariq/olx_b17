<?php
session_start();
include './config.php';
$id = $_GET['id'];


$delete = "DELETE FROM category WHERE id = $id";
mysqli_query($connection, $delete);

$_SESSION['delete_category'] = 'Category deleted Successfully!';

header("Location: {$_SERVER['HTTP_REFERER']}");
