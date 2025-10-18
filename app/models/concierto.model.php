<?php

class ConciertoModel
{
    private $PDO;

    
    public function __construct () {
        include_once 'config/config.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO
    public function getConciertos()
    {

        $query = $this->PDO->prepare('SELECT * FROM concierto');
        $query->execute();


        $conciertos = $query->fetchAll(PDO::FETCH_OBJ);

        return $conciertos;
    }
    public function getConcierto($id)
    {
        $query = $this->PDO->prepare('SELECT * FROM concierto WHERE id_concierto = ?');
        $query->execute([$id]);
        $concierto = $query->fetch(PDO::FETCH_OBJ);

        return $concierto;
    }
    public function addConcierto($fecha, $horario, $lugar, $ciudad, $id_banda)
    {
        $query = $this->PDO->prepare(
            'INSERT INTO concierto (Fecha, Horario, Lugar, Ciudad, id_banda)
            VALUES (?, ?, ?, ?, ?)'
        );

        $query->execute([$fecha, $horario, $lugar, $ciudad, $id_banda]);

        header("Location: " . BASE_URL . "conciertos");
    }
    public function deleteConcierto($id)
    {
        $query = $this->PDO->prepare('DELETE FROM concierto WHERE `concierto`.`id_concierto` = ?');
        $query->execute([$id]);
        header("Location: /conciertos");
    }
    public function editarConcierto($id, $fecha, $horario, $lugar, $ciudad, $id_banda)
    {
        $query = $this->PDO->prepare('UPDATE concierto SET Fecha = ?, Horario = ?, Lugar = ?, Ciudad = ?, id_banda = ? WHERE id_concierto = ?');
        $query->execute([$fecha, $horario, $lugar, $ciudad, $id_banda, $id]);
    }
}
