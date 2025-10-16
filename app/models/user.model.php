<?php
class UserModel{
    private $db;

    function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;dbname=conciertos;charset=utf8', 'root', '');
    }
    public function listarPorUsuario($usuario) {
        $query = $this->db->prepare("SELECT * FROM usuario WHERE nombre = ?");
        $query->execute([$usuario]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}