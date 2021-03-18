<?php
	session_start();
	include 'koneksi.php';

	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$nama = $_SESSION['nama'];
		$sql = mysqli_query($koneksi, "SELECT * FROM status_ujian");
		while ($data = mysqli_fetch_array($sql)) {	
			if ($data['status'] == 1) {
				session_destroy();	
				header('Location: error.html');			
			}
		}
	}
	else {
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Apollo 3.0</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {
			background: url(asset/background.png);
			background-size: cover;
		}
	</style>
</head>
<body>
	<div class="header">	
		<a href="logout.php">Logout</a>
		<h3>Hi,<br><?php echo $nama ?></h3>
	</div>
	<div class="container-exam">
		<?php 
			$sql = mysqli_query($koneksi, "SELECT * FROM ujian");
			while ($ujian = mysqli_fetch_array($sql)) { ?>
				<a href="ceksoal.php?ujian=<?php echo $ujian['id_ujian']?>&email=<?php echo $username ?>&waktu= <?php echo $ujian['waktu_ujian'] ?>" class="exam">
					<h1><?php echo $ujian['nama_ujian'] ?></h1>
					<p><?php echo $ujian['jumlah_soal'] ?> Soal</p>
					<p><?php echo $ujian['waktu_ujian'] ?> menit</p><br>
					<p>Status : <?php echo $ujian['status_ujian'] ?></p>
					<h2>klik untuk memulai</h2>
				</a>
			<?php } ?>
		
<!-- 	<a href="" class="exam">
			<h1>Pemahaan Bacaan dan Menulis</h1>
			<p>20 Soal</p>
			<p>40 menit</p>
			<h2>klik untuk memulai</h2>
		</a>
		<a href="" class="exam">
			<h1>Pengetahuan dan Pemahaman Umum</h1>
			<p>20 Soal</p>
			<p>40 menit</p>
			<h2>klik untuk memulai</h2>
		</a>
		<a href="" class="exam">
			<h1>Pengetahuan Kuantitatif</h1>
			<p>20 Soal</p>
			<p>40 menit</p>
			<h2>klik untuk memulai</h2>
		</a> -->
	</div>
</body>
</html>