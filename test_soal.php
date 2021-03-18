<?php 
	session_start();
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> Apollo 3.0</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-soal">
		
		<div class="soal-scroll">
			<h1><?php echo $_SESSION["exam_category"]; ?></h1>
			<div class="soal" id="load_questions" style="min-height: 300px;">
				
			</div>
			<input type="button" name="periksa" value="Sebelumnya" style="border:0px; background: red;" onclick="load_previous();">
			<input type="button" name="periksa" value="Selanjutnya" style="float: right; margin-right: 40px; border:0px;" onclick="load_next();">
		</div>
		<div class="navigation-soal">
			<h1>Sisa Waktu</h1>
			<h2 id="countdown" style="display: block;"></h2>
			<h1>Navigasi soal</h1>
			<div class="navigation-number">			
				<?php 
					for ($i=1; $i < 21 ; $i++) { ?>
						<h4 onclick="load_navigation(<?php echo $i ?>)"> <?php echo $i ?> </h4>		
					<?php } ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		setInterval(function(){
			timer();
		},1000);
		function timer(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					if (xmlhttp.responseText=="00:00:01") {
						window.location="result.php";
					}
					else if (xmlhttp.responseText=="00:05:01") {
						alert('Waktu anda 5 menit lagi');
					}
					document.getElementById("countdown").innerHTML=xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET","forajax/load_timer.php", true);
			xmlhttp.send(null);
		}
		function load_total_que(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				}
			};
			xmlhttp.open("GET","forajax/load_total_que.php", true);
			xmlhttp.send(null);
		}

		var questionno="1";
		load_questions(questionno);

		function load_questions(questionno){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					if (xmlhttp.responseText=="over") {
						var txt;
						var r = confirm("Apa anda sudah yakin?");
						if (r == true) {
							window.location="result.php";
						}
					}
					else{
						document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
						load_total_que();
					}
				}
			};
			xmlhttp.open("GET","forajax/load_questions.php?questionno="+ questionno, true);
			xmlhttp.send(null);
		}

		function radioclick(radiovalue, questionno){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				}
			};
			xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+ questionno + "&value1="+radiovalue, true);
			xmlhttp.send(null);
		}

		function load_previous(){
			if (questionno=="1") {
				load_questions(questionno);
			}
			else{
				questionno=eval(questionno)-1;
				load_questions(questionno);
			}
		}

		function load_next(){
			if (questionno=="20") {var r = confirm('Apa anda sudah yakin?');
				if (r == true) {
					window.location='result.php';
				}
			}
			else {
				questionno=eval(questionno)+1;
				load_questions(questionno);
			}
		}

		function load_navigation(navigation){
			questionno= navigation;
			load_questions(questionno);
		}
	</script>
</body>
</html>