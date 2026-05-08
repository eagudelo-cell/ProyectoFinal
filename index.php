<?php
include("conexion.php");

$accion = $_GET['accion'] ?? 'listar';

/* CREAR */
if ($accion == "crear" && $_POST) {
    $destinatario = $_POST['destinatario'];
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO envios (destinatario, direccion, descripcion)
            VALUES ('$destinatario', '$direccion', '$descripcion')";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    }
}

/* EDITAR */
if ($accion == "editar") {
    $id = $_GET['id'];

    if ($_POST) {
        $destinatario = $_POST['destinatario'];
        $direccion = $_POST['direccion'];
        $descripcion = $_POST['descripcion'];

        $update = "UPDATE envios
                   SET destinatario='$destinatario',
                       direccion='$direccion',
                       descripcion='$descripcion'
                   WHERE id=$id";

        if ($conn->query($update)) {
            header("Location: index.php");
            exit();
        }
    }

    $sql = "SELECT * FROM envios WHERE id=$id";
    $resultado = $conn->query($sql);
    $fila = $resultado->fetch_assoc();
}

/* ELIMINAR */
if ($accion == "eliminar") {
    $id = $_GET['id'];

    $sql = "DELETE FROM envios WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    }
}

/* LISTAR */
$sql = "SELECT * FROM envios ORDER BY created_at DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Envíos</title>

    <style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body{
    background: #f4f6f9;
    color: #333;
    overflow-x: hidden;
}

.container{
    width: 95%;
    max-width: 1200px;
    margin: 20px auto;
    padding: 10px;
}

h1{
    margin-bottom: 20px;
    color: #1f2937;
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    text-align: center;
}

.btn{
    display: inline-block;
    padding: 12px 20px;
    background: #1f2937;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-bottom: 25px;
    font-size: clamp(14px, 2vw, 16px);
}

.btn:hover{
    background: #374151;
}

.cards-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

.card{
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.08);
    transition: transform 0.2s ease;
    width: 100%;
}

.card:hover{
    transform: translateY(-5px);
}

.card h3{
    color: #111827;
    margin-bottom: 12px;
    font-size: clamp(18px, 2vw, 22px);
    word-wrap: break-word;
}

.card p{
    margin-bottom: 10px;
    line-height: 1.5;
    font-size: clamp(14px, 2vw, 16px);
    word-wrap: break-word;
}

.acciones{
    margin-top: 15px;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.editar,
.eliminar{
    flex: 1;
    min-width: 100px;
    text-align: center;
    color: white;
    padding: 10px 12px;
    text-decoration: none;
    border-radius: 4px;
    font-size: clamp(13px, 2vw, 15px);
}

.editar{
    background: #2563eb;
}

.eliminar{
    background: #dc2626;
}

.form-container{
    width: 100%;
    max-width: 500px;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
}

.form-container h2{
    margin-bottom: 20px;
    color: #1f2937;
    text-align: center;
    font-size: clamp(1.5rem, 3vw, 2rem);
}

form label{
    display: block;
    margin-top: 15px;
    margin-bottom: 5px;
    font-size: clamp(14px, 2vw, 16px);
}

form input,
form textarea{
    width: 100%;
    padding: 12px;
    border: 1px solid #d1d5db;
    border-radius: 5px;
    font-size: 16px;
}

form textarea{
    resize: vertical;
    min-height: 100px;
}

button{
    margin-top: 20px;
    width: 100%;
    padding: 14px;
    border: none;
    background: #111827;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-size: clamp(15px, 2vw, 17px);
}

button:hover{
    background: #374151;
}

.volver{
    display: block;
    text-align: center;
    margin-top: 15px;
    text-decoration: none;
    color: #2563eb;
    font-size: clamp(14px, 2vw, 16px);
}

/* TABLETS */
@media (max-width: 768px){
    .container{
        width: 95%;
    }

    .btn{
        width: 100%;
        text-align: center;
    }

    .acciones{
        flex-direction: column;
    }

    .editar,
    .eliminar{
        width: 100%;
    }
}

/* CELULARES */
@media (max-width: 480px){
    .container{
        padding: 5px;
    }

    .card{
        padding: 15px;
    }

    .form-container{
        padding: 20px;
    }

    form input,
    form textarea,
    button{
        font-size: 15px;
    }
}
</style>
    </style>
</head>
<body>

<div class="container">

    <h1>Gestión de Envíos</h1>

    <?php if ($accion == "crear") { ?>

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

    <?php } elseif ($accion == "editar") { ?>

        <div class="form-container">
            <h2>Editar Envío</h2>

            <form method="POST">
                <label>Destinatario</label>
                <input type="text" name="destinatario"
                       value="<?php echo $fila['destinatario']; ?>" required>

                <label>Dirección</label>
                <input type="text" name="direccion"
                       value="<?php echo $fila['direccion']; ?>" required>

                <label>Descripción</label>
                <textarea name="descripcion" required><?php echo $fila['descripcion']; ?></textarea>

                <button type="submit">Actualizar</button>
                <a href="index.php" class="volver">Volver</a>
            </form>
        </div>

    <?php } else { ?>

        <a href="index.php?accion=crear" class="btn">+ Nuevo Envío</a>

        <div class="cards-container">

            <?php while($fila = $resultado->fetch_assoc()) { ?>

                <div class="card">
                    <h3><?php echo $fila['destinatario']; ?></h3>

                    <p><strong>Dirección:</strong> <?php echo $fila['direccion']; ?></p>

                    <p><strong>Descripción:</strong> <?php echo $fila['descripcion']; ?></p>

                    <p><strong>Fecha:</strong>
                        <?php echo date("d/m/Y H:i", strtotime($fila['created_at'])); ?>
                    </p>

                    <div class="acciones">
                        <a class="editar"
                           href="index.php?accion=editar&id=<?php echo $fila['id']; ?>">
                           Editar
                        </a>

                        <a class="eliminar"
                           href="index.php?accion=eliminar&id=<?php echo $fila['id']; ?>"
                           onclick="return confirm('¿Desea eliminar este envío?')">
                           Eliminar
                        </a>
                    </div>
                </div>

            <?php } ?>

        </div>

    <?php } ?>

</div>

</body>
</html>

