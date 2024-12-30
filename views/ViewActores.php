<?php
require_once('../controllers/actorController.php');  // Controlador para manejar la lógica de actores

// Aquí asumo que el controlador te pasa los datos, así que accedes directamente a la lista
$ActorList = $data['platFormActor'];

// Verificar si hay un mensaje de error o éxito en la URL
$errorMessage = isset($_GET['error']) ? $_GET['error'] : '';
$successMessage = isset($_GET['success']) ? '¡Actor eliminado con éxito!' : '';

// Verificar si hay un actor a editar a partir del ID en la URL
$actorIdEditar = isset($_GET['actorIdEditar']) ? $_GET['actorIdEditar'] : null;
$actorParaEditar = null;

// Si existe el ID de actor a editar, buscar el actor
if ($actorIdEditar) {
    foreach ($ActorList as $actor) {
        if ($actor->getIdActor() == $actorIdEditar) {
            $actorParaEditar = $actor;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado De Actores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
            color: rgba(0, 0, 0, 0.93);
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .btn-custom {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="form-title">Listado De Actores</h2>

        <!-- Mostrar mensaje de error si existe -->
        <?php
        if ($errorMessage) {
        ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php
        }
        ?>

        <!-- Mostrar mensaje de éxito si existe -->
        <?php
        if ($successMessage) {
        ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php
        }
        ?>

        <!-- Mostrar la lista de actores solo si no estamos editando a un actor -->
        <?php
        if (!$actorParaEditar) {
        ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Actor</th>
                        <th>Apellido Actor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ActorList as $actor) {
                    ?>
                        <tr>
                            <td><?php echo $actor->getIdActor(); ?></td>
                            <td><?php echo $actor->getNameActor(); ?></td>
                            <td><?php echo $actor->getApellidoActor(); ?></td>
                            <td>
                                <!-- Formulario de editar -->
                                <form action="" method="GET">
                                    <input type="hidden" name="actorIdEditar" value="<?php echo $actor->getIdActor(); ?>" />
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                </form>
                                <!-- Formulario de eliminación -->
                                <form action="../controllers/actorController.php" method="POST">
                                    <input type="hidden" name="actorIdBorrar" value="<?php echo $actor->getIdActor(); ?>" />
                                    <button type="submit" class="btn btn-danger" name="BorrarItemActor" value="1">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>

        <!-- Mostrar solo el formulario del actor seleccionado para editar -->
        <?php
        if ($actorParaEditar) {
        ?>
            <h3>Editar Actor</h3>
            <form action="../controllers/actorController.php" method="POST">
                <input type="hidden" name="actorId" value="<?php echo $actorParaEditar->getIdActor(); ?>" />

                <div class="mb-3">
                    <label for="nombreActor" class="form-label">Nombre Actor</label>
                    <input type="text" class="form-control" id="nombreActor" name="nombreActor" value="<?php echo $actorParaEditar->getNameActor(); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="apellidoActor" class="form-label">Apellido Actor</label>
                    <input type="text" class="form-control" id="apellidoActor" name="apellidoActor" value="<?php echo $actorParaEditar->getApellidoActor(); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $actorParaEditar->getFechaNacimiActor(); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?php echo $actorParaEditar->getNacionalidadActor(); ?>" required>
                </div>

                <button type="submit" class="btn btn-primary" name="ActualizarActor">Actualizar Actor</button>
            </form>
        <?php
        }
        ?>

        <div class="d-grid gap-2">
            <a href="../index.html" class="btn btn-secondary">Volver a la Página Principal</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>