<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/controllers/PlatformController.php');

// Aquí asumo que el controlador ya te pasa $data, así que accedes directamente a las listas
$peliculaList = $data['peliculaList'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Peliculas</title>
    <!-- Incluir Bootstrap si lo necesitas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="col-12">
        <h1>Listado Peliculas</h1>
        <?php if (count($peliculaList) > 0): ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Serie</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peliculaList as $listMovies): ?>
                        <tr>
                            <td><?php echo $listMovies->getId(); ?></td>
                            <td><?php echo $listMovies->getName(); ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $listMovies->getId(); ?>">Editar</a>

                                    <!-- Corregir el formulario de eliminación -->
                                    <form action="delete.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="platformId" value="<?php echo $listMovies->getId(); ?>" />
                                        <button type="submit" class="btn btn-danger">Borrar</button>
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