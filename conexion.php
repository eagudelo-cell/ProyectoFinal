<?php

$host = "mysql-trainee115.alwaysdata.net";
$usuario = "trainee115";
$password = "clase1234";
$bd = "trainee115_mensajeria";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>