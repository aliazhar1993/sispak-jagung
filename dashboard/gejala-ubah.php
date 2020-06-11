<?php
$id=$_GET['id'];
if (isset($_POST['nama_gej'])) {
	$nama_gej=$_POST['nama_gej'];
	# proses gambar
	$nama_gam=""; $nama_gam=$_POST['gam_lama'];
	if (isset($_FILES["gam"]["name"]) && $_FILES["gam"]["name"]!="") {
		unlink("../images/gejala/".$_POST['gam_lama']);
		$tipe_gam=explode("/",$_FILES["gam"]["type"]);
		$nama_gam=$id.'_'.date("ymdhis").'.'.$tipe_gam[1];
		move_uploaded_file($_FILES['gam']['tmp_name'], "../images/gejala/".$nama_gam);
	}	
	$insert=$koneksi->query("update gejala set nama_gej='$nama_gej', gambar_gej='$nama_gam' where idgej='$id' ");
	header("Location: ?page=gejala&status=ubah-berhasil");
}
$result=$koneksi->query("SELECT * FROM gejala where idgej='$id' ");
$row=mysqli_fetch_array($result,MYSQLI_BOTH);
if ($row['gambar_gej']=="") {$gambar="";} else {$gambar='<img src="../images/gejala/'.$row['gambar_gej'].'" class="img-pen-list"/><p>Untuk mengubah gambar, silakan unggah gambar baru!</p>';}
?>
<div class="col-md-5 col-sm-6">
  <h3 class="menu-second"><a href="?page=gejala"><i class="fa fa-chevron-left"></i> Kembali</a></h3>
    <div class="isian-form">
        <form name="form1" id="form1" method="post" enctype="multipart/form-data">
            <input type="hidden" id="gam_lama" name="gam_lama" value="<?= $row['gambar_gej'];?>" />
            <label>ID Gejala</label>
            <input name="idgej" type="text" id="idgej" readonly="readonly" placeholder="ID Gejala" value="<?= $id;?>">
            <br><label>Nama Gejala</label>
            <textarea name="nama_gej" id="nama_gej" placeholder="Gejala"><?= $row['nama_gej'];?></textarea>
           <br><br> <label>Gambar</label>
            <input type="file" name="gam" id="gam" class="form-control" />
            <?= $gambar;?>
            <input type="submit" class="mainBtn" id="submit" value="Simpan">
        </form>
    </div> 
</div>
<div class="col-md-7 col-sm-6">
    <img class="logo-isian" src="images/logo.png" />
</div>