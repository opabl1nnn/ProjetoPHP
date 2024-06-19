<?php
    class CarroDao{
        public function inserir(Carro $carro){
            try{
                $sql = "INSERT INTO carro(modelo, categoria, fabricante, quilometragem, ano) VALUES (:modelo, :categoria, :fabricante, :quilometragem, :ano)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":modelo", $carro->getModelo());
                $con_sql->bindValue(":categoria", $carro->getCategoria());
                $con_sql->bindValue(":fabricante", $carro->getFabricante());
                $con_sql->bindValue(":quilometragem", $carro->getQuilometragem());
                $con_sql->bindValue(":ano", $carro->getAno());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "<p>Erro ao inserir Veiculo!</p> $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT * FROM carro";
                $result = ConnectionFactory::getConnection()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $carroLista = array();
                foreach($lista as $l){
                    $carroLista[] = $this->listarCarro($l);
                }
                return $carroLista;
            }catch(PDOException $e){
                echo "Ocorreu um erro ao listar Veiculos: $e";
            }
        }

        public function listarCarro($row){
            $carro = new Carro();
            $carro->setId($row['id']);
            $carro->setModelo($row['modelo']);
            $carro->setCategoria($row['categoria']);
            $carro->setFabricante($row['fabricante']);
            $carro->setAno($row['ano']);
            $carro->setQuilometragem($row['quilometragem']);
            return $carro;
        }

        public function delete(Carro $carro) {
            try{
                $sql = "DELETE FROM carro WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $carro->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "erro ao excluir Carro: $e";
            }
        }
    }
?>