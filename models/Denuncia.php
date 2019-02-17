<?php
class Denuncia extends model {

    public function adicionar($nomeRua, $numero, $cep, $bairro, $cidade, $estado, $lat, $lng, $descricao) {
        try {
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

    public function excluir($id) {
        
        $sql = "DELETE from denuncias where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $id);

        $query = $stmt->execute();

        return true;
    }

    public function editar($nomeRua, $numero, $cep, $bairro, $cidade, $estado, $lat, $lng, $descricao, $id) {
        try {
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
?>