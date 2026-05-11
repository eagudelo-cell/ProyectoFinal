<?php

$host = "mysql-cardonalan.alwaysdata.net";
$usuario = "cardonalan";
$password = "clase1234";
$bd = "cardonalan_mensajeria";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>