<div class="container-fluid">
    <div class="row">



        <?php
        include_once("./db.php");
        if (isset($_POST['value'])) {
            $priceFilter = $_POST['value'];

            $priceFilterSelect = "SELECT * FROM products WHERE productPrice <= ' $priceFilter' ORDER BY productCatagory ASC";


            // $priceFilter = "SELECT productId, productName, productPrice, productImg FROM products WHERE productCatagory LIKE ' $userSelectCatagory' ";

            $quary = mysqli_query($dbConnenttion,  $priceFilterSelect);
            if ($quary) {
                while ($displayCatagory = mysqli_fetch_assoc($quary)) {
                    $productId =  $displayCatagory["productId"];
                    $productName =  $displayCatagory["productName"];
                    $productPrice =  $displayCatagory["productPrice"];
                    $productImg =  $displayCatagory["productImg"];
                    $productBrand =  $displayCatagory["productBrand"];
                    $dbCatagory =  $displayCatagory["productCatagory"];



        ?>




                    <div class="col-md-3">
                        <form action="chackout.php" method="get">
                            <div class="card text-white bg-white shadow productHover " style="cursor: pointer;">
                                <img class="card-img-top chogseFilter" src="assets/productUpImg/<?php echo $productImg; ?>" alt="Title">
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
        } else {
        }



        ?>
    </div>
</div>