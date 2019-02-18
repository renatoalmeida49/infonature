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
			<form method="post" enctype="multipart/form-data"s>
				<input type='text' hidden name='id' value='<?php echo $denuncia['id']?>'/>
				<br/><label>Nome da rua:</label> <input type="text" name="nomeRua" value="<?php echo $denuncia['nomeRua'] ?>" required><br/>
				<br/><label>Número:</label> <input type="number" name="numero" value="<?php echo $denuncia['numero'] ?>" required><br/>
				<br/><label>CEP:</label> <input type="number" name="cep" value="<?php echo $denuncia['cep'] ?>"><br/>
				<br/><label>Bairro:</label> <input type="text" name="bairro" value="<?php echo $denuncia['bairro'] ?>" required><br/>
				<br/><label>Cidade:</label> <input type="text" name="cidade" value="<?php echo $denuncia['cidade'] ?>" required><br/>
				<br/><label>Estado:</label> <input type="text" name="estado" value="<?php echo $denuncia['estado'] ?>"><br/>
				<br/><label>Foto:</label> <input type="file" name="foto"><br/>
				<br/><label>Descrição:</label> <input type="text" name="descricao" value="<?php echo $denuncia['descricao'] ?>" required><br/>
				<br/><label>Localização no mapa:</label><br/>
				<br/><label>Latitude:</label> <input type="text" name="lat" value="<?php echo $denuncia['lat'] ?>" required><br/>
				<br/><label>Longitude:</label> <input type="text" name="lng" value="<?php echo $denuncia['lng'] ?>" required><br/>

				<div class="footerform">
					<div class="infoSalve">
						Para coletar a latitude e longitude selecione um local no mapa e em seguida clique o botão direito do mouse. Então selecione a opção "O que há aqui?". Surgirá uma janela com informações. Os dois valores no canto inferior referem-se a latitude e longitude respectivamente.<br/>
						<br/><a href="https://maps.google.com" target="blank"><div class="button">Ver mapa</div></a><br/>
						<br/><button class="salvar" type="submit" name="denunciaControl" value="Editar">Salvar</button><br/>
					</div>

					<div>

						<br/><a href="<?php echo BASE_URL; ?>denuncia/consultardenuncias"><button type="button" class="button">Voltar</button></a>
					</div>
				</div>
				
			</form>
		</div>
	</div>
</section>