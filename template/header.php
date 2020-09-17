<!-- Header -->

<header id="header" class=" <?= ($_SERVER['REQUEST_URI'] == "/" ? "absolute transparent" : "light") ?>">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Logo -->
                <div class="module module-logo dark" style="background:#fff;padding: 2rem 0rem;">
                    <a href="<?= s_url ?>">
                        <img src="<?= s_url ?>assets\img\manulargelogo.png">
                    </a>
                </div>
            </div>
            <div class="col-md-7">

                <div class="module left">
                    <?php
                    if (!empty($_SESSION["ID"])) {

                    ?>
                        <a style="<?= ($_SERVER['REQUEST_URI'] == "/" ? "display:none" : "") ?>" href="<?= s_url ?>logout" class="btn btn-outline-secondary"><span>Çıkış</span></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- Header / End -->


<!-- Content -->
<div id="content">