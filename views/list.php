<?php
require_once('../controllers/PlatformController.php');
require_once('../controllers/eliminarActorController.php');


// Aquí asumo que el controlador ya te pasa $data, así que accedes directamente a las listas
$DirectList = $data['platformDirect'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca De Directores</title>
    <!-- Incluir Bootstrap si lo necesitas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="col-12">
        <h1>Listado De Directores</h1>
        <?php if (count($DirectList) > 0): ?>
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

                                    <!-- Corregir el formulario de eliminación -->
                                    <form action="../controllers/eliminarActorController.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="platformId" value="<?php echo $itemDirect->getId(); ?>" />
                                        <button type="submit" class="btn btn-danger" name="BorrarItemDirector">Borrar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                Aún no existen Peliculas.
            </div>
        <?php endif; ?>
    </div>
    <!-- Incluir Bootstrap JS para funcionalidades de formularios si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>