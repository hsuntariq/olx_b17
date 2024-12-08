<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Layout</title>
    <?php include './boot_css.php' ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        .sidebar {
            height: 100vh;
        }

        .nav-item {
            margin: 10px 0;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card h4,
        .card p {
            margin: 0;
        }



        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header img {
            width: 80px;
            border-radius: 50%;
        }

        .form-header h2 {
            font-weight: bold;
            margin-top: 15px;
            color: #333;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }


        .popup {
            position: fixed;
            bottom: 20px;
            /* Start outside the viewport */
            right: 20px;
            width: 300px;
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.5s ease-in-out;
            z-index: 1000;
            transform: translateY(300px);
        }

        .popup.show {
            bottom: 20px;
            /* Slide into view */
        }

        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .popup-header h4 {
            margin: 0;
        }

        .popup-header .close-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }

        .popup-body {
            margin-top: 10px;
        }

        .popup-body p {
            margin: 0;
        }
    </style>
</head>

<body>



    <?php
    if (isset($_SESSION['success_product'])) {
    ?>

        <div class="popup" id="popup">
            <div class="popup-header">
                <h4>Notification</h4>
                <button class="close-btn" id="closePopup">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="popup-body">
                <p>
                    <?php echo $_SESSION['success_product'] ?>
                </p>
            </div>
        </div>

    <?php
    }

    unset($_SESSION['success_product'])


    ?>




    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 bg-dark text-light sidebar">
                <?php include './sidebar.php' ?>
            </div>

            <!-- Main Content -->
            <div class="col-xl-10 col-lg-9 col-md-8">
                <div class="container  p-4 d-flex  justify-content-center">
                    <div class="form-container col-lg-7 shadow p-4 rounded-3">
                        <div class="form-header">
                            <img src="https://via.placeholder.com/150" alt="product Icon">
                            <h2>Add New Product</h2>
                        </div>
                        <form action="./add-product-data.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="productName" class="form-label">
                                    <i class="fas fa-tag"></i> product Name
                                </label>
                                <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">
                                    <i class="fas fa-tag"></i> product Price
                                </label>
                                <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter product price" required>
                            </div>
                            <div class="mb-3">
                                <label for="">
                                    Category
                                </label>
                                <select name="product_category" id="" class="form-control">
                                    <option value="" selected disabled>Select category</option>
                                    <?php
                                    include './config.php';
                                    $select = "SELECT * FROM category";
                                    $result = mysqli_query($connection, $select);
                                    foreach ($result as $item) {
                                    ?>

                                        <option value="<?php echo $item['id'] ?>">
                                            <?php echo $item['name'] ?>
                                        </option>

                                    <?php
                                    }
                                    ?>

                                </select>


                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">
                                    <i class="fas fa-pen"></i> Description
                                </label>
                                <textarea class="form-control" id="productDescription" name="productDescription" rows="3" placeholder="Write a brief description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="productLocation" class="form-label">
                                    <i class="fas fa-pen"></i> Location
                                </label>
                                <textarea class="form-control" id="productLocation" name="productLocation" rows="3" placeholder="Write a brief Location" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="productImage" class="form-label">
                                    <i class="fas fa-image"></i> Upload Image
                                </label>
                                <input type="file" multiple class="form-control" id="productImage" name="productImage[]" accept="image/*" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn w-100 btn-primary">
                                    <i class="fas fa-plus-circle"></i> Add product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <?php
    include './boot_js.php'
    ?>

    <script>
        // Get the popup and close button
        const popup = document.getElementById('popup');
        const closePopup = document.getElementById('closePopup');

        // Function to show popup
        //function showPopup() {
        //    popup.classList.add('show');
        //}


        if (popup) {
            popup.style.transform = 'translateY(0)'
        }

        if (popup) {
            setTimeout(() => {
                popup.style.transform = 'translateY(300px)'
            }, 3000)
        }





        // Function to hide popup
        closePopup.addEventListener('click', () => {
            popup.style.transform = 'translateY(300px)';
        });
    </script>


</body>

</html>