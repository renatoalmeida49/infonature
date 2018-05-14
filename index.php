<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="imagem/png" href="assets/images/leaf.png" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<title>InfoNature</title>
</head>
<body>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
	<header>
		<div class="container">
			<a href="index.php"><div class="simbol">
				<img src="assets/images/leaf.png" width="150px" height="150px">
			</div></a>
			<div class="name">
				<a href="index.php">InfoNature</a>
			</div>
		</div>
	</header>

	<section class="banner">
		<div class="container column">
			<div><h1>Preservar é preciso</h1></div>

			<div class="bannerRow">
				<a href="registre.php"><div class="button">
					Registre
				</div></a>
				<a href="consulte.php"><div class="button">
					Consulte
				</div></a>
			</div>
			
			<div><h2>Registre pontos da cidade onde há lixo mal descartado. Ajude a preservar o ambiente.</h2></div>
		</div>
	</section>


	<footer class="footerIndex">
		<div class="container">
			<div class="info">
				<a class="linkIndex" href="https://github.com/renatoalmeida49">Created by: Renato Novaes - Versão 1.0</a>
			</div>
		</div>
	</footer>
</body>
</html>