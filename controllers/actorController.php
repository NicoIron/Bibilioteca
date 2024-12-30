<?php
require_once('../models/PlatFormActorModel.php');
// Verifica si la clase está disponible



function consultarActores()
{
    $model = new PlatFormActorModel();

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
        header("Location: ../views/ViewActores.php?error=" . urlencode($resultado));
        exit;
    } else {
        header("Location: ../views/ViewActores.php?success=Eliminacion Exitosa" . urlencode($resultado));
        exit;
    }
}


// Actualizar register_shutdown_function


if (isset($_GET['actorIdEditar'])) {
    $actorId = $_GET['actorIdEditar'];
    $actorModel = new PlatFormActorModel();

    $actorParaEditar = $actorModel->cargarActorPorId($actorId);

    // Verificar si el actor fue encontrado
    if ($actorParaEditar) {
        // Ahora puedes pasar $actorParaEditar a la vista para mostrar sus datos
        include('../views/ViewActores.php');
        exit;
    } else {
        // Si no se encuentra el actor, redirigir o mostrar un mensaje
        echo "Actor no encontrado.";
        exit;
    }
}



// Verificar si el formulario de actualización fue enviado
if (isset($_POST['ActualizarActor'])) {
    // Obtén los datos del formulario
    $actorId = $_POST['actorId'];
    $nombreActor = $_POST['nombreActor'];
    $apellidoActor = $_POST['apellidoActor'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $nacionalidad = $_POST['nacionalidad'];

    // Llama al método para actualizar el actor
    $actorModel = new PlatFormActorModel();
    $actorModel->actualizarActor($actorId, $nombreActor, $apellidoActor, $fechaNacimiento, $nacionalidad);

    // Redirige o muestra un mensaje de éxito
    header("Location: ../views/ViewActores.php?successActualizar=Actualización Exitosa");
    exit();
}
