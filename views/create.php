<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/controllers/PlatformController.php');

// Asegúrate de que $data ha sido pasado correctamente desde el controlador
$plataformList = $data['plataformList'];
$platformDirect = $data['platformDirect'];
$platformActor = $data['platformActor'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Serie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
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
        <h2 class="form-title">Crear Nueva Serie</h2>

        <form action="" method="POST">
            <!-- Campo de nombre de la serie -->
            <div class="mb-3">
                <label for="nombreSerie" class="form-label">Nombre de la Serie</label>
                <input type="text" class="form-control" id="nombreSerie" name="nombreSerie" placeholder="Introduce el nombre de la serie" required>
            </div>

            <!-- Dropdown de Plataformas -->
            <div class="mb-3">
                <label for="IdPlataforma" class="form-label">Nombre de la Plataforma</label>
                <select class="form-control" id="IdPlataforma" name="id_plataforma" required>
                    <?php
                    foreach ($plataformList as $platform) {
                        echo '<option value="' . $platform->getId() . '">' . $platform->getName() . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Dropdown de Directores -->
            <div class="mb-3">
                <label for="idDirector" class="form-label">Director Serie</label>
                <select class="form-control" id="idDirector" name="idDirectorSerie" required>
                    <?php
                    foreach ($platformDirect as $listDirect) {
                        echo '<option value="' . $listDirect->getId() . '">' . $listDirect->getName() . ' ' . $listDirect->getApellidoDirector() . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Dropdown de Actores -->
            <div class="mb-3">
                <label for="idActor" class="form-label">Actores Serie</label>
                <select class="form-control" id="idActor" name="idActoresSerie" required>
                    <?php
                    foreach ($platformActor as $itemActor) {
                        echo '<option value="' . $itemActor->getId() . '">' . $itemActor->getName() . ' ' . $itemActor->getApellidoDirector() . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Dropdown de Idioma -->
            <div class="mb-3">
                <label for="id_idioma" class="form-label">Idioma de la Serie</label>
                <select class="form-control" name="id_idioma" id="id_idioma" required>
                    <option value="1">Español</option>
                    <option value="2">Inglés</option>
                    <option value="3">Francés</option>
                </select>
            </div>

            <!-- Checkbox de Idioma Audio -->
            <div class="mb-3">
                <label class="form-label">Idioma Audio</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="idiomaAudio" id="idiomaAudio" value="1">
                    <label class="form-check-label" for="idiomaAudio">Habilitar</label>
                </div>
            </div>

            <!-- Checkbox de Idioma Subtítulo -->
            <div class="mb-3">
                <label class="form-label">Idioma Subtítulo</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="idiomaSubtitulo" id="idiomaSubtitulo" value="1">
                    <label class="form-check-label" for="idiomaSubtitulo">Habilitar</label>
                </div>
            </div>

            <!-- Botón para crear -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-custom" name="createBtn">Crear</button>
            </div>

            <div class="d-grid gap-2">
                <a href="../index.html" class="btn btn-secundary">Volver a la Pagina Principal</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>