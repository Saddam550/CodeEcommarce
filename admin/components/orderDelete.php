<?php
include_once("../../components/db.php");

if ($_REQUEST["id"]) {
    $id =  $_REQUEST["id"];


    $dlt = "DELETE FROM `order` WHERE `order`.`Id` =  $id";
    $delete =  mysqli_query($dbConnenttion, $dlt);
    if ($dlt) {


        if ($delete) {
            header("location:orderpage.php");
        } else {
            echo "<script> confirm('sorry your coding problem')</script>";
            // header("location:orderpage.php");
        }
    } else {
        echo "asdasd";
    }
}
