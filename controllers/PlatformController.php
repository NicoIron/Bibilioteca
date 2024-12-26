<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/PlatForm.php');
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/inserMovie.php');

function listSeries()
{
    $model = new PlatForm();
    $peliculaList = $model->consultMovie();
    $plataformList = $model->consulListPlataforma();

    return [
        'peliculaList' => $peliculaList,
        'plataformList' => $plataformList
    ];
}

function insertSerie($platformName)
{
    $newPlatform = new insertMovie(null, $platformName);
    $platFormCreate = $newPlatform->funct_insertSerie();
    return $platFormCreate;
}

$data = listSeries();

// Pasamos esos datos a la vista
$peliculaList = $data['peliculaList'];
$plataformList = $data['plataformList'];
