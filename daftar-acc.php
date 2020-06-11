<?php
include "Connections/koneksi.php";
$email = $_POST['email'];
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl = date("Y-m-d H:i:s");
$submit = $_POST['submit'];

if (isset($submit)) {

	if (empty($email) or empty($password)) {

		echo "<script>alert('Form tidak boleh kosong!!! Silakan ulangi lagi'); window.location=('index.php') </script>";
	} else {

		$insert = $koneksi->query("insert into user (email,passw,nama_user,jk,alamat,tgl_daftar,level) values ('$email','$password','$nama','Ali','$alamat','$tgl','2')");
		echo "<script>alert('Data berhasil di Tambah'); window.location=('index.php');</script>";
	}
}
