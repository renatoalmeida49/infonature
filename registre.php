<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="images/png" href="assets/images/leaf.png" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<title>Registre</title>
</head>
<body>
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

	<section class="sectionRegistre">
		<div class="container column">
			<div class="title">
				Registre sua denúncia:<br>
			</div>

			<div class="form">
				<?php
					if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
					}
				?>
			</div>

			<div class="form">
				<form method="post" action="salva.php" enctype="multipart/form-data"s>
					<br/><label>Nome da rua:</label> <input type="text" name="nome"><br/>
					<br/><label>Número:</label> <input type="number" name="numero"><br/>
					<br/><label>CEP:</label> <input type="number" name="cep"><br/>
					<br/><label>Bairro:</label> <input type="text" name="bairro"><br/>
					<br/><label>Cidade:</label> <input type="text" name="cidade"><br/>
					<br/><label>Estado:</label> <input type="text" name="estado"><br/>
					<br/><label>Foto:</label> <input type="file" name="foto"><br/>
					<br/><label>Descrição:</label> <input type="text" name="descricao"><br/>
					<br/><label>Localização no mapa:</label><br/>
					<br/><label>Latitude:</label> <input type="text" name="lat"><br/>
					<br/><label>Longitude:</label> <input type="text" name="lng"><br/>
					

					<div class="footerform">
						<div class="infoSalve">
							Para coletar a latitude e longitude selecione um local no mapa e em seguida clique o botão direito do mouse. Então selecione a opção "O que há aqui?". Surgirá uma janela com informações. Os dois valores no canto inferior referem-se a latitude e longitude respectivamente.<br/>
							<br/><a href="https://maps.google.com" target="_blank"><div class="button">Ver mapa</div></a><br/>
							<br/><input class="salvar" type="submit" value="Salvar"><br/>
						</div>

						<div>

							<br/><a href="index.php"><div class="button">Voltar</div></a>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</section>

	<footer>
		
	</footer>

</body>
</html>