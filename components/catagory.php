<?php include_once('db.php') ?>
<?php include_once('htmlTopCode.php') ?>
<div class="catagoryPage">
    <?php include_once('./catagoryHeader.php') ?>
</div>


<div class="container-fluid">
    <div class="row">
        <?php

        if (isset($_REQUEST['catagotyName'])) {
            $userSelectCatagory = $_REQUEST['catagotyName'];

            $catagorySelect = "SELECT * FROM products WHERE productCatagory LIKE '%$userSelectCatagory%' ";

            $quary = mysqli_query($dbConnenttion,  $catagorySelect);
            if ($quary) {
                while ($displayCatagory = mysqli_fetch_assoc($quary)) {
                    $productId =  $displayCatagory["productId"];
                    $productName =  $displayCatagory["productName"];
                    $productPrice =  $displayCatagory["productPrice"];
                    $productImg =  $displayCatagory["productImg"];
                    $productBrand =  $displayCatagory["productBrand"];
                    $dbCatagory =  $displayCatagory["productCatagory"];

                    if ($displayCatagory) {




        ?>




        <!-- productBrand
    productCatagory -->

        <div class="col-md-3 mt-4">
            <form action="../chackout.php" method="get">
                <div class="card text-white bg-white shadow productHover " style="cursor: pointer;">
                    <img class="card-img-top chogseFilter" src="../assets/productUpImg/<?php echo $productImg; ?>"
                        alt="Title">
                    <div class="chogseProductItem">
                        <div class="ProductColor">
                            <ul>

                                <li id="userProdusColorSelect">
                                    <span id="colorOne" onclick="FristColor()">Red</span>
                                    <input id="FristColorSet" name="color1" type="text" hidden>
                                </li>
                                <li id="userProdusColorSelect">
                                    <span id="colortwo" onclick="SecendColor()">Blue</span>
                                    <input id="SecendColorSet" name="color2" type="text" hidden>
                                </li>
                                <li id="userProdusColorSelect">
                                    <span id="colorThere" onclick="ThirColor()">Black</span>
                                    <input id="ThirColorSet" name="color3" type="text" hidden>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark"> <span>Name: </span> <?php echo $productName; ?></h5>
                        <p class="card-text text-dark"><span>Price</span> $<?php echo $productPrice; ?></p>

                        <input type="text" name="productid" value="<?php echo $productId ?>" hidden>
                        <button type="submit">View</button>
                    </div>
                </div>
            </form>

        </div>














        <?php
                    }
                }
            }
        } else {

            ?>


        <div class="container-fluid" style="margin-top: 50px;">
            <div class="lelestProductsName">
                <h1 style="text-align:center;">Letest Products</h1>
            </div>

            <div class="shortMenus text-center ">

                <ul class="list-inline " style="cursor:pointer;">
                    <li id="customActive" class="list-inline-item  active navbar-toggler">All</li>
                    <li id="customActive" class="list-inline-item navbar-toggler">Man</li>
                    <li id="customActive" class="list-inline-item navbar-toggler">Woman</li>
                </ul>





            </div>
            <div class="row d-flex">
                <?php
                    $productSelect = "SELECT productId, productName, productPrice, productImg,productBrand, productDate FROM products";
                    $productSelectQuary = mysqli_query($dbConnenttion, $productSelect);
                    if ($productSelectQuary) {
                        while ($displayProducts = mysqli_fetch_assoc($productSelectQuary)) {
                            $productId =  $displayProducts["productId"];
                            $productName =  $displayProducts["productName"];
                            $productPrice =  $displayProducts["productPrice"];
                            $productImg =  $displayProducts["productImg"];
                            $productBrand =  $displayProducts["productBrand"];
                            $productDate =  $displayProducts["productDate"];



                            for ($i = 0; $i < 6; $i++) {
                    ?>
                <div class="col-md-3 mt-4">
                    <form action="../chackout.php" method="get">
                        <div class="card text-white bg-white shadow productHover " style="cursor: pointer;">
                            <img class="card-img-top chogseFilter"
                                src="../assets/productUpImg/<?php echo $productImg; ?>" alt="Title">
                            <div class="chogseProductItem">
                                <div class="ProductColor">
                                    <ul>

                                        <li id="userProdusColorSelect">
                                            <span id="colorOne" onclick="FristColor()">Red</span>
                                            <input id="FristColorSet" name="color1" type="text" hidden>
                                        </li>
                                        <li id="userProdusColorSelect">
                                            <span id="colortwo" onclick="SecendColor()">Blue</span>
                                            <input id="SecendColorSet" name="color2" type="text" hidden>
                                        </li>
                                        <li id="userProdusColorSelect">
                                            <span id="colorThere" onclick="ThirColor()">Black</span>
                                            <input id="ThirColorSet" name="color3" type="text" hidden>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-dark"> <span>Name: </span> <?php echo $productName; ?></h5>
                                <p class="card-text text-dark"><span>Price</span> $<?php echo $productPrice; ?></p>

                                <input type="text" name="productid" value="<?php echo $productId ?>" hidden>
                                <button type="submit">View</button>
                    </form>
                </div>

            </div>

        </div>
        <?php

                            }
                        }
                    }


?>
    </div>
</div>




<?php
        }



?>
</div>
</div>

<?php include_once('htmlButtonCode.php') ?>