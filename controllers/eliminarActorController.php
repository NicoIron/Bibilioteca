<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/PlatForm.php');
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/eliminarRegistro.php');



// Dentro del controlador (eliminarActorController.php)
function eliminarController($platformId)
{
    // Crear una instancia del modelo PlatForm
    $model = new PlatForm();
    $conn = $model->initDB();
    $newPlatform = new eliminarRegistro($conn);

    // Verificar si hay series relacionadas con este director
    $tieneSeries = $newPlatform->verificarSeriesRelacionadas($platformId);

    if ($tieneSeries) {
        // Si tiene series relacionadas, retornamos el mensaje de error
        return "No se puede eliminar el director porque tiene series asociadas.";
    }

    // Si no hay series relacionadas, proceder con la eliminación
    $resultado = $newPlatform->eliminarRegistroActor($platformId);

    if (!$resultado) {
        // Si no se puede eliminar el director, retornamos el mensaje de error
        return "Error al eliminar el registro.";
    }

    // Si la eliminación fue exitosa, retornamos true
    return true;
}

// Verificar si se ha enviado el formulario de eliminación
if (isset($_POST['BorrarItemDirector']) && isset($_POST['platformId'])) {
    $platformId = $_POST['platformId'];
    $platformIdInt = (int) $platformId;

    // Verificar si el ID convertido es válido
    if ($platformIdInt <= 0) {
        echo "El ID debe ser un número entero.";
        exit;
    }

    $resultado = eliminarController($platformIdInt);

    // Si el resultado es un mensaje de error, redirigir con el mensaje
    if ($resultado !== true) {
        header("Location: ../views/list.php?error=" . urlencode($resultado)); // Redirigir con el mensaje de error
        exit;
    }

    // Redirigir si la eliminación fue exitosa
    header("Location: list.php");
    exit;
}
