<?php

    namespace MF\Model;
    use App\Connection;

    //Container responsável por retornar ao controller o model utilizado pela view
    class Container{

        public static function getModel($model){

            //Monta dinamicamente e declara uma instância do model já com a conexão estabelecida
            $class = "\\App\\Models\\" . ucfirst($model);
            return new $class(Connection::getDb());

        }
    }

?>