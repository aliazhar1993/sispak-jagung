<?php
$id = $_GET['id'];
if (isset($_POST['nama_gej'])) {
    $nama_gej = $_POST['nama_gej'];
    # proses gambar
    $nama_gam = "";
    $nama_gam = $_POST['gam_lama'];
    if (isset($_FILES["gam"]["name"]) && $_FILES["gam"]["name"] != "") {
        unlink("../images/gejala/" . $_POST['gam_lama']);
        $tipe_gam = explode("/", $_FILES["gam"]["type"]);
        $nama_gam = $id . '_' . date("ymdhis") . '.' . $tipe_gam[1];
        move_uploaded_file($_FILES['gam']['tmp_name'], "../images/gejala/" . $nama_gam);
    }
    $insert = $koneksi->query("update gejala set nama_gej='$nama_gej', gambar_gej='$nama_gam' where idgej='$id' ");
    header("Location: ?page=gejala&status=ubah-berhasil");
}
$result = $koneksi->query("SELECT * FROM gejala where idgej='$id' ");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
if ($row['gambar_gej'] == "") {
    $gambar = "";
} else {
    $gambar = '<img src="../images/gejala/' . $row['gambar_gej'] . '" class="img-pen-list"/><p>Untuk mengubah gambar, silakan unggah gambar baru!</p>';
}
?>
<div class="col-md-5 col-sm-6">
    <h3 class="menu-second"><a href="?page=gejala"><i class="fa fa-chevron-left"></i> Kembali</a></h3>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" name="form1" id="form1" method="post" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="IDGejala">ID</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="hidden" id="gam_lama" name="gam_lama" value="<?= $row['gambar_gej']; ?>" />
                                    <input type="text" id="idgej" name="idgej" class="form-control" value="<?= $id; ?>" readonly>
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
                                    <textarea class="form-control" name="nama_gej" id="nama_gej" placeholder="Gejala"><?= $row['nama_gej']; ?></textarea>
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
                                    <?= $gambar; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <input type="hidden" id="gam_lama" name="gam_lama" value="<?= $row['gambar_gej']; ?>" />
            <label>ID Gejala</label>
            <input name="idgej" type="text" id="idgej" readonly="readonly" placeholder="ID Gejala" value="<?= $id; ?>">
            <br><label>Nama Gejala</label>
            <textarea name="nama_gej" id="nama_gej" placeholder="Gejala"><?= $row['nama_gej']; ?></textarea>
            <br><br> <label>Gambar</label>
            <input type="file" name="gam" id="gam" class="form-control" />
            <?= $gambar; ?> -->
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <input type="submit" class="mainBtn" id="submit" value="Simpan">
                        </div>
                    </div>
                    <!-- <input type="submit" class="mainBtn" id="submit" value="Simpan"> -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="col-md-7 col-sm-6">
    <img class="logo-isian" src="images/logo.png" />
</div> -->