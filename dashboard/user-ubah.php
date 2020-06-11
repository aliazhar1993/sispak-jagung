<?php
$id=$_GET['id'];
if (isset($_POST['email'])) {
	$email=$_POST['email'];
	$passw=md5($_POST['passw']);
	$nama_user=$_POST['nama_user'];
	$alamat=$_POST['alamat'];

	$insert=$koneksi->query("update user set email='$email',passw='$passw',nama_user='$nama_user',alamat='$alamat',level='2' where iduser='$id' ");
	header("Location: ?page=user&status=ubah-berhasil");
}
$result=$koneksi->query("SELECT * FROM user where iduser='$id' ");
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
           <br> <label>Password</label>
            <input name="passw" type="text" id="passw" placeholder="Password" />
           <br> <label>Nama User</label>
            <input name="nama_user" type="text" id="nama_user" placeholder="Nama" value="<?= $row['nama_user'];?>">
            <br><label>Alamat</label>
            <input name="alamat" type="text" id="alamat" placeholder="Alamat" maxlength="50" value="<?= $row['alamat'];?>">
        
                      
            <br><input type="submit" class="mainBtn" id="submit" value="Simpan">
        </form>
    </div> 
</div>
