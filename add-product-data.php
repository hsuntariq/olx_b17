<?php
session_start();
include './config.php';
$files = $_FILES['productImage'];

$count = 0;
$images = [];
foreach ($files['name'] as $key => $value) {
    $filename = $files['name'][$key];
    $tmp_name = $files['tmp_name'][$key];
    move_uploaded_file($tmp_name, './product_images/' . $filename);
    array_push($images, $filename);
    $count++;
}

$convertedImages = implode(',', $images);
$product_name = $_POST['productName'];
$product_price = $_POST['productPrice'];
$product_category = $_POST['product_category'];
$product_description = $_POST['productDescription'];
$product_location = $_POST['productLocation'];


$insertProduct = "INSERT INTO product (name,price,c_id,description,location,u_id,image) VALUES ('{$product_name}','{$product_price}','{$product_category}','{$product_description}','{$product_location}',2,'{$convertedImages}')";

mysqli_query($connection, $insertProduct);

$_SESSION['success_product'] = 'Product added successfully!';

header("Location: {$_SERVER['HTTP_REFERER']}");
