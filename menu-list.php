<?php include("config/configure.php"); ?>
<?php
if (empty($_SESSION["ID"])) {
    echo "<script type='text/javascript'>window.top.location='" . s_url . "/register';</script>";
}
?>
<?php include("template/head-top.php"); ?>
<?php include("template/head-bottom.php"); ?>
<?php include("template/header.php"); ?>
<div class="page-title bg-light">

</div>
<section class="section bg-light">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php
                $menu = "menu-list";
                include("sidebar.php");
                ?>
                <script src="qrcode.min.js"></script>

                <div id="qrcode2"></div>
                <div id="qryazdir" style="display:none;">
                <?php include("template/head.php") ?>
                <section class="section section-main section-main-3 bg-dark dark" style="padding-top: 20rem;padding-bottom: 2rem;">

                    <div class="bg-image bg-fixed" style="opacity: 0.3;"><img src="<?= s_url ?>upload/hero-burger.jpg" alt=""></div>

                    <div class="container v-center">
                        <div class="row">
                            <div class="col-md-7 offset-md-3">
                                <div class="module module-logo dark" style="background: #ffffff;padding: 2rem 0rem;text-align: center;margin:0 auto 3rem;width: 292px;">
                                    <a href="https://menularge.bemolmedya.com/">
                                        <img src="https://menularge.bemolmedya.com/assets\img\manulargelogo.png" style="width:250px;">
                                    </a>
                                </div>
                                <h1 class="display-2"><?= $_SESSION["name"] ?></h1>
                                <h4 class=" mb-5" syle="color:#fff !important">Aşağıdaki QR kodu okutarak menüye ulaşabilirsiniz</h4>
                                <div id="qrcode" style="background: #fff;padding: 15px;width:280px;margin:0 auto;"></div>
                                <div style="text-align:center"><?= s_url . "menu?i=RSTRNT" . $_SESSION["ID"] ?></div>
                                <div style="text-align:center;padding-top: 10rem;"><img src="<?= s_url ?>assets\img\logo.png" style="width:25%"></div>
                                
                                <script type="text/javascript">
                                    new QRCode(document.getElementById("qrcode"), {
                                        text: '<?= s_url . "menu?i=RSTRNT" . $_SESSION["ID"] ?>',
                                        width: 250,
                                        height: 250,
                                        colorDark: 'black',
                                        colorLight: 'white',
                                        correctLevel: QRCode.CorrectLevel.H
                                    });
                                    new QRCode(document.getElementById("qrcode2"), {
                                        text: '<?= s_url . "menu?i=RSTRNT" . $_SESSION["ID"] ?>',
                                        width: 100,
                                        height: 100,
                                        colorDark: 'black',
                                        colorLight: 'white',
                                        correctLevel: QRCode.CorrectLevel.H
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
            
            <a onclick="printDiv('qryazdir')" class="btn btn-outline-secondary">QR kodu indir</a>
            <script type="text/javascript">
                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }
            </script>

            </div>
            
            <div class="col-md-9">
                <?php
                if (isset($_GET["i"])) {
                    if (hash("sha256", $_SESSION["ID"] . $_GET['i']) == $_GET["t"]) {
                        $query = $db->prepare("DELETE FROM tb_menu WHERE ID = :id");
                        $delete = $query->execute(array(
                            'id' => $_GET['i']
                        ));
                    }
                }
                if (isset($_GET["c"])) $c = " ID=" . $_GET["c"] . " and ";
                else $c = "";
                $categories = $db->query("SELECT * FROM `tb_category` WHERE " . $c . " `companyID`=" . $_SESSION["ID"], PDO::FETCH_ASSOC);

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
                                                <a href="<?= s_url . "add-menu?u=" . $val2["ID"] . "&t=" . hash("sha256", $_SESSION["ID"] . $val2["ID"]) ?>" class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="1"><span>Düzenle</span></a>
                                                <a href="<?= s_url . "list-menu?i=" . $val2["ID"] . "&t=" . hash("sha256", $_SESSION["ID"] . $val2["ID"]) ?>" class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="1"><span>Sil</span></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- Menu Item -->
                                <div class="menu-item menu-list-item">
                                    <div class="row align-items-center">
                                        <div class="col-sm-6 mb-2 mb-sm-0">
                                            <a href="<?= s_url . "add-menu?kadd=" . $val["ID"] . "&t=" . hash("sha256", $_SESSION["ID"] . $val["ID"]) ?>" class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="1"><span>Ekle</span></a>

                                        </div>

                                    </div>
                                </div>
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

</section>
<!-- Content / End -->
<?php include("template/footer-top.php"); ?>
<?php include("template/footer-bottom.php"); ?>