<?php
class eliminarRegistro
{
    private $conecDB;
    public function __constructor($conecDB)
    {
        $this->conecDB = $conecDB;
    }

    //Buscar Registro de Actor que quiero Eliminar
    function eliminarRegistroActor($valorRegistroEliminar)
    {
        $sentencia = $this->conecDB->prepare("SELECT count(*) FROM Actores where Nombre_Actor = ?");
        $sentencia->bind_param('s', $valorRegistroEliminar);
        if (!$sentencia->execute()) {
            echo "Error al eliminar el registro: " . $this->conecDB->error;
            return false;
        }
        $resultado = $sentencia->get_result();
        $registro = $resultado->fetch_assoc();
        $sentencia->close();

        // Si no se encontró ningún registro, retornamos falso
        // Validar si el registro no existe o si no coincide
        if ($registro != null) {
            // Eliminar el registro
            $sentencia = $this->conecDB->prepare("DELETE FROM Actores WHERE Nombre_Actor = ?");
            $sentencia->bind_param('s', $valorRegistroEliminar);
            $resultadoEliminacion = $sentencia->execute();
            $sentencia->close();

            return $resultadoEliminacion;
        } else {
            return false; // No hay registro para eliminar
        }
    }
}
