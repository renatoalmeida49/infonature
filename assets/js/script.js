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