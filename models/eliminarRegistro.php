<?php
class eliminarRegistro
{
    private $conecDB;

    public function __construct($conecDB)
    {
        $this->conecDB = $conecDB;
    }

    // Verificar si existen series relacionadas con el director
    function verificarSeriesRelacionadas($platformId)
    {
        $id = (int)$platformId;

        // Verificar si el ID es mayor que 0
        if ($id <= 0) {
            echo "El ID debe ser un número entero válido mayor que 0. ID recibido: $id";
            return false;
        }

        // Preparar la consulta para verificar si existen series relacionadas con este director
        $sentencia = $this->conecDB->prepare("SELECT COUNT(*) AS total FROM series WHERE IDDirector_Serie = ?");
        $sentencia->bind_param('i', $id);

        // Ejecutar la consulta
        if (!$sentencia->execute()) {
            echo "Error al ejecutar la consulta de verificación de series: " . $this->conecDB->error;
            return false;
        }

        // Obtener el resultado de la consulta
        $resultado = $sentencia->get_result();
        $registro = $resultado->fetch_assoc();
        $sentencia->close();

        // Si hay series asociadas, retornar true
        return $registro['total'] > 0;
    }

    // Eliminar el director
    function eliminarRegistroActor($platformId)
    {
        $id = (int)$platformId;

        // Verificar si el ID es mayor que 0
        if ($id <= 0) {
            echo "El ID debe ser un número entero válido mayor que 0.";
            return false;
        }

        // Preparar la consulta para verificar si el director existe
        $sentencia = $this->conecDB->prepare("SELECT COUNT(*) AS total FROM Directores WHERE ID_Director = ?");
        $sentencia->bind_param('i', $id);

        // Ejecutar la consulta
        if (!$sentencia->execute()) {
            echo "Error al ejecutar la consulta de verificación: " . $this->conecDB->error;
            return false;
        }

        // Obtener el resultado de la consulta
        $resultado = $sentencia->get_result();
        $registro = $resultado->fetch_assoc();
        $sentencia->close();

        // Si no se encuentra el director, retornamos false
        if ($registro['total'] == 0) {
            echo "No se encontró el director con el ID $id para eliminar.";
            return false; // No hay director para eliminar
        }

        // Si el director existe, proceder con la eliminación
        $sentencia = $this->conecDB->prepare("DELETE FROM Directores WHERE ID_Director = ?");
        $sentencia->bind_param('i', $id);

        // Ejecutar la sentencia de eliminación
        $resultadoEliminacion = $sentencia->execute();
        $sentencia->close(); // Cerrar la sentencia después de ejecutar el DELETE

        // Retornar el resultado de la eliminación
        if ($resultadoEliminacion) {
            echo "Eliminacion Exitosa al eliminar el director con ID $id.";
            return true; // Eliminación exitosa
        } else {
            echo "Error al eliminar el director con ID $id.";
            return false; // Error en la eliminación
        }
    }
}
