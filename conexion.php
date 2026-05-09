<?php

$host = "mysql-jhonatan1.alwaysdata.net";
$usuario = "jhonatan1";
$password = "clase123";
$bd = "jhonatan1_proyectof";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>