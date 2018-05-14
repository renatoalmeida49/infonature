<?php
require 'conexao.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "delete from denuncias where id='$id'";
	$resultset = mysqli_query($conn, $sql);

	header("Location: consulte.php");
} else {
	header("Location: consulte.php");
}

?>