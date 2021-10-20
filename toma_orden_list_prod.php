<?php 
    include("db.php");
    session_start();
?>

<!-- listar todos los productos -->
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php 
                $categ = $_POST['nombre'];
                if($categ != "todo"){

                
                    $categoria = "SELECT producto_menu.id_producto_m, producto_menu.nombre_prod_m, producto_menu.precio_prod_m, producto_menu.descrip_prod_m, producto_menu.nombre_img, categoria_prod_menu.nombre_cat FROM producto_menu
                                    INNER JOIN categoria_prod_menu on producto_menu.id_cat_prod_menu = categoria_prod_menu.id_cat_prod_menu 
                                    WHERE 
                                    categoria_prod_menu.nombre_cat like '%".$categ."%'";
                }
                else{
                    $categoria = "SELECT * FROM producto_menu";
                }
                    $resultado = mysqli_query($conexion, $categoria);

                    while($row=mysqli_fetch_assoc($resultado)){
                        
                            
                ?>
                <div class="col">
                    <div class="card h-100">
                    <img src="<?php echo $row["nombre_img"] ?>" class="card-img-top" alt="...">
                        <div class="card-body text-secondary">
                        <!-- precio_prod_m                                                                       id_producto_m -->
                            <p class="card-text text-end fw-bold"> Q <?php echo $row["precio_prod_m"] ?> <a class="btn btn-outline-primary" href="" data-bs-toggle="modal" data-bs-target="#modal_orden<?php echo $row["id_producto_m"];?>" data-bs-whatever="@mdo"><i class='bx bx-plus-medical'></i></a></p>
                            <h5 class="card-title fw-bold"><?php echo $row["nombre_prod_m"] ?></h5>
                            <p class="card-text"> <?php echo $row["descrip_prod_m"] ?> </p>
                            <p class="card-text"> <?php echo $row["id_producto_m"] ?> </p>
                        </div>
                    </div>
                </div>
                <?php 
                        // }
                
                include("toma_orden_orden.php"); 
                    }
                ?>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>