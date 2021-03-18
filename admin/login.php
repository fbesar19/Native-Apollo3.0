<?php 
	include '../koneksi.php';

	$pesan = "";
	if(isset($_POST['login'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		if ($username == "" || $password =="") {
			$pesan = "Silahkan isi semua kolom";
		}
		else {
			$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username_admin ='$username'");
			if ($data = mysqli_fetch_array($sql)) {
				if ($data['password_admin'] != $password ) {
					$pesan = "Password salah";
				}
				else {
					$cek = mysqli_query($koneksi, "SELECT * FROM nilai");
					while ($nilai = mysqli_fetch_array($cek)) {
						$id = $nilai['id_nilai'];
						$nilai1 = (int) $nilai['penalaran_umum'];
						$nilai2 = (int) $nilai['pemahaman_bacaan_dan_menulis'];
						$nilai3 = (int) $nilai['pengetahuan_dan_pemahaman_umum'];
						$nilai4 = (int) $nilai['pengetahuan_kuantitatif'];
						$total = ($nilai1+$nilai2+$nilai3+$nilai4)/4;
						mysqli_query($koneksi, "UPDATE nilai SET total_nilai='$total' WHERE id_nilai='$id'");
					}
					session_start();
					$_SESSION['username'] = "$username";
					header('Location: home.php');		
				}
			}
			else {
				$pesan = "Username tidak terdaftar";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Admin Apollo</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="container-logreg">
		<div class="field_login">
			<center><img src="../asset/logo.png"></center>
			<h1>Admin Login</h1>
			<p>Bagi kamu yang sudah terdaftar, silahkan login</p>
			<h2><?php if ($pesan != "") echo $pesan ?></h2>
			<form action="login.php" method="POST"> 
				<div class="field_input">				
					<label>Masukan Username</label><br>
					<input type="text" name="username" required>
				</div>
				<div class="field_input">				
					<label>Masukan Password</label><br>
					<input type="password" name="password" required>
				</div>
				<input type="Submit" name="login" value="Masuk">
			</form>
		</div>
		<div class="login_background">
			
		</div>
	</div>
</body>
</html>