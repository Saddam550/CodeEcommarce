<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLY ORDER</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" href="assets/customStyle.css">
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />


</head>


<body>

    <div class="promote" id="promoteDisplay">
        <div class="propmoteTitle ">
            its product offer 2023
            <span class="const">20%</span>
            <a href="components/promote.php" class="promtoeLink">Click Here</a>
        </div>
    </div>


    <?php include_once('./components/userTopMenu.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-4  col-lg-3 col-6 p-0" style=" background: #00073e;">
                <?php include_once('./components/header.php'); ?>
            </div>
            <div class="col-md-9 p-0"><?php include_once('./components/headerCarusel.php'); ?></div>
        </div>
    </div>
    <?php include_once('./components/db.php'); ?>


    <div class="container-fluid">
        <div class="row">

            <div id="catagoryCarusel" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators" id="catagoryCaruselBtn">
                    <li data-bs-target="#catagoryCarusel" data-bs-slide-to="0" class="active" aria-current="true"
                        aria-label="First slide"></li>
                    <li data-bs-target="#catagoryCarusel" data-bs-slide-to="1" aria-label="Second slide"></li>
                    <li data-bs-target="#catagoryCarusel" data-bs-slide-to="2" aria-label="Third slide"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active text-center">

                        <div class="catagoryList">
                            <div class="catagoryImg"
                                style="background:url(assets/img/jowlas.jpg);  background-size: cover;background-repeat: no-repeat;background-position: center;">

                                <a href="components/catagory.php" class="catagoryName">woman</a>
                            </div>
                        </div>
                        <div class="catagoryList">
                            <div class="catagoryImg"
                                style="background:url(assets/img/jowlas.jpg);  background-size: cover;background-repeat: no-repeat;background-position: center;">

                                <a href="components/catagory.php" class="catagoryName">woman</a>
                            </div>
                        </div>
                        <div class="catagoryList">
                            <div class="catagoryImg"
                                style="background:url(assets/img/jowlas.jpg);  background-size: cover;background-repeat: no-repeat;background-position: center;">

                                <a href="components/catagory.php" class="catagoryName">woman</a>
                            </div>
                        </div>
                        <div class="catagoryList">
                            <div class="catagoryImg"
                                style="background:url(assets/img/jowlas.jpg);  background-size: cover;background-repeat: no-repeat;background-position: center;">

                                <a href="components/catagory.php" class="catagoryName">woman</a>
                            </div>
                        </div>



                    </div>
                    <div class="carousel-item">

                        <div class="catagoryList">
                            <div class="catagoryImg"
                                style="background:url(assets/img/jowlas.jpg);  background-size: cover;background-repeat: no-repeat;background-position: center;">

                                <a href="components/catagory.php" class="catagoryName">woman</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="catagoryList">
                            <div class="catagoryImg"
                                style="background:url(assets/img/jowlas.jpg);  background-size: cover;background-repeat: no-repeat;background-position: center;">

                                <a href="components/catagory.php" class="catagoryName">woman</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


    <div class="container-fluid" style="margin-top: 50px;" id="filerChange">
        <div class="lelestProductsName">
            <h1 style="text-align:center;" id="changeFilterText">Letest Products</h1>
        </div>

        <div class="shortMenus text-center " id="filerChangeShortMenu">

            <ul class="list-inline " style="cursor:pointer;">
                <li id="customActive" class="list-inline-item  active navbar-toggler">All</li>
                <li id="customActive" class="list-inline-item navbar-toggler">Man</li>
                <li id="customActive" class="list-inline-item navbar-toggler">Woman</li>
            </ul>





        </div>
        <div id="filterShowAndDefaultNone" class="row">
            <?php



            $productSelect = "SELECT * FROM products ORDER BY productId DESC";
            $productSelectQuary = mysqli_query($dbConnenttion, $productSelect);
            if ($productSelectQuary) {
                while ($displayProducts = mysqli_fetch_assoc($productSelectQuary)) {
                    $productId =  $displayProducts["productId"];
                    $productName =  $displayProducts["productName"];
                    $productPrice =  $displayProducts["productPrice"];
                    $productImg =  $displayProducts["productImg"];
                    $productBrand =  $displayProducts["productBrand"];
                    $productDate =  $displayProducts["productDate"];



            ?>
            <div class="col-md-3  col-sm-4  col-lg-3 col-6 mt-4">

                <?php  ?>
                <form action="chackout.php" method="get">
                    <div class="card text-white bg-white shadow productHover " style="cursor: pointer;">
                        <img class="card-img-top chogseFilter" src="assets/productUpImg/<?php echo $productImg; ?>"
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


                        <div class="chogseProductItem" id="addtoCard-save">
                            <div class="ProductColor">
                                <ul>

                                    <li id="userProdusColorSelect">
                                        <span id="addToCardPage">&hearts;</span></=>
                                    </li>
                                    <li id="userProdusColorSelect">
                                        <span>&hearts;</span>

                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title text-dark"> <span>Name: </span> <?php echo $productName; ?></h5>
                            <div class="priceAndView" style=" display: flex; justify-content: space-between;">
                                <p class="card-text text-dark"><span>Price</span> $<?php echo $productPrice; ?></p>

                                <input type="text" name="productid" value="<?php echo $productId ?>" hidden>
                                <button type="submit">View</button>
                            </div>
                </form>





            </div>

        </div>

    </div>
    <?php

                }
            }



            $page = 0
?>
    </div>
    </div>

    <div class="d-inline-flex w-100 p-3 justify-content-between">
        <a type="button" href="index.php?page=<?php echo $page - 1 ?>" name="" id="" class="btn btn-danger">←</a>
        <a type="button" href="index.php?page=<?php echo $page + 1 ?>" name="" id="" class="btn btn-danger">→</a>
    </div>


    <!-- ========== Start  user Filter show Section  ========== -->


    <div class="priceFilterShowClass"></div>
    <!-- ========== End  user Filter show Section  ========== -->
    <div class=" container-fluid mt-4">
        <div class="row">
            <div class="col-md-4">



                <div id="adSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="adSliderImg">
                                <img src="assets/img/b12.jpg" class="img-fluid" alt="image desc">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="adSliderImg">
                                <img src="assets/img/b12.jpg" class="img-fluid" alt="image desc">
                            </div>
                        </div>
                    </div>
                </div>





                <div id="adSlider" class="carousel slide mt-3" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="adSliderImg">
                                <img src="assets/img/b13.jpg" class="img-fluid" alt="image desc">
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="adSliderImg">
                                <img src="assets/img/b13.jpg" class="img-fluid" alt="image desc">
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col-md-8  ">
                <div class="d-flex ad-Slider-right">
                    <?php
                for ($i = 0; $i < 6; $i++) {
                ?>

                    <form action="chackout.php" method="get" class="adSliderRightSection  m-2" style=" width: 217px;">
                        <div class="card text-white bg-white shadow productHover " style="cursor: pointer;">
                            <img class="card-img-top chogseFilter" src="assets/img/jowlas.jpg" alt="Title">



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

                            <div class="chogseProductItem" id="AddToCard-save">
                                <div class="ProductColor">
                                    <ul>

                                        <li id="userProdusColorSelect">
                                            <a href="">bag</a>
                                        </li>
                                        <li id="userProdusColorSelect">
                                            <span id="colortwo" onclick="SecendColor()">save</span>
                                            <input id="SecendColorSet" name="color2" type="text" hidden>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-dark"> <span>Name: </span> product Name</h5>

                                <div class="priceAndView" style=" display: flex; justify-content: space-between;">



                                    <p class="card-text text-dark"><span>Price</span> $652</p>

                                    <input type="text" name="productName" value="product Name" hidden>
                                    <input type="text" name="productPrice" value="product price" hidden>
                                    <input type="text" name="productImg" value="product price" hidden>
                                    <button type="submit">View</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }

                ?>


                </div>

            </div>
        </div>
    </div>










    <script src="assets/bootstrap.bundle.min.js"></script>

    <script src="assets/fontawesome/fontawesome-free-5.15.4-web/js/all.js"></script>


    <script src="assets/ajax ofline.js"></script>
    <script src="assets/jquery.min.js"></script>
    <script src="assets/customscript.js"></script>

    <script>
    $("#priceFilters").change(function() {
        var a = $("#priceFilters").val()

        $.ajax({
            url: "components/priceFilter.php",
            method: "POST",
            data: "value=" + a,
            success: function(data) {
                $(".priceFilterShowClass").html(data)
            },

        })
    })




    $("#addToCardPage").click(function() {


        $.ajax({
            url: "components/addToCardPage.php",
            success: function(data) {
                $(".priceFilterShowClass").html(data)
            },

        })
    })
    </script>
</body>

</html>