
<?php
class BandaView
{
    public function showBandas($bandas)
    {
        $count = count($bandas);
        // NOTA: el template va a poder acceder a todas las variables y
        // constantes que tienen alcance en esta funcion
        require_once './templates/bandas/lista_bandas.php';
    }
    public function showBanda($banda) {
        $bandaData = $banda;
        require './templates/bandas/banda_particular.php';
    }
    public function showAgregarBanda()
    {
        include_once './templates/bandas/form_alta_bandas.php';
    }
    public function showError($error)
    {
        echo "<h1>$error</h1>";
    }
}