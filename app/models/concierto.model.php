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

}