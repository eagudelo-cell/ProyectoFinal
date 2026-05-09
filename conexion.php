<?php

$host = "mysql-edwinagudelo.alwaysdata.net";
$usuario = "edwinagudelo";
$password = "clase1234";
$bd = "edwinagudelo_mensajeria";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>