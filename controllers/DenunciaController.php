<?php
class denunciaController extends controller {
	public function index() {
		echo "denunciaController index";
	}

	public function registrarDenuncia() {
		$dados = array();

		$denuncia = new Denuncia();

		if (isset($_POST['nomeRua']) && !empty($_POST['nomeRua'])) {
			$nomeRua = addslashes($_POST['nomeRua']);
			$numero = addslashes($_POST['numero']);
			$cep = addslashes($_POST['cep']);
			$bairro = addslashes($_POST['bairro']);
			$cidade = addslashes($_POST['cidade']);
			$estado = addslashes($_POST['estado']);
			$lat = addslashes($_POST['lat']);
			$lng = addslashes($_POST['lng']);
			$descricao = addslashes($_POST['descricao']);

			if ($denuncia->adicionar($nomeRua, $numero, $cep, $bairro, $cidade, $estado, $lat, $lng, $descricao)) {
				$_SESSION['msg'] = "Cadastro efetuado.";
			} else {
				echo 'Erro ao adicionar denúncia';
			}
		}

		$this->loadTemplate('registrarDenuncia', $dados);
	}

	public function consultarDenuncias() {
		$dados = array();

		$d = new Denuncia();

		$denuncias = $d->getAll();

		$dados['denuncias'] = $denuncias;

		$this->loadTemplate('consultarDenuncias', $dados);
	}

	public function editar($id) {
		$dados = array();

		$d = new Denuncia();

		$denuncia = $d->getDenunciaById($id);

		$dados['denuncia'] = $denuncia;

		if (isset($_POST['nomeRua']) && !empty($_POST['nomeRua'])) {
			$nomeRua = addslashes($_POST['nomeRua']);
			$numero = addslashes($_POST['numero']);
			$cep = addslashes($_POST['cep']);
			$bairro = addslashes($_POST['bairro']);
			$cidade = addslashes($_POST['cidade']);
			$estado = addslashes($_POST['estado']);
			$lat = addslashes($_POST['lat']);
			$lng = addslashes($_POST['lng']);
			$descricao = addslashes($_POST['descricao']);

			if ($d->editar($nomeRua, $numero, $cep, $bairro, $cidade, $estado, $lat, $lng, $descricao, $id)) {
				$_SESSION['msg'] = "Cadastro efetuado.";
				header("Location: ".BASE_URL."denuncia/consultarDenuncias");
			} else {
				echo 'Erro ao editar denúncia';
			}
		}

		$this->loadTemplate('editarDenuncia', $dados);
		
	}

	public function excluir($id) {
		$d = new Denuncia();

		if ($d->excluir($id)) {
			header("Location: ".BASE_URL."denuncia/consultarDenuncias");
		} else {
			echo 'Erro ao excluir denúncia';
		}
	}

}