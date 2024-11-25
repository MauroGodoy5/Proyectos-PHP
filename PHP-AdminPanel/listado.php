<?php
session_start();
if ($_SESSION['Usuario_activo'] == 0) {
  if (empty($_SESSION['Usuario_Nombre'])) {
    header('Location: cerrarsesion.php');
    exit;
  }
}

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();
require_once 'funciones/listar_solicitud.php';

$ListadoSolicitud = Listar_Solicitud($MiConexion);
$CantidadSolicitudes = count($ListadoSolicitud);
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
  <title>Listado - Vali Admin</title>
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
  <?php require_once 'seccionado/Encabezado.php';  ?>
  <!-- Sidebar menu-->
  <?php require_once 'seccionado/menu_lateral.php';  ?>
  <!-- fin Sidebar menu-->
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Listados</h1>
        <!-- si es administrador vera este titulo-->
        <p>Listado total de solicitudes</p>

        <!-- si es usuario normal vera este titulo-
          <p>Listado de mis solicitudes cargadas</p> -->

        <!-- si es analista o tecnico vera este titulo
          <p>Listado de solicitudes cargadas</p> -->


      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Listado</li>
        <li class="breadcrumb-item active"><a href="#">Listado de Solicitudes</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <?php echo $_SESSION['id_rol'] == 1 ? " <h3 class=tile-title>Listado total de Solicitudes($CantidadSolicitudes)</h3>" : ''; ?>
          <?php echo $_SESSION['id_rol'] == 2 ? " <h3 class=tile-title>Listado de mis solicitudes cargadas </h3>" : ''; ?>
          <?php echo $_SESSION['id_rol'] == 3 ? " <h3 class=tile-title>Listado de solicitudes cargadas</h3>" : ''; ?>
          <?php echo $_SESSION['id_rol'] == 4 ? " <h3 class=tile-title>Listado de solicitudes cargadas</h3>" : ''; ?>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Tipo</th>
                  <th>Registro</th>
                  <th>Fecha estimada</th>
                  <th>Solicitante</th>
                  <th>Opciones</th>

                </tr>
              </thead>
              <tbody>

                <?php for ($i = 0; $i < $CantidadSolicitudes; $i++) { ?>

                  <?php echo $ListadoSolicitud[$i]['id_tipo_soli'] == 2 ? "<tr class=table-danger>" : '<tr class=table-success>'; ?>
                  <?php echo $ListadoSolicitud[$i]['id_tipo_soli'] == 3 ? "<tr class=table-warning>" : ''; ?>


                  <td><?php echo $ListadoSolicitud[$i]['id']; ?></td>
                  <td><?php echo $ListadoSolicitud[$i]['titulo']; ?></td>
                  <td><?php echo $ListadoSolicitud[$i]['descripcion']; ?></td>
                  <td><?php echo $ListadoSolicitud[$i]['tipo_soli']; ?></td>
                  <td><?php echo $ListadoSolicitud[$i]['fecha']; ?></td>
                  <td><?php echo $ListadoSolicitud[$i]['solucion']; ?></td>
                  <td><?php echo $ListadoSolicitud[$i]['usuario']; ?></td>
                  <td><a href="#">Ver detalles...</a></td>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>

    </div>
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