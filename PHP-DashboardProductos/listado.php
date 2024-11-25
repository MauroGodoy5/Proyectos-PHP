<?php
require_once 'Array.php';  //aqui se incrusta todo el contenido de este script

require_once 'Funciones.php';  //aqui se incrusta todo el contenido de este script

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title >1er Desempeño</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="css/style.css">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com 
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Productos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listado.php">
              <i class="bi bi-circle"></i><span>Los mas vendidos</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Listado de Productos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Productos</a></li>
          <li class="breadcrumb-item active">Los mas vendidos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title" >Los mas vendidos </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Stock Inicial</th>
                        <th scope="col">Cant. Pedida</th>
                        <th scope="col">Stock Final</th>
                        <th scope="col">Precio Unit.</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                              $CantidadTipoProductos = count($Productos); //variable que sirve para recorrer el for y tambien para que cuente cuantos productos diferentes hay en el carrito
                              $CantidadTotalProducto = 0; //inicializo la variable en cero para que despues me muestre la cantidad total de productos en el carrito
                              $SumaTotalPrecios=0;  //inicializo la variable en cero para que despues me muestre la cantidad total general
                              $Descuento = 0;  //inicializo la variable en cero para que despues atravez de la funcion CalcularDescuento me diga el descuento del %10 del producto
                              $Estrella="<span class='badge bg-danger' title='Destacado 10% Descuento!!'><i class='bx bxs-star'></i></span>"; //variable que sirve para mostrar la estrella de aquellos porducots que tienen descuento
                              for ($i = 0; $i < $CantidadTipoProductos; $i++) {
                                ?>
                                <tr>
                                    <td><?php echo ($i+1); //indica la primer columna con el nro de registro (en este caso es el codigo del producto) ?></td>
                                    <td><a href="#"><?php echo $Productos[$i]['Imagen']; ?></a></td>
                                    <td><a href="#" class="text-primary fw-bold"><?php if($Productos[$i]['Precio_Unitario']>5000){ echo $Productos[$i]['Descripcion'],$Estrella;} else echo $Productos[$i]['Descripcion']; ?></a></td>
                                    <td><?php echo $Productos[$i]['Stock_Inicial'];?></td>
                                    <td><?php echo $Productos[$i]['Cantidad_Total'];?></td>
                                    <td><?php $StockFinal = CalcularStockFinal($Productos[$i]['Stock_Inicial'] , $Productos[$i]['Cantidad_Total']); if($StockFinal<20){echo "<span class='badge bg-danger' style='background-color: #ff0000;'>$StockFinal</span>";} elseif($StockFinal>=20&&$StockFinal<40){echo"<span style='background-color: #ffff00;'>$StockFinal</span>";} elseif($StockFinal>=40) echo"<span  style='background-color: #06f706;'>$StockFinal</span>";?></td>
                                    <td>$<?php echo $Productos[$i]['Precio_Unitario'];?></td>
                                    <td class="fw-bold">$<?php $Subtotal2 = CalcularSubtotal($Productos[$i]['Cantidad_Total'] , $Productos[$i]['Precio_Unitario']); echo $Subtotal2; ?></td>
                                    <td>$<?php $Descuento2 = CalcularDescuento($Descuento,$Subtotal2,$Productos[$i]['Precio_Unitario']); echo $Descuento2;   ?></td>
                                    <td class="fw-bold">$<?php $Total2 = CalcularTotal($Subtotal2,$Descuento2); echo $Total2; ?></td>



                                    <?php
                                    $SumaTotalPrecios = ($SumaTotalPrecios + $Total2); //variable que sirve para sumar el total general de los productos que previamente inicializamos
                                    $CantidadTotalProducto= ($CantidadTotalProducto + $Productos[$i]['Cantidad_Total']);  //variable que sirve para mostrar la cantidad total de los productos que previamente inicializamos
                                    ?>
                                    <?php } //fin del FOR?>
                                  

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Productos <span>| Cantidad Total Pedida</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6><?php echo$CantidadTotalProducto;?></h6>
                  <span class="text-success small pt-1 fw-bold"><?php echo $CantidadTipoProductos; ?></span> <span
                    class="text-muted small pt-2 ps-1">artículos diferentes</span>

                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Ventas <span>| Total general</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-exchange"></i>
                </div>
                <div class="ps-3">
                  <h6>$<?php echo $SumaTotalPrecios;  ?></h6>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working html/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>