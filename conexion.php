<?php

$host = "mysql-mina.alwaysdata.net";
$usuario = "mina";
$password = "clase12";
$bd = "mina_proyectofinal";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>