<?php
include "Connections/koneksi.php";
if (!isset($_SESSION)) {session_start();}
if (isset($_POST['email'])) {
	$email=$_POST['email'];
	$passw=md5($_POST['passw']);
	# cari pengelola
	$result=$koneksi->query("select * from pengelola where email='$email' and passw='$passw' ");
	$ada=mysqli_num_rows($result); $redirect="dashboard";
	if ($ada==0) {
		# cari user
		$result=$koneksi->query("select * from user where email='$email' and passw='$passw' ");
		$redirect="konsultasi";
		$ada=mysqli_num_rows($result);
	}
	if ($ada>0) {
		$row=mysqli_fetch_array($result,MYSQLI_BOTH); $level=$row['level']; 
		$_SESSION['MM_Username'] = $email;
		$_SESSION['MM_UserGroup'] = $level;	
		header("Location: $redirect");
	} else {
		header("Location: ?page=login&status=login-gagal");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2><br><?php
                    if (isset($_GET['status'])) {
                        switch ($_GET['status']) {
                            case 'login-gagal': echo '<div class="notif-box">Login anda gagal. Silakan coba lagi!</div>'; break;
                        }
                    }
                    ?>
	</div>

	<form method="post"  name="form1" id="form1">
		<div class="input-group">
			<label>Email</label>
			<input name="email" type="text" id="email" placeholder="Email" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input name="passw" type="password" id="passw" placeholder="Password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="?page=daftar.php">Sign up</a>
		</p>
	</form>
</body>
</html>