<?php
session_start();
include './config.php';
$id = $_GET['id'];
$name = $_GET['name'];
$delete = "DELETE FROM product WHERE id = $id";

mysqli_query($connection, $delete);

$_SESSION['delete_product'] = $name . ' deleted!';

header("Location: {$_SERVER['HTTP_REFERER']}");
