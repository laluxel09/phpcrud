<?php

include 'koneksi.php';

error_reporting(0);

session_start();
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$password = md5 ($_POST['password']);
	 {
		$query = "SELECT * FROM detail WHERE nama='$nama'";
		$result = mysqli_query($koneksi, $query);
		if (!$result->num_rows > 0) {
			$query = "INSERT INTO detail (nama, password)
					VALUES ('$nama', '$password')";
			$result = mysqli_query($koneksi, $query);
			if ($result) {
				echo "<script>alert('Registrasi Berhasil')</script>";
				$nama = "";
				$_POST['password'] = "";
			} else {
				echo "<script>alert('Terjadi Error')</script>";
			}
		} else {
			echo "<script>alert('Nama Sudah Ada')</script>";
		}

	} 
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form </title>
</head>
<body  style="background-image: 2.jpg;">
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Nama" name="nama" value="<?php echo $nama; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
			<div class="input-group">
				<button name="submit" class="btn" name="submit">Register</button>
			</div>
			<p class="login-register-text">Sudah Punya Akun?<a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
