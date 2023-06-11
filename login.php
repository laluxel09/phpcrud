<?php

include 'koneksi.php';


error_reporting(0);
session_start();

if (isset($_SESSION['nama'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$password =md5($_POST['password']);

	$query = "SELECT * FROM detail WHERE nama='$nama' AND password='$password'";
	$result = mysqli_query($koneksi, $query);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['nama'] = $row['nama'];
		header("Location: index.php");
	} else {
		echo "<script>alert('Nama atau Password Salah')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>CRUD Data Siswa</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Nama" name="nama" value="<?php echo $nama; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn" name="submit" value="true">Login</button>
			</div>
			<p class="login-register-text">Tidak Punya Akun?<a href="register.php">Registrasi Disini</a>.</p>
		</form>
	</div>
</body>
</html>
