<?php
$host = "mysql-edwinagudelo.alwaysdata.net";
$user = "edwinagudelo";
$password = "clase1234";
$db = "mensajeria";

$conn = new mysqli($host, $edwinagudelo, $clase1234, $bd);

if($conn->connect_error){
    die("Error de conexión: " . $conn->connect_error);
}

?>
