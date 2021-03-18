<?php
	session_start();
	include '../koneksi.php';

	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}
	else {
		header('Location: login.php');
	}
	$sql = mysqli_query($koneksi, "SELECT * FROM nilai ORDER BY total_nilai DESC");
?>
<center><h1>Nilai Hasil Try Out</h1></center>
<p style="margin-left: 40px; font-size: 13px;">*(Nilai 1 = Penalaran Umum, Nilai 2 = Pemahaman Bacaan dan Menulis, Nilai 3 = Pengetahuan dan Pemahaman Umum, Nilai 4 = Pengetahuan Kuantitatif)</p><br>
<table border="1" style="margin: auto; width: 94%;">
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
	while ($ujian = mysqli_fetch_array($sql)) { ?>
	<tr>
		<td><?php echo $nomer; ?></td>
		<td style="text-align: left;"><?php echo $ujian['nama_peserta'] ; ?></td>
		<td><?php echo $ujian['penalaran_umum'] ; ?></td>
		<td><?php echo $ujian['pemahaman_bacaan_dan_menulis'] ; ?></td>
		<td><?php echo $ujian['pengetahuan_dan_pemahaman_umum'] ; ?></td>
		<td><?php echo $ujian['pengetahuan_kuantitatif'] ; ?></td>
		<td><?php echo $ujian['total_nilai'] ; ?></td>
	</tr>
	<?php $nomer++; } ?>
</table>
<?php
echo "<script language=javascript>
function printWindow() {
bV = parseInt(navigator.appVersion);
if (bV >= 4) window.print();}
printWindow();
</script>";
?>