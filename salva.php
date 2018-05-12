<?php
session_start();
ob_start();
include_once("conexao.php");

//Receber dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//Recebe a imagem separada
$imagem = $_FILES['foto'];

$sql = "INSERT INTO denuncias(nomeRua, numero, cep, bairro, cidade, estado, foto, lat, lng, descricao) 
				VALUES 
				('".$dados['nome']."', '".$dados['numero']."', '".$dados['cep']."', '".$dados['bairro']."', '".$dados['cidade']."', '".$dados['estado']."', '".$imagem."', '".$dados['lat']."', '".$dados['lng']."', '".$dados['descricao']."')";

$resutSet = mysql_query($conn, $sql);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<span style='color: green';>Endereço cadastrado com sucesso!</span>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<span style='color: red';>Erro: Endereço não foi cadastrado com sucesso!</span>";
	header("Location: index.php");
}

?>