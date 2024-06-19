<?php
    class PublicacaoDao{
        public function inserir(Publicacao $pub){
            try{
                $sql = "INSERT INTO publicacao(cliente_id, carro_id) VALUES (:cliente_id, :carro_id)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":cliente_id", $pub->getClienteId());
                $con_sql->bindValue(":carro_id", $pub->getCarroId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "Erro $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT
                        publicacao.id as id,
                        cliente.nome AS cliente,
                        carro.modelo AS carro
                        FROM publicacao
                        JOIN
                        cliente ON publicacao.cliente_id = cliente.id
                        JOIN
                        carro ON publicacao.carro_id = carro.id;";

                $result = ConnectionFactory::getConnection()->query($sql);
                $publicacao = $result->fetchAll(PDO::FETCH_ASSOC);
                $PubliLista = array();
                foreach($publicacao as $p){
                    $PubliLista[] = $this->listarPubli($p);
                }
                return $PubliLista;
            }catch(PDOException $e){
                echo "what?: $e";
            }
        }

        public function listarPubli($row){
            $publicacao = new Publicacao();
            $publicacao->setId($row['id']);
            $publicacao->setNomecliente($row['cliente']);
            $publicacao->setModelocarro($row['carro']);
            return $publicacao;
        }

        public function delete(Publicacao $pub) {
            try{
                $sql = "DELETE FROM publicacao WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $pub->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "Erro!: $e";
            }
        }

    }
?>