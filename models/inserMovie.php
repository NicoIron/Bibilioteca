<?php
class insertMovie
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Función para verificar si la serie ya existe
    public function serieExistente($nombreSerie)
    {
        // Preparamos la consulta para verificar si la serie ya existe
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM Series WHERE Titulo_Serie = ?");
        $stmt->bind_param('s', $nombreSerie); // Vinculamos el parámetro de entrada
        $stmt->execute();

        // Obtenemos el resultado de la consulta
        $stmt->bind_result($count);
        $stmt->fetch();

        // Cerramos la consulta
        $stmt->close();

        // Si el conteo es mayor que 0, significa que ya existe una serie con ese nombre
        return $count > 0;
    }

    // Función para insertar una nueva serie
    function insertSerie($nombreSerie, $idPlataforma, $idDirector, $idActor, $idIdioma, $idiomaAudio, $idiomaSubtitulo)
    {
        // Crear conexión con la base de datos
        $model = new PlatForm();
        $conn = $model->initDB();

        // Convertir valores de audio y subtítulos a enteros válidos (0 o 1)
        $idiomaAudio = isset($idiomaAudio) && $idiomaAudio ? 1 : 0;
        $idiomaSubtitulo = isset($idiomaSubtitulo) && $idiomaSubtitulo ? 1 : 0;

        // Preparar la consulta
        $stmt = $conn->prepare("
        INSERT INTO Series 
        (Titulo_Serie, IDPlataforma_serie, IDDirector_Serie, IDActores_serie, IDIdiomas_serie, IdiomaAudio_Idioma, IdiomaSubtitulo_Idioma) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

        if (!$stmt) {
            die("Error al preparar la consulta: " . $conn->error);
        }

        // Asignar los parámetros- me toco hacerlo ya que no pude de otra manera
        $stmt->bind_param(
            'siiiiii',
            $nombreSerie,
            $idPlataforma,
            $idDirector,
            $idActor,
            $idIdioma,
            $idiomaAudio,
            $idiomaSubtitulo
        );

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">Serie creada con éxito.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al crear la serie: ' . $stmt->error . '</div>';
        }

        // Cerrar el query y la conexión
        $stmt->close();
        $conn->close();
    }
}
