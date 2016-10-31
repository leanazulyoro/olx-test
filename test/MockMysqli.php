<?php

namespace mocks;

use mysqli;

class MockMysqli extends mysqli{

  public function query(){
    return $this;
  }

  public function fetchAssoc() {
    return array(
      'id' => 1,
      'name' => 'Carlos',
      'picture' => NULL,
      'address' => NULL
    );
  }

}