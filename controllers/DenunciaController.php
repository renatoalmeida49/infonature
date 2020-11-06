<?php
class DenunciaController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		echo "denunciaController index";
	}

	public function registrarDenuncia() {
		$dados = array();

		$denuncia = new Denuncia();
		$dao = new DenunciaDAO();

		if (isset($_POST['nomeRua']) && !empty($_POST['nomeRua'])) {
			$denuncia->setNomeRua(addslashes($_POST['nomeRua']));
			$denuncia->setNumero(addslashes($_POST['numero']));
			$denuncia->setCep(addslashes($_POST['cep']));
			$denuncia->setBairro(addslashes($_POST['bairro']));
			$denuncia->setCidade(addslashes($_POST['cidade']));
			$denuncia->setEstado(addslashes($_POST['estado']));
			$denuncia->setLat(addslashes($_POST['lat']));
			$denuncia->setLng(addslashes($_POST['lng']));
			$denuncia->setDescricao(addslashes($_POST['descricao']));

			if ($dao->adicionar($denuncia)) {
				$_SESSION['msg'] = "Cadastro efetuado.";
			} else {
				echo 'Erro ao adicionar denúncia';
			}
		}

		$this->loadTemplate('registrarDenuncia', $dados);
	}

	public function consultarDenuncias() {
		$dados = array();
		$denuncias = array();

		$dao = new DenunciaDAO();

		$denuncias = $dao->getAll();

		$dados['denuncias'] = $denuncias;

		$this->loadTemplate('consultarDenuncias', $dados);
	}

	public function editar($id) {
		$dados = array();

		$denuncia = new Denuncia();
		$dao = new DenunciaDAO();

		$d = $dao->getDenunciaById($id);

		$dados['denuncia'] = $d;

		if (isset($_POST['nomeRua']) && !empty($_POST['nomeRua'])) {
			$denuncia->setNomeRua(addslashes($_POST['nomeRua']));
			$denuncia->setNumero(addslashes($_POST['numero']));
			$denuncia->setCep(addslashes($_POST['cep']));
			$denuncia->setBairro(addslashes($_POST['bairro']));
			$denuncia->setCidade(addslashes($_POST['cidade']));
			$denuncia->setEstado(addslashes($_POST['estado']));
			$denuncia->setLat(addslashes($_POST['lat']));
			$denuncia->setLng(addslashes($_POST['lng']));
			$denuncia->setDescricao(addslashes($_POST['descricao']));
			$denuncia->setId($id);

			if ($dao->editar($denuncia)) {
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
		$d->setId($id);

		$dao = new DenunciaDAO();

		if ($dao->excluir($d)) {
			header("Location: ".BASE_URL."denuncia/consultarDenuncias");
		} else {
			echo 'Erro ao excluir denúncia';
		}
	}

}