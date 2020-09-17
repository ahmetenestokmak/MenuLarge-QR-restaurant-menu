<?php include("config/configure.php"); ?>
<?php
if (!empty($_SESSION["ID"])) {
    echo "<script type='text/javascript'>window.top.location='" . s_url . "/profile';</script>";
}
?>
<?php include("template/head-top.php"); ?>
<?php include("template/head-bottom.php"); ?>
<?php include("template/header.php"); ?>


<!-- Section - Main -->
<section class="section section-main section-main-3 bg-dark dark" style="
    padding-top: 20rem;
    padding-bottom: 25rem;
">

    <div class="bg-image bg-fixed" style="opacity: 0.3;"><img src="<?= s_url ?>upload/hero-burger.jpg" alt=""></div>

    <div class="container v-center">
        <div class="row">
            <div class="col-md-7 offset-md-3">
                <h1 class="display-2">QR kod ile <strong style="font-weight:900">Ücretsiz</strong> Online Menu</h1>
                <h4 class=" mb-5" syle="color:#fff !important">Tamamen ücretsiz olan online menu sistemi ile restaurantınızın menulerini dijitalleştirmek istemez misiniz?</h4>
                <a href="<?= s_url ?>register" class="btn btn-outline-primary btn-lg"><span>Restaurant&Cafe İle Kaydol</span></a>
            </div>
        </div>
    </div>

</section>
<?php include("template/footer-top.php"); ?>
<?php include("template/footer-bottom.php"); ?>