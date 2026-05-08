<?php
$host = "mysql-edwinagudelo.alwaysdata.net";
$user = "edwinagudelo";
$password = "clase1234";
$db = "mensajeria";

$conn = new mysqli($host, $usuario, $password, $bd);

if($conn->connect_error){
    die("Error de conexión: " . $conn->connect_error);
}

?>
