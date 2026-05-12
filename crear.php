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
    <title>Nuevo Env&iacute;o</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="form-container">

    <div class="eyebrow">Nuevo registro</div>
    <h2>Registrar Env&iacute;o</h2>
    <p>Agrega los datos del paquete para mantener tu lista de entregas al dia.</p>

    <form method="POST">

        <label>Destinatario</label>
        <input type="text" name="destinatario" placeholder="Nombre del destinatario" required>

        <label>Direcci&oacute;n</label>
        <input type="text" name="direccion" placeholder="Direccion completa de entrega" required>

        <label>Descripci&oacute;n</label>
        <textarea name="descripcion" placeholder="Detalles del paquete o indicaciones" required></textarea>

        <button type="submit">Guardar envio</button>

        <a href="index.php" class="volver">Volver al panel</a>

    </form>

</div>

</body>
</html>
