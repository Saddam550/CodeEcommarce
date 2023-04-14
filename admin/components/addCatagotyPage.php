<?php
include_once("../../components/db.php");

if (isset($_POST["AddCatagoryName"]) && isset($_POST["nemuSelect"]) && isset($_FILES["AddCatagoryFile"])) {

    $AddCatagoryName = $_POST["AddCatagoryName"];
    $nemuSelect = $_POST["nemuSelect"];
    $file = $_FILES["AddCatagoryFile"];

    $fileName = $file["name"];
    $fileTmp_name = $file["tmp_name"];






    // create A image Random name 
    $random = rand(0, 976546454546);
    $fileMixName =    $random . $fileName;
    move_uploaded_file($fileTmp_name, "../../assets/catagoryImg/$fileMixName");
    if (isset($_POST["nemuSelect"])) {
        $Insert = "INSERT INTO  $nemuSelect( Header_Name, headerImg) VALUE('$AddCatagoryName',' $fileMixName' )";

        if ($Insert) {
            $quary = mysqli_query($dbConnenttion, $Insert);
            if ($quary) {
                header("Location:../index.php?res=1");
            } else {
                echo "quary not Working";
                echo $nemuSelect;
            }
        }
    } else {
        header("Location:../index.php");
        echo "a";
    }
} else {
    echo "b";
    header("Location:../index.php");
}