<?php

class ConciertoModel{
    private $db;

    function __construct()
    {
        // 1. abro conexión con la DB
        $this->db = new PDO('mysql:host=localhost;dbname=conciertos;charset=utf8', 'root', '');
    }
    public function getConciertos()
    {
        // 2. ejecuto la consulta SQL (SELECT * FROM tareas)
        $query = $this->db->prepare('SELECT * FROM concierto');
        $query->execute();

        // 3. obtengo los resultados de la consulta
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
    public function addConcierto($fecha, $horario, $lugar, $ciudad, $id_banda){
        $query = $this -> db->prepare('INSERT INTO `concierto` (`id_concierto`, `Fecha`, `Horario`, `Lugar`, `Ciudad`, `id_banda`) VALUES (null, ?, ?, ?, ?, ?)');
        $query -> execute([$fecha, $horario, $lugar, $ciudad, $id_banda]);

        header("Location: /conciertos");

    }

}