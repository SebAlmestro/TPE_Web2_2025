<?php
class UserModel{
    private $PDO;

    
    public function __construct () {
        include_once 'config/config.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function listarPorUsuario($usuario) {
        $query = $this->PDO->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $query->execute([$usuario]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
}