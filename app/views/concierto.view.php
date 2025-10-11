<?php
class ConciertoView
{
    public function showConciertos($conciertos)
    {
        $count = count($conciertos);
        // NOTA: el template va a poder acceder a todas las variables y
        // constantes que tienen alcance en esta funcion
        require_once './templates/conciertos/lista_conciertos.php';
    }
}