<?php
	session_start();
	include 'koneksi.php';
	date_default_timezone_set('Asia/Kolkata');

	$benar = 0;
	$salah = 0;
	// $date=date("Y-m-s H:i:s");
	// $_SESSION["end_time"]=date("Y-m-s H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));

	if (isset($_SESSION["answer"])) {
		for ($i=1; $i <= sizeof($_SESSION["answer"]) ; $i++) { 
			$answer="";
			$res =mysqli_query($koneksi, "SELECT * FROM soal where kategori_soal='$_SESSION[exam_category]' and nomer_soal=$i");
			while ($row=mysqli_fetch_array($res)) {
				$answer=$row["jawaban"];
			}
			if (isset($_SESSION["answer"][$i])) {
				if ($answer==$_SESSION["answer"][$i]) {
					$benar=$benar+1;
				}
				else {
					$salah=$salah+1;
				}
			}
			else {
				$salah=$salah+1;
			}
		}
	}

	$count=0;
	$hasil=0;

	$res=mysqli_query($koneksi, "SELECT * FROM soal WHERE kategori_soal='$_SESSION[exam_category]'");
	$count=mysqli_num_rows($res);
	$salah=$count-$benar;
	$hasil = $benar*5;
	echo "<br><br>";
	echo "<center>";
	echo "Terimakasih sudah berjuang dengan baik";
	echo "<a href='home.php'> Kembali ke Halaman Awal </a>";
	echo "</center>";

	if (isset($_SESSION["exam_start"])) {
		$date=date("Y-m-s");

		$email = $_SESSION['username'];
		// $ujian = $_SESSION['exam_category'];
		// mysqli_query($koneksi, "UPDATE nilai SET $ujian='10' WHERE email_peserta='$_SESSION[username]'");
		if ($_SESSION['exam_category'] == "Penalaran Umum") {
			mysqli_query($koneksi, "UPDATE nilai SET penalaran_umum = '$hasil' WHERE email_peserta='$email'");
			mysqli_query($koneksi, "UPDATE peserta SET penalaran_umum=1 WHERE email_peserta='$email'");
			mysqli_query($koneksi, "UPDATE peserta SET pemahaman_bacaan_dan_menulis=0 WHERE email_peserta='$email'");
			echo "Berhasil Menyimpan";
		}
		if ($_SESSION['exam_category'] == "Pemahaman Bacaan dan Menulis") {
			mysqli_query($koneksi, "UPDATE nilai SET pemahaman_bacaan_dan_menulis = '$hasil' WHERE email_peserta='$email'");
			mysqli_query($koneksi, "UPDATE peserta SET pemahaman_bacaan_dan_menulis=1 WHERE email_peserta='$_SESSION[username]'");
			mysqli_query($koneksi, "UPDATE peserta SET pengetahuan_dan_pemahaman_umum=0 WHERE email_peserta='$_SESSION[username]'");
		}
		if ($_SESSION['exam_category'] == "Pengetahuan dan Pemahaman Umum") {
			mysqli_query($koneksi, "UPDATE nilai SET pengetahuan_dan_pemahaman_umum = '$hasil' WHERE email_peserta='$email'");
			mysqli_query($koneksi, "UPDATE peserta SET pengetahuan_dan_pemahaman_umum=1 WHERE email_peserta='$_SESSION[username]'");
			mysqli_query($koneksi, "UPDATE peserta SET pengetahuan_kuantitatif=0 WHERE email_peserta='$_SESSION[username]'");
		}
		if ($_SESSION['exam_category'] == "Pengetahuan Kuantitatif") {
			mysqli_query($koneksi, "UPDATE nilai SET pengetahuan_kuantitatif = '$hasil' WHERE email_peserta='$email'");
			mysqli_query($koneksi, "UPDATE peserta SET pengetahuan_kuantitatif=1 WHERE email_peserta='$_SESSION[username]'");	
		}
	}
	if (isset($_SESSION["exam_start"])) {
		unset($_SESSION["exam_start"]);
		unset($_SESSION["exam_time"]);
		unset($_SESSION["answer"]);
		?>
		<script type="text/javascript">
			window.location.href=window.location.href;
		</script>
	<?php }
?> 