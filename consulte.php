<?php
session_start();
require("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="icon" type="imagem/png" href="assets/images/leaf.png" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<title>Consulte</title>
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

	<section>
		<div class="title">
			Consulte as denúncias no mapa abaixo:
		</div>
		<div id="map"></div>
		<script>

      var customLabel = {
          restaurant: {
          label: 'R'
        },
        bar: {
        label: 'B'
        }
      };

      function initMap() {
        var uluru = {lat: -9.554326, lng: -35.737963};

        var map = new google.maps.Map(document.getElementById('map'), {
         						zoom: 10,
         						center: uluru
        					});

        /*var marker = new google.maps.Marker({
        				position: uluru,
        				map: map
        });*/
      		

      	var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('resultado.php', function(data) {
          var xml = data.responseXML;

          var markers = xml.documentElement.getElementsByTagName('marker');
          
          Array.prototype.forEach.call(markers, function(markerElem) {
            var nomeRua = markerElem.getAttribute('nomeRua');
            var numero = markerElem.getAttribute('numero');
            //var cep = markerElem.getAttribute('cep');
            //var bairro = markerElem.getAttribute('bairro');
            //var cidade = markerElem.getAttribute('cidade');
            var estado = markerElem.getAttribute('estado');
            //var descricao = markerElem.getAttribute('descricao');

            var point = new google.maps.LatLng(
            parseFloat(markerElem.getAttribute('lat')),
            parseFloat(markerElem.getAttribute('lng'))
            );

            var infowincontent = document.createElement('div');

            var strong = document.createElement('strong');
            strong.textContent = nomeRua
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = numero
            infowincontent.appendChild(text);
            infowincontent.appendChild(document.createElement('br'));

            var subtext = document.createElement('subtext');
            subtext.textContent = estado
            infowincontent.appendChild(subtext);

            var icon = customLabel[numero] || {};

            var marker = new google.maps.Marker({
              		map: map,
               		position: point,
               		label: icon.label
            });
            
            marker.addListener('click', function() {
             		infoWindow.setContent(infowincontent);
             		infoWindow.open(map, marker);
            });
          }); // end array


        });//end download URL
      }//end initMap

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
        };

        request.open('GET', url, true);
        request.send(null);
      } //end function download

      function doNothing() {}
    	</script>

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

            $result_markers = "SELECT * FROM denuncias"; 
            $resultado_markers = mysqli_query($conn, $result_markers);

            while ($denuncia = mysqli_fetch_assoc($resultado_markers)){
                echo '<tr>';
                echo '<td bgcolor=#01DF74>'.$denuncia['nomeRua'].'</td>';
                echo '<td bgcolor=#01DF74>'.$denuncia['numero'].'</td>';
                echo '<td bgcolor=#01DF74>'.$denuncia['cep'].'</td>';
                echo '<td bgcolor=#01DF74>'.$denuncia['estado'].'</td>';
                echo '<td bgcolor=#01DF74>'.$denuncia['cidade'].'</td>';
                echo '<td bgcolor=#01DF74  class="options"><a href="editar.php?id='.$denuncia['id'].'"><div class="buttonMini">Editar</div></a><a href="excluir.php?id='.$denuncia['id'].'"><div class="buttonMini">Excluir</div></a></td>';
                echo '</tr>';
              }
        ?>
      </table>
    </div>  
  </section>

	<footer class="footerConsulte">
    <div class="container">
      <a href="index.php"><div class="button">Voltar</div></a>
    </div>
	</footer>
</body>
</html>