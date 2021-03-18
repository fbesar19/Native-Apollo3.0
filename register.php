<?php 
	include 'koneksi.php';
	require_once('class/class.phpmailer.php');

	$pesan = "";
	if(isset($_POST['masuk'])){


		$email = $_POST['email'];
		$nama = $_POST['nama'];
		$password = $_POST['password'];
		$cPassword = $_POST['cPassword'];

		if ($email == "" || $password =="" || $nama =="") {
			$pesan = "Silahkan isi semua kolom";
		}
		elseif ($password != $cPassword) {
			$pesan = "Password tidak sama";
		}
		else {
			$sql = mysqli_query($koneksi, "SELECT * FROM peserta WHERE email_peserta ='$email'");
			if ($data = mysqli_fetch_array($sql)) {
			 	$pesan = "Email sudah terpakai";
			}
			else {
				$str = 'qwertyuiopasdfghjklzxcvbnmmQWERTYUIOPASDFGHJKLZXCVBNM';
				$str = str_shuffle($str);
				$str = substr($str, 0, 10);

				mysqli_query($koneksi, "INSERT INTO peserta (email_peserta, nama_peserta, password_peserta, isEmailConfirmed, token, penalaran_umum, pemahaman_bacaan_dan_menulis, pengetahuan_dan_pemahaman_umum, pengetahuan_kuantitatif) VALUES ('$email', '$nama','$password', '0', '$str', '0', '1', '1', '1')");

				mysqli_query($koneksi, "INSERT INTO nilai (email_peserta, nama_peserta, penalaran_umum, pemahaman_bacaan_dan_menulis, pengetahuan_dan_pemahaman_umum, pengetahuan_kuantitatif, total_nilai) VALUES ('$email', '$nama', '0', '0', '0', '0', '0')");

				include_once "PHPMailer/PHPMailer.php";
				$mail = new PHPMailer();
				$mail->IsSMTP(); 
				// $mail->SMTPDebug = 1; 
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = 'tls';
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 587; // or 587
				$mail->IsHTML(true);
				$mail->Username = "apollo.lkmmfk.3.0@gmail.com";
				$mail->Password = "efforty19";
				$mail->SetFrom("apollo.lkmmfk.3.0@gmail.com");
				$mail->Subject = "Tolong verifikasi email anda!";
				$mail->Body = "
					Tolong klik link di bawah ini:<br><br>

					<a href='confirm.php?email=$email&token=$str'>Klik Disini</a>
				";
				$mail->AddAddress($email);

				if(!$mail->Send()) {
					$pesan = "Email Error";
				} else {
					$pesan = "Berhasil mendaftar, Silahkan verifikasi email anda";
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Register Apollo 3.0</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-logreg">
		<div class="field_login">
			<!-- <center><img src="asset/logo.png"></center> -->
			<h1>Register</h1>
			<p>Mohon isi data dibawah ini dengan benar</p>
			<h2><?php if ($pesan != "") echo $pesan ?> </h2>
			<form action="register.php" method="POST">
				<div class="field_input">				
					<label>Masukan Alamat email</label><br>
					<input type="text" name="email" placeholder="alamat@email.com">
				</div>
				<div class="field_input">				
					<label>Masukan Nama Lengkap</label><br>
					<input type="text" name="nama" placeholder="contoh. ahmad yani">
				</div>
				<div class="field_input">				
					<label>Masukan Password</label><br>
					<input type="password" name="password" placeholder="Gunakan 6 digit atau lebih">
				</div>
				<div class="field_input">				
					<label>Masukan Ulang Password</label><br>
					<input type="password" name="cPassword" placeholder="Konfirmasi ulang password">
				</div>
				<input type="Submit" name="masuk" value="Daftar">
			</form>
		</div>
		<div class="login_background">
			
		</div>
	</div>
</body>
</html>