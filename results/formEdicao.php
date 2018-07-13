<?php
require_once '../config/Database.php';

function getFormEditarDenuncia() {
	$db = new Database();

	$id = $_GET['id'];

	$sql = "SELECT * FROM denuncias where id='$id'";

	$stmt = $db->getConnection()->query($sql);

	if ($stmt->rowCount() > 0) {
		$result = $stmt->fetch();

		return $result;
	} else {
		echo 'Nada foi lido do banco';
	}
}
?>