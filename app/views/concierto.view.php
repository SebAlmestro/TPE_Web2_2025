<?php
class ConciertoView
{
    public function showConciertos($conciertos)
    {
        $count = count($conciertos);
        // NOTA: el template va a poder acceder a todas las variables y
        // constantes que tienen alcance en esta funcion
        require_once './templates/conciertos/lista_conciertos.phtml';
    }
    public function showConcierto($concierto) {
        $conciertoData = $concierto;
        require './templates/conciertos/concierto_particular.phtml';
    }
    public function showError($error)
    {
        echo "<h1>$error</h1>";
    }
}