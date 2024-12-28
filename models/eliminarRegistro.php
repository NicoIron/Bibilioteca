<?php
class eliminarRegistro
{
    private $conecDB;

    public function __construct($conecDB)
    {
        $this->conecDB = $conecDB;
    }

    //Buscar Registro de Actor que quiero Eliminar
    function eliminarRegistroActor($platformId)
    {
        // Convertir el ID a entero y asignarlo a $id
        $id = (int)$platformId;

        // Verificar si el ID es mayor que 0 (ya que 0 no es un ID válido)
        if ($id <= 0) {
            echo "El ID debe ser un número entero válido mayor que 0. ID recibido: $id";
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
            return true; // Eliminación exitosa
        } else {
            echo "Error al eliminar el director con ID $id.";
            return false; // Error en la eliminación
        }
    }
}
