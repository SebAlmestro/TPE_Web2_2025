<?php

class ConciertoModel
{
    private $db;

    function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;dbname=conciertos;charset=utf8', 'root', '');
    }
    public function getConciertos()
    {

        $query = $this->db->prepare('SELECT * FROM concierto');
        $query->execute();


        $conciertos = $query->fetchAll(PDO::FETCH_OBJ);

        return $conciertos;
    }
    public function getConcierto($id)
    {
        $query = $this->db->prepare('SELECT * FROM concierto WHERE id_concierto = ?');
        $query->execute([$id]);
        $concierto = $query->fetch(PDO::FETCH_OBJ);

        return $concierto;
    }
    public function addConcierto($fecha, $horario, $lugar, $ciudad, $id_banda)
    {
        $query = $this->db->prepare(
            'INSERT INTO concierto (Fecha, Horario, Lugar, Ciudad, id_banda)
            VALUES (?, ?, ?, ?, ?)'
        );
    
        $query->execute([$fecha, $horario, $lugar, $ciudad, $id_banda]);
    
        header("Location: " . BASE_URL . "conciertos");
    }
    public function deleteConcierto($id)
    {
        $query = $this->db->prepare('DELETE FROM concierto WHERE `concierto`.`id_concierto` = ?');
        $query->execute([$id]);
        header("Location: /conciertos");
    }
    public function editarConcierto($id, $fecha, $horario, $lugar, $ciudad, $id_banda)
    {
        $query = $this->db->prepare('UPDATE concierto SET Fecha = ?, Horario = ?, Lugar = ?, Ciudad = ? WHERE id_banda = ?');
        $query->execute([$id, $fecha, $horario, $lugar, $ciudad, $id_banda]);
    }
}
