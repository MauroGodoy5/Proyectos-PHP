<html>
<Title> Consultas por Departamento </Title>
<Body>
<?php
require ("Conexion.php");
$idCone = conexion();
$DepX = $_REQUEST["DepX"];
$SQL = "SELECT Legajo, Nombre, Sueldo
FROM personas Where (Departamento LIKE '%$DepX%' )";
$query1= "SELECT count(*) FROM personas WHERE Departamento = 'departamento de comercializacion'";
$query2= "SELECT count(*) FROM personas WHERE Departamento = 'departamento de ventas'";
$query3= "SELECT count(*) FROM personas WHERE Departamento = 'departamento de logistica'";
echo "<H2>". "Consultas";
echo "<HR>";
echo "<Table border=1 Align=Center width=90%>";
echo "<TR>";
echo "<TH>" . "Nro";
echo "<TH>" . "Legajo";
echo "<TH>" . "Nombre";
echo "<TH>" . "Sueldo";
echo "</TR>";
$contador = 0;
$Registro = mysql_query($SQL,$idCone);
while($Fila = mysql_fetch_array($Registro))
{
 $contador++;
 echo "<Tr>";
 echo "<Td align=Center>" . $contador;
 echo "<Td>" . $Fila["Legajo"];
 echo "<Td>" . $Fila["Nombre"];
 echo "<Td align=Center>" . $Fila["Sueldo"];
 echo "<Tr>";
}
echo "</Table>";
mysql_free_result ($Registro);
mysql_close($idCone);
?>
</Body>
</Html>