<?php

    namespace App;

    class Connection{
        
        //Não é necessário declarar uma instância da classe para utilizar essa função
        public static function getDb(){
            //Bloco try/catch para conexão com banco
            try{
                $host = 'localhost';
                $dbname = 'framework_mvc';
                $user = 'root';
                $pass = '';
                $conn = new \PDO(
                    "mysql:host=$host;dbname=$dbname",
                    "$user",
                    "$pass"
                );

                return $conn;
            }catch(PDOException $e){
                console.log('Erro:'.$e);
            }
        }
    }

?>