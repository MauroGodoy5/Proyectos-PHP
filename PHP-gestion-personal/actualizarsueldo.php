<?Php
if (isset($_REQUEST["BotonEnviar"]))
{
require ("Conexion.php");
$idCone = conexion();

$Legajo = $_REQUEST["legajo"];
$SQL = "SELECT Sueldo
FROM personas
where Legajo= $Legajo";
$sueldoviejo= mysql_query($SQL,$idCone);
$asd=mysql_result($sueldoviejo,0);
$asd=$asd*1.10;
$sueldonuevo= "UPDATE personas SET Sueldo= $asd
WHERE Legajo=$Legajo";
$sueldoactualizado= mysql_query($sueldonuevo,$idCone);
mysql_close($idCone);
echo "<H2>";
echo "<p Align=Center>";
echo "Sueldo Actualizado correctamente para: ";
echo $Legajo;
echo "<Br><Br>";
}
else
{
echo "<H2>";
echo "<p Align=Center>";
echo "Actualización Cancelada";
echo "<Br><Br>";
}
?>
<Form name="Volver" action =
"modificacionsueldo.html" method="Post">
<p Align="Center">
<Input Type="Submit" name="Volver" value="Otra
Busqueda">
</Form> 