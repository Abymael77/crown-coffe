<?php 
    session_start();
    $varsesion = $_SESSION['usuario'];

    if($varsesion == null || $varsesion = ''){
        echo 'Sin Autorizacion';
        echo $varsesion;
        die();
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="css/alma.css" rel="stylesheet">
        <title>Reportes de Cafeteria</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
    <header>
            <h1 class="site text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Cafeteria</span>
                <span class="site-heading-lower">Crown Coffee</span>
            </h1>
        </header>
        <!-- Navigation-->
        <?php 
            if($_SESSION['permiso']== 'Administrador'){
                include 'headerAdmin.php';
            }else{
                include 'headerAux.php';
            }
            
        ?>

<p class="text-center text-white fs-3">Reportes de la cafeteria Crown Coffee</p>

          <!-- menuu-->
    <div class="container">
  
    <div class="card">
    <a href="tbfecha.php"><img src="img/rep.png" alt="" class='catimg'></a>
    <h4>Reporte 1</h4>
    </div>
    <div class="card">
    <a href="inv-alm-producto.php"><img src="img/rep.png" alt="" class='catimg'></a>
    <h4>Reporte 2</h4>
    </div>
    <div class="card">
    <a href="inv-alm-ingrediente.php"><img src="img/rep.png" alt="" class='catimg'></a>
    <h4>Reporte 3</h4>
    </div>
    <div class="card">
    <a href="inv-alm-extra.php"><img src="img/rep.png" alt="" class='catimg'></a>
    <h4>Reporte 4</h4>
    </div>
    </div>





        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
