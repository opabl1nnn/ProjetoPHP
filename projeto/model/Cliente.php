<?php
class Cliente{
    private $id;
    private $nome;
    private $sobrenome;
    private $datanascimento;
    private $cpf;
    private $rg;

    public function __construct($nome = null) {
        $this->nome = $nome;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome){
        $this->sobrenome = $sobrenome;
    }

    public function getDatanascimento(){
        return $this->datanascimento;
    }

    public function setDatanascimento($datanascimento){
        $this->datanascimento = $datanascimento;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    
    public function getRg(){
        return $this->rg;
    }

    public function setRg($rg){
        $this->rg = $rg;
    }

    public function __toString(){
        return "Cliente: Nome: {$this->nome} - Sobrenome: {$this->sobrenome} - Data de Nascimento: {$this->datanascimento} - CPF: {$this->cpf} - RG: {$this->rg}";
    }
}
?>
