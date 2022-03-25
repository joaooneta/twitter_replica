<?php

    namespace App\Models;
    use MF\Model\Model;

    class Usuario extends Model{
        private $id;
        private $nome;
        private $email;
        private $senha;

        //Get & Set
        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
            return $this;
        }

        //Save
        public function salvar(){
            $query = 'INSERT INTO usuarios(nome, email, senha) VALUES (:nome, :email, :senha);';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue('nome', $this->__get('nome'));
            $stmt->bindValue('email', $this->__get('email'));
            $stmt->bindValue('senha', $this->__get('senha'));
            $stmt->execute();

            return $this;
        }

        //Validamento do cadastro
        public function validarCadastro(){
            $validade = true;
            
            //Requisitos cadastro
            //Nome
            if(strlen($this->__get('nome')) < 3){
                $validade = false;
            }

            //Email
            if(strlen($this->__get('email') < 10)){
                $validade = false;
            }

            //Senha
            if(strlen($this->__get('senha')) < 8){
                $validade = false;
            }

            return $validade;

        }

        //Recupera usuário pelo e-mail
        public function getUsuarioPorEmail(){
            $query = 'SELECT id, nome, email, senha FROM usuarios WHERE email = :email;';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    }

?>