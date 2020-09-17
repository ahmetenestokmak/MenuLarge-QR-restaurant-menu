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
                $menu = "categories";
                include("sidebar.php");
                ?>
            </div>
            <div class="col-md-9 ">
                <div class="p-4 p-md-5 mb-4 row">


                    <h4 class="border-bottom pb-4 col-md-12">
                        Kategoriler 
                        <a href="<?=s_url?>add-category" class="float-right btn btn-outline-secondary btn-sm"><span>Kategori Ekle</span></a>
                    </h4>
                    <?php
                    if (isset($_GET["i"])) {
                        if (hash("sha256", $_SESSION["ID"].$_GET['i']) == $_GET["t"]) {
                            $datau = sql("SELECT * FROM tb_category WHERE ID=".$_GET["i"]);
                            pre($datau);
                            $datau = $datau[0];
                            
                            echo $datau["image"];
                            unlink("upload/".$datau["image"]);
                            /*$query = $db->prepare("DELETE FROM tb_category WHERE ID = :id");
                            $delete = $query->execute(array(
                                'id' => $_GET['i']
                            ));*/
                        }
                    }
                    $query = $db->query("SELECT * FROM tb_category WHERE companyID='{$_SESSION["ID"]}'", PDO::FETCH_ASSOC);
                    if ($query->rowCount()) {
                        foreach ($query as $row) {
                    ?>
                            <div id="" class=" menu-category col-md-6">
                                <div class="bg-white">
                                    <div class="menu-category-title" role="tab">
                                        <div class="bg-image" style="background-image: url(<?= s_url . "upload/" . $row["image"] ?>);">
                                            <img src="<?= s_url . "upload/" . $row["image"] ?>" alt="" style="display: none;">
                                        </div>
                                        <h2 class="title"><?= $row["name"] ?></h2>
                                    </div>
                                    <div style="padding:15px;text-align:right">
                                        <a href="<?= s_url . "list-menu?c=" . $row["ID"] . "&t=" . hash("sha256", $_SESSION["ID"].$row["ID"]) ?>" class="btn btn-sm">Menüler</a> | 
                                        <a href="<?= s_url . "categories?i=" . $row["ID"] . "&t=" . hash("sha256", $_SESSION["ID"].$row["ID"]) ?>" class="btn btn-sm">Sİl</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
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