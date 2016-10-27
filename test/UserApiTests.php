<?php

use olxtest\TestClass;


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


  /**
   * @group testTest
   */
  public function testTest2() {
    $a = TestClass::testmethod();

    $this->assertEquals($a, 'hola');

  }


}