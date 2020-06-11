<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Sistem Pakar Jagung</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="daftar-acc.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<label>Nama</label>
			<input type="text" name="nama">
		</div>
		<div class="input-group">
			<label>alamat</label>
			<input type="text" name="alamat">
		</div>
		<div class="input-group">
			<label>jenis kelamin</label>
		<select name="jk">
				<option value="-">Pilih Jenis Kelamin</option>
				<option value="Laki-laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option></select>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>