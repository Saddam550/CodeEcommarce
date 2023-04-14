<?php



setcookie("name", "", time() - 1223);
setcookie("email", "", time() - 2123);
setcookie("pass", "", time() - 1223);




header("location:adminLogin.php");
