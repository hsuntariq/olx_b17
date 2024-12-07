<div class="col-xl-9 col-lg-10 col-11 mx-auto">
    <h2>All Categories</h2>
    <div class="d-flex gap-4 text-center" style="flex-wrap: wrap;">

        <?php
        include './config.php';
        $select = "SELECT * FROM category";
        $result = mysqli_query($connection, $select);

        foreach ($result as $item) {

        ?>
            <div class="d-flex flex-column">
                <div class="rounded-circle d-flex justify-content-center align-items-center" style="height: 100px;width:100px;background:<?php echo $item['color'] ?>">
                    <img src="./category_images/<?php echo $item['image'] ?>" alt="product image" width="80px" style="object-fit: contain;">
                </div>
                <h6>
                    <?php echo $item['name'] ?>
                </h6>
            </div>

        <?php
        }
        ?>
    </div>


</div>