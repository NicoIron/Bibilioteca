<?php
require_once('../models/PlatFormActorModel.php');
// Verifica si la clase está disponible



function consultarActores()
{
    $model = new PlatFormActorModel();

    //consultar Lista de Actores
    $platFormActor = $model->listActor();

    return [
        'platFormActor' => $platFormActor
    ];
}
//obtener lista de Actores
$data = consultarActores();
$platFormActor = $data['platFormActor'];


function eliminarActores($variConvertidaId)
{
    $model  = new PlatFormActorModel();
    $tieneSeries = $model->VerificarRelacionesActor($variConvertidaId);

    if ($tieneSeries) {
        // Si tiene series relacionadas, retornamos el mensaje de error
        return "No se puede eliminar el Actor porque tiene series asociadas.";
    }

    //si no tiene series asociadas
    $eliminarActores = $model->eliminarActor($variConvertidaId);

    if (!$eliminarActores) {
        return "No se puede eliminar Actor, porque tiene series asociadas";
    }
    return true;
}


if (isset($_POST['BorrarItemActor']) && isset($_POST['actorIdBorrar'])) {
    $borrarActorId = $_POST['actorIdBorrar'];
    $variConvertidaId = (int) $borrarActorId;

    $resultado = eliminarActores($variConvertidaId);

    if ($resultado !== true) {
        header("Location: ../views/ViewActores.php?error=" . urlencode($resultado)); // Redirigir con el mensaje de error
        exit;
    } else {
        header("Location: ../views/ViewActores.php?success=1" . urlencode($resultado));
        exit;
    }
}
