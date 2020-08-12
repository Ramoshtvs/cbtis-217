<?php

//simple conexion a la base da datos

$servidor = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'cbtis217';

try {
  $conexion = new PDO("mysql:host=$servidor;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>
