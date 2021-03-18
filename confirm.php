<?php 
	include 'koneksi.php';
	function redirect(){
		header('Location: login.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token'])){
	} 
	else {
		$email = $_GET['email'];
		$tokem = $_GET['token'];

		$sql = mysqli_query($koneksi, "SELECT * FROM peserta WHERE email_peserta='$email'");

		if ($data=mysqli_fetch_array($sql)) {
			mysqli_query($koneksi, "UPDATE peserta SET isEmailConfirmed=1 WHERE email_peserta = '$email'");
			
			redirect();
		}
		else {
				
		}
	}

?>