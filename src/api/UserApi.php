<?php

namespace olxtest\api;

use Exception;
use mysqli;
use olxtest\models\User;

class UserApi {

  private $db;

  public function __construct( $db) {

      $this->db = $db;
  }

  public function get($uid){

    try {
      $result = $this->db->query("SELECT * FROM users WHERE id = $uid");
      if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return json_encode((new User((int) $user['id'], $user['name'], $user['picture'], $user['address']))->jsonSerialize());
      }
      else {
        return 'The requested user doesn\'t exists';
      }
    } catch (Exception $e){
      return 'Error ' . $e->getCode() . ': ' . $e->getMessage() . ' at ' . $e->getFile() . '(' . $e->getLine() . ')';
    }

  }

  public function update($uid, $fields){

    $fields_to_update = array();
    foreach($fields as $key => $value){
      $fields_to_update[] = $key . '="' . $value . '"';
    }
    $values = implode(',', $fields_to_update);
    $sql = "UPDATE users SET $values WHERE id=$uid";


    if ($this->db->query($sql) === TRUE) {
      return self::get($uid);
    } else {
      return "Error updating record: " . $this->db->error;
    }

  }

  public function delete($uid){

    $sql = "DELETE FROM users WHERE id=$uid";

    if ($this->db->query($sql) === TRUE) {
      return "Record deleted successfully";
    } else {
      return "Error deleting record: " . $this->db->error;
    }

  }


}