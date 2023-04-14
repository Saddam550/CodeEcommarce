<?php
include_once("../../components/db.php");

if (isset($_POST["ProductName"]) && isset($_POST["ProductCatagory"]) && isset($_POST["subProductCatagory"]) && isset($_POST["ProductBrand"]) && isset($_POST["ProductPrice"]) && isset($_FILES["file"])) {

    $ProductName = $_POST["ProductName"];
    $ProductCatagory = $_POST["ProductCatagory"];
    $ProductSubCatagory =   $_POST["subProductCatagory"];
    $ProductBrand = $_POST["ProductBrand"];
    $ProductPrice = $_POST["ProductPrice"];
    $file = $_FILES["file"];



    // echo $ProductCatagory;

    $catagory = "";

    if ($ProductSubCatagory === "Sub Catagory") {
        if ($ProductCatagory === "Select Catagory") {
            $catagory = "";
        } else {
            $catagory = $ProductCatagory;
        }

        // $catagory = $ProductCatagory;
    } else {
        $catagory = $ProductSubCatagory;
    }



    $fileName = $file["name"];
    $fileTmp_name = $file["tmp_name"];


    // create A image Random name 
    $random = rand(0, 365465434674546);
    $fileMixName =    $random . $fileName;
    move_uploaded_file($fileTmp_name, "../../assets/productUpImg/$fileMixName");
    if ($ProductName || $fileMixName) {

        $Insert = "INSERT INTO products( productName, productPrice, productImg, productBrand, productCatagory) VALUE('$ProductName',   '$ProductPrice', '$fileMixName', '$ProductBrand', '$catagory' )";


        if ($Insert) {
            $quary = mysqli_query($dbConnenttion, $Insert);
            if ($quary) {
                header("Location:../index.php?res=1");


                echo "   quary not Working a";
            } else {
                echo "quary not Working b";
            }
        }
    } else {
        echo "quary not Working c";
        header("Location:../index.php");
    }
} else {
    echo "quary not Working d";
    header("Location:../index.php");
}
