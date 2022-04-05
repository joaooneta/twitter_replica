<?php

  namespace App\Models;
  use MF\Model\Model;

  class Seguidores extends Model{
    private $id;
    private $id_usuario;
    private $id_usuario_seguidor;

    public function __get($atributo){
      return $this->$atributo;
    }

    public function __set($atributo, $valor){
      $this->$atributo = $valor;
      return $this;
    }

    public function seguir(){
      $query = 'INSERT INTO seguidores(id_usuario, id_usuario_seguidor) VALUES(:id_usuario, :id_usuario_seguidor);';
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
      $stmt->bindValue(':id_usuario_seguidor', $this->__get('id_usuario_seguidor'));
      $stmt->execute();
    }

    public function deixarDeSeguir(){
      $query = 'DELETE FROM seguidores WHERE id_usuario = :id_usuario AND id_usuario_seguidor = :id_usuario_seguidor;';
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
      $stmt->bindValue(':id_usuario_seguidor', $this->__get('id_usuario_seguidor'));
      $stmt->execute();
    }
  }

?>