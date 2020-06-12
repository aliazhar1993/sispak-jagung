<?php
$idgej = auto_no("gejala", "G");
if (isset($_POST['nama_gej'])) {
    $nama_gej = $_POST['nama_gej'];
    # proses gambar
    $nama_gam = "";
    if (isset($_FILES["gam"]["name"]) && $_FILES["gam"]["name"] != "") {
        $tipe_gam = explode("/", $_FILES["gam"]["type"]);
        $nama_gam = $idgej . '_' . date("ymdhis") . '.' . $tipe_gam[1];
        move_uploaded_file($_FILES['gam']['tmp_name'], "../images/gejala/" . $nama_gam);
    }
    $insert = $koneksi->query("insert into gejala (idgej,nama_gej,gambar_gej) values ('$idgej','$nama_gej','$nama_gam')");
    header("Location: ?page=gejala&menu=tambah&status=tambah-berhasil");
}
?>
<div class="col-md-5 col-sm-6">
    <h3 class="menu-second"><a href="?page=gejala"><i class="fa fa-chevron-left"></i> Kembali</a></h3>
    <div class="isian-form">
        <?php
        if (isset($_GET['status'])) {
            switch ($_GET['status']) {
                case 'tambah-berhasil':
                    echo '<div class="notif-box">Tambah gejala baru berhasil.</div>';
                    break;
            }
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <form name="form1" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="IDGejala">ID</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="idgej" name="idgej" class="form-control" value="<?= $idgej; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Nama Gejala</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="nama_gej" id="nama_gej" class="form-control" placeholder="Gejala"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Gambar</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="gam" id="gam" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="submit" class="mainBtn" id="submit" value="Simpan">
                            </div>
                        </div>
                        <!-- <label>ID Gejala</label>
            <input name="idgej" type="text" id="idgej" readonly="readonly" placeholder="ID Gejala" value="<?= $idgej; ?>">
            <label>Nama Gejala</label>
            <textarea name="nama_gej" id="nama_gej" placeholder="Gejala"></textarea>
            <label>Gambar</label>
            <input type="file" name="gam" id="gam" class="form-control" />
            <input type="submit" class="mainBtn" id="submit" value="Simpan"> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="col-md-7 col-sm-6">
    <img width="200" class="logo-isian" src="../images/pasbar2.png" />
</div> -->