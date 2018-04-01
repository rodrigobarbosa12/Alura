<?php

class Produto {

	private $id;
	private $nome;
	private $preco;
	private $descricao;
	private $categoria;
	private $usado;
	private $isbn;
	private $tipoProduto;

	function __construct($nome, $preco, $descricao, Categoria $categoria, $usado) {
		$this->nome = $nome;
		$this->preco = $preco;
		$this->descricao = $descricao;
		$this->categoria = $categoria;
		$this->usado = $usado;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getPreco() {
		return $this->preco;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function getCategoria() {
		return $this->categoria;
	}

	public function isUsado() {
		return $this->usado;
	}

	public function setUsado($usado) {
		$this->usado = $usado;
	}

	public function getIsbn(){
		return $this->isbn;
	}
	public function setIsbn($isbn){
		$this->isbn = $isbn;
	}

	public function getTipoProduto(){
		return $this->TipoProduto;
	}
	public function setTipoProduto($tipoProduto){
		$this->TipoProduto = $tipoProduto;
	}

	public function precoComDesconto($valor = 0.1) {

		if ($valor > 0 && $valor <= 0.5) {
			$this->preco -= $this->preco * $valor;
		}

		return $this->preco;
	}

	function __toString() {
		return $this->nome.": R$ ".$this->preco;
	}
}

?>