<?php

//aqui estan  todas las funciones que calculan las diferentes operaciones que el parcial pide, trate de ser lo mas especifico en el nombre de las funciones para que se entienda que hace cada una
function CalcularStockFinal($Stock_inicial,$Cantidad_pedida){

    $StockDefinitivo = ($Stock_inicial - $Cantidad_pedida);

    return $StockDefinitivo;
    }

function CalcularSubtotal($Cantidad,$precio_Unitario){
    $Subtotal = ($Cantidad * $precio_Unitario);

    return $Subtotal;
}

function CalcularDescuento($Descuento,$subtotal,$precio_Unitario){
    if($precio_Unitario>5000){
    $Descuento= ($subtotal*0.1);
    }
    return $Descuento;
}

function CalcularTotal($subtotal,$Descuento){
    $Total= ($subtotal-$Descuento);

    return $Total;
}

function ValidarEstrellaDescuento($Estrellas,$Descripcion,$Descuentos){
    if($Descuentos==true){
        
        echo $Descripcion,$Estrellas;
    }
}









?>