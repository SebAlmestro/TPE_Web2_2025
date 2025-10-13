<?php
class ConciertoView
{
    public function showConciertos($conciertos)
    {
        $count = count($conciertos);
        
        require_once './templates/conciertos/lista_conciertos.phtml';
    }
    public function showConcierto($concierto) {
        $conciertoData = $concierto;
        require './templates/conciertos/concierto_particular.phtml';
    }
    public function showAgregarConcierto(){
        include_once './templates/conciertos/form_alta_conciertos.phtml';
    }
    public function showError($error)
    {
        echo "<h1>$error</h1>";
    }
}