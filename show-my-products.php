 <div class="col-xl-9 col-lg-10 col-11 mx-auto">
     <div class="row py-xl-5 py-3">
         <?php
            include './config.php';
            $select = "SELECT * FROM product";
            $result = mysqli_query($connection, $select);
            foreach ($result as $item) {
                $images = explode(',', $item['image']);
            ?>
             <div class="col-lg-3 ">
                 <div class="card   shadow-lg">

                     <img src="./product_images/<?php echo $images[0] ?>" width="100%" height="250px" style="object-fit: cover;" alt="product image">

                     <div class="p-3 card-footer position-relative">
                         <i class="bi bi-heart fs-4 position-absolute" style="right: 10px;top:5px">

                         </i>
                         <h6 class="fw-bold">
                             Rs <?php echo $item['price'] ?>
                         </h6>
                         <p class="text-secondary">

                             <?php echo $item['description'] ?>
                         </p>
                         <p class="text-secondary">
                             <?php echo $item['location'] ?>

                         </p>
                     </div>
                 </div>

             </div>

         <?php } ?>


     </div>
 </div>