<?php
ob_start();
error_reporting(0);
include "../Connections/koneksi.php";
include "auto_no.php";
if (isset($_GET['page'])) {
    switch ($_GET['page']) {

        case "pengelola":
            $page = "pengelola.php";
            break;
        case "user":
            $page = "user.php";
            break;
        case "gejala":
            $page = "gejala.php";
            break;
        case "penyakit":
            $page = "penyakit.php";
            break;
        case "diagnosis":
            $page = "diagnosis.php";
            break;
        case "informasi":
            $page = "informasi.php";
            break;
        case "profil":
            $page = "profil.php";
            break;
    }
} else {
    $page = "pengelola.php";
}

include "header.php";
include "../validasi/css2.php";
include $page;
include "footer.php";
?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">

        </div>




        <div class="row clearfix">

        </div>
    </div>
</section>

<?php
include "footer.php";
?>