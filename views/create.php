<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/controllers/PlatformController.php');

// Asegúrate de que $data ha sido pasado correctamente desde el controlador
$plataformList = $data['plataformList'];
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

        input[type="text"] {
            color: rgba(0, 0, 0, 0.3);
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
                <input type="text" class="form-control" id="nombreSerie" name="nombreSerie" placeholder="Introduce el nombre de la serie" value="Titulo Serie">
            </div>

            <!-- Campo de idioma de la plataforma -->
            <div class="mb-3">
                <label for="idiomaPlataforma" class="form-label">Idioma de la Plataforma</label>
                <input type="text" class="form-control" id="idiomaPlataforma" name="idiomaPlataforma" placeholder="Introduce el idioma de la plataforma" value="Idioma plataforma">
            </div>

            <!-- Dropdown de Plataformas -->
            <div class="mb-3">
                <label for="Plataforma" class="form-label">Nombre de la plataforma</label>
                <select class="form-control" id="IdPlataforma" name="id_plataforma">
                    <!-- Aquí listamos las plataformas desde el controlador -->
                    <?php
                    foreach ($plataformList as $platform) {
                        echo '<option value="' . $platform->getId() . '">' . $platform->getName() . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Campo de Director de la Serie -->
            <div class="mb-3">
                <label for="DirectorSerie" class="form-label">Director Serie</label>
                <select name="idDirectorSerie" id="id_Director" class="form-control">
                    <option value="1">Director 1</option>
                    <option value="2">Director 2</option>
                    <option value="3">Director 3</option>
                    <option value="4">Director 4</option>
                </select>
            </div>

            <!-- Campo de Actores de la Serie -->
            <div class="mb-3">
                <label for="ActoresSerie" class="form-label">Actores Serie</label>
                <input type="text" class="form-control" id="IdActores" name="id_actores" placeholder="Seleccionar actores" value="Actores Serie">
            </div>

            <!-- Campo de Idioma de Audio -->
            <div class="mb-3">
                <label for="IdiomaAudio" class="form-label">Idioma Audio</label>
                <input type="text" class="form-control" id="IdIdioma" name="id_idioma" placeholder="Seleccionar idioma" value="Idioma Audio">
            </div>

            <!-- Botón para crear -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-custom" name="createBtn">Crear</button>
            </div>
        </form>
    </div>

    <!-- Agregar Bootstrap JS para funcionalidades de formularios si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>