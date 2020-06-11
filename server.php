<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'dbtani');
	$level='2';

	// REGISTER USER
	if (!isset($_SESSION)) {session_start();}
	if (isset($_POST['reg_user'])) {

		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$nama = mysqli_real_escape_string($db, $_POST['nama']);		
		$alamat = mysqli_real_escape_string($db, $_POST['alamat']);
		$jk = mysqli_real_escape_string($db, $_POST['jk']);

		// form validation: ensure that the form is correctly filled

		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($nama)) { array_push($errors, "Nama is required"); }
		if (empty($alamat)) { array_push($errors, "alamat is required"); }
		if (empty($jk)) { array_push($errors, "Jenis Kelamin is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO user ( email, passw, nama_user, jk, alamat, level) 
					  VALUES( '$email', '$password', '$nama', '$jk', '$alamat', '$level')";
			mysqli_query($db, $query);


			$_SESSION['success'] = "You are now logged in";
			header('location: login.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM user WHERE email='$email' AND passw='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: konsultasi');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	
	}

?>