<?php
session_start();
include './config.php';
$name =  mysqli_escape_string($connection, $_POST['categoryName']);
$color = $_POST['colorName'];
$description = $_POST['categoryDescription'];
$filename = $_FILES['categoryImage']['name'];
$tmpName = $_FILES['categoryImage']['tmp_name'];

// move the file into the category_images folder


move_uploaded_file($tmpName, './category_images/' . $filename);

// write the query

$insert = "INSERT INTO category (name,description,color,image) VALUES ('{$name}','{$decription}','{$color}','{$filename}')";


try {
    mysqli_query($connection, $insert);
    // set a session for success message
    $_SESSION['success_category'] = 'Category added successfully!';
} catch (Exception $e) {
    if ($e->getCode() == 1062) {
        $_SESSION['duplicate_entry'] = 'Category already exists';
    }
}

// execute the query








// return back to the current page
header("Location: {$_SERVER['HTTP_REFERER']}");
