<?php

    namespace MF\Model;

    //Variáveis & métodos comuns a todos os models
    abstract class Model{
        protected $db;

        public function __construct(\PDO $db){
            $this->db = $db;
        }
    }

?>