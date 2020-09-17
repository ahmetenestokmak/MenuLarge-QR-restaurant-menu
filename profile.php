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
                $menu = "profile";
                include("sidebar.php");
                ?>
            </div>
            <div class="col-md-9 ">
                <div class="bg-white p-4 p-md-5 mb-4">
                    

                    <?php
                    $id = $_SESSION["ID"];
                    if (isset($_POST["btnRegister"])) {
                        $query = $db->prepare("UPDATE tb_company SET
                                name = ?,
                                address = ?,
                                description = ?,
                                phone= ?,
								email = ?,
                                password = ?
                                where
                                ID =?
                            ");

                        $data = sql("SELECT * FROM tb_company WHERE ID = '{$id}'");
                        $data = $data[0];
                        $insert = $query->execute(array(
                            $_POST["name"],
                            $_POST["address"],
                            $_POST["about"],
                            $_POST["phone"],
                            $_POST["email"],
                            ($_POST["password"] == "" ? $data["password"] : hash("sha256", $_POST["password"])),
                            $_SESSION["ID"]
                        ));
                        if ($insert) {
                            echo '<div class="alert alert-success alert-dismissable"><strong>Başarılı!</strong> Güncelleme işlemi başarılı.</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><strong>Hata!</strong> Güncelleme işleminde bir hata oluştu.</div>';
                        }
                    }
                    $data = sql("SELECT * FROM tb_company WHERE ID = '{$id}'");
                    $data = $data[0];
                    ?>
                    <h4 class="border-bottom pb-4">Firma Bilgileri</h4>
                    <form class="row mb-5" method="post" action="">
                        <div class="form-group col-sm-12">
                            <label>Firma Adı:</label>
                            <input name="name" type="text" class="form-control" value="<?= $data["name"] ?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Firma hakkında:</label>
                            <textarea name="about" type="text" class="form-control"><?= $data["description"] ?></textarea>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Adresi:</label>
                            <input name="address" type="text" class="form-control" value="<?= $data["address"] ?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Telefonu</label>
                            <input name="phone" type="text" class="form-control" value="<?= $data["phone"] ?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>E-mail adresi:</label>
                            <input name="email" type="email" class="form-control" value="<?= $data["email"] ?>">
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Parola: (Parolanızı güncellemek istiyorsanız doldurun)</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="text-center">
                                <button class="btn btn-primary" name="btnRegister"><span>Güncelle</span></button>
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