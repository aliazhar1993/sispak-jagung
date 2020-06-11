<?php
$id=$_GET['id'];
if (isset($_POST['email'])) {
	$email=$_POST['email'];
	$passw=md5($_POST['passw']);
	$nama_peng=$_POST['nama_peng'];
	$alamat=$_POST['alamat'];
	$level=$_POST['level'];
	$insert=$koneksi->query("update pengelola set email='$email',passw='$passw',nama_peng='$nama_peng',alamat='$alamat',level='$level' where idpeng='$id' ");
	header("Location: ?page=pengelola&status=ubah-berhasil");
}
$result=$koneksi->query("SELECT * FROM pengelola where idpeng='$id' ");
$row=mysqli_fetch_array($result,MYSQLI_BOTH);
?>
<script>
$(function() {
	$("#level option[value='<?= $row['level']; ?>']").attr("selected",true);
});
</script>
<div class="col-md-5 col-sm-6">
    <div class="isian-form">
        <form name="form1" id="form1" method="post">
            <label>Email</label>
            <input name="email" type="text" id="email" placeholder="Email" value="<?= $row['email'];?>">
            <label>Password</label>
            <input name="passw" type="text" id="passw" placeholder="Password" />
            <label>Nama Pengelola</label>
            <input name="nama_peng" type="text" id="nama_peng" placeholder="Nama" value="<?= $row['nama_peng'];?>">
            <label>Alamat</label>
            <input name="alamat" type="text" id="alamat" placeholder="Alamat" maxlength="50" value="<?= $row['alamat'];?>">
            <label>Level</label>
            <select id="level" name="level">
            	<option value="">- Pilih -</option>
            	<option value="0">Pengelola</option>
            	<option value="1">Operator</option>
            </select>            
            <input type="submit" class="mainBtn" id="submit" value="Simpan">
        </form>
    </div> 
</div>
<div class="col-md-7 col-sm-6">
    <img class="logo-isian" src="images/logo.png" />
</div>