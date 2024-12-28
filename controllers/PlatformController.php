<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/PlatForm.php');
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/inserMovie.php');

// Función que lista las plataformas, directores y actores
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
