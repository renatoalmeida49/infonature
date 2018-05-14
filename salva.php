<?php
session_start();
ob_start();
include_once("conexao.php");

//Receber dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$imagem = $_FILES['foto'];

if ( (!isset($_POST['nome']) || empty($_POST['nome'])) || (!isset($_POST['numero']) || empty($_POST['numero'])) || (!isset($_POST['cep']) || empty($_POST['cep'])) || (!isset($_POST['bairro']) || empty($_POST['bairro'])) || (!isset($_POST['cidade']) || empty($_POST['cidade'])) || (!isset($_POST['estado']) || empty($_POST['estado'])) || (!isset($_POST['descricao']) || empty($_POST['descricao'])) || (!isset($_POST['lat']) || empty($_POST['lat'])) || (!isset($_POST['lng']) || empty($_POST['lng'])) ) {

	$_SESSION['msg'] = "Preencha todos os campos.";
	header("Location: registre.php");
} else {
	$sql = "INSERT INTO denuncias(nomeRua, numero, cep, bairro, cidade, estado, lat, lng, descricao)
			VALUES
			('".$_POST['nome']."', '".$_POST['numero']."', '".$_POST['cep']."', '".$_POST['bairro']."', '".$_POST['cidade']."', '".$_POST['estado']."', '".$_POST['lat']."', '".$_POST['lng']."', '".$_POST['descricao']."')";
	$sqlExecute = mysqli_query($conn, $sql);

	if (mysqli_insert_id($conn)) {
		$_SESSION['msg'] = "Cadastro efetuado.";
		header("Location: registre.php");
	} else {
		$_SESSION['msg'] = "Falha ao cadastrar.";
		header("Location: registre.php");
	}
} 



/*|| !isset($_POST['numero']) || !isset($_POST['cep']) || !isset($_POST['bairro']) || !isset($_POST['cidade']) || !isset($_POST['estado']) || !isset($_POST['descricao']) || !isset($_POST['latitude']) || !isset($_POST['longitude']))*/

/*
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

*/
?>
