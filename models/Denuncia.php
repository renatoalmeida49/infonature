<?php
class Denuncia {
	private $id;
	private $nomeRua;
	private $numero;
	private $cep;
	private $bairro;
	private $cidade;
	private $estado;
	private $foto;
	private $lat;
	private $lng;
	private $descricao;

	public function __construct() {

	}
        
    public function getId() {
        return $this->id;
    }

    public function getNomeRua() {
        return $this->nomeRua;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getLat() {
        return $this->lat;
    }

    public function getLng() {
        return $this->lng;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNomeRua($nomeRua) {
        $this->nomeRua = $nomeRua;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setLat($lat) {
        $this->lat = $lat;
    }

    public function setLng($lng) {
        $this->lng = $lng;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
	
}
?>