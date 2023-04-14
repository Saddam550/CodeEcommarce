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
                    <div class="table-responsive-md">
                        <table class="table table-striped-columns
                        table-hover	
                        table-borderless
                        table-primary
                        align-middle">
                            <thead class="table-light">

                                <tr>
                                    <th>Id </th>
                                    <th>orderId</th>
                                    <th>Name</th>
                                    <th>Price </th>
                                    <th>Pic</th>
                                    <th>Detelis</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">

                                <?php

                                $accountInfoSelect = "SELECT * FROM `account` ORDER BY userId DESC";
                                $accountInfoSelectQuary = mysqli_query($dbConnenttion, $accountInfoSelect);

                                if ($accountInfoSelectQuary) {
                                    while ($displayaccountInfos = mysqli_fetch_assoc($accountInfoSelectQuary)) {
                                        $userId =  $displayaccountInfos["userId"];

                                        $userName =  $displayaccountInfos["userName"];
                                        $userEmail =  $displayaccountInfos["userEmail"];
                                        $userCountry =  $displayaccountInfos["userCountry"];
                                        $userStreet_Address =  $displayaccountInfos["userStreet_Address"];
                                        $userCity =  $displayaccountInfos["userCity"];
                                        $userZip =  $displayaccountInfos["userZip"];
                                        $userState =  $displayaccountInfos["userState"];
                                        $userAC_Date =  $displayaccountInfos["userAC_Date"];
                                    }
                                }

                                $orderInfoSelect = "SELECT * FROM `order` ORDER BY Id DESC ";
                                $orderInfoSelectQuary = mysqli_query($dbConnenttion, $orderInfoSelect);

                                if ($orderInfoSelectQuary) {
                                    while ($displayorderInfos = mysqli_fetch_assoc($orderInfoSelectQuary)) {
                                        $orderInfoId = $displayorderInfos["Id"];
                                        $orderProductName = $displayorderInfos["orderProductName"];
                                        $orderProductPrice = $displayorderInfos["orderProductPrice"];
                                        $orderProductImg = $displayorderInfos["orderProductImg"];
                                        $orderCode = $displayorderInfos["orderCode"];
                                        $orderProductDate = $displayorderInfos["orderProductDate"];

                                        $userinfoid =  array(
                                            'id' => $userId++,
                                            'orderInfoId' =>  $orderInfoId

                                        );
                                        $userinfoidArry = http_build_query($userinfoid);


                                ?>



                                        <tr class="">

                                            <td><?php echo   $orderInfoId ?></td>
                                            <td><?php echo   $orderCode ?></td>
                                            <td><?php echo   $orderProductName ?></td>
                                            <td><?php echo   $orderProductPrice ?></td>


                                            <td class="orderImg" style="width:50px;"><img width="100%" src="../../assets/productUpImg/<?php echo   $orderProductImg ?>"></td>
                                            <td>

                                                <a id="AddCataId" class="btn btn-primary" href="orderDetils.php?<?php echo  $userinfoidArry ?>">Info</a>
                                                <a class="btn btn-primary" href="orderDelete.php?id=<?php echo  $orderInfoId ?>">Delete</a>

                                            </td>
                                        </tr>


                                <?php




                                    }
                                } else {
                                    echo "QUARY PROBLEMPS";
                                }


                                ?>


                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>











            </div>
        </div>
    </div>





    <?php
    if (isset($_GET["D_id"]) || isset($_GET["style"])) {

        $style =  $_GET["style"];

    ?>


        <div class="AddCataoryPopup" id="<?php echo $style ?>">
            <div class="closePopup btn btn-close btn btn-danger" id="AddCatagoryPopupId"></div>

            <div class="collapse" id="contentId">

            </div>
            <div class="addCatagoryinput">

                <div class="table-responsive" id="tableBg">
                    <table style="    backdrop-filter: blur(2px);     background: black;" class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">

                        <tbody class="table-group-divider">

                            <thead>
                                <tr>
                                    <th>user</th>
                                    <th>value</th>
                                    <td></td>
                                    <th>Product</th>
                                    <th>value</th>

                                </tr>

                            </thead>




                            <?php




                            $accountid =  $_GET["D_id"];


                            $accountidSelect = "SELECT * FROM `account` WHERE userId=$accountid";


                            $accountInfoSelectQuary = mysqli_query($dbConnenttion, $accountidSelect);

                            if ($accountInfoSelectQuary) {

                                $orderId =  $_GET["orderId"];
                                $orderidSelect = "SELECT * FROM `order` WHERE Id=$orderId";
                                $orderInfoSelectQuary = mysqli_query($dbConnenttion, $orderidSelect);

                                while ($displayaccountInfos = mysqli_fetch_assoc($accountInfoSelectQuary)) {
                                    $userId =  $displayaccountInfos["userId"];

                                    $userName =  $displayaccountInfos["userName"];
                                    $userEmail =  $displayaccountInfos["userEmail"];
                                    $userCountry =  $displayaccountInfos["userCountry"];
                                    $userStreet_Address =  $displayaccountInfos["userStreet_Address"];
                                    $userCity =  $displayaccountInfos["userCity"];
                                    $userZip =  $displayaccountInfos["userZip"];
                                    $userState =  $displayaccountInfos["userState"];
                                    $userAC_Date =  $displayaccountInfos["userAC_Date"];



                                    $displayorderInfos = mysqli_fetch_assoc($orderInfoSelectQuary);
                                    $orderInfoId = $displayorderInfos["Id"];
                                    $orderProductName = $displayorderInfos["orderProductName"];
                                    $orderProductPrice = $displayorderInfos["orderProductPrice"];
                                    $orderProductImg = $displayorderInfos["orderProductImg"];
                                    $orderCode = $displayorderInfos["orderCode"];
                                    $orderProductDate = $displayorderInfos["orderProductDate"];


                            ?>
                                    <tr class="table-dark">
                                        <th>Name</th>
                                        <td id="UserName"> <?php echo  $userName ?></td>
                                        <td></td>
                                        <th> Name</th>
                                        <td><?php echo  $orderProductName ?></td>
                                    </tr>

                                    <tr class="table-dark">
                                        <th>Email</th>
                                        <td> <?php echo  $userEmail ?></td>
                                        <td></td>
                                        <th> Price</th>
                                        <td><?php echo  $orderProductPrice ?> TK</td>
                                    </tr>


                                    <tr class="table-dark">
                                        <th>Country</th>
                                        <td> <?php echo  $userCountry ?></td>
                                        <td></td>
                                        <th> Code</th>
                                        <td><?php echo  $orderCode ?></td>
                                        </td>
                                    </tr>

                                    <tr class="table-dark">
                                        <th>street Address</th>
                                        <td> <?php echo  $userStreet_Address ?></td>
                                        <td></td>
                                        <th> Date</th>
                                        <td><?php echo  $orderProductDate ?></td>


                                    </tr>
                                    <tr class="table-dark">
                                        <th>City</th>
                                        <td> <?php echo  $userCity ?></td>
                                        <td></td>
                                        <th> photo</th>
                                        <td>
                                            <div class="userOrderImg">
                                                <img id="user_order_pdf" src="../../assets/productUpImg/<?php echo  $orderProductImg ?>" alt="">
                                            </div>

                                    </tr>
                                    <tr class="table-dark">
                                        <th>Zip</th>
                                        <td> <?php echo  $userZip ?></td>
                                        <td></td>
                                        <th></th>
                                    </tr>
                                    <tr class="table-dark">
                                        <th>State</th>
                                        <td> <?php echo  $userState ?></td>
                                        <th></th>
                                        <th></th>
                                        <td> </td>

                                    </tr>
                                    <tr class="table-dark">
                                        <th>Date</th>
                                        <td> <?php echo  $userAC_Date ?></td>
                                        <th></th>
                                        <th></th>

                                    </tr>


                        <?php                }
                            } else {
                                echo "queary ";
                            }
                        } else {
                            echo "GET ";
                        }



                        ?>




                        </tbody>
                        <tfoot>

                        </tfoot>
                        <img style="display: none;" id="displayContol" src="../../assets/logo/logo.webp" alt="">
                    </table>
                </div>
            </div>
            <div class="text-center"><button class="btn btn-danger text-center" id="orderInfoPdfGe">PDF GENARETOR</button>
            </div>
        </div>


        <script src="../../assets/bootstrap.bundle.min.js"></script>
        <script src="../../assets/fontawesome/fontawesome-free-5.15.4-web/js/all.js"></script>
        <script src="../../assets/fontawesome/fontawesome-free-5.15.4-web/js/brands.min.js"></script>
        <script src="../../assets/fontawesome/fontawesome-free-5.15.4-web/js/regular.min.js"></script>
        <script src="../../assets/html2pdf.bundle.min.js"></script>

        <script src="../../assets/ajax ofline.js"></script>
        <script src="../../assets/jquery.min.js"></script>


        <script>
            var AddCatagoryPopupId = document.getElementById("AddCatagoryPopupId");
            var poppuDisplay = document.getElementById("poppuDisplay");
            // var AddCataId = document.querySelectorAll("#AddCataId");


            AddCatagoryPopupId.addEventListener("click", function() {
                window.location.href = "orderpage.php"

                poppuDisplay.style.transform = " scale(0)";
                poppuDisplay.style.transition = "0.2s";
                poppuDisplay.style.visibility = "hidden";
            });


            window.addEventListener("click", function() {
                window.location.href = "orderpage.php"

                poppuDisplay.style.transform = " scale(0)";
                poppuDisplay.style.transition = "0.2s";
                poppuDisplay.style.visibility = "hidden";
            });

            // for (let i = 0; i < AddCataId.length; i++) {

            //     AddCataId[i].addEventListener("click", function() {
            //         // poppuDisplay.style.display = "block"
            //         poppuDisplay.style.transform = " scale(1)";
            //         poppuDisplay.style.transition = "0.2s";
            //         poppuDisplay.style.visibility = "visible";
            //     });

            // }

            // var orderSub = document.querySelectorAll("#orderSub");

            // for (let index = 0; index < orderSub.length; index++) {
            //     orderSub[index].addEventListener("click", function(e) {
            //         e.preventDefault()
            //     })


            // }

            var orderInfoPdfGe = document.getElementById("orderInfoPdfGe");
            var tableBg = document.getElementById("tableBg");
            var displayContol = document.getElementById("displayContol");
            var UserName = document.getElementById("UserName");


            orderInfoPdfGe.addEventListener("click", function() {
                displayContol.style.display = "block"
                var ran = Math.floor(Math.random() * 23263464000)
                var opt = {
                    margin: [3, 3],
                    filename: `${ran}_${UserName.innerHTML}.pdf`,

                    x: 0,
                    y: 0,
                    with: 190,
                    Image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 1,

                    },
                    jsPDF: {
                        unit: 'em',
                        format: 'ledger',
                        orientation: 'p'
                    },



                }

                html2pdf().set(opt).from(tableBg).save()
            })
        </script>
</body>

</html>