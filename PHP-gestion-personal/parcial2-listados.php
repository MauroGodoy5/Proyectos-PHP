
<?Php
require("conexion.php");
$idCone = conexion();
echo "<H2>". "Listado Completo";
echo "<HR>";
echo "<Table border=1 Align=Center width=90%>";
echo "<TR>";
echo "<TH>" . "Nro";
echo "<TH>" . "Legajo";
echo "<TH>" . "Nombre";
echo "<TH>" . "Departamento";
echo "<TH>" . "Sueldo";
echo "</TR>";

$contador = 0;

$SQL = "SELECT Legajo, Nombre, Departamento, Sueldo
FROM personas";
$query1= "SELECT SUM(Sueldo) FROM personas";
$Registro = mysql_query($SQL,$idCone);
$sueldototal= mysql_query($query1,$idCone);
while($Fila = mysql_fetch_array($Registro))
{
 $contador++;
 echo "<Tr>";
 echo "<Td align=Center>" . $contador;
 echo "<Td>" . $Fila["Legajo"];
 echo "<Td>" . $Fila["Nombre"];
 echo "<Td align=Center>" . $Fila["Departamento"];
 echo "<Td align=Center>" . $Fila["Sueldo"];
 echo "<Tr>";
 
}
echo "EL SUELDO TOTAL DE LA EMPRESA ES: $" . mysql_result($sueldototal, 0);

echo "</Table>";
mysql_free_result ($Registro);
mysql_close($idCone); 


?> 