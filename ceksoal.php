<?php
	session_start();
	include 'koneksi.php';
	date_default_timezone_set('Asia/Kolkata');

	function redirect(){
		header('Location: home.php');
		exit();
	}
	if (!isset($_GET['email']) || !isset($_GET['ujian'])){
		redirect();
	} 
	else {
		$email = $_GET['email'];
		$ujian = $_GET['ujian'];
		$waktu = $_GET['waktu'];
		$date = date("Y-m-d H:i:s");

		$sql = mysqli_query($koneksi, "SELECT * FROM peserta WHERE email_peserta='$email'");
		while ($data = mysqli_fetch_array($sql)) {
			$status = "$data[$ujian]" ;
			if ($status == 0) {
				if ($ujian == "penalaran_umum") {
					if (isset($_SESSION["exam_time"])) {				
						$_SESSION["exam_category"] = "Penalaran Umum";
						header('Location: test_soal.php');
					}
					else {
						$_SESSION["exam_time"]=$waktu;
						$_SESSION["end_time"] =date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
						$_SESSION["exam_start"] = "yes";
						$_SESSION["exam_category"] = "Penalaran Umum";
						header('Location: test_soal.php');	
					}
				}
				if ($ujian == "pemahaman_bacaan_dan_menulis") {
					if (isset($_SESSION["exam_time"])) {				
						$_SESSION["exam_category"] = "Pemahaman Bacaan dan Menulis";
						header('Location: test_soal.php');
					}
					else {
						$_SESSION["exam_time"]=$waktu;
						$_SESSION["end_time"] =date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
						$_SESSION["exam_start"] = "yes";
						$_SESSION["exam_category"] = "Pemahaman Bacaan dan Menulis";
						header('Location: test_soal.php');	
					}
				}
				if ($ujian == "pengetahuan_dan_pemahaman_umum") {
					if (isset($_SESSION["exam_time"])) {				
						$_SESSION["exam_category"] = "Pengetahuan dan Pemahaman Umum";
						header('Location: test_soal.php');
					}
					else {
						$_SESSION["exam_time"]=$waktu;
						$_SESSION["end_time"] =date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
						$_SESSION["exam_start"] = "yes";
						$_SESSION["exam_category"] = "Pengetahuan dan Pemahaman Umum";
						header('Location: test_soal.php');	
					}
				}
				if ($ujian == "pengetahuan_kuantitatif") {
					if (isset($_SESSION["exam_time"])) {				
						$_SESSION["exam_category"] = "Pengetahuan Kuantitatif";
						header('Location: test_soal.php');
					}
					else {
						$_SESSION["exam_time"]=$waktu;
						$_SESSION["end_time"] =date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
						$_SESSION["exam_start"] = "yes";
						$_SESSION["exam_category"] = "Pengetahuan Kuantitatif";
						header('Location: test_soal.php');	
					}
				}
			}
			else {
				echo "<script>alert('Soal ini belum tersedia atau telah anda kerjakan')</script>";

				?><meta http-equiv="refresh" content="1;url=home.php"><?php
			}
		}
	}
?>