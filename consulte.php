<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<title>Consulte</title>
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

	<section>
		<div class="title">
			Consulte as denúncias no mapa abaixo:
		</div>
		<div id="map"></div>
		<script>
      		function initMap() {
        		var uluru = {lat: -9.554326, lng: -35.737963};
        		var map = new google.maps.Map(document.getElementById('map'), {
          						zoom: 8,
          						center: uluru
        					});
        		var marker = new google.maps.Marker({
          						position: uluru,
          						map: map
        		});
      		}

      		var infoWindow = new google.maps.InfoWindow;

          	// Change this depending on the name of your PHP or XML file
        	downloadUrl('resultado.php', function(data) {
          		var xml = data.responseXML;
          		var markers = xml.documentElement.getElementsByTagName('marker');
          
          		Array.prototype.forEach.call(markers, function(markerElem) {
            		var nomeRua = markerElem.getAttribute('nomeRua');
            		var numero = markerElem.getAttribute('numero');
            		var cep = markerElem.getAttribute('cep');
            		var bairro = markerElem.getAttribute('bairro');
            		var cidade = markerElem.getAttribute('cidade');
            		var estado = markerElem.getAttribute('estado');
            		var descricao = markerElem.getAttribute('descricao');

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
            		var icon = customLabel['I'] || {};
            		var marker = new google.maps.Marker({
                		map: map,
                		position: point,
                		label: icon.label
            		});
            
            		marker.addListener('click', function() {
                		infoWindow.setContent(infowincontent);
                		infoWindow.open(map, marker);
            		});
          		});
          	});
    	</script>

    	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOBrow7PK1pFB1EkhMuX8NrFozN4toosw&callback=initMap">
    	</script>

    	<div class="footerform">
			<div>
				<br/><a href="index.php">Voltar</a>
			</div>
		</div>
	</section>

	<footer>
		
	</footer>
</body>
</html>