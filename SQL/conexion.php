<?php
$config = include 'config.php';

try {
  $conexion = new PDO('mysql:host=' . $config['db']['host'].';dbname='. $config['db']['name'].'', $config['db']['user'], $config['db']['pass'], $config['db']['options']);
  $conexion->exec("set names utf8");
//   var_dump($conexion);
return $conexion;
} catch(PDOException $error) {
  echo $error->getMessage();
}