<?php include_once("../../components/db.php") ?>


<?php


if (isset($_GET["id"]) || isset($_GET["orderInfoId"])) {
    echo  $accountid =  $_GET["id"];
    echo  $orderInfoId =  $_GET["orderInfoId"];

    $accountidSelect = "SELECT * FROM `account` WHERE userId=$accountid";

    $accountInfoSelectQuary = mysqli_query($dbConnenttion, $accountidSelect);

    $ordertidSelect = "SELECT * FROM `order` WHERE Id=$orderInfoId";

    $ordertInfoSelectQuary = mysqli_query($dbConnenttion, $ordertidSelect);


    if ($accountInfoSelectQuary || $ordertInfoSelectQuary) {

        while ($displayaccountInfos = mysqli_fetch_assoc($accountInfoSelectQuary)) {
            $displayorderInfos = mysqli_fetch_assoc($ordertInfoSelectQuary);
            $userId =  $displayaccountInfos["userId"];
            $orderId =  $displayorderInfos["Id"];
        }
        $valuePass =  array(
            'D_id' => $userId,
            'style' => "poppuDisplay",
            'orderId' =>  $orderId

        );
        $arry = http_build_query($valuePass);

        header("location:orderpage.php?$arry");
    } else {
        echo "queary ";
    }
} else {
    echo "GET ";
}
?>