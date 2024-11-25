<html>
<Title> Altas de Personas </Title>
<Body>
<?php
require ("Conexion.php");
$idCone = conexion();
$Legajo = $_REQUEST["legajo"];
$Nombre = $_REQUEST["nombre"];
$Departamento = $_REQUEST["departamento"];
$Sueldo = $_REQUEST["sueldo"];
$SQL = "INSERT INTO personas (Legajo, Nombre, Departamento,
Sueldo)
VALUES ('$Legajo','$Nombre','$Departamento','$Sueldo')";

if (mysql_query ($SQL))
{
echo "<P><H1> La Alta se ha realizado con exito para:
$Nombre</P>";
}
else

{ 

    echo "<P>Se ha producido un error para $Nombre</P>";
}
mysql_close($idCone);
?>
</Body>
</Html> 
