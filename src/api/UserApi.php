<?php

namespace olxtest\api;

use Exception;
use mysqli;
use olxtest\models\User;

class UserApi {


  private $db;


  public function __construct($db) {
    $this->db = $db;
  }

  public function get($uid){

    if ($resultado = $this->db->query("SELECT * FROM users WHERE id = $uid")) {
      $user = $resultado->fetch_assoc();
      return json_encode((new User((int)$user['id'],$user['name'], $user['picture'], $user['address']))->jsonSerialize());

    } else {
      // @todo: handle error
    }

  }

  public function update($uid){

  }

  public function delete($uid){

  }


}