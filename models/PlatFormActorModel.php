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
        $mysqli = $iniciaDB->initDB();  // Corregido aquí, no necesitas $this

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
}
