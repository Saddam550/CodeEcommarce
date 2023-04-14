<?PHP include_once("db.php"); ?>





<div class="header">
    <!-- dynamic menu======================= -->
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #00073e;">
        <a class="navbar-brand" href="/CodeEcommarce">ONLY ORDER</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <?PHP


                if ($dbConnenttion) {
                    $insertHeaderItem = "SELECT id, Header_Name FROM header";
                    $quary = mysqli_query($dbConnenttion, $insertHeaderItem);
                    if ($quary) {
                        while ($headerValue = mysqli_fetch_array($quary)) {


                            $headerMenuId =  $headerValue['id'];
                            $headerMenuItems =  $headerValue['Header_Name'];
                ?>

                <li class="nav-item">
                    <a class="nav-link"
                        href='./catagory.php?catagotyName=<?php echo  $headerMenuItems ?>'><?php echo $headerMenuItems ?></a>
                </li>
                <?php
                        }

                        ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <?php

                                $subMenu = "SELECT id, submenuItem FROM submenu";
                                $subMenuQuary = mysqli_query($dbConnenttion,  $subMenu);
                                if ($subMenuQuary) {
                                    while ($submenuItems = mysqli_fetch_assoc($subMenuQuary)) {
                                ?>
                        <a class="dropdown-item"
                            href="./catagory.php?subCatagoryName=<?php echo   $submenuItems['submenuItem'] ?>"><?php echo $submenuItems['submenuItem'] ?>
                            1</a>
                        <?php
                                    }
                                    ?>

                    </div>
                </li>
                <?php }
                            } else {
                                echo 'quary is not workig';
                            }
                        } else {
                            echo "Database not Cannect";
                        } ?>
            </ul>
        </div>
        </ul>
        <div class="priceFilter">
            <input type="range" min="0" max="10000" name="" id="priceFilters">
            <span style="color: white;">value</span>

        </div>

    </nav>
</div>

<script>
var priceFilters = document.getElementById("priceFilters");



priceFilters.addEventListener("change", function priceFiltersfun() {
    console.log(priceFilters.value)
})
</script>