<?php
$id=$_GET['id'];
if (isset($_POST['email'])) {
	$email=$_POST['email'];
	$passw=md5($_POST['passw']);
	$nama_user=$_POST['nama_user'];
	$alamat=$_POST['alamat'];
	$jk=$_POST['jk'];
	$insert=$koneksi->query("update user set passw='$passw', nama_user='$nama_user', jk='$jk', alamat='$alamat' where iduser='$id' ");
	header("Location: ?page=profil&status=ubah-berhasil");
}
$result=$koneksi->query("SELECT * FROM user where iduser='$id' ");
$row=mysqli_fetch_array($result,MYSQLI_BOTH);
?>
<script>
$(function() {
	$("#jk option[value='<?= $row['jk']; ?>']").attr("selected",true);
});
</script>
<div class="col-md-5 col-sm-6">
    <div class="isian-form">
        <form name="form1" id="form1" method="post">
            <label>Email</label>
            <input name="email" type="email" id="email" placeholder="Email" readonly="readonly" value="<?= $row['email'];?>" /><br>
            <label>Password</label>
            <input name="passw" type="text" id="passw" placeholder="Password"><br>
            <label>Nama</label>
            <input name="nama_user" type="text" id="nama_user" placeholder="Nama"value="<?= $row['nama_user'];?>" /><br>
            <label>Alamat</label>
            <input name="alamat" type="text" id="alamat" placeholder="Alamat" maxlength="50" value="<?= $row['alamat'];?>" /><br>
            <label>Jenis Kelamin</label>
            <select id="jk" name="jk">
                <option value="">- Pilih -</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>      <br><br>      
            <input type="submit" class="mainBtn" id="submit" value="Simpan">
        </form>
    </div> 
</div>
<div class="col-md-7 col-sm-6">
 
</div>