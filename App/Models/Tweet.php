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

    public function getAll(){
      $query = "SELECT tweet.id, tweet.id_usuario, tweet.tweet, tweet.data, usuario.nome
                FROM tweets AS tweet
                LEFT JOIN usuarios AS usuario
                ON (tweet.id_usuario = usuario.id)
                WHERE tweet.id_usuario = :id_usuario
                ORDER BY tweet.data DESC;";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
      $stmt->execute();
      
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
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