<?php

include_once("components/htmlTopCode.php");
// include_once("components/header.php");
include_once("components/db.php");

?>
<link rel="stylesheet" href="assets/bootstrap.css">
<link rel="stylesheet" href="assets/customStyle.css">
<link rel="stylesheet" href="assets/catagory.css">
</head>

<body>

    <div class="catagoryPage" style=" height: 49px;">



        <!-- ============================ -->

        <div class="header">
            <!-- dynamic menu======================= -->
            <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #00073e;">
                <a class="navbar-brand" href="/CodeEcommarce">ONLY ORDER</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <?PHP


                        if ($dbConnenttion) {
                            $insertHeaderItem = "SELECT id, Header_Name FROM header";
                            $quary = mysqli_query($dbConnenttion, $insertHeaderItem);
                            if ($quary) {
                                while ($headerValue = mysqli_fetch_array($quary)) {


                                    $headerMenuId =  $headerValue['id'];
                                    $headerMenuItems =  $headerValue['Header_Name'];
                        ?>

                        <li class="nav-item">
                            <a class="nav-link"
                                href='components/catagory.php?catagotyName=<?php echo  $headerMenuItems ?>'><?php echo $headerMenuItems ?></a>
                        </li>
                        <?php
                                }

                                ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <?php

                                        $subMenu = "SELECT id, submenuItem FROM submenu";
                                        $subMenuQuary = mysqli_query($dbConnenttion,  $subMenu);
                                        if ($subMenuQuary) {
                                            while ($submenuItems = mysqli_fetch_assoc($subMenuQuary)) {
                                        ?>
                                <a class="dropdown-item"
                                    href="components//catagory.php?subCatagoryName=<?php echo   $submenuItems['submenuItem'] ?>"><?php echo $submenuItems['submenuItem'] ?>
                                    1</a>
                                <?php
                                            }
                                            ?>

                            </div>
                        </li>
                        <?php }
                                    } else {
                                        echo 'quary is not workig';
                                    }
                                } else {
                                    echo "Database not Cannect";
                                } ?>
                    </ul>
                </div>
                </ul>
                <div class="priceFilter">
                    <input type="range" min="0" max="10000" name="" id="priceFilters">
                    <span style="color: white;">value</span>

                </div>

            </nav>
        </div>
        <!-- ================================== -->










    </div>
    <?php

    if (isset($_REQUEST["productid"])) {
        if (isset($_REQUEST["color1"]) || isset($_REQUEST["color2"]) || isset($_REQUEST["color3"])) {






            $colorOne = $_REQUEST["color1"];
            $colortwo = $_REQUEST["color2"];
            $colorThere = $_REQUEST["color3"];

            $productid = $_REQUEST["productid"];
            $productidSelect = "SELECT * FROM `products` WHERE productId=$productid";

            $result = mysqli_query($dbConnenttion,  $productidSelect);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                if ($row) {
                    $productName =    $row["productName"];
                    $productPrice =    $row["productPrice"];
                    $productImg =    $row["productImg"];
                    $productBrand =    $row["productBrand"];
                    $productCatagory =    $row["productCatagory"];

                    $tax  =  $productPrice / 100 / 50;
                    $Shipping  = $productPrice / 100;
                    $totalPrice  =   $productPrice + $tax + $Shipping;




    ?>


    <form action="components/saveAccount.php" method="post">


        <div class="container mt-5">
            <h3> Enter Your Delivary Address</h3>
            <div class="row chackout">
                <div class=" col-sm-12 col-md-6 col-12">


                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="full_name" id="" placeholder="Name" required>

                    <label for="" class="form-label">Email</label>
                    <input type="Email" class="form-control" name="email_add" id="" placeholder="Email" required>
                    <input type="text" name="tax" value="<?php echo  $tax ?>" hidden>
                    <input type="text" name="shipping" value="<?php echo  $Shipping ?>" hidden>
                    <input type="text" name="productBrand" value="<?php echo  $productBrand ?>" hidden>
                    <input type="text" name="productCatagory" value="<?php echo  $productCatagory ?>" hidden>
                    <input type="text" name="amount" value="<?php echo  $totalPrice ?>" hidden>
                    <label for="" class="form-label">country</label>
                    <select class="form-select form-select-lg" name="country" id="Allcountry">



                    </select>

                    <label for="" class="form-label">Street Address</label>
                    <input type="text" class="form-control" name="StreetAddress" id="" placeholder="Street Address"
                        required>
                    <div class="d-flex">
                        <label for="" class="form-label">city</label>
                        <input type="text" class="form-control" name="city" id="" placeholder="city" required>

                        <label for="" class="form-label">Zip</label>
                        <select type="text" class="form-control" name="Zip" id="zip" placeholder="Zip"
                            required></select>
                    </div>

                    <label for="" class="form-label">place</label>
                    <select class="form-select form-select-lg" name="state" id="state">

                    </select>

                    <div class="d-grid gap-2">
                        <button type="submit" name="" id="" class="btn btn-danger">continue to payment</button>
                    </div>


                </div>
                <div class="col-md-6 col-sm-12 col-12 bg-warning border-1 border-dark  p-5  mt-4 ">
                    <h5> In Your Bag </h5>

                    <div class="productInfo">


                        <div class="producttotal displayClass">
                            <p>product cost </p>
                            <p> $<?php echo   $productPrice ?> </p>
                        </div>



                        <div class="productShipping displayClass">
                            <p>Shipping </p>
                            <p> $<?php echo intval($Shipping)  ?> </p>
                        </div>

                        <div class="productTax displayClass">
                            <p>Tax </p>
                            <p> $<?php echo intval($tax) ?> </p>
                        </div>
                        <hr>
                        <div class="producttotal displayClass">
                            <p>Total </p>
                            <p> $<?php echo intval($totalPrice) ?> </p>
                            <input type="hidden" name="totalPrice" value="<?php echo intval($totalPrice); ?>">

                        </div>
                    </div>
                    <div class="productDateImgInfo">
                        <h5><?php date_default_timezone_set("Asia/Dhaka");
                                            echo date("F, j, Y, g:i, A"); ?></h5>

                        <div class="productItem">
                            <div class="img">
                                <img src="./assets/productUpImg/<?php echo $productImg ?>" alt="">
                                <input type="hidden" name="productImg" value="<?php echo $productImg; ?>">

                            </div>

                            <div class="peoductDes">
                                <div class="pName"> Name: <?php echo  $productName ?></div>
                                <input type="hidden" name="productName" value="<?php echo $productName; ?>">
                                <div class="dec">
                                    <div class="productCodeArea">
                                        <div class="code">Code: </div>
                                        <div class="codeName">
                                            <?php
                                                            $random = rand(0, 945746456666);
                                                            echo $random;
                                                            ?>
                                            <input type="hidden" name="code" value="<?php echo $random; ?>">
                                        </div>
                                    </div>
                                    <div class="brandArea d-flex">
                                        <div class="code pe-2">Brand: </div>
                                        <div class="codeName"><?php echo $productBrand; ?></div>
                                    </div>


                                    <div class="colorArea">


                                        <div class="color">
                                            style:
                                        </div>
                                        <div class="colorName"
                                            style="color: <?php echo $colorOne ? $colorOne : "";
                                                                                                echo $colortwo ?  $colortwo : "";
                                                                                                echo $colorThere ?  $colorThere : ""; ?> ;">
                                            <?php echo $colorOne ?  $colorOne : "";
                                                            echo $colortwo ?  $colortwo : "";
                                                            echo $colorThere ?  $colorThere : ""; ?>
                                        </div>
                                    </div>

                                    <div class="catagory d-flex ">
                                        <div class="catagoryNames pe-2">
                                            Cagagory:
                                        </div>
                                        <div class="catagoryValue">
                                            <?php echo $productCatagory; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>



    </form>








    <?php


                    // $Array  = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
                    // $count = count($Array);


                    // $round = rand(0, 25);
                    // $mainround = rand(0, 5);
                    // for ($i = 0; $i <  $round; $i++) {
                    //     echo $Array[$mainround];
                    // }




                    ?> <?php
                    } else {
                        echo "servar error";
                    }
                } else {
                    echo "servar cannention error";
                }
            }
        } else {
            header("location:index.php");
        };
        include_once('./components/htmlButtonCode.php');
                        ?>

    <script>
    var Allcountry = document.getElementById("Allcountry");
    var zip = document.getElementById("zip");


    fetch('./assets/url.json')
        .then(function(response) {
            return response.json()
        })
        .then(function(data) {
            for (let i = 0; i < data.length; i++) {
                const countries = data[i].name;

                const addOption = document.createElement("option");
                addOption.innerText = countries
                addOption.value = countries
                Allcountry.appendChild(addOption)






            }
        })

    var addplace = document.getElementById("state");

    fetch(`./assets/conuntry/bd.json`)
        .then(function(res) {
            return res.json()
        })
        .then(function(data) {
            for (let i = 0; i < data.length; i++) {

                const zipcode = data[i].zipcode
                const state = data[i].state
                const place = data[i].place
                const community = data[i].community



                const addzipotion = document.createElement("option")
                addzipotion.innerText = zipcode
                addzipotion.value = zipcode
                zip.appendChild(addzipotion)

                const addstatepotion = document.createElement("option")
                addstatepotion.innerText = place
                addstatepotion.value = place
                addplace.appendChild(addstatepotion)


            }
        })



    // fetch(`./assets/conuntry/${counryEnlightCode}.json`)

    //     .then(function(response) {
    //         return response.json()
    //     })
    //     .then(function(data) {
    //         for (let i = 0; i < data.length; i++) {
    //             const bd = data[i].place;
    //             const zipcodes = data[i].zipcode;
    //             console.log(i + " = " + bd + " = zipcode " + zipcodes)






    //         }
    //     })
    </script>