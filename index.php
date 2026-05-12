<?php
include("conexion.php");

$sql = "SELECT * FROM envios";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gesti&oacute;n de Env&iacute;os</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="container">

    <section class="hero">
        <div class="hero-copy">
            <div>
                <div class="eyebrow">Panel logistico</div>
                <h1>Gesti&oacute;n de Env&iacute;os</h1>
                <p>Organiza destinatarios, direcciones y detalles de cada paquete con una vista moderna, clara y facil de usar.</p>
            </div>

            <div class="hero-actions">
                <a href="crear.php" class="btn btn-crear">
                    <span class="btn-icon">+</span> Nuevo Env&iacute;o
                </a>
                <a href="#tabla-envios" class="btn btn-secundario">
                    Ver registros
                </a>
            </div>
        </div>

        <aside class="hero-card">
            <strong><?php echo $resultado->num_rows; ?></strong>
            <span>env&iacute;os registrados en el sistema</span>
        </aside>
    </section>

    <div class="table-panel" id="tabla-envios">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Destinatario</th>
                    <th>Direcci&oacute;n</th>
                    <th>Descripci&oacute;n</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            <?php while($fila = $resultado->fetch_assoc()) { ?>

                <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['destinatario']; ?></td>
                    <td><?php echo $fila['direccion']; ?></td>
                    <td><?php echo $fila['descripcion']; ?></td>

                    <td>
                        <a class="editar" href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>

                        <a class="eliminar"
                           href="eliminar.php?id=<?php echo $fila['id']; ?>"
                           onclick="return confirm('&iquest;Desea eliminar este envio?')">
                           Eliminar
                        </a>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>
