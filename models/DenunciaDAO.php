<?php

require_once 'Denuncia.php';

class DenunciaDAO {
	private $db;

	public function __construct($connection) {
		$this->db = $connection;
	}

	public function adicionar(Denuncia $denuncia) {
		try {
			$sql = "INSERT INTO denuncias(nomeRua, numero, cep, bairro, cidade, estado, lat, lng, descricao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$nomeRua = $denuncia->getNomeRua();
			$numero = $denuncia->getNumero();
			$cep = $denuncia->getCep();
			$bairro = $denuncia->getBairro();
			$cidade = $denuncia->getCidade();
			$estado = $denuncia->getEstado();
			$lat = $denuncia->getLat();
			$lng = $denuncia->getLng();
			$descricao = $denuncia->getDescricao();

			$stmt = $this->db->getConnection()->prepare($sql);
			$stmt->bindParam(1, $nomeRua);
			$stmt->bindParam(2, $numero);
			$stmt->bindParam(3, $cep);
			$stmt->bindParam(4, $bairro);
			$stmt->bindParam(5, $cidade);
			$stmt->bindParam(6, $estado);
			$stmt->bindParam(7, $lat);
			$stmt->bindParam(8, $lng);
			$stmt->bindParam(9, $descricao);

			$query = $stmt->execute();

			return true;
		} catch (Exception $e) {
			echo 'Erro ao adicionar denuncia. '.$e->getMessage();
			return false;
		}
	}

	public function excluir(Denuncia $denuncia) {
		try {
			$sql = "DELETE from denuncias where id=?";

			$id = $denuncia->getId();

			$stmt = $this->db->getConnection()->prepare($sql);
			$stmt->bindParam(1, $id);

			$query = $stmt->execute();

			return true;
		} catch (Exception $e) {
			echo 'Erro ao excluir denúnica. '.$e->getMessage();
			return false;
		}
	}

	public function editar(Denuncia $denuncia) {
		try {
			$sql = "UPDATE denuncias SET nomeRua=?, numero=?, cep=?, bairro=?, cidade=?, estado=?, lat=?, lng=?, descricao=? WHERE id=?";

			$id = $denuncia->getId();
			$nomeRua = $denuncia->getNomeRua();
			$numero = $denuncia->getNumero();
			$cep = $denuncia->getCep();
			$bairro = $denuncia->getBairro();
			$cidade = $denuncia->getCidade();
			$estado = $denuncia->getEstado();
			$lat = $denuncia->getLat();
			$lng = $denuncia->getLng();
			$descricao = $denuncia->getDescricao();

			$stmt = $this->db->getConnection()->prepare($sql);
			$stmt->bindParam(1, $nomeRua);
			$stmt->bindParam(2, $numero);
			$stmt->bindParam(3, $cep);
			$stmt->bindParam(4, $bairro);
			$stmt->bindParam(5, $cidade);
			$stmt->bindParam(6, $estado);
			$stmt->bindParam(7, $lat);
			$stmt->bindParam(8, $lng);
			$stmt->bindParam(9, $descricao);
			$stmt->bindParam(10, $id);

			$query = $stmt->execute();

			return true;
		} catch (Exception $e) {
			echo 'Erro ao editar denúncia. '.$e->getMessage();
			return false;
		}
	}
}
?>