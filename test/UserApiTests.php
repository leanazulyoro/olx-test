<?php

require_once 'MockMysqli.php';

use olxtest\api\UserApi;

/**
 * Class UserApiTests
 */
class UserApiTests extends PHPUnit_Framework_TestCase
{

    public function testGet()
    {
        $api = new UserApi(new MockMysqli());
        $json = $api->get(1);
        $expected = '{"id":1,"name":"Carlos","picture":"http:\/\/example.com\/img.jpg","address":"Avenida Corriente 3456"}';
        $this->assertEquals($expected, $json);
    }

    public function testPost()
    {
        $api = new UserApi(new MockMysqli());
        $uid_to_update = 1;
        $fields_to_update = array('name' => 'Carlos');
        $updated = json_decode($api->update($uid_to_update, $fields_to_update));

        $this->assertEquals($fields_to_update['name'], $updated->name);
    }

    public function testDelete()
    {
        $api = new UserApi(new MockMysqli());
        $response = $api->delete(1);
        $this->assertEquals('Record deleted successfully', $response);
    }
}