<?php

use olxtest\api\UserApi;

require_once __DIR__ .'/../src/init.php';
include __DIR__ . '/../vendor/autoload.php';

/**
 * Class UserApiTests
 */
class UserApiTests extends PHPUnit_Framework_TestCase {

  /**
   * @group testTest
   */
  public function testTest() {
    $a = '1';
    $b = '1';

    $this->assertEquals($a, $b);

  }
  
  public function testGet() {
    $dblink = dbconnect();
    $api = new UserApi($dblink);
    $json = $api->get(1);
    $expected = '{"id":1,"name":"Carlos","picture":null,"address":null}';
    $this->assertEquals($json, $expected);

  }
  
}