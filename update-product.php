<?php
session_start();
include './config.php';
$id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$category = $_POST['category'];
$location = $_POST['location'];
$description = $_POST['description'];


$update = "UPDATE product SET name = '{$product_name}',price = '{$price}',c_id = '{$category}',location = '{$location}',description = '{$description}' WHERE id = $id ";

mysqli_query($connection, $update);
$_SESSION['update_success_prod'] = 'Product updated!';
header("Location: {$_SERVER['HTTP_REFERER']}");
