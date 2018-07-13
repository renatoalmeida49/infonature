<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="imagem/png" href="../assets/images/leaf.png" />
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
	<title>Editar denúncia</title>
</head>
<body>
	<header>
		<div class="container">
			<a href="index.php"><div class="simbol">
				<img src="../assets/images/leaf.png" width="150px" height="150px">
			</div></a>
			<div class="name">
				<a href="index.php">InfoNature</a>
			</div>
		</div>
	</header>

	<section class="sectionRegistre">
		<div class="container column">
			<div class="title">
				Editar denúncia:<br>
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
				<?php
					require_once '../results/formEdicao.php';
					$dado = getFormEditarDenuncia();
				?>
				<form method="post" action="../controllers/DenunciaController.php" enctype="multipart/form-data"s>
					<input type='text' hidden name='id' value='<?php echo $dado['id']?>'/>
					<br/><label>Nome da rua:</label> <input type="text" name="nome" value="<?php echo $dado['nomeRua'] ?>" required><br/>
					<br/><label>Número:</label> <input type="number" name="numero" value="<?php echo $dado['numero'] ?>" required><br/>
					<br/><label>CEP:</label> <input type="number" name="cep" value="<?php echo $dado['cep'] ?>"><br/>
					<br/><label>Bairro:</label> <input type="text" name="bairro" value="<?php echo $dado['bairro'] ?>" required><br/>
					<br/><label>Cidade:</label> <input type="text" name="cidade" value="<?php echo $dado['cidade'] ?>" required><br/>
					<br/><label>Estado:</label> <input type="text" name="estado" value="<?php echo $dado['estado'] ?>"><br/>
					<br/><label>Foto:</label> <input type="file" name="foto"><br/>
					<br/><label>Descrição:</label> <input type="text" name="descricao" value="<?php echo $dado['descricao'] ?>" required><br/>
					<br/><label>Localização no mapa:</label><br/>
					<br/><label>Latitude:</label> <input type="text" name="lat" value="<?php echo $dado['lat'] ?>" required><br/>
					<br/><label>Longitude:</label> <input type="text" name="lng" value="<?php echo $dado['lng'] ?>" required><br/>

					<div class="footerform">
						<div class="infoSalve">
							Para coletar a latitude e longitude selecione um local no mapa e em seguida clique o botão direito do mouse. Então selecione a opção "O que há aqui?". Surgirá uma janela com informações. Os dois valores no canto inferior referem-se a latitude e longitude respectivamente.<br/>
							<br/><a href="https://maps.google.com" target="blank"><div class="button">Ver mapa</div></a><br/>
							<br/><button class="salvar" type="submit" name="denunciaControl" value="Editar">Salvar</button><br/>
						</div>

						<div>

							<br/><a href="consulte.php"><button type="button" class="button">Voltar</button></a>
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

