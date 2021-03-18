<?php
	session_start();
	include"../koneksi.php";

	$total_que=0;
	$res1=mysqli_query($koneksi, "SELECT * from soal WHERE kategori='$_SESSION[exam_category]'");
	$total_que = mysqli_num_rows($res1);
	echo $total_que;
?>