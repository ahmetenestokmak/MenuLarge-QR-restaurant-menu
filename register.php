<?php include("config/configure.php"); ?>
<?php
if (!empty($_SESSION["ID"])) {
    echo "<script type='text/javascript'>window.top.location='".s_url."/profile';</script>";
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
            <div class="col-xl-6 col-lg-6 ">
                <div class="bg-white p-4 p-md-5 mb-4">
                    <?php 
                    
                    if (isset($_POST["btnLogin"])) {
                        $email = $_POST['email'];
                        $pass = hash("sha256", $_POST['password']);
                        $data = sql("SELECT * FROM tb_company WHERE email = '{$email}' and password='{$pass}'");
                        if (count($data) > 0) {
                            $_SESSION["name"]           = $data[0]["name"];
                            $_SESSION["address"]        = $data[0]["address"];
                            $_SESSION["description"]    = $data[0]["description"];
                            $_SESSION["phone"]          = $data[0]["phone"];
                            $_SESSION["email"]          = $data[0]["email"];
                            $_SESSION["ID"]             = $data[0]["ID"];
                            echo "<script type='text/javascript'>window.top.location='".s_url."profile';</script>";
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><strong>Hata!</strong> Email veya parola yanlış.</div>';
                        }
                    }
                    ?>
                    <h4 class="border-bottom pb-4">Giriş Yap</h4>
                    <form class="row mb-5" method="post" action="">

                        <div class="form-group col-sm-12">
                            <label>E-mail adresi:</label>
                            <input name="email" type="email" class="form-control" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Parola:</label>
                            <input name="password" type="password" class="form-control" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="text-center">
                                <button class="btn btn-primary" name="btnLogin"><span>Giriş Yap</span></button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
            <div class="col-xl-6 col-lg-6 ">

                <div class="bg-white p-4 p-md-5 mb-4">
                    <?php
                    $register = 1;
                    if (isset($_POST["btnRegister"])) {
                        $query = $db->prepare("INSERT INTO tb_company SET
                                name = ?,
                                address = ?,
                                description = ?,
                                phone= ?,
								email = ?,
                                password = ?
                            ");


                        $insert = $query->execute(array(
                            $_POST["name"],
                            $_POST["address"],
                            $_POST["about"],
                            $_POST["phone"],
                            $_POST["email"],
                            hash("sha256", $_POST["password"])
                        ));
                        if ($insert) {
                            echo '<div class="alert alert-success alert-dismissable"><strong>Başarılı!</strong> Firma eklendi artık giriş yapabilirsiniz.</div>';
                            $register = 0;
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><strong>Hata!</strong> Ekleme işleminde bir hata oluştu.</div>';
                        }
                    }
                    if ($register != 0) {
                    ?>
                        <h4 class="border-bottom pb-4">Restauran&Cafe Kaydı</h4>
                        <form class="row mb-5" method="post" action="">
                            <div class="form-group col-sm-12">
                                <label>Firma Adı:</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Firma hakkında:</label>
                                <textarea name="about" type="text" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Adresi:</label>
                                <input name="address" type="text" class="form-control">
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Telefonu</label>
                                <input name="phone" type="text" class="form-control">
                            </div>
                            <div class="form-group col-sm-12">
                                <label>E-mail adresi:</label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Parola:</label>
                                <input name="password" type="password" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="text-center">
                                    <button class="btn btn-primary" name="btnRegister"><span>Kaydol</span></button>
                                </div>
                            </div>
                        </form>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- Content / End -->
<?php include("template/footer-top.php"); ?>
<?php include("template/footer-bottom.php"); ?>