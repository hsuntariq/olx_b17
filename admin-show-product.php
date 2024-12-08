<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
    <?php include './boot_css.php' ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .table-container {
            margin: 30px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            height: 80px;
            width: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        .table th {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
            border: none;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-delete:hover {
            background-color: #b02a37;
        }

        .btn-view {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-view:hover {
            background-color: #218838;
        }

        body {
            background-color: #f8f9fa;
        }

        .category-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .category-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .category-card::-webkit-scrollbar {
            width: 0;
        }

        .category-image {
            height: 150px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .btn-update {
            background-color: #007bff;
            border: none;
            color: white;
        }

        .btn-update:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: white;
        }

        .btn-delete:hover {
            background-color: #b02a37;
        }

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


        .product-image {
            height: auto;
            width: 100%;
            max-width: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        .table-container {
            margin: 30px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .text-wrap {
            word-wrap: break-word;
        }

        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_SESSION['delete_category'])) {
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
                    <?php echo $_SESSION['delete_category'] ?>
                </p>
            </div>
        </div>

    <?php
    }

    unset($_SESSION['delete_category'])


    ?>
    <?php
    if (isset($_SESSION['update_success'])) {
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
                    <?php echo $_SESSION['update_success'] ?>
                </p>
            </div>
        </div>

    <?php
    }

    unset($_SESSION['update_success'])


    ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 bg-dark text-light sidebar">
                <?php include './sidebar.php'; ?>
            </div>

            <!-- Main Content -->
            <div class="col-xl-10 col-lg-9 col-md-8" style="height: 98vh;overflow-y:scroll">
                <div class="table-container">
                    <h2 class="text-center mb-4">Product List</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th class="d-none d-md-table-cell">Description</th>
                                    <th class="d-none d-lg-table-cell">Location</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Row -->
                                <tr>
                                    <td>1</td>
                                    <td><img src="https://via.placeholder.com/80" class="product-image img-fluid" alt="Product"></td>
                                    <td>Stylish Chair</td>
                                    <td>$120</td>
                                    <td class="d-none d-md-table-cell text-wrap">A comfortable and stylish chair for your living room.</td>
                                    <td class="d-none d-lg-table-cell">New York</td>
                                    <td>Furniture</td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center justify-content-around">
                                            <button class="btn btn-view d-flex gap-1 align-items-center">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                            <button class="btn btn-edit d-flex gap-1 align-items-center" data-bs-toggle="modal" data-bs-target="#updateModal">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-delete d-flex gap-1 align-items-center">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Repeat Rows Dynamically Here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap Modal for Update -->

    <?php include './boot_js.php' ?>


    <script>
        // Get the popup and close button
        const popup = document.getElementById('popup');
        const closePopup = document.getElementById('closePopup');
        const desc = document.querySelectorAll('.desc')

        desc.forEach((item, index) => {
            let full_value = item.innerText;
            let croped_length;

            if (item.innerText.length > 25) {
                croped_length = `${item.innerText.slice(0,25)}...`
                item.innerHTML = croped_length
            } else {

            }


        })







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