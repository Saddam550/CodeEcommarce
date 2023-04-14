<?php include_once("../components/db.php");
?>


<div class="mb-3" id="productAddForm">
    <form action="components/ProductInsert.php" method="post" id="customStyleForm" enctype="multipart/form-data">
        <input type="text" class="form-control mt-4" name="ProductName" id="" placeholder="Product Name">

        <select class="form-control mt-4 me-2" style="display:inline; " name="ProductCatagory">
            <option value="Select Catagory">Select Catagory</option>
            <?php
            $productSelect = "SELECT Header_Name FROM header";
            $productSelectQuary = mysqli_query($dbConnenttion, $productSelect);
            if ($productSelectQuary) {
                while ($displayProducts = mysqli_fetch_assoc($productSelectQuary)) {
                    $productCatagory =  $displayProducts["Header_Name"];
            ?>
            <option value="<?php echo  $productCatagory ?>"> <?php echo  $productCatagory ?></option>
            <?php
                }
            }            ?>
        </select>






        <select class="form-control mt-4 me-2" style="display:inline; " name="subProductCatagory">
            <option value="Sub Catagory">Sub Catagory</option>
            <?php
            $productSelect = "SELECT Header_Name FROM submenu";
            $productSelectQuary = mysqli_query($dbConnenttion, $productSelect);
            if ($productSelectQuary) {
                while ($displayProducts = mysqli_fetch_assoc($productSelectQuary)) {
                    $productCatagory =  $displayProducts["Header_Name"];
            ?>
            <option value="<?php echo  $productCatagory ?>"> <?php echo  $productCatagory ?></option>
            <?php
                }
            }            ?>
        </select>





        <span type="button" class="btn btn-primary" data-bs-toggle="button" id="AddCataId" aria-pressed="false"
            autocomplete="off">Add</span>

        <input type="text" class="form-control mt-4" name="ProductBrand" id="" placeholder="Product Brand">
        <input type="text" class="form-control mt-4" name="ProductPrice" id="" placeholder="Product Price">
        <label for="" class="form-label mt-4">image</label>
        <input type="file" class="form-control " name="file" id="">
        <input type="submit" class="form-control mt-4 btn btn-info" value="Add Product">
    </form>
</div>
</div>
</div>
</div>




<!--start Add catagory accordion  -->

<div class="AddCataoryPopup" id="poppuDisplay" style=" transform: scale(0);
    transition: 0.2s;
    visibility: hidden;">


    <div class="closePopup btn btn-close btn btn-danger" id="AddCatagoryPopupId"></div>






    <div class="collapse" id="contentId">

    </div>
    <div class="addCatagoryinput">
        <h5>Add Catagory</h5>
        <div class="mb-3">
            <form action="components/addCatagotyPage.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control mb-3" name="AddCatagoryName" id="addCatagoryStyle"
                    placeholder="Add Catagory Name" required>

                <input type="file" class="form-control mb-3" name="AddCatagoryFile" id="addCatagoryStyle"
                    placeholder="Add Catagory Name">

                <select name="nemuSelect" class="form-control mb-3 text-white" style="    background: #430087;" id=""
                    required>
                    <option>SELECT MENU</option>
                    <option value="header">Menu</option>
                    <option value="submenu">Sub Menu</option>
                </select>
                <input type="submit" class="form-control" id="addCatagoryStyle" value="Add Catagory">
            </form>
        </div>
    </div>
</div>

<!--end Add catagory accordion  -->




<?php

if ($_REQUEST["res"] == 1) {
?>

<div class="alert alert-primary" role="alert" id="uploadSuccess">
    <p class="alert-heading"><?php echo "successfully Product upload"; ?></p>

</div>

<?php
}



?>

<script>
var AddCatagoryPopupId = document.getElementById("AddCatagoryPopupId");
var poppuDisplay = document.getElementById("poppuDisplay");
var AddCataId = document.getElementById("AddCataId");

AddCatagoryPopupId.addEventListener("click", function() {
    // poppuDisplay.style.display = "none"

    poppuDisplay.style.transform = " scale(0)";
    poppuDisplay.style.transition = "0.2s";
    poppuDisplay.style.visibility = "hidden";
});

AddCataId.addEventListener("click", function() {
    // poppuDisplay.style.display = "block"
    poppuDisplay.style.transform = " scale(1)";
    poppuDisplay.style.transition = "0.2s";
    poppuDisplay.style.visibility = "visible";
});
</script>