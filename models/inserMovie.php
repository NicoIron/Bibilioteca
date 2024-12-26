<?php
require_once('/Users/adminvass/Documents/Maestria/Back_End/Actividad1/Proyecto_2/models/PlatForm.php');
class insertMovie
{

    private $id;
    private $tituloMovie;
    private $idPlataforma_serie; //tengo que sacarlo en una lista
    private $IdDirector_Serie;
    private $IdActor_Serie;
    private $idIdioma_Serie;
    private $idiomaAudio;
    private $idiomaSubtitulo;

    public function __construct($idMovie = null, $idTituloMovie = null, $idPlataformaSerie = null, $idDirectorSerie = null, $idActorSerie = null, $idIdiomaSerie = null)
    {
        $this->id = $idMovie;
        $this->tituloMovie = $idTituloMovie;
        $this->idPlataforma_serie = $idPlataformaSerie;
        $this->IdDirector_Serie = $idDirectorSerie;
        $this->IdActor_Serie = $idActorSerie;
        $this->idIdioma_Serie = $idIdiomaSerie;
    }

    public function setIdiomaSerie($idIdioma_Serie)
    {
        $this->idIdioma_Serie = $idIdioma_Serie;
    }

    public function setIdActor_Serie($IdActor_Serie)
    {
        $this->IdActor_Serie = $IdActor_Serie;
    }

    public function setIdDirector_Serie($IdDirector_Serie)
    {
        $this->IdDirector_Serie = $IdDirector_Serie;
    }

    public function setTituloMovie($tituloMovie)
    {
        $this->tituloMovie = $tituloMovie;
    }

    public function setIdPlataforma_serie($idPlataforma_serie)
    {
        $this->idPlataforma_serie = $idPlataforma_serie;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTituloMovie()
    {
        return $this->tituloMovie;
    }

    public function getIdPlataforma_serie()
    {
        return $this->idPlataforma_serie;
    }

    public function getIdDirector_Serie()
    {
        return $this->IdDirector_Serie;
    }

    public function getIdActor_Serie()
    {
        return $this->IdActor_Serie;
    }

    public function getIdIdioma_Serie()
    {
        return $this->idIdioma_Serie;
    }



    public function funct_insertSerie()
    {
        $platFormCreate = false;

        $platfom = new platForm();
        $mysqli = $platfom->initDB();

        if ($resulInsert = $mysqli->query("INSERT INTO Series (ID_Serie, Titulo_Serie, IDPlataforma_serie, IDDirector_Serie, IDActores_serie, IDIdiomas_serie,IdiomaAudio_Idioma,IdiomaSubtitulo_Idioma)
              VALUES ('$this->id', '$this->tituloMovie', '$this->idPlataforma_serie', '$this->IdDirector_Serie', '$this->IdActor_Serie', '$this->idIdioma_Serie')")) {
            $platFormCreate = true;
        }
        $mysqli->close();
    }
}
