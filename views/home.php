<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
?>

<section class="banner">
	<div class="container column">
		<div><h1>Preservar é preciso</h1></div>

		<div class="bannerRow">
			<a href="<?php echo BASE_URL; ?>denuncia/registrarDenuncia"><div class="button">
				Registre
			</div></a>
			<a href="<?php echo BASE_URL; ?>denuncia/consultarDenuncias"><div class="button">
				Consulte
			</div></a>
		</div>
		
		<div><h2>Registre pontos da cidade onde há lixo mal descartado. Ajude a preservar o ambiente.</h2></div>
	</div>
</section>


<footer class="footerIndex">
	<div class="container">
		<div class="info">
			<a href="https://github.com/renatoalmeida49">Created by: Renato Novaes - Versão 2.0</a>
		</div>
	</div>
</footer>
