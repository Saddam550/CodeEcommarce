<?php include_once("../components/db.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="../assets/bootstrap.css">

    <link rel="stylesheet" href="../assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../style/adminStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>




    <div class="container-fluid  position-absolute h-100 w-100" style="background-color: #00073e;">
        <div class="row">
            <div class="col-md-12">

                <div class="registor m-auto w-50 p-5">
                    <div class="avator text-center mb-5"> <i style="font-size: 200px; color:white;"
                            class="fa-solid fa-user"></i>
                    </div>
                    <form method="post">
                        <div class="mb-3">
                            <input type="name" class="form-control mt-3" name="name" id="" placeholder="name">
                            <input type="email" class="form-control mt-3" name="email" id="" placeholder="email">
                            <input type="password" class="form-control mt-3" name="password" id=""
                                placeholder="password">
                            <input type="submit" class="form-control mt-3 btn btn-success" value="Login">
                            <a href="../index.php" class="nav-link">Go To Site</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>



    <script src="../assets/bootstrap.bundle.min.js"></script>
    <script src="../assets/fontawesome/fontawesome-free-5.15.4-web/js/all.js"></script>
    <script src="../assets/fontawesome/fontawesome-free-5.15.4-web/js/brands.min.js"></script>
    <script src="../assets/fontawesome/fontawesome-free-5.15.4-web/js/regular.min.js"></script>

    <script src="../assets/ajax ofline.js"></script>
    <script src="../assets/jquery.min.js"></script>


</body>

</html>





<?php

include_once("../components/db.php");




$setname = "saddam";
$setemail = "Admin@gmail.com";
$setpass = "123456";







if (isset($_POST["name"])  || isset($_POST["email"]) || isset($_POST["password"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    setcookie("name", $name, time() + 123);
    setcookie("email", $email, time() + 123);
    setcookie("pass", $pass, time() + 123);
    if ($setname === $name && $setemail === $email && $setpass === $pass) {
        header("location:index.php");
    }


    if (isset($_COOKIE["email"]) && isset($_COOKIE["email"]) && isset($_COOKIE["pass"])) {
        if ($setname === $name && $setemail === $email && $setpass === $pass) {
            header("location:index.php");
        }
    }
}


?>