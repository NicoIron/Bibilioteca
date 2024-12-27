<?php
class platForm
{
    private $id;
    private $name;
    private $apellido;

    public function __construct($idPlatform = null, $namePlatform = null, $apellidoDirect = null)
    {
        $this->id = $idPlatform;
        $this->name = $namePlatform;
        $this->apellido = $apellidoDirect;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getApellidoDirector()
    {
        return $this->apellido;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    function initDB()
    {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = 'root';
        $db_nameDB = 'streaming';

        $mysqli = @new mysqli(
            $db_host,
            $db_user,
            $db_pass,
            $db_nameDB
        );

        if ($mysqli->connect_error) {
            die('Error: ' . $mysqli->connect_error . '<br>' . 'error');
        }

        return $mysqli;
    }

    public function serieExistente($nombreSerie)
    {
        $mysqli = $this->initDB();

        // Preparamos la consulta para buscar el nombre de la serie
        $stmt = $mysqli->prepare("SELECT COUNT(*) FROM series WHERE nombre = ?");
        $stmt->bind_param('s', $nombreSerie);  // Vinculamos el parámetro de entrada
        $stmt->execute(); // Ejecutamos la consulta

        // Obtenemos el resultado de la consulta
        $stmt->bind_result($count);
        $stmt->fetch();

        // Cerramos la consulta
        $stmt->close();
        $mysqli->close();

        // Si el conteo es mayor que 0, significa que ya existe una serie con ese nombre
        return $count > 0;
    }


    public function consultActor()
    {
        $mysqli = $this->initDB();
        $query = $mysqli->query("Select * from Actores");
        $listActores = [];

        while ($itemListActor = $query->fetch_assoc()) {
            $item = new platForm(
                $itemListActor["ID_Actor"],
                $itemListActor["Nombre_Actor"],
                $itemListActor["Apellidos_Actor"]
            );
            array_push(
                $listActores,
                $item
            );
        }
        $mysqli->close();
        return $listActores;
    }


    public function consultDirector()
    {
        $mysqli = $this->initDB();
        $query = $mysqli->query("select * from Directores");
        $listDirector = [];

        while ($itemlistDirector = $query->fetch_assoc()) {
            $item = new platForm(
                $itemlistDirector["ID_Director"],
                $itemlistDirector["Nombre_Director"],
                $itemlistDirector["Apellidos_Director"],
                $itemlistDirector["FechaNacimiento_Director"],
                $itemlistDirector["Nacionalidad_Director"]
            );
            array_push($listDirector, $item);
        }

        $mysqli->close();
        return $listDirector;
    }


    public function consulListPlataforma()
    {
        $mysqli = $this->initDB();
        $query = $mysqli->query("SELECT * FROM Plataformas");
        $listPlataformas = [];

        // Utilizamos fetch_assoc() para obtener los resultados como un array asociativo.
        while ($itemPlataform = $query->fetch_assoc()) {
            $item = new PlatForm($itemPlataform["ID_Plataforma"], $itemPlataform["Nombre_Plataforma"]);
            array_push($listPlataformas, $item);
        }

        $mysqli->close();
        return $listPlataformas;
    }
}
