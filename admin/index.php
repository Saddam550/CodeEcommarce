<?php

if (isset($_COOKIE["email"]) || isset($_COOKIE["email"]) || isset($_COOKIE["pass"])) {
    $name = $_COOKIE["name"];
    $email = $_COOKIE["email"];
    $pass = $_COOKIE["pass"];







?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>

        <link rel="stylesheet" href="../assets/bootstrap.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/brands.min.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/regular.min.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/solid.min.css">
        <link rel="stylesheet" href="./style/adminStyle.css">
    </head>

    <body>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 p-0">
                    <!-- Nav tabs -->
                    <ul class="nav nav" id="adminNavBar" role="tablist">
                        <li class="nav-item">
                            <div class="userName nav-item">
                                <h5 class="nav-item"><img src="../assets/img/b12.jpg" alt="" srcset=""> <span>Admin:
                                        <?php echo $name ?> </span>
                                </h5>
                            </div>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="" class="nav-link">Product Add</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="components/ProductEdit.php" class="nav-link">Product Edit</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="components/ProductDelete.php" class="nav-link">product Delete</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="components/allProduct.php" class="nav-link"> Product All</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="components/orderpage.php" class="nav-link">Order</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="components/userAccount.php" class="nav-link">users</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="../index.php" class="nav-link">Go To Site</a>
                        </li>


                        <li class="nav-item" role="presentation">
                            <a href="adminLogout.php" class="nav-link">Logout</a>
                        </li>

                    </ul>





                </div>
                <div class="col-md-9 bg-secondary p-0">
                    <?php include_once("./components/productAdd.php") ?>

                </div>
            </div>
        </div>







        <script src="../assets/bootstrap.bundle.min.js"></script>
        <script src="../assets/fontawesome/fontawesome-free-5.15.4-web/js/all.js"></script>
        <script src="../assets/fontawesome/fontawesome-free-5.15.4-web/js/brands.min.js"></script>
        <script src="assets/fontawesome/fontawesome-free-5.15.4-web/js/regular.min.js"></script>

        <script src="../assets/ajax ofline.js"></script>
        <script src="../assets/jquery.min.js"></script>
        <!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
        <script>
            var uploadSuccess = document.getElementById("uploadSuccess");
            setTimeout(() => {
                uploadSuccess.style.transition = "all 0.2s"
                uploadSuccess.style.transform = "scaleY(0)"
                uploadSuccess.style.visibility = "hidden"

            }, 1000);
        </script>

    </body>

    </html><?php
        } else {
            header("location:adminLogin.php");
            echo "Login";
        }
            ?>