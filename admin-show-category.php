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
                <h1 class="text-center mb-4">All Categories</h1>
                <div class="row g-4">
                    <!-- Category Card -->

                    <?php
                    include './config.php';
                    $select = "SELECT * FROM category";
                    $result = mysqli_query($connection, $select);

                    foreach ($result as $item) {

                    ?>
                        <div class="col-xl-3 col-md-6 col-sm-6">
                            <div class="category-card" style="height: 250px;overflow-y:scroll">
                                <img src="./category_images/<?php echo $item['image'] ?>" alt="Category Image" style="object-fit: contain;" class="category-image mx-auto d-block" width="100px" height="30px">
                                <div class="p-3">
                                    <h5 class="fw-bold">
                                        <?php
                                        echo $item['name']
                                        ?>
                                    </h5>
                                    <p class="text-muted mb-3 desc" style="word-break: break-all;width:90%">
                                        <?php echo $item['description'] ?>
                                    </p>
                                    <div class="rounded-circle my-3" style="height: 10px;width:10px;background-color:<?php echo $item['color'] ?>"></div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button class="btn btn-update" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $item['id'] ?>">
                                            <i class="fas fa-edit"></i> Update
                                        </button>
                                        <a href="./delete-category.php?id=<?php echo $item['id'] ?>" class="btn btn-delete">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="updateModal<?php echo $item['id'] ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update Category <?php echo $item['name'] ?> </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" action="./update-category.php" method="POST">
                                            <input type="text" name="id" value="<?php echo $item['id'] ?>" readonly hidden id="">
                                            <div class="mb-3">
                                                <label for="categoryName" class="form-label">Category Name</label>
                                                <input type="text" name="name"
                                                    value="<?php echo $item['name'] ?>"
                                                    class="form-control" id="categoryName" placeholder="Enter category name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="categoryColor" class="form-label">Category Color</label>
                                                <input type="color" value="<?php echo $item['color'] ?>" name="color" class="form-control" id="categoryColor" placeholder="Enter category Color">
                                            </div>
                                            <div class="mb-3">
                                                <label for="categoryDescription" class="form-label">Description</label>
                                                <textarea value="<?php echo $item['description'] ?>" name="description" class="form-control" id="categoryDescription" rows="3" placeholder="Enter category description"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="categoryImage" class="form-label">Category Image</label>
                                                <input type="file" name="image" class="form-control" id="categoryImage">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    <?php
                    } ?>
                    <!-- Repeat Category Cards as needed -->
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