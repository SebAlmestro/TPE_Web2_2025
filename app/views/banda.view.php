
<?php
class BandaView {
    public function showBandas($bandas) {
        $count = count($bandas);
        // NOTA: el template va a poder acceder a todas las variables y
        // constantes que tienen alcance en esta funcion
        require_once './templates/lista_bandas.php';
    }
    public function showError($error) {
        echo "<h1>$error</h1>";
    }


}