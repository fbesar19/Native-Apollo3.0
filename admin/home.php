<?php
	session_start();
	include '../koneksi.php';

	// if (isset($_SESSION['username'])) {
	// 	$username = $_SESSION['username'];
	// }
	// else {
	// 	header('Location: login.php');
	// }
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
				<?php $query = mysqli_query($koneksi, "SELECT * FROM status_ujian");
				while ($status = mysqli_fetch_array($query)) {
				if ($status['status']==0) { ?>
					<a href="aktivasi soal.php?status=nonaktif" style="background-color: #3e95c7; color: white;">Nonaktifkan Soal</a>
				<?php }
				elseif ($status['status']==1) {
				?>
				<a href="aktivasi soal.php?status=aktif" style="background-color: #3e95c7; color: white;">Aktifkan Soal</a>	
				<?php }
				}
				?>
				<h3>Hi,<br>Admin</h3>
			</div>
			<div class="tabel">
				<table>
				  	<tr>
				    	<th>No</th>
				    	<th>Nama Sesi</th>
				    	<th>Jumlah Soal</th> 
				    	<th>Waktu</th>
				  	</tr>
				  	<?php
				  		$sql = mysqli_query($koneksi, "SELECT * FROM ujian");
				  			$nomer=1;
				  		while ($ujian = mysqli_fetch_array($sql)) {
				  	?>
				  	<tr>
				    	<td><?php echo $nomer; ?></td>
				    	<td class="td-left"><?php echo $ujian['nama_ujian'] ; ?></td>
				    	<td><?php echo $ujian['jumlah_soal'] ; ?></td>
				   	 	<td><?php echo $ujian['waktu_ujian']." menit" ; ?></td>
				  	</tr>
				  <?php $nomer++;} ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>