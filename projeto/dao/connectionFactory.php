<?php
    class ConnectionFactory{
        static $conn;

        public static function getConnection(){
            if(!isset($conn)){
                $host = "localhost";
                $dbName = "projeto";
                $userDb = "root";
                $pass = "";
                $port = "3306";
                try{
                    $conn = new PDO("mysql:host=$host;dbname=$dbName;port=$port",$userDb,$pass);
                    return $conn;
                }catch(PDOException $ex){
                    echo "Erro! ".$ex->getMessage();
                }
            }
            return $conn;
        }
    }
?>