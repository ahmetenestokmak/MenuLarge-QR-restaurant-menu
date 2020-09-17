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
                $menu = "";
                include("sidebar.php");
                ?>
            </div>
            <div class="col-md-9 ">
                <div class="bg-white p-4 p-md-5 mb-4">


                    <?php
                    $id = $_SESSION["ID"];
                    if (isset($_POST["btnAdd"])) {
                        echo "1";
                        $image = date("Ymdhi_") . basename($_FILES['file']['name']);
                        $dizin = 'upload/' . $image;
                        $yuklenecek_dosya = $dizin;

                        if (move_uploaded_file($_FILES['file']['tmp_name'], $yuklenecek_dosya)) {
                            echo "Dosya geçerli ve başarıyla yüklendi.\n";
                        } else {
                            echo "Olası dosya yükleme saldırısı!\n";
                        }

                        $query = $db->prepare("INSERT INTO tb_category SET
                                name = ?,
                                image = ?,
                                companyID=?
                            ");

                        $insert = $query->execute(array(
                            $_POST["name"],
                            $image,
                            $id
                        ));
                        if ($insert) {
                            echo '<div class="alert alert-success alert-dismissable"><strong>Başarılı!</strong> Ekleme işlemi başarılı.</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><strong>Hata!</strong> Ekleme işleminde bir hata oluştu.</div>';
                        }
                    }

                    if (isset($_POST["btnUpdate"])) {
                        $query = $db->prepare("Update tb_menu SET
                            name = ?,
                            image = ?,
                            companyID=?
                            where
                            ID=?
                        ");

                        $insert = $query->execute(array(
                            $_POST["name"],
                            $_POST["price"],
                            $id,
                            $_GET["u"]
                        ));
                        if ($insert) {
                            echo '<div class="alert alert-success alert-dismissable"><strong>Başarılı!</strong> Güncelleme işlemi başarılı.</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><strong>Hata!</strong> Güncelleme işleminde bir hata oluştu.</div>';
                        }
                    }
                    if (isset($_GET["u"])) {
                        $datau = sql("SELECT * FROM tb_category WHERE ID = '{$_GET["u"]}'");
                        $datau = $datau[0];
                    }
                    ?>
                    <h4 class="border-bottom pb-4">Menü <?= (isset($_GET["u"]) ? "Güncelle" : "Ekle") ?></h4>
                    <form class="row mb-5" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group col-sm-12">
                            <label>Adı:</label>
                            <input name="name" type="text" class="form-control" value="<?= $datau["name"] ?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Resim:</label><br>
                            <input name="file" type="file" /><br>
                            <?php
                            if (isset($_GET["u"])) {
                            ?>
                                <img src="<?= s_url . "upload/" . $datau["image"] ?>" style="width:50%;max-height:200px;">
                            <?php } ?>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="text-center">
                                <button class="btn btn-primary" name="<?= (isset($_GET["u"]) ? "btnUpdate" : "btnAdd") ?>"><span><?= (isset($_GET["u"]) ? "Güncelle" : "Ekle") ?></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Content / End -->
<?php include("template/footer-top.php"); ?>
<?php include("template/footer-bottom.php"); ?>