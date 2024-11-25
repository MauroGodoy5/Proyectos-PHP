<?php
function InsertarSolicitud($vConexion)
{

  switch ($_POST['tipo_solicitud']) {
    case 1:
      $dias = "1 week";
      break;
    case 2:
      $dias = "1 day";
      break;
    case 3:
      $dias = "3 day";
      break;
  }
  $SQL_Insert = "INSERT INTO solicitud (ID_TIPO_SOLI, ID_USUARIO, TITULO, DESC_SOLI, FECHA, FECHA_SOLU)
    VALUES ( '{$_POST['tipo_solicitud']}' ,  '{$_SESSION['id_usuario']}' , '{$_POST['titulo']}' , '{$_POST['descripcion']}',NOW(),DATE_ADD(NOW(), INTERVAL $dias))";

  if (!mysqli_query($vConexion, $SQL_Insert)) {


    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar el registro.</h4>');
  }

  return true;
}

function ListarTipoSolicitud($vConexion)
{
  $SQL = "SELECT *
  FROM tipo_solicitud";
  $rs = mysqli_query($vConexion, $SQL);


  $i = 0;

  while ($data = mysqli_fetch_array($rs)) {
    $Listado[$i]['id'] = $data['ID_TIPO_SOLI'];
    $Listado[$i]['titulo'] = $data['DESC_T_SOLI'];


    $i++;
  }

  return $Listado;
}
?>