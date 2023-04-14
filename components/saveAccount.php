<?php

include_once("db.php");

include_once("htmlTopCode.php");
?>
<style>
td.userValue {
    color: white;
}
</style>
<?php
if (isset($_POST["full_name"]) && isset($_POST["email_add"]) && isset($_POST["country"]) && isset($_POST["StreetAddress"]) && isset($_POST["city"]) && isset($_POST["Zip"]) && isset($_POST["state"])) {

    $full_name = $_POST["full_name"];
    $email_add = $_POST["email_add"];
    $country = $_POST["country"];
    $StreetAddress = $_POST["StreetAddress"];
    $city = $_POST["city"];
    $Zip = $_POST["Zip"];
    $state = $_POST["state"];




    $InsertUserInfo = "INSERT INTO account( userName, userEmail, userCountry, userStreet_Address, userCity, userZip, userState) VALUE('$full_name', '$email_add', '$country', '$StreetAddress', '$city', '$Zip', '$state' )";


    if ($InsertUserInfo) {
        $quary = mysqli_query($dbConnenttion, $InsertUserInfo);
        if ($quary) {
            $amount = $_POST["amount"];

?>

<div class="container-fluid">
    .<div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <form action="../paymentSystem/process.php" method="post" id="autoSubmit">

                <input type="hidden" name="amount" value="<?php $amount ?>">
                <input type="hidden" name="full_name" value="<?php $full_name ?>">
                <input type="hidden" name="email_add" value="<?php $email_add ?>">
                <input type="submit" style="visibility:hidden;">

            </form>
        </div>

    </div>
</div>



<?PHP

        } else {
            echo "insrt";
        }
    } else {
        echo "saddam";
    }
} else {
    echo "saddam";
}


if (isset($_POST["full_name"])  &&  isset($_POST["email_add"])  &&  isset($_POST["country"]) &&   isset($_POST["StreetAddress"]) &&  isset($_POST["city"]) &&  isset($_POST["Zip"]) &&  isset($_POST["state"])   &&  isset($_POST["totalPrice"])  && isset($_POST["productImg"]) && isset($_POST["productName"]) && isset($_POST["code"])  && isset($_POST["tax"])  && isset($_POST["shipping"])  && isset($_POST["productBrand"])  && isset($_POST["productCatagory"])) {
    $productName = $_POST["productName"];
    $totalPrice = $_POST["totalPrice"];
    $productImg = $_POST["productImg"];
    $code = $_POST["code"];

    $tax = $_POST["tax"];
    $shipping = $_POST["shipping"];
    $productBrand = $_POST["productBrand"];
    $productCatagory = $_POST["productCatagory"];

    $full_name = $_POST["full_name"];
    $email_add = $_POST["email_add"];
    $country = $_POST["country"];
    $StreetAddress = $_POST["StreetAddress"];
    $city = $_POST["city"];
    $zip = $_POST["Zip"];
    $state = $_POST["state"];
    include_once("db.php");


    $InserorderInfo =  " INSERT INTO `order`(`orderProductName`,	`orderProductPrice`,	`orderProductImg`, `orderCode`) VALUE('$productName', '$totalPrice', '$productImg', '$code')";

    if ($InserorderInfo) {
        $quarys = mysqli_query($dbConnenttion, $InserorderInfo);

        if ($quarys) {

        ?>
<?php include_once("htmlButtonCode.php"); ?>


<div class="orderLoding" style="z-index: 1000;">
    <img src="../assets/loading/loading.gif" class="img-fluid rounded-top" alt="">
</div>

<div class="table-responsive-sm" id="userinfoPdf">

    <img width="200px" src="../assets//logo/logo.webp" alt="">

    <div class="userpdfbg" style=" background: url(../assets/productUpImg/<?php echo  $productImg ?>);     background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
        <table class="table table-striped-columns align-middle"
            style="     background: #0316583b;    backdrop-filter: blur(6px) hue-rotate(51deg);">

            <thead>
                <th>user</th>
                <th>Value</th>
                <th>product</th>
                <th>Value</th>

            </thead>

            <tbody class="table-group-divider">
                <tr>
                    <th scope="row">Name</th>
                    <td class="userValue"><?php echo  $full_name ?></td>
                    <th scope="row">Name</th>
                    <td class="userValue" id="pName"><?php echo  $productName ?></td>

                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td class="userValue"><?php echo  $email_add ?></td>
                    <th scope="row">Code</th>
                    <td class="userValue"><?php echo  $code ?></td>

                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td class="userValue"><?php echo  $country ?></td>
                    <th scope="row">Tax</th>
                    <td class="userValue"><?php echo  $tax ?> Tk</td>

                </tr>
                <tr>
                    <th scope="row">Street </th>
                    <td class="userValue"><?php echo  $StreetAddress ?></td>
                    <th scope="row">Shipping </th>
                    <td class="userValue"><?php echo  $shipping ?> Tk</td>

                </tr>
                <tr>
                    <th scope="row">city </th>
                    <td class="userValue"><?php echo  $city ?></td>
                    <th scope="row">Total </th>
                    <td class="userValue"><?php echo  $totalPrice ?> Tk</td>

                </tr>
                <tr>
                    <th scope="row">Zip </th>
                    <td class="userValue"><?php echo  $zip ?></td>
                    <th scope="row">Time </th>
                    <td class="userValue"><?php
                                                        date_default_timezone_set("Asia/Dhaka");
                                                        echo date("F, j, Y");
                                                        ?></td>

                </tr>
                <tr>
                    <th scope="row"> place </th>
                    <td class="userValue"><?php echo  $state ?></td>
                    <th scope="row"> photo </th>
                    <td class="userValue"><img style="width: 44px;"
                            src="../assets/productUpImg/<?php echo  $productImg ?>">
                    </td>

                </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

</div>


<script src="../assets/html2pdf.bundle.min.js"></script>

<script>
var userinfoPdf = document.getElementById("userinfoPdf")
var pName = document.getElementById("pName")

window.addEventListener("load", function() {
    var ran = Math.floor(Math.random() * 23263464000)
    var opt = {
        margin: [3, 3],
        filename: `${ran}_${pName.innerHTML}.pdf`,
        x: 0,
        y: 0,
        with: 190,
        Image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 1,

        },
        jsPDF: {
            unit: 'em',
            format: 'ledger',
            orientation: 'p',
            portrait: "11.00 × 17.00 in"
        },
    }
    html2pdf().set(opt).from(userinfoPdf).save()
})


setInterval(() => {
    $("#autoSubmit").submit()
}, 2000);
</script>



<?php

        } else {
            echo "Your Order filed. try aging...";
            echo "<a class='btn btn-danger' href='../chackout.php'> Go To ChackOut Page </a>";
        }
    } else {
        echo "not insert ";
    }
}

?>