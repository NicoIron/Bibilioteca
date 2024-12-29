<?php
require_once('../controllers/PlatformController.php');
require_once('../controllers/eliminarDirectorController.php');

// Aquí el controlador ya te pasa $data, así que accedes directamente a las listas
$DirectList = $data['platformDirect'];

// Verificar si hay un mensaje de error en la URL
$errorMessage = isset($_GET['error']) ? $_GET['error'] : '';
$successMessage = isset($_GET['success']) ? '¡Director eliminado con éxito!' : '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado De Directores</title>
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
        <h2 class="form-title">Listado De Directores</h2>

        <!-- Mostrar mensaje de error si existe -->
        <?php if ($errorMessage): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>

        <!-- Mostrar mensaje de éxito si existe -->
        <?php if ($successMessage): ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($successMessage); ?>
            </div>
        <?php endif; ?>

        <form action="../controllers/eliminarDirectorController.php" method="POST">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Director</th>
                        <th>Apellido Director</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($DirectList as $itemDirect): ?>
                        <tr>
                            <td><?php echo $itemDirect->getId(); ?></td>
                            <td><?php echo $itemDirect->getName(); ?></td>
                            <td><?php echo $itemDirect->getApellidoDirector(); ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $itemDirect->getId(); ?>">Editar</a>

                                    <!-- Formulario de eliminación -->
                                    <input type="hidden" name="platformId" value="<?php echo $itemDirect->getId(); ?>" />
                                    <button type="submit" class="btn btn-danger" name="BorrarItemDirector">Borrar</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>

        <div class="d-grid gap-2">
            <a href="../index.html" class="btn btn-secondary">Volver a la Página Principal</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>