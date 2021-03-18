<?php
	include '../koneksi.php';
	
	$status = $_GET['status'];
	if ($status == 'nonaktif') {
		mysqli_query($koneksi, "UPDATE status_ujian SET status='1' where id='1'");
		header('Location: home.php');
	}
	elseif ($status == 'aktif') {
		mysqli_query($koneksi, "UPDATE status_ujian SET status='0'
			where id='1'");
		 header('Location: home.php');
	}
?>