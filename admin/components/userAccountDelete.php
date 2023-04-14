<?php
include_once("../../components/db.php");

if ($_REQUEST["id"]) {
    $id =  $_REQUEST["id"];


    $dlt = "DELETE FROM `account` WHERE `account`.`userId` =  $id";
    $delete =  mysqli_query($dbConnenttion, $dlt);
    if ($dlt) {


        if ($delete) {
            header("location:userAccount.php");
        } else {
            echo "<script> confirm('sorry your coding problem')</script>";
            // header("location:userAccount.php");
        }
    } else {
        echo "quary Problems";
    }
}
