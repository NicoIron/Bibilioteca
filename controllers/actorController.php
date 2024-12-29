<?php
require_once('../models/PlatFormActorModel.php');
// Verifica si la clase está disponible



function consultarActores()
{
    $model = new PlatFormActorModel();

    //consultar Lista de Actores
    $platFormActor = $model->listActor();

    return ['platFormActor' => $platFormActor];
}
//obtener lista de Actores
$data = consultarActores();
$platFormActor = $data['platFormActor'];
