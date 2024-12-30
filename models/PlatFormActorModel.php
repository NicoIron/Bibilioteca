<?php
require_once('../models/PlatForm.php');
class PlatFormActorModel
{

    private $id_Actor;
    private $nameActor;
    private $apelliActor;
    private $fechNacimientoActor;
    private $nacinalidadActor;

    public function __construct($id_Actor = null, $nameActor = null, $apelliActor = null, $fechNacimientoActor = null, $nacinalidadActor = null)
    {

        $this->id_Actor = $id_Actor;
        $this->nameActor = $nameActor;
        $this->apelliActor = $apelliActor;
        $this->fechNacimientoActor = $fechNacimientoActor;
        $this->nacinalidadActor = $nacinalidadActor;
    }


    public function getIdActor()
    {
        return $this->id_Actor;
    }

    public function getNameActor()
    {
        return $this->nameActor;
    }
    public function getApellidoActor()
    {
        return $this->apelliActor;
    }

    public function getFechaNacimiActor()
    {
        return $this->fechNacimientoActor;
    }

    public function getNacionalidadActor()
    {
        return $this->nacinalidadActor;
    }

    public function setIdActor($id_Actor)
    {
        $this->id_Actor = $id_Actor;
    }

    public function setNameActor($nameActor)
    {
        $this->nameActor = $nameActor;
    }

    public function setApellidoActor($apelliActor)
    {
        $this->apelliActor = $apelliActor;
    }

    public function setFechaNacimiActor($fechNacimientoActor)
    {
        $this->fechNacimientoActor = $fechNacimientoActor;
    }

    public function setNacionalidadActor($nacinalidadActor)
    {
        $this->nacinalidadActor = $nacinalidadActor;
    }



    function listActor()
    {
        // Crea una instancia de la clase PlatForm y llama a la función de conexión
        $iniciaDB = new PlatForm();
        $mysqli = $iniciaDB->initDB();
        $query = $mysqli->query("SELECT * FROM Actores");
        $listActores = [];

        while ($itemListActor = $query->fetch_assoc()) {
            $item = new PlatFormActorModel(
                $itemListActor["ID_Actor"],
                $itemListActor["Nombre_Actor"],
                $itemListActor["Apellidos_Actor"],
                $itemListActor["FechaNacimiento_Actor"],
                $itemListActor["Nacionalidad_Actor"]
            );
            array_push($listActores, $item);
        }

        $mysqli->close();
        return $listActores;
    }

    function VerificarRelacionesActor($idActor)
    {
        $iniciaDB = new PlatForm();
        $mysqli = $iniciaDB->initDB();

        $sentencia = $mysqli->prepare("SELECT COUNT(*) AS total FROM Series WHERE IDActores_serie = ?");
        $sentencia->bind_param('i', $idActor);

        // Ejecutar la consulta
        if (!$sentencia->execute()) {
            echo "Error al ejecutar la consulta de verificación de series: " . $mysqli->error;
            return false;
        }

        // Obtener el resultado de la consulta
        $resultado = $sentencia->get_result();
        $registro = $resultado->fetch_assoc();
        $sentencia->close();

        // Si hay series asociadas, retornar true
        return $registro['total'] > 0;
    }

    function eliminarActor($idActor)
    {

        $iniciaDB = new PlatForm();
        $mysqli = $iniciaDB->initDB();

        $sentencia  = $mysqli->prepare("SELECT COUNT(*) AS total from Actores where ID_Actor = ?");
        $sentencia->bind_param('i', $idActor);

        //EJECUTAR CONSULTA
        if (!$sentencia->execute()) {
            return false;
        }
        $resultado = $sentencia->get_result();
        $arrayList = $resultado->fetch_assoc();
        $sentencia->close();

        if ($arrayList['total'] == 0) {
            echo "No se encontro Actor a eliminar con el ID $idActor: ";
            return false;
        } else {
            $sentencia = $mysqli->prepare("DELETE FROM Actores where ID_Actor = ?");
            $sentencia->bind_param('i', $idActor);

            $resultadoEliminacion = $sentencia->execute();
            $sentencia->close();

            if ($resultadoEliminacion) {
                echo "Eliminacion exitosa del actor $idActor";
                return true;
            } else {
                echo "Error al eliminar $idActor ";
                return false;
            }
        }
    }

    function actualizarActor() {}
}
