<?php
class platForm
{
    private $id;
    private $name;

    public function __construct($idPlatform = null, $namePlatform = null)
    {
        $this->id = $idPlatform;
        $this->name = $namePlatform;
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



    public function getAll()
    {
        $mysqli = $this->initDB();
        $query = $mysqli->query("select * from Series");
        $listData = [];

        foreach ($query as $item) {
            # code...
            $itemObject = new platForm($item['ID_Serie'], $item['Titulo_Serie']);
            array_push($listData, $itemObject);
        }

        $mysqli->close();
        return $listData;
    }
}
