<?php 
	include 'koneksi.php';

	$pesan = "";
	if(isset($_POST['login'])){


		$email = $_POST['email'];
		$password = $_POST['password'];

		if ($email == "" || $password =="") {
			$pesan = "Silahkan isi semua kolom";
		}
		else {
			$sql = mysqli_query($koneksi, "SELECT * FROM peserta WHERE email_peserta ='$email'");
			if ($data = mysqli_fetch_array($sql)) {
				if ($data['password_peserta'] != $password ) {
					$pesan = "Password salah";
				}
				else {
					if ($data['isEmailConfirmed'] == 0) {
						$pesan = "Silahkan verifikasi email anda";
					}
					else {
						session_start();
						$_SESSION['username'] = "$email";
						$_SESSION['nama'] = $data['nama_peserta'];
						header('Location: home.php');
					}
				}
			}
			else {
				$pesan = "Email belum terdaftar";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Apollo 3.0</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-logreg">
		<div class="field_login">
			<center><img src="asset/logo.png"></center>
			<h1>Login</h1>
			<p>Bagi kamu yang sudah terdaftar, silahkan login</p>
			<h2><?php if ($pesan != "") echo $pesan ?></h2>
			<form action="login.php" method="POST"> 
				<div class="field_input">				
					<label>Masukan Alamat Email</label><br>
					<input type="text" name="email" placeholder="alamat@email.com" required>
				</div>
				<div class="field_input">				
					<label>Masukan Password</label><br>
					<input type="password" name="password" placeholder="**********"required>
				</div>
				<input type="Submit" name="login" value="Masuk">
				<a href="register.php">Daftar</a>
			</form>
		</div>
		<div class="login_background">
			
		</div>
	</div>
</body>
</html>