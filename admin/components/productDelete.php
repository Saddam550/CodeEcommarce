<?php include_once("../../components/db.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="../../assets/bootstrap.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/brands.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/regular.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/solid.min.css">
    <link rel="stylesheet" href="../style/adminStyle.css">
</head>

<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 p-0">
                <!-- Nav tabs -->
                <?php include_once("sideMenu.php") ?>




            </div>
            <div class="col-md-9 bg-secondary p-0">
                <div class="mb-3 p-0" id="productAddForm">
                    <div class="table-responsive">
                        <table class="table table-hover	
                        table-borderless
                        table-primary
                        align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Id </th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Brand </th>
                                    <th>Catagory</th>
                                    <th>Photo</th>
                                    <th>Delete</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <?php
                            $number = 1;
                            $productSelect = "SELECT productId, productName, productPrice, productImg,productBrand,productCatagory, productDate FROM products";
                            $productSelectQuary = mysqli_query($dbConnenttion, $productSelect);
                            if ($productSelectQuary) {
                                while ($displayProducts = mysqli_fetch_assoc($productSelectQuary)) {
                                    $productId =  $displayProducts["productId"];
                                    $productName =  $displayProducts["productName"];
                                    $productPrice =  $displayProducts["productPrice"];
                                    $productImg =  $displayProducts["productImg"];
                                    $productBrand =  $displayProducts["productBrand"];
                                    $productCatagory =  $displayProducts["productCatagory"];
                                    $productDate =  $displayProducts["productDate"];



                            ?>




                                    <tbody class="table-group-divider">
                                        <tr class="table-primary border-1">
                                            <td scope="row"><?php echo   $number++ ?></td>
                                            <td><?php echo  $productName ?></td>
                                            <td><?php echo  $productPrice ?></td>
                                            <td><?php echo  $productBrand ?></td>
                                            <td><?php echo  $productCatagory ?></td>
                                            <td class="ptoductImg"> <img width="50px" src="../../assets//productUpImg/<?php echo  $productImg ?>" alt=""> </td>
                                            <td> <a onclick=" return confirm(`are you sure`)" class="btn btn-danger" href="delete.php?id=<?php echo  $productId ?>">Delete</a> </td>
                                            <td> <a class="btn btn-danger" href="../index.php">Add</a> </td>
                                            <td> <a class="btn btn-danger" href="productEdit.php">Edit</a> </td>
                                        </tr>

                                    </tbody>




                            <?php
                                }
                            }



                            ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>







    <script src="../../assets/bootstrap.bundle.min.js"></script>
    <script src="../../assets/fontawesome/fontawesome-free-5.15.4-web/js/all.js"></script>
    <script src="../../assets/fontawesome/fontawesome-free-5.15.4-web/js/brands.min.js"></script>
    <script src="../../assets/fontawesome/fontawesome-free-5.15.4-web/js/regular.min.js"></script>

    <script src="../../assets/ajax ofline.js"></script>
    <script src="../../assets/jquery.min.js"></script>


</body>

</html>