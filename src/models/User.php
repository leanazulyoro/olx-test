<?php

namespace olxtest\models;

use olxtest\helper\data_type_validator\DataTypeValidator;

class User {
  private $id;
  private $name;
  private $picture;
  private $address;

  function __construct($id, $name, $picture, $address) {
    $this->id = DataTypeValidator::isIntegerOrThrow($id);
    $this->name = DataTypeValidator::isStringOrThrow($name);
    if(!empty($picture)) {
      $this->picture = DataTypeValidator::isUrlOrThrow($picture);
    }
    if(!empty($address)) {
      $this->address = DataTypeValidator::isStringOrThrow($address);
    }
  }

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @return mixed
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return mixed
   */
  public function getPicture() {
    return $this->picture;
  }

  /**
   * @return mixed
   */
  public function getAddress() {
    return $this->address;
  }

  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

}