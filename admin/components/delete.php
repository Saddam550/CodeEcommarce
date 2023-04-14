<?php
include_once("../../components/db.php");

if ($_REQUEST["id"]) {
    $id =  $_REQUEST["id"];


    $dlt = "DELETE FROM products WHERE products .productId = $id";
    $delete =  mysqli_query($dbConnenttion, $dlt);
    if ($delete) {
        header("location:productDelete.php");
    } else {
        echo "<script> confirm('sorry your coding problem')</script>";
        header("location:productDelete.php");
    }
}