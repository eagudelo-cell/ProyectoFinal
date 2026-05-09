<?php

$host = "mysql-yesidsan.alwaysdata.net";
$usuario = "yesidsan";
$password = "Cc14635767";
$bd = "yesidsan_proyectofinalenvios";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

?>