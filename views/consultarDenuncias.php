<section>
    
	<div class="title">
		Consulte as denúncias no mapa abaixo:
	</div>
	<div id="map"></div>
	
  <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>

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
      <?php foreach ($denuncias as $denuncia) :?>
        <tr>
          <td bgcolor="#01DF74"><?php echo $denuncia['nomeRua']; ?></td>
          <td bgcolor="#01DF74"><?php echo $denuncia['numero']; ?></td>
          <td bgcolor="#01DF74"><?php echo $denuncia['cep']; ?></td>
          <td bgcolor="#01DF74"><?php echo $denuncia['estado']; ?></td>
          <td bgcolor="#01DF74"><?php echo $denuncia['cidade']; ?></td>
          <td bgcolor="#01DF74">
            <a href="<?php echo BASE_URL; ?>denuncia/editar/<?php echo $denuncia['id']; ?>" class="buttonMini">Editar</a>
            <a href="<?php echo BASE_URL; ?>denuncia/excluir/<?php echo $denuncia['id']; ?>" class="buttonMini">Excluir</a>
          </td>
        </tr>

      <?php endforeach; ?>
    </table>
  </div>  
</section>

<footer class="footerConsulte">
  <div class="container">
    <a href="<?php echo BASE_URL; ?>"><div class="button">Voltar</div></a>
  </div>
</footer>