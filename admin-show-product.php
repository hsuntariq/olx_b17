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
    include './showPopUp.php';
    showPopup('delete_category');
    showPopup('update_success');
    showPopup('delete_product');
    showPopup('update_success_prod');
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
                                <?php

                                include './config.php';
                                $select = "SELECT product.id AS product_id,product.name AS product_name,product.location,product.image,product.price,product.description,category.id AS category_id,category.name AS category_name FROM product JOIN category ON product.c_id = category.id";
                                $result = mysqli_query($connection, $select);
                                foreach ($result as $item) {
                                    $images = explode(',', $item['image']);
                                ?>
                                    <tr>
                                        <td><?php echo $item['product_id'] ?></td>
                                        <td><img src="./product_images/<?php echo $images[0] ?>" class="product-image img-fluid mx-auto d-block" alt="Product" height="100px" width="100px"></td>
                                        <td>
                                            <?php echo $item['product_name'] ?>
                                        </td>
                                        <td>Rs. <?php echo $item['price'] ?> </td>
                                        <td class="d-none d-md-table-cell text-wrap"><?php echo $item['description'] ?></td>
                                        <td class="d-none d-lg-table-cell"><?php echo $item['location'] ?></td>
                                        <td>
                                            <?php echo $item['category_name'] ?>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center justify-content-around">
                                                <!-- View Button -->
                                                <button class="btn btn-view d-flex gap-1 align-items-center"
                                                    onclick="openViewModal(this)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewModal"
                                                    data-id="<?php echo $item['product_id']; ?>"
                                                    data-name="<?php echo $item['product_name']; ?>"
                                                    data-price="<?php echo $item['price']; ?>"
                                                    data-image="./product_images/<?php echo $images[0]; ?>"
                                                    data-category="<?php echo $item['category_name']; ?>"
                                                    data-location="<?php echo $item['location']; ?>"
                                                    data-description="<?php echo $item['description']; ?>">
                                                    <i class="fas fa-eye"></i> View
                                                </button>

                                                <!-- Edit Button -->
                                                <button class="btn btn-edit d-flex gap-1 align-items-center"
                                                    onclick="openEditModal(this)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal"
                                                    data-id="<?php echo $item['product_id']; ?>"
                                                    data-name="<?php echo $item['product_name']; ?>"
                                                    data-price="<?php echo $item['price']; ?>"
                                                    data-category="<?php echo $item['category_id']; ?>"
                                                    data-location="<?php echo $item['location']; ?>"
                                                    data-description="<?php echo $item['description']; ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>

                                                <a href="./delete-product.php?id=<?php echo $item['product_id'] ?>&name=<?php echo $item['product_name'] ?>" class="btn btn-delete d-flex gap-1 align-items-center">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel">View Product Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img id="viewImage" src="" alt="Product Image" class="img-fluid rounded">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h4 id="viewProductName"></h4>
                                                            <p><strong>Price:</strong> <span id="viewPrice"></span></p>
                                                            <p><strong>Category:</strong> <span id="viewCategory"></span></p>
                                                            <p><strong>Location:</strong> <span id="viewLocation"></span></p>
                                                            <p><strong>Description:</strong></p>
                                                            <p id="viewDescription"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="editForm" action="./update-product.php" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="hidden" id="editProductId" name="product_id">
                                                        <div class="mb-3">
                                                            <label for="editProductName" class="form-label">Product Name</label>
                                                            <input type="text" class="form-control" id="editProductName" name="product_name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editPrice" class="form-label">Price</label>
                                                            <input type="number" class="form-control" id="editPrice" name="price" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editCategory" class="form-label">Category</label>
                                                            <select class="form-select" id="editCategory" name="category" required>
                                                                <?php
                                                                include './config.php';
                                                                $select2 = "SELECT * FROM category";
                                                                $res2 = mysqli_query($connection, $select2);
                                                                foreach ($res2 as $item2) {
                                                                ?>

                                                                    <option value="<?php echo $item2['id'] ?>">
                                                                        <?php echo $item2['name'] ?>
                                                                    </option>

                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editLocation" class="form-label">Location</label>
                                                            <input type="text" class="form-control" id="editLocation" name="location">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editDescription" class="form-label">Description</label>
                                                            <textarea class="form-control" id="editDescription" name="description" rows="3"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>




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





        function openViewModal(button) {
            let id = button.getAttribute('data-id')
            let name = button.getAttribute('data-name')
            let price = button.getAttribute('data-price')
            let image = button.getAttribute('data-image')
            let category = button.getAttribute('data-category')
            let location = button.getAttribute('data-location')
            let description = button.getAttribute('data-description')
            document.querySelector('#viewImage').src = image
            document.querySelector('#viewPrice').textContent = price
            document.querySelector('#viewCategory').textContent = category
            document.querySelector('#viewLocation').textContent = location
            document.querySelector('#viewDescription').textContent = description




        }





        function openEditModal(button) {
            let id = button.getAttribute('data-id')
            let name = button.getAttribute('data-name')
            let price = button.getAttribute('data-price')
            let image = button.getAttribute('data-image')
            let category = button.getAttribute('data-category')
            let location = button.getAttribute('data-location')
            let description = button.getAttribute('data-description')
            document.querySelector('#editProductId').value = id
            document.querySelector('#editProductName').value = name
            document.querySelector('#editPrice').value = price
            document.querySelector('#editLocation').value = location

            document.querySelector('#editDescription').value = description




        }






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