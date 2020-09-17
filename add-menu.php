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
                    $query = $db->query("SELECT * FROM tb_category WHERE companyID='{$_SESSION["ID"]}' and ID='{$_GET["kadd"]}'", PDO::FETCH_ASSOC);
                    if ($query->rowCount()) {
                        $id = $_SESSION["ID"];
                        if (isset($_POST["btnAdd"])) {
                            $query = $db->prepare("INSERT INTO tb_menu SET
                                name = ?,
                                description = ?,
                                price= ?,
                                categoryID=?
                            ");

                            $insert = $query->execute(array(
                                $_POST["name"],
                                $_POST["description"],
                                $_POST["price"],
                                $_GET["kadd"]
                            ));
                            if ($insert) {
                                echo '<div class="alert alert-success alert-dismissable"><strong>Başarılı!</strong> Ekleme işlemi başarılı.</div>';
                            } else {
                                echo '<div class="alert alert-danger alert-dismissable"><strong>Hata!</strong> Ekleme işleminde bir hata oluştu.</div>';
                            }
                        }
                    }
                    $data = sql("SELECT * FROM tb_company WHERE ID = '{$id}'");
                    $data = $data[0];

                    $query = $db->query("SELECT * FROM tb_category WHERE companyID='{$_SESSION["ID"]}' and ID='{$_GET["kadd"]}'", PDO::FETCH_ASSOC);
                    if ($query->rowCount()) {
                        foreach ($query as $row) {

                    ?>
                            <div id="" class=" menu-category ">
                                <div class="bg-white">
                                    <div class="menu-category-title" role="tab">
                                        <div class="bg-image" style="background-image: url(<?= s_url . "upload/" . $row["image"] ?>);">
                                            <img src="<?= s_url . "upload/" . $row["image"] ?>" alt="" style="display: none;">
                                        </div>
                                        <h2 class="title"><?= $row["name"] ?></h2>
                                    </div>
                                </div>
                            </div>
                    <?php

                        }
                    }
                    if (isset($_POST["btnUpdate"])) {
                        $query = $db->prepare("Update tb_menu SET
                            name = ?,
                            description = ?,
                            price= ?
                            where
                            ID=?
                        ");

                        $insert = $query->execute(array(
                            $_POST["name"],
                            $_POST["description"],
                            $_POST["price"],
                            $_GET["u"]
                        ));
                        if ($insert) {
                            echo '<div class="alert alert-success alert-dismissable"><strong>Başarılı!</strong> Güncelleme işlemi başarılı.</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><strong>Hata!</strong> Güncelleme işleminde bir hata oluştu.</div>';
                        }
                    }
                    if(isset($_GET["u"])){
                        $datau = sql("SELECT * FROM tb_menu WHERE ID = '{$_GET["u"]}'");
                    $datau = $datau[0];
                    }
                    ?>
                    <h4 class="border-bottom pb-4">Menü <?=(isset($_GET["u"])?"Güncelle":"Ekle")?></h4>
                    <form class="row mb-5" method="post" action="">
                        <div class="form-group col-sm-12">
                            <label>Adı:</label>
                            <input name="name" type="text" class="form-control"  value="<?=$datau["name"]?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Açıklaması:</label>
                            <textarea name="description" type="text" class="form-control"><?=$datau["description"]?></textarea>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Fiyatı:</label>
                            <input name="price" type="number" min="0.00" max="10000.00" step="0.01" class="form-control" value="<?=$datau["price"]?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="text-center">
                                <button class="btn btn-primary" name="<?=(isset($_GET["u"])?"btnUpdate":"btnAdd")?>"><span><?=(isset($_GET["u"])?"Güncelle":"Ekle")?></span></button>
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