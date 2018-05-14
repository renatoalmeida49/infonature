<?php
session_start();
ob_start();
include_once("conexao.php");

//Receber dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$imagem = $_FILES['foto'];


if ( (!isset($_POST['nome']) || empty($_POST['nome'])) || (!isset($_POST['numero']) || empty($_POST['numero'])) || (!isset($_POST['cep']) || empty($_POST['cep'])) || (!isset($_POST['bairro']) || empty($_POST['bairro'])) || (!isset($_POST['cidade']) || empty($_POST['cidade'])) || (!isset($_POST['estado']) || empty($_POST['estado'])) || (!isset($_POST['descricao']) || empty($_POST['descricao'])) || (!isset($_POST['lat']) || empty($_POST['lat'])) || (!isset($_POST['lng']) || empty($_POST['lng'])) ) {

	$_SESSION['msg'] = "Preencha todos os campos.";
	header("Location: editar.php");
} else {
	//$sql = "update usuarios set nome='$nome', email='$email' where id='$id'";
	//$pdo->query($sql);

	$sql = "UPDATE denuncias SET nomeRua='".$_POST['nome']."', numero='".$_POST['numero']."', cep='".$_POST['cep']."', bairro='".$_POST['bairro']."', cidade='".$_POST['cidade']."', estado='".$_POST['estado']."', lat='".$_POST['lat']."', lng='".$_POST['lng']."', descricao='".$_POST['descricao']."' WHERE id='".$_GET['id']."'";
	$sqlExecute = mysqli_query($conn, $sql);

	header("Location: consulte.php");
}
