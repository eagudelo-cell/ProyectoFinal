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
    <title>Editar Env&iacute;o</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="form-container">

    <div class="eyebrow">Actualizar datos</div>
    <h2>Editar Env&iacute;o</h2>
    <p>Ajusta la informacion del paquete antes de guardarla nuevamente.</p>

    <form method="POST">

        <label>Destinatario</label>
        <input type="text"
               name="destinatario"
               value="<?php echo $fila['destinatario']; ?>"
               required>

        <label>Direcci&oacute;n</label>
        <input type="text"
               name="direccion"
               value="<?php echo $fila['direccion']; ?>"
               required>

        <label>Descripci&oacute;n</label>
        <textarea name="descripcion" required><?php echo $fila['descripcion']; ?></textarea>

        <button type="submit">Actualizar envio</button>

        <a href="index.php" class="volver">Volver al panel</a>

    </form>

</div>

</body>
</html>
