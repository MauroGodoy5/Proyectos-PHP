<?php
function Validar_Datos() {
    $vMensaje='';
    
    if (strlen($_POST['titulo']) < 5) {
        $vMensaje.='Debes ingresar un titulo con al menos 5 caracteres. <br />';
    }
    if (strlen($_POST['descripcion']) < 10) {
        $vMensaje.='La descripcion no debe tener menos de 10 caracteres. <br />';
    }


    return $vMensaje;

}
?>