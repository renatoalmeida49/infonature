<?php
class DenunciaDAO extends Model {
	public function adicionar(Denuncia $denuncia) {
        try {
        	$nomeRua = $denuncia->getNomeRua();
        	$numero = $denuncia->getNumero();
        	$cep = $denuncia->getCep();
        	$bairro = $denuncia->getBairro();
        	$cidade = $denuncia->getCidade();
        	$estado = $denuncia->getEstado();
        	$lat = $denuncia->getLat();
        	$lng = $denuncia->getLng();
        	$descricao = $denuncia->getDescricao();

            $sql = "INSERT INTO denuncias(nomeRua, numero, cep, bairro, cidade, estado, lat, lng, descricao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($sql);
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
    	$id = $denuncia->getId();
        
        $sql = "DELETE from denuncias where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $id);

        $query = $stmt->execute();

        return true;
    }

    public function editar(Denuncia $denuncia) {
        try {
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

            $sql = "UPDATE denuncias SET nomeRua=?, numero=?, cep=?, bairro=?, cidade=?, estado=?, lat=?, lng=?, descricao=? WHERE id=?";

            $stmt = $this->db->prepare($sql);
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

    public function getAll() {
        $array = array();

        $sql = "SELECT * FROM denuncias";
        $stmt = $this->db->query($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll();
        }

        return $array;
    }
	
    public function getDenunciaById($id) {
        $array = array();

        $sql = "SELECT * FROM denuncias WHERE id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $id);

        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $array = $stmt->fetch();
        }

        return $array;
    }
}