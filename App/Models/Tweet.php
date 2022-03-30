<?php

  namespace App\Models;
  use MF\Model\Model;

  class Tweet extends Model{
    private $id;
    private $id_usuario;
    private $tweet;
    private $data;

    public function __get($atributo){
      return $this->$atributo;
    }

    public function __set($atributo, $valor){
      $this->$atributo = $valor;
      return $this;
    }

    public function getTweet(){

    }

    public function setTweet(){
      $query = "INSERT INTO tweets(id_usuario, tweet) VALUES (:id_usuario, :tweet);";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
      $stmt->bindValue(':tweet', $this->__get('tweet'));
      $stmt->execute();

      return $this;
    }
  }

?>