<?php
function Listar_Solicitud($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT s.ID_REGISTRO, s.TITULO, s.DESC_SOLI, ts.DESC_T_SOLI, ts.ID_TIPO_SOLI,DATE_FORMAT(s.FECHA,'%d-%m-%Y %H:%i:%s') as FECHA, DATE_FORMAT(s.FECHA_SOLU,'%d-%m-%Y %H:%i:%s') as FECHA_SOLU, U.NOMBRE,u.ID_USUARIO
    FROM solicitud s,tipo_solicitud ts, usuarios u
    WHERE s.ID_USUARIO = u.ID_USUARIO AND s.ID_TIPO_SOLI = ts.ID_TIPO_SOLI";
    switch($_SESSION['id_rol']){
        case 1:
        break;
        case 2: $SQL .= " AND s.ID_USUARIO = ".$_SESSION['id_usuario'];
        break;
        case 3: $SQL .= " AND ts.ID_TIPO_SOLI=2";
        break;
        case 4: $SQL .= " AND ts.ID_TIPO_SOLI IN(1,3)";
        break;
    }


    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
    $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
    $i=0;
    while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['id'] = $data['ID_REGISTRO'];
            $Listado[$i]['id_tipo_soli'] = $data['ID_TIPO_SOLI'];
            $Listado[$i]['id_user'] = $data['ID_USUARIO'];
            $Listado[$i]['titulo'] = $data['TITULO'];
            $Listado[$i]['descripcion'] = $data['DESC_SOLI'];
            $Listado[$i]['tipo_soli'] = $data['DESC_T_SOLI'];
            $Listado[$i]['fecha'] = $data['FECHA'];
            $Listado[$i]['solucion'] = $data['FECHA_SOLU'];
            $Listado[$i]['usuario'] = $data['NOMBRE'];

            $i++;
    }


    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;

}
?>