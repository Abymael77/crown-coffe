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
        <title>Business Casual - Start Bootstrap Theme</title>
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
    
        <!-- menuu-->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 px-5">

            <div class="col">
                <div class="card">
                    <a href="inv-alm-categoria.php"><img src="img/categoria.png" alt="" class='catimg'></a>
                    <h4>Categorias</h4>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <a href="inv-alm-producto.php"><img src="img/producto.png" alt="" class='catimg'></a>
                    <h4>Productos Menu</h4>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <a href="inv-alm-ingrediente.php"><img src="img/ingredientes.png" alt="" class='catimg'></a>
                    <h4>Ingredientes</h4>
                </div>
            </div>
            <!-- <div class="col">
                <div class="card">
                    <a href="inv-alm-extra.php"><img src="img/estrella.png" alt="" class='catimg'></a>
                    <h4>Extras</h4>
                </div>
            </div> -->
        </div>
    </div>





        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
