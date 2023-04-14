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
                        align-middle border">
                            <thead class="table-light">

                                <tr>
                                    <th>number </th>
                                    <th>Id </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>country </th>
                                    <th>City</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">

                                <?php

                                $accountInfoSelect = "SELECT * FROM `account` ORDER BY userId DESC";
                                $accountInfoSelectQuary = mysqli_query($dbConnenttion, $accountInfoSelect);
                                $num = 1;
                                if ($accountInfoSelectQuary) {
                                    while ($displayaccountInfos = mysqli_fetch_assoc($accountInfoSelectQuary)) {
                                        $userId =  $displayaccountInfos["userId"];
                                        $userName =  $displayaccountInfos["userName"];
                                        $userEmail =  $displayaccountInfos["userEmail"];
                                        $userCountry =  $displayaccountInfos["userCountry"];
                                        $userCity =  $displayaccountInfos["userCity"];
                                        $userAC_Date = $displayaccountInfos["userAC_Date"];




                                ?>

                                <tr class="border-1 border-darkr">
                                    <td><?php echo $num++ ?></td>
                                    <td><?php echo $userId ?></td>
                                    <td><?php echo $userName ?></td>
                                    <td><?php echo $userEmail ?></td>
                                    <td><?php echo $userCountry ?></td>
                                    <td><?php echo $userCity ?></td>
                                    <td><?php echo $userAC_Date ?></td>
                                    <td><a class="btn btn-danger"
                                            href="userAccountDelete.php?id=<?php echo $userId ?>">Delete</a></td>


                                </tr>





                                <?php
                                    }
                                }

                                ?>



                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>
                <div class="text-center"><button class="btn btn-danger text-center" id="orderInfoPdfGe">PDF
                        GENARETOR</button>
                </div>
            </div>


            <script src="../../assets/bootstrap.bundle.min.js"></script>
            <script src="../../assets/fontawesome/fontawesome-free-5.15.4-web/js/all.js"></script>
            <script src="../../assets/fontawesome/fontawesome-free-5.15.4-web/js/brands.min.js"></script>
            <script src="../../assets/fontawesome/fontawesome-free-5.15.4-web/js/regular.min.js"></script>
            <script src="../../assets/html2pdf.bundle.min.js"></script>

            <script src="../../assets/ajax ofline.js"></script>
            <script src="../../assets/jquery.min.js"></script>




</body>

</html>