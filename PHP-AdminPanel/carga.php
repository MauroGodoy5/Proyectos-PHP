<?php

session_start();
if (empty($_SESSION['Usuario_Nombre'])) {
  header('Location: cerrarsesion.php');
  exit;
}

require_once 'funciones/insertar_solicitud.php';
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();


$Mensaje = '';

if (!empty($_POST['botonregistrar'])) {
  require_once 'funciones/insertar_solicitud.php';
  require_once 'funciones/validaciones.php';
  //estoy en condiciones de poder validar los datos

  $Mensajevalidar = Validar_Datos();
  if (empty($Mensaje)) {
    if (InsertarSolicitud($MiConexion) != false) {
      $Mensaje = 'Se ha registrado correctamente.';
      $_POST = array();
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
  <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <title>Registro - Vali Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
  <!-- Navbar-->
  <?php require_once 'seccionado/Encabezado.php';   ?>
  <!-- Sidebar menu-->
  <?php require_once 'seccionado/menu_lateral.php';   ?>
  <!-- fin Sidebar menu-->
  <main class="app-content">
    <form role="form" method='post'>
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Registra aqui tu solicitud</h1>
          <p>Detalla lo mas que puedas para que un encargado pueda asesorarte.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Registro</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">


            <h3 class="tile-title">Ingresa los datos solicitados</h3>
            <?php if (!empty($Mensajevalidar)) { ?>
              <div class="bs-component">

                <div class="alert alert-dismissible alert-danger">

                  <strong><?php echo $Mensajevalidar; ?> </strong>

                </div>
              </div>
            <?php } ?>
            <div class="bs-component">
              <?php if (!empty($Mensaje)) { ?>
                <div class="alert alert-dismissible alert-success">

                  <strong><?php echo $Mensaje; ?> </strong>

                </div>
            </div>
          <?php } ?>
          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
            </div>
          </div>
          <div class="tile-body">

            <div class="form-group">
              <label class="control-label">Título</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" name="titulo" value="<?php echo !empty($_POST['titulo']) ? $_POST['titulo'] : ''; ?>">
            </div>

            <div class="form-group">
              <label class="control-label">Descripción de solicitud <i class="fa fa-asterisk" aria-hidden="true"></i></label>
              <textarea class="form-control" rows="4" placeholder="Ingresa los detalles..." name="descripcion" value="<?php echo !empty($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?>"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Tipo de solicitud</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <?php $radio = ListarTipoSolicitud($MiConexion);
              foreach ($radio as $radiotipo) {
              ?>
                <div class="form-check">
                  <label class="form-check-label">

                    <input class="form-check-input" type="radio" value="<?php echo $radiotipo['id']; ?>" checked name="tipo_solicitud"> <?php echo $radiotipo['titulo']; ?>
                  </label>
                </div>
              <?php } ?>


            </div>

            <!--
                <div class="form-group">
                  <label class="control-label">Puedes subir una captura de pantalla</label>
                  <input class="form-control" type="file">
                </div>
                -->
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" value="Registrar" name="botonregistrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button> &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>

            </div>
          </div>
          </div>
        </div>

      </div>
    </form>
  </main>
  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->

</body>

</html>