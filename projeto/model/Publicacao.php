
<?php
    require_once 'Cliente.php';
    require_once 'Carro.php';

class Publicacao{
    private $id;
    private $carroId;
    private $clienteId;
    private $nomecliente;
    private $nomecarro;

    public function __construct() {
        $this->nomecliente = new Cliente();
        $this->nomecarro = new Carro();
    }

    public function getNomecliente() {
        return $this->nomecliente->getNome();
    }

    public function setNomecliente($nome) {
        $this->nomecliente->setNome($nome);
    }

    public function getModelocarro() {
        return $this->nomecarro;
    }

    public function setModelocarro($nome) {
        $this->nomecarro->setModelo($nome);
    }


    public function getCarroId(){
        return $this->carroId;
    }

    public function setCarroId($carroId){
        $this->carroId = $carroId;
    }

    public function getClienteId(){
        return $this->clienteId;
    }

    public function setClienteId($clienteId){
        $this->clienteId = $clienteId;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
}
?>
