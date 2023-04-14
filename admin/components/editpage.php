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
                    <?php if ($_GET["deleteId"]) {
                        $deleteId = $_GET["deleteId"]; ?>

                    <form action="edit.php?deleteId=<?php echo $deleteId ?>" method="post" id="customStyleForm"
                        enctype="multipart/form-data">
                        <input type="text" class="form-control mt-4" name="ProductName" id=""
                            placeholder="Product Name">

                        <select class="form-control mt-4 me-2" style="display:inline; " name="ProductCatagory">
                            <option value="Select Catagory">Select Catagory</option>
                            <?php


                                $productSelect = "SELECT Header_Name FROM header";
                                $productSelectQuary = mysqli_query($dbConnenttion, $productSelect);
                                if ($productSelectQuary) {
                                    while ($displayProducts = mysqli_fetch_assoc($productSelectQuary)) {
                                        $productCatagory =  $displayProducts["Header_Name"];
                                ?>
                            <option value="<?php echo  $productCatagory ?>"> <?php echo  $productCatagory ?></option>
                            <?php
                                    }
                                }            ?>
                        </select>






                        <select class="form-control mt-4 me-2" style="display:inline; " name="subProductCatagory">
                            <option value="Sub Catagory">Sub Catagory</option>
                            <?php
                                $productSelect = "SELECT Header_Name FROM submenu";
                                $productSelectQuary = mysqli_query($dbConnenttion, $productSelect);
                                if ($productSelectQuary) {
                                    while ($displayProducts = mysqli_fetch_assoc($productSelectQuary)) {
                                        $productCatagory =  $displayProducts["Header_Name"];
                                ?>
                            <option value="<?php echo  $productCatagory ?>"> <?php echo  $productCatagory ?></option>
                            <?php
                                    }
                                }
                            }          ?>
                        </select>





                        <span type="button" class="btn btn-primary" data-bs-toggle="button" id="AddCataId"
                            aria-pressed="false" autocomplete="off">Add</span>

                        <input type="text" class="form-control mt-4" name="ProductBrand" id=""
                            placeholder="Product Brand">
                        <input type="text" class="form-control mt-4" name="ProductPrice" id=""
                            placeholder="Product Price">
                        <label for="" class="form-label mt-4">image</label>
                        <input type="file" class="form-control " name="file" id="">
                        <input type="submit" class="form-control mt-4 btn btn-info" value="Submit">
                    </form>

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