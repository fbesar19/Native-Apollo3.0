<?php
	session_start();
	include '../koneksi.php';

	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}
	else {
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../style.css"2
</head>
<body>
	<div class="container-admin">
		<div class="navigasi-admin">
			<h1>Admin Apollo</h1>
			<ul>
				<li><a href="home.php">Cek Soal</a></li>
				<li><a href="cek nilai.php">Lihat Nilai</a></li>
			</ul>
		</div>
		<div class="fill-admin">
			<div class="header" style="width: 90%; margin-bottom: 80px;">	
				<a href="logout.php">Logout</a>
				<a href="print nilai.php" style="background-color: #3e95c7; color: white;">Print PDF</a>
				<h3>Hi,<br>Admin</h3>
			</div>
			<div class="tabel">
				<p style="margin-left: 40px; font-size: 13px;">*(Nilai 1 = Penalaran Umum, Nilai 2 = Pemahaman Bacaan dan Menulis, Nilai 3 = Pengetahuan dan Pemahaman Umum, Nilai 4 = Pengetahuan Kuantitatif)</p><br>
				<table>
				  <tr>
				    <th>No</th>
				    <th>Email</th>
				    <th>Nilai 1</th> 
				    <th>Nilai 2</th>
				    <th>Nilai 3</th>
				    <th>Nilai 4</th>
				    <th>Total Nilai</th>
				  </tr>
				  <?php
				  		$sql = mysqli_query($koneksi, "SELECT * FROM nilai ORDER BY total_nilai DESC");
				  			$nomer=1;
				  		while ($ujian = mysqli_fetch_array($sql)) {
				  	?>
				  <tr>
				  	<td><?php echo $nomer; ?></td>
				    <td class="td-left"><?php echo $ujian['nama_peserta'] ; ?></td>
				    <td><?php echo $ujian['penalaran_umum'] ; ?></td>
				    <td><?php echo $ujian['pemahaman_bacaan_dan_menulis'] ; ?></td>
				    <td><?php echo $ujian['pengetahuan_dan_pemahaman_umum'] ; ?></td>
				    <td><?php echo $ujian['pengetahuan_kuantitatif'] ; ?></td>
				    <td><?php echo $ujian['total_nilai'] ; ?></td>
				  </tr>
				<?php $nomer++; } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>