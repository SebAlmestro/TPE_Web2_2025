
<?php
class BandaView
{
    public function showBandas($bandas)
    {
        $count = count($bandas);
        require_once './templates/bandas/lista_bandas.phtml';
    }
    public function showBanda($banda) {
        $bandaData = $banda;
        require './templates/bandas/banda_particular.phtml';
    }
    public function showAgregarBanda(){
        include_once './templates/bandas/form_alta_bandas.phtml';
    }
    public function showEditarBanda($banda){
        include_once './templates/bandas/form_editar_bandas.phtml';
    }
    public function showError($error)
    {
        echo "<h1>$error</h1>";
    }
}
