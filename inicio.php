<?php 
    session_start();
    include("db.php");
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
        <title>Cafeteria</title>
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
        
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Sistema de la Cafeteria Crown Coffee</span>
                                <span class="section-heading-lower">Bienvenido</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/principal.jpg" width="400" height="100" />
                    <div class="product-item-description d-flex me-auto">
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row align-items-start">
                <div class="col fs-3 text-white text-center">
                    <?php 
                        $consmesas = "SELECT COUNT(m.estado) AS suma FROM mesa AS m WHERE m.estado = 0;";
                        $resmesas = mysqli_query($conexion, $consmesas);
                        $rowmesa = mysqli_fetch_assoc($resmesas);
                        $nummesa = $rowmesa["suma"];
                    ?>
                    <h1>Mesas Ocupadas</h1>
                    <p><?php echo $nummesa ?></p>
                </div>
              <div class="col fs-3 text-white text-center">
                    <?php 
                        $conorden = "SELECT COUNT(dor.estado_orden ) AS suma FROM detalle_orden AS dor WHERE dor.estado_orden  = 1;";
                        $resorden = mysqli_query($conexion, $conorden);
                        $roworden = mysqli_fetch_assoc($resorden);
                        $numorden = $roworden["suma"];
                    ?>
                    <h1>Ordenes En Proceso</h1>
                    <p><?php echo $numorden ?></p>
              </div>
              <div class="col fs-3 text-white">
                Ordenes Atendidas
              </div>
            </div>
        
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>


<?php
    
?>