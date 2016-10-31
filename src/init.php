<?php
include __DIR__ . '/../vendor/autoload.php';

// DB Connection
function dbconnect() {
  $dblink = new mysqli('db', 'dev', 'dev', 'test');
  $dblink->set_charset('utf8');

  if ($dblink->connect_errno) {
    throw new Exception('Fallo la conexión a la base');
  }

  return $dblink;
}