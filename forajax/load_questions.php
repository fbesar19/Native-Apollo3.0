<?php
	session_start();
	include"../koneksi.php";


	$question_no="";
	$question="";
	$opt1="";
	$opt2="";
	$opt3="";
	$opt4="";
	$answer="";
	$count=0;
	$ans="";

	$quesno=$_GET["questionno"];

	if (isset($_SESSION["answer"][$quesno])) {
		$ans=$_SESSION["answer"][$quesno];
	}

	$res=mysqli_query($koneksi, "SELECT * from soal WHERE kategori_soal='$_SESSION[exam_category]' and nomer_soal=$_GET[questionno]");
	$count = mysqli_num_rows($res);
	if ($count==0) {
		?>
		<script>
		var txt;
		var r = confirm('Apa anda sudah yakin?');
		if (r == true) {
			window.location='result.php';
		}</script>	
	<?php 
		header('Location:../result.php');
	} 
	else{
		while ($row=mysqli_fetch_array($res)) {
			$question_no=$row["nomer_soal"];
			$question=$row["soal"];
			$opt1=$row["opt1"];
			$opt2=$row["opt2"];
			$opt3=$row["opt3"];
			$opt4=$row["opt4"];
			$opt5=$row["opt5"];
		}
?>

<br>
<p><?php echo $question; ?><p>
 
<input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value,<?php echo $question_no;?>)"
<?php
	if ($ans==$opt1) {
		echo "checked";
	}
?>>
<?php echo $opt1; ?>

<br>
<input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" onclick="radioclick(this.value,<?php echo $question_no;?>)"
<?php
	if ($ans==$opt2) {
		echo "checked";
	}
?>>
<?php echo $opt2; ?>

<br>
<input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" onclick="radioclick(this.value,<?php echo $question_no;?>)"
<?php
	if ($ans==$opt3) {
		echo "checked";
	}
?>>
<?php echo $opt3; ?>

<br>
<input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" onclick="radioclick(this.value,<?php echo $question_no;?>)"
<?php
	if ($ans==$opt4) {
		echo "checked";
	}
?>>
<?php echo $opt4; ?>

<br>
<input type="radio" name="r1" id="r1" value="<?php echo $opt5; ?>" onclick="radioclick(this.value,<?php echo $question_no;?>)"
<?php
	if ($ans==$opt5) {
		echo "checked";
	}
?>>
<?php echo $opt5; } ?>