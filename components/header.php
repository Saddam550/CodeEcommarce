<?PHP include_once("db.php"); ?>





<div class="header">
    <!-- dynamic menu======================= -->
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#cbc7d3;">
        <a class="navbar-brand" href="/CodeEcommarce">ONLY ORDER</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
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
                                <a class="nav-link" href='./components/catagory.php?catagotyName=<?php echo  $headerMenuItems ?>'><?php echo $headerMenuItems ?></a>
                            </li>
                        <?php
                        }

                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <?php

                                $subMenu = "SELECT id, Header_Name FROM submenu";
                                $subMenuQuary = mysqli_query($dbConnenttion,  $subMenu);
                                if ($subMenuQuary) {
                                    while ($submenuItems = mysqli_fetch_assoc($subMenuQuary)) {
                                ?>
                                        <a class="dropdown-item" href="components/subCatagory.php?subCatagoryName=<?php echo   $submenuItems['Header_Name'] ?>"><?php echo $submenuItems['Header_Name'] ?>
                                        </a>
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
            <input type="range" min="0" max="4654554" value="0" id="priceFilters">
            <span id="userSelectPrice" style="color: white;">0</span>

        </div>

    </nav>
</div>