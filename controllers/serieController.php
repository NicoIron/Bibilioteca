<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/PlatForm.php');
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/inserMovie.php');

function listSeries()
{
    // Crear una instancia del modelo PlatForm
    $model = new PlatForm();

    // Obtener la conexión a la base de datos desde el método initDB()
    $conn = $model->initDB();

    // Consultar la lista de directores, plataformas, actores
    $peliculaList = $model->consultDirector();
    $plataformList = $model->consulListPlataforma();
    $platformDirect = $model->consultDirector();
    $platformActor = $model->consultActor();

    return [
        'peliculaList' => $peliculaList,
        'plataformList' => $plataformList,
        'platformDirect' => $platformDirect,
        'platformActor' => $platformActor
    ];
}
// Obtener la lista de plataformas y directores
$data = listSeries();
$peliculaList = $data['peliculaList'];
$plataformList = $data['plataformList'];
$platformDirect = $data['platformDirect'];
$platformActor = $data['platformActor'];


// Función para validar si el nombre de la serie ya existe
function serieExistente($nombreSerie)
{
    // Crear una instancia del modelo PlatForm
    $model = new PlatForm();

    // Obtener la conexión a la base de datos
    $conn = $model->initDB();

    // Crear una instancia de la clase insertMovie
    $newPlatform = new insertMovie($conn);

    // Verificar si la serie ya existe
    return $newPlatform->serieExistenteMolde($nombreSerie);
}

// Función para insertar una serie
function insertSerie($nombreSerie, $idPlataforma, $idDirector, $idActor, $idIdioma, $idiomaAudio, $idiomaSubtitulo)
{
    // Crear una instancia del modelo PlatForm
    $model = new PlatForm();

    // Obtener la conexión a la base de datos
    $conn = $model->initDB();

    // Crear una instancia de la clase insertMovie
    $newPlatform = new insertMovie($conn);

    // Insertar la nueva serie
    $newPlatform->insertSerieModel($nombreSerie, $idPlataforma, $idDirector, $idActor, $idIdioma, $idiomaAudio, $idiomaSubtitulo);

    return 'Serie creada con éxito.';
}


// Verificar si el formulario ha sido enviado, para crear Serie
if (isset($_POST['createBtn'])) {
    // Recoger los datos del formulario
    $nombreSerie = $_POST['nombreSerie'];
    $idPlataforma = $_POST['id_plataforma'];
    $idDirectorSerie = $_POST['idDirectorSerie'];
    $idActoresSerie = $_POST['idActoresSerie'];
    $idIdioma = $_POST['id_idioma'];

    $idiomaAudio = isset($_POST['idiomaAudio']) ? $_POST['idiomaAudio'] : null;
    $idiomaSubtitulo = isset($_POST['idiomaSubtitulo']) ? $_POST['idiomaSubtitulo'] : null;


    // Primero verificar si la serie ya existe
    if (serieExistente($nombreSerie)) {
        // Si la serie ya existe, mostrar un mensaje de error
        echo '<div class="alert alert-danger" role="alert">Ya existe una serie con ese nombre.</div>';
    } else {
        // Si la serie no existe, proceder a insertarla
        $result = insertSerie($nombreSerie, $idPlataforma, $idDirectorSerie, $idActoresSerie, $idIdioma, $idiomaAudio, $idiomaSubtitulo);
        // Mostrar un mensaje de éxito
        echo '<div class="alert alert-success" role="alert">' . $result . '</div>';
    }
}
