<?php include("config/configure.php"); ?>
<?php include("template/head-top.php"); ?>
<?php include("template/head-bottom.php"); ?>
<?php include("template/header.php"); ?>

<?php
$id=str_replace("RSTRNT", "", $_GET["i"]);
$company = $db->query("SELECT * FROM tb_company WHERE ID = '{$id}'")->fetch(PDO::FETCH_ASSOC);
?>
<!-- Page Title -->
<div class="page-title bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-4">
                <h1 class="mb-0"><?=$company["name"]?></h1>
                <h4 class="text-muted mb-0"><?=$company["description"]?><br><small><?=$company["address"]?></small></h4>
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-3">
                <?php
                $categories = $db->query("SELECT * FROM `tb_category` WHERE `companyID`='{$id}'", PDO::FETCH_ASSOC);

                ?>
                <!-- Menu Navigation -->
                <nav id="menu-navigation" class="stick-to-content" data-local-scroll="">
                    <ul class="nav nav-menu bg-dark dark">
                        <?php
                        foreach ($categories as $val) {
                        ?>
                            <li><a href="#category-<?= $val["ID"] ?>"><?= $val["name"] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                <?php
                $categories = $db->query("SELECT * FROM `tb_category` WHERE `companyID`=" . str_replace("RSTRNT", "", $_GET["i"]), PDO::FETCH_ASSOC);

                if ($categories->rowCount()) {
                    foreach ($categories as $val) {
                ?>
                        <!-- Menu Category / Drinks -->
                        <div id="category-<?= $val["ID"] ?>" class="menu-category">
                            <div class="menu-category-title">
                                <div class="bg-image"><img src="<?= s_url ?>upload/<?= $val["image"] ?>" alt="<?= s_name ?>"></div>
                                <h2 class="title"><?= $val["name"] ?></h2>
                            </div>
                            <div class="menu-category-content">

                                <?php
                                $menus = $db->query("SELECT * FROM tb_menu WHERE categoryID=" . $val["ID"], PDO::FETCH_ASSOC);

                                foreach ($menus as $val2) {
                                ?>
                                    <!-- Menu Item -->
                                    <div class="menu-item menu-list-item">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <h6 class="mb-0"><?= $val2["name"] ?></h6>
                                                <span class="text-muted text-sm"><?= $val2["description"] ?></span>
                                            </div>
                                            <div class="col-sm-6 text-sm-right">
                                                <span class="text-md mr-4"><span class="text-muted"></span> ₺<span data-product-base-price=""><?= $val2["price"] ?></span></span>

                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div id="Drinks" class="menu-category">
                        <div class="menu-category-title">
                            <div class="bg-image"><img src="" alt="<?= s_name ?>"></div>
                            <h2 class="title">Menu Boş</h2>
                        </div>
                    </div>
                <?php
                }
                ?>



            </div>
        </div>
    </div>
</div>

<!-- Content / End -->
<?php include("template/footer-top.php"); ?>
<?php include("template/footer-bottom.php"); ?>