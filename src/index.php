<?php

use olxtest\api\UserApi;

require_once 'init.php';

// db connection
$dblink = dbconnect();

// User Api
$api = new UserApi($dblink);

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {

  case 'GET':
    if ($uid = $_GET['uid']) {
      echo $api->get($uid);
      exit;

    }
    break;

  case 'PUT':
    //$api->update($uid);
    break;

  case 'DELETE':
    //$api->delete($uid);
    break;

}


