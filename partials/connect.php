<?php

require_once "config.php";

function connect($host, $database, $user, $password)
{
  $dsn = "mysql:host=$host;dbname=$database;charset=UTF8";

  try {
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return new PDO($dsn, $user, $password, $options);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

return connect($host, $database, $user, $password);
