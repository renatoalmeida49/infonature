<?php
session_start();
require_once '../config/Database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="icon" type="imagem/png" href="../assets/images/leaf.png" />
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
	<title>Consulte</title>
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

	<section>
		<div class="title">
			Consulte as denúncias no mapa abaixo:
		</div>
		<div id="map"></div>
		
    <script src="../assets/js/script.js"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOBrow7PK1pFB1EkhMuX8NrFozN4toosw&callback=initMap">
    </script>
	</section>

  <section class="sectionTable">
    <div class="container">
    
      <table class="tabelaResult" border=0>
        <tr>
          <td bgcolor=#81F79F>Rua</td>
          <td bgcolor=#81F79F>Numero</td>
          <td bgcolor=#81F79F>CEP</td>
          <td bgcolor=#81F79F>Estado</td>
          <td bgcolor=#81F79F>Cidade</td>
          <td bgcolor=#81F79F>Opções</td>
        </tr>

        <?PhP
            $sql = "SELECT * FROM denuncias";

            $db = new Database();

            $stmt = $db->getConnection()->query($sql);
            /*
            $result_markers = "SELECT * FROM denuncias"; 
            $resultado_markers = mysqli_query($conn, $result_markers);*/

            //while ($denuncia = mysqli_fetch_assoc($resultado_markers)){
            while ($denuncia = $stmt->fetch()) {
                echo '<tr>';
                echo '<td bgcolor=#01DF74>'.$denuncia['nomeRua'].'</td>';
                echo '<td bgcolor=#01DF74>'.$denuncia['numero'].'</td>';
                echo '<td bgcolor=#01DF74>'.$denuncia['cep'].'</td>';
                echo '<td bgcolor=#01DF74>'.$denuncia['estado'].'</td>';
                echo '<td bgcolor=#01DF74>'.$denuncia['cidade'].'</td>';
                echo '<td bgcolor=#01DF74  class="options"><form method="post" action="../controllers/DenunciaController.php"><input name="id" type="text" value="'.$denuncia['id'].'" hidden/><a href="editarDenuncia.php?id='.$denuncia['id'].'"><button type="button" name="denunciaControl" value="Editar" class="buttonMini">Editar</button></a><button type="submit" name="denunciaControl" value="Excluir" class="buttonMini">Excluir</button></form></td>';
                echo '</tr>';
              }
        ?>
      </table>
    </div>  
  </section>

	<footer class="footerConsulte">
    <div class="container">
      <a href="../index.php"><div class="button">Voltar</div></a>
    </div>
	</footer>
</body>
</html>