<?php
session_start();

require_once '../models/Denuncia.php';
require_once '../models/DenunciaDAO.php';
require_once '../config/Database.php';

switch ($_POST['denunciaControl']) {
	case "Adicionar":
		adicionar();
		break;
	case "Editar":
		editar();
		break;
	case "Excluir":
		excluir();
		break;
	default:
		header("Location: ../index.php");
}

function adicionar() {
	$db = new Database();
	$dao = new DenunciaDAO($db);

	$denuncia = new Denuncia();

	$denuncia->setNomeRua($_POST['nomeRua']);
	$denuncia->setNumero($_POST['numero']);
	$denuncia->setCep($_POST['cep']);
	$denuncia->setBairro($_POST['bairro']);
	$denuncia->setCidade($_POST['cidade']);
	$denuncia->setEstado($_POST['estado']);
	$denuncia->setLat($_POST['lat']);
	$denuncia->setLng($_POST['lng']);
	$denuncia->setDescricao($_POST['descricao']);

	if ($dao->adicionar($denuncia)) {
		$_SESSION['msg'] = "Cadastro efetuado.";
		header("Location: ../views/registrarDenuncia.php");
	} else {
		echo 'Erro ao adicionar denúncia';
	}
}

function editar() {
	$db = new Database();
	$dao = new DenunciaDAO($db);

	$denuncia = new Denuncia();

	$denuncia->setId($_POST['id']);
	$denuncia->setNomeRua($_POST['nomeRua']);
	$denuncia->setNumero($_POST['numero']);
	$denuncia->setCep($_POST['cep']);
	$denuncia->setBairro($_POST['bairro']);
	$denuncia->setCidade($_POST['cidade']);
	$denuncia->setEstado($_POST['estado']);
	$denuncia->setLat($_POST['lat']);
	$denuncia->setLng($_POST['lng']);
	$denuncia->setDescricao($_POST['descricao']);

	if ($dao->editar($denuncia)) {
		header("Location: ../views/consultarDenuncias.php");
	} else {
		echo 'Erro ao editar denúncia';
	}
	
}

function excluir() {
	$db = new Database();
	$dao = new DenunciaDAO($db);

	$denuncia = new Denuncia();

	$denuncia->setId($_POST['id']);

	if ($dao->excluir($denuncia)) {
		header("Location: ../views/consultarDenuncias.php");
	} else {
		echo 'Erro ao excluir denúncia';
	}
}
?>