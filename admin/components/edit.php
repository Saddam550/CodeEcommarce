<?php
include_once("../../components/db.php");

if (isset($_GET["deleteId"])) {
    $ProductName = $_POST["ProductName"];
    $ProductPrice = $_POST["ProductPrice"];
    $ProductBrand = $_POST["ProductBrand"];
    $productCatagory = $_POST["productCatagory"];

    $file = $_FILES["file"];
    $fileName = $file["name"];
    $fileTmp_name = $file["tmp_name"];

    $edite_core_id = $_GET["deleteId"];


    // create A image Random name 
    $random = rand(0, 365465434674546);
    $fileMixName =    $random . $fileName;
    move_uploaded_file($fileTmp_name, "../../assets/productUpImg/$fileMixName");

    $qurey = "UPDATE  products SET productName='$ProductName',productPrice= '$ProductPrice', productBrand='$ProductBrand', productImg='$fileMixName',productCatagory='$productCatagory'  WHERE  productId = $edite_core_id";

    if ($qurey) {
        $qureyDone = mysqli_query($dbConnenttion, $qurey);
        if ($qureyDone) {
            header("location:ProductEdit.php");
        } else {
            echo "a";
        }
    } else {
        echo "b";
    }
} else {
    echo "c";
}