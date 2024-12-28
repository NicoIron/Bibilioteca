<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/PlatForm.php');
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/eliminarRegistro.php');



function eliminarController($platformId)
{
    // Crear una instancia del modelo PlatForm
    $model = new PlatForm();

    // Obtener la conexión a la base de datos
    $conn = $model->initDB();

    // Crear una instancia de la clase insertMovie
    $newPlatform = new eliminarRegistro($conn);

    // ingresar a la funcion de la calse Eliminar Registro donde validaremos la eliminacion del actor
    return $newPlatform->eliminarRegistroActor($platformId);
}

// Verificar si se ha enviado el formulario de eliminación
if (isset($_POST['BorrarItemDirector']) && isset($_POST['platformId'])) {
    // Obtener el ID del director desde el formulario
    $platformId = $_POST['platformId'];

    // Depuración: Verificar el valor recibido
    var_dump($platformId);  // Depurar el ID

    // Convertir el valor de $platformId a entero y guardarlo en una nueva variable
    $platformIdInt = (int) $platformId;

    // Depurar el valor convertido
    var_dump($platformIdInt); // Verificar que se haya convertido a entero

    // Verificar si el ID convertido es válido
    if ($platformIdInt <= 0) {
        echo "El ID debe ser un número entero.";
        exit;
    }

    // Llamar a la función que eliminará el registro con el ID convertido
    $resultado = eliminarController($platformIdInt);

    // Redirigir después de la eliminación para evitar un reenvío del formulario
    if ($resultado) {
        header("Location: list.php"); // Cambia a la página que quieras
        exit;
    } else {
        echo "Error al eliminar el registro.";
    }
}
