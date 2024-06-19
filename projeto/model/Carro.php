
<?php
class Carro{
    private $id;
    private $modelo;
    private $categoria;
    private $fabricante;
    private $ano;
    private $quilometragem;

    public function __construct($modelo = null) {
        $this->modelo = $modelo;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function getFabricante(){
        return $this->fabricante;
    }

    public function setFabricante($fabricante){
        $this->fabricante = $fabricante;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }

    public function getQuilometragem(){
        return $this->quilometragem;
    }

    public function setQuilometragem($quilometragem){
        $this->quilometragem = $quilometragem;
    }

    public function __toString(){
        return "Carro: Modelo: {$this->modelo} - Categoria: {$this->categoria} - Fabricante: {$this->fabricante} - Ano: {$this->ano} - Quilometragem: {$this->quilometragem}";
    }
}
?>
