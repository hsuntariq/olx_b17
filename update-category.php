<?php
session_start();
include './config.php';
$id = $_POST['id'];
$name = $_POST['name'];
$color = $_POST['color'];
$description = $_POST['description'];

$filename = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];


move_uploaded_file($tmp_name, './category_images/' . $filename);

if ($_FILES['image']['size'] == 0) {
    $update = "UPDATE category SET name = '{$name}',color = '{$color}',description = '{$description}' WHERE id = $id";
    mysqli_query($connection, $update);
} else {
    $update = "UPDATE category SET name = '{$name}',color = '{$color}',description = '{$description}',image = '{$filename}' WHERE id = $id";
    mysqli_query($connection, $update);
}




$_SESSION['update_success'] = 'Category Updated Successfully!';

header("Location: {$_SERVER['HTTP_REFERER']}");
