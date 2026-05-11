<?php
include("conexion.php");

$sql = "SELECT * FROM envios";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Envíos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="container">

    <h1>Gestión de Envíos</h1>

    <a href="crear.php" class="btn">+ Nuevo Envío</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Destinatario</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

        <?php while($fila = $resultado->fetch_assoc()) { ?>

            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['destinatario']; ?></td>
                <td><?php echo $fila['direccion']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>

                <td>
                    <a class="editar" href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>

                    <a class="eliminar"
                       href="eliminar.php?id=<?php echo $fila['id']; ?>"
                       onclick="return confirm('¿Desea eliminar este envío?')">
                       Eliminar
                    </a>
                </td>
            </tr>

        <?php } ?>

        </tbody>
    </table>

</div>

</body>
</html>

