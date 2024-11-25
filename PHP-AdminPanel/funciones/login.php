<?php 
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();
    $SQL="SELECT u.ID_ROL, u.ID_USUARIO, u.NOMBRE, u.APELLIDO, u.IMAGEN, u.EMAIL, u.CONTRASENA, u.ULT_FECHA_ACCESO, u.ACTIVO, r.ROL
    FROM usuarios u, rol r
    WHERE u.ID_ROL = r.ID_ROL
    AND EMAIL ='$vUsuario' AND CONTRASENA = MD5('$vClave') ";


$rs = mysqli_query($vConexion, $SQL);

$data = mysqli_fetch_array($rs) ;
if (!empty($data)) {
    if($data['ACTIVO']==1){
        $update = "UPDATE usuarios SET ULT_FECHA_ACCESO = NOW() WHERE ID_USUARIO = ". $data['ID_USUARIO'];
    }
        mysqli_query($vConexion,$update);
        $Usuario['id_rol'] = $data['ID_ROL'];
        $Usuario['id_usuario'] = $data['ID_USUARIO'];
        $Usuario['nombre'] = $data['NOMBRE'];
        $Usuario['apellido'] = $data['APELLIDO'];
        $Usuario['imagen'] = $data['IMAGEN'];
        if (empty( $data['IMAGEN'])) {
            $data['IMAGEN'] = 'team-1.png'; 
            $Usuario['imagen'] = $data['IMAGEN'];
        }
        $Usuario['email'] = $data['EMAIL'];
        $Usuario['contraseña'] = $data['CONTRASENA'];
        $Usuario['ultima_fecha'] = $data['ULT_FECHA_ACCESO'];
        $Usuario['activo'] = $data['ACTIVO'];
        $Usuario['roless'] = $data['ROL'];
        
        
    }
    return $Usuario;
}
?>