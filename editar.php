<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM envios WHERE id=$id";
$resultado = $conn->query($sql);

$fila = $resultado->fetch_assoc();

if($_POST){

    $destinatario = $_POST['destinatario'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];

    $update = "UPDATE envios
               SET destinatario='$destinatario',
                   direccion='$direccion',
                   descripcion='$descripcion'
               WHERE id=$id";

    if($conn->query($update)){
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Envío</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="form-container">

    <h2>Editar Envío</h2>

    <form method="POST">

        <label>Destinatario</label>
        <input type="text"
               name="destinatario"
               value="<?php echo $fila['destinatario']; ?>"
               required>

        <label>Dirección</label>
        <input type="text"
               name="direccion"
               value="<?php echo $fila['direccion']; ?>"
               required>

        <label>Descripción</label>
        <textarea name="descripcion" required><?php echo $fila['descripcion']; ?></textarea>

        <button type="submit">Actualizar</button>

        <a href="index.php" class="volver">Volver</a>

    </form>

</div>

</body>
</html>
