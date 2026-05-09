<?php
include("conexion.php");

if($_POST){

    $destinatario = $_POST['destinatario'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO envios(destinatario, direccion, descripcion)
            VALUES('$destinatario', '$direccion', '$descripcion')";

    if($conn->query($sql)){
        header("Location: index.php");
    }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Envío</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="form-container">

    <h2>Registrar Envío</h2>

    <form method="POST">

        <label>Destinatario</label>
        <input type="text" name="destinatario" required>

        <label>Dirección</label>
        <input type="text" name="direccion" required>

        <label>Descripción</label>
        <textarea name="descripcion" required></textarea>

        <button type="submit">Guardar</button>

        <a href="index.php" class="volver">Volver</a>

    </form>

</div>

</body>
</html>
