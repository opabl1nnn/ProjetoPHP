<?php
    class ClienteDao{
        public function inserir(Cliente $cli){
            try{
                $sql = "INSERT INTO cliente(nome, sobrenome, datanascimento, cpf, rg) VALUES (:nome, :sobrenome, :datanascimento, :cpf, :rg)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":nome", $cli->getNome());
                $con_sql->bindValue(":sobrenome", $cli->getSobrenome());
                $con_sql->bindValue(":datanascimento", $cli->getDatanascimento());
                $con_sql->bindValue(":cpf", $cli->getCpf());
                $con_sql->bindValue(":rg", $cli->getRg());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "<p>Erro ao inserir Cliente</p> $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT * FROM cliente";
                $result = ConnectionFactory::getConnection()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $clienteLista = array();
                foreach($lista as $l){
                    $clienteLista[] = $this->listarCliente($l);
                }
                return $clienteLista;
            }catch(PDOException $e){
                echo "Ocorreu um erro ao listar cliente: $e";
            }
        }

        public function listarCliente($row){
            $cli = new Cliente();
            $cli->setId($row['id']);
            $cli->setNome($row['nome']);
            $cli->setSobrenome($row['sobrenome']);
            $cli->setDatanascimento($row['datanascimento']);
            $cli->setCpf($row['cpf']);
            $cli->setRg($row['rg']);
            return $cli;
        }

        public function delete(Cliente $cli) {
            try{
                $sql = "DELETE FROM cliente WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $cli->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "erro ao excluir cliente: $e";
            }
        }

    }
?>