<?php
$idgej=auto_no("gejala","G");
if (isset($_POST['nama_gej'])) {
	$nama_gej=$_POST['nama_gej'];
	# proses gambar
	$nama_gam="";
	if (isset($_FILES["gam"]["name"]) && $_FILES["gam"]["name"]!="") {
		$tipe_gam=explode("/",$_FILES["gam"]["type"]);
		$nama_gam=$idgej.'_'.date("ymdhis").'.'.$tipe_gam[1];
		move_uploaded_file($_FILES['gam']['tmp_name'], "../images/gejala/".$nama_gam);
	}	
	$insert=$koneksi->query("insert into gejala (idgej,nama_gej,gambar_gej) values ('$idgej','$nama_gej','$nama_gam')");
	header("Location: ?page=gejala&menu=tambah&status=tambah-berhasil");
}
?>
<div class="col-md-5 col-sm-6">
  <h3 class="menu-second"><a href="?page=gejala"><i class="fa fa-chevron-left"></i> Kembali</a></h3>
    <div class="isian-form">
        <?php
        if (isset($_GET['status'])) {
            switch ($_GET['status']) {
                case 'tambah-berhasil': echo '<div class="notif-box">Tambah gejala baru berhasil.</div>'; break;
            }
        }
        ?>
        <form name="form1" id="form1" method="post" enctype="multipart/form-data">
            <label>ID Gejala</label>
            <input name="idgej" type="text" id="idgej" readonly="readonly" placeholder="ID Gejala" value="<?= $idgej;?>">
            <label>Nama Gejala</label>
            <textarea name="nama_gej" id="nama_gej" placeholder="Gejala"></textarea>
            <label>Gambar</label>
            <input type="file" name="gam" id="gam" class="form-control" />
            <input type="submit" class="mainBtn" id="submit" value="Simpan">
        </form>
    </div> 
</div>
<div class="col-md-7 col-sm-6">
    <img class="logo-isian" src="images/logo.png" />
</div>