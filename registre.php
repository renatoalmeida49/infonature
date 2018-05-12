<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<title>Registre</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="simbol">
				<img src="assets/images/leaf.png" width="150px" height="150px">
			</div>
			<div class="name">
				InfoNature
			</div>
		</div>
	</header>

	<section class="sectionRegistre">
		<div class="container column">
			<div class="title">
				Registre sua denúncia:
			</div>

			<div class="form">
				<form method="post" action="salva.php">
					<br/><label>Nome da rua:</label> <input type="text" name="nome"><br/>
					<br/><label>Número:</label> <input type="number" name="numero"><br/>
					<br/><label>CEP:</label> <input type="number" name="cep"><br/>
					<br/><label>Bairro:</label> <input type="text" name="bairro"><br/>
					<br/><label>Cidade:</label> <input type="text" name="cidade"><br/>
					<br/><label>Estado:</label> <input type="text" name="estado"><br/>
					<br/><label>Foto:</label> <input type="file" name="foto"><br/>
					<br/><label>Localização no mapa:</label> <input type="text" name="localizacao"><br/>
					<br/><label>Descrição:</label> <input type="text" name="descricao"><br/>

					<div class="footerform">
						<div>
							<br/><input class="salvar" type="submit" value="Salvar">
						</div>
						<div>
							<br/><a href="index.php">Voltar</a>
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