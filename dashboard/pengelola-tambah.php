<?php
if (isset($_POST['email'])) {
	$email=$_POST['email'];
	$passw=md5($_POST['passw']);
	$nama_peng=$_POST['nama_peng'];
	$alamat=$_POST['alamat'];
	$level=$_POST['level'];
	$insert=$koneksi->query("insert into pengelola (email,passw,nama_peng,alamat,level) values ('$email','$passw','$nama_peng','$alamat','$level')");
	header("Location: ?page=pengelola&menu=tambah&status=tambah-berhasil");
}
?>
<div class="col-md-5 col-sm-6">
    <div class="isian-form">
        <?php
        if (isset($_GET['status'])) {
            switch ($_GET['status']) {
                case 'tambah-berhasil': echo '<div class="notif-box">Tambah user baru berhasil.</div>'; break;
            }
        }
        ?>
        <form name="form1" id="form1" method="post">
            <label>Email</label>
            <input name="email" type="text" id="email" placeholder="Email">
            <label>Password</label>
            <input name="passw" type="text" id="passw" placeholder="Password">
            <label>Nama Pengelola</label>
            <input name="nama_peng" type="text" id="nama_peng" placeholder="Nama">
            <label>Alamat</label>
            <input name="alamat" type="text" id="alamat" placeholder="Alamat" maxlength="50">
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