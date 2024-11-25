<?php
function conexion()
 {
 $host = "Localhost";
 $usuario = "root";
 $clave = "";
 $BaseDeDato = "empleados";
 $idCone = mysql_connect ($host, $usuario, $clave) or
 die ("Error conectando al servidor $host con el
 nombre de usuario $usuario");
 mysql_select_db ($BaseDeDato, $idCone) or
 die ("Error seleccionando la base de datos");
 return $idCone;
 }
 ?>