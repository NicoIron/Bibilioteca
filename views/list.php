<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/controllers/PlatformController.php')
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="col-12">
        <h1>Listado Plataformas</h1>
        <?php
        $platformList = listPlatform();
        if (count($platformList) > 0) {
        ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Serie</th>
                        <th>Otro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($platformList as $platfomr) {

                    ?>
                        <tr>
                            <td><?php echo $platfomr->getId(); ?></td>
                            <td><?php echo $platfomr->getName(); ?></td>
                            <td>
                                <div class="btn_-group" role="group" arial-label="Basic example">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $platfomr->getId(); ?>">Editar</a>

                                    <form action="delete_platform" action="delete.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="platformId" value="<?php echo $platfomr->getId(); ?>" />
                                        <button type="subimt" class="btn btn-danget">Borrar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div class="alert alert-warning" role="alert">aún no existen plataformas</div>
        <?php
        }
        ?>
    </div>
</body>

</html>