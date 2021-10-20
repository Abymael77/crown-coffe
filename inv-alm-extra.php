<?php 
    include("db.php");
?>


<!-- encabezado de pagina -->
<?php include("includes/header.php"); ?>
<!-- navegacion -->
<?php include("includes/nav.php"); ?>
        
<!-- alerta de agregar categoria -->
<div class="container">
<?php if(isset($_SESSION['mensaje'])){  ?>
        <div class="alert bg-<?= $_SESSION['tipo_mensaje'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['mensaje'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['mensaje']); 
            unset($_SESSION['tipo_mensaje']); 
    } ?>
</div>

    <!--Buscar y agregar-->
    <!-- <div class="container m-3">
        <div class="row g-3 justify-content-end">
            <div class="col-md-1">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_agregar"> AGREGAR </button>
            </div>
        </div>
    </div> -->

    <!-- tabla de datos -->
    <div class="container text-primary">
        <div class="row g-3 justify-content">
            <div class="d-grid gap-1 col-3">
                <button type="button" class="btn btn-outline-primary btn-md" data-bs-toggle="modal" data-bs-target="#modal_agregar"> <i class='bx bx-plus-medical'></i> AGREGAR </button>
            </div>
        </div>
        <table class="table table-striped" id="datatable"> <!--cta color amarillo-->
            <thead class="cta">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidad de medida</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody class="bg-faded">
                <?php 
                    $categoria = "SELECT * FROM extra_prod_menu";
                    $resultado = mysqli_query($conexion, $categoria);

                    while($row=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <th scope="row"><?php echo $row["id_extra_prod_m"] ?></th>
                    <td><?php echo $row["nombre_extra"] ?></td>
                    <td><?php echo $row["costo"] ?></td>
                    <td><?php echo $row["precio"] ?></td>
                    <td>
                        <?php 
                            $idd = $row["unidad_mediada"];
                            $cons_uni_med_id = "SELECT * FROM unidad_medida WHERE id_uni_m = '$idd'";
                            $res_cons_uni_id =mysqli_query($conexion, $cons_uni_med_id);
                            while($row1=mysqli_fetch_array($res_cons_uni_id)){
                                $nombr_uni_sel = $row1['nombre_uni'];
                                echo $nombr_uni_sel; //mostrar unidad
                            }
                        ?>
                    </td>
                    <td><?php echo $row["descripcion"] ?></td>
                    <td> 
                        <a class="btn btn-outline-warning" href="" data-bs-toggle="modal" data-bs-target="#modal_editar<?php echo $row["id_extra_prod_m"]; ?>" data-bs-whatever="@mdo">
                            <img class="d-line" src="img/pencil-square.svg" alt="">
                        </a> 
                        <a class="btn btn-outline-danger" href="" data-bs-toggle="modal" data-bs-target="#modal_eliminar<?php echo $row["id_extra_prod_m"]; ?>" data-bs-whatever="@mdo">
                            <img class="d-inline" src="img/trash.svg" alt="">
                        </a> 
                    </td>
                </tr>

                <?php 
                    include("inv-alm-extra-eliminar.php"); 
                    include("inv-alm-extra-edit.php"); 
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal agregar-->
<div class="modal fade" id="modal_agregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Extras de productos menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="inv-alm-extra-nuevo.php" method="post" id="form-cat">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" name="nombre">Nombre Extra:</label>
                        <input class="form-control" type="text" name="nombre" >
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label" name="descripcion">Costo:</label>
                        <input class="form-control" type="number" name="costo" id="costoexx" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label" name="descripcion">Precio:</label>
                        <input class="form-control" type="number" name="precio" id="precioexx" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label" name="descripcion">Unidad de Medida:</label>
                        <select class="form-select" aria-label="Default select example" name="unimedida">
                            <?php 
                                $cons_uni_medida = "SELECT * FROM unidad_medida ORDER BY id_uni_m";
                                $res_cons_uni =mysqli_query($conexion, $cons_uni_medida);

                                while($row=mysqli_fetch_array($res_cons_uni)){
                                    $id_uni = $row['id_uni_m'];
                                    $nombr_uni = $row['nombre_uni'];
                            ?>
                            <option value="<?php echo $id_uni; ?>"><?php echo $nombr_uni;?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label" name="descripcion">Descripcion:</label>
                        <input class="form-control" type="text" name="descripcion" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="guardar_extra" value="Agregar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script type="text/javascript" src="js/validarnumero.js"></script>
    <!-- validacion de input solo numeros -->
    <script>
        new CampoNumerico('#costoexx');
        new CampoNumerico('#precioexx');
        new CampoNumerico('#costoex');
        new CampoNumerico('#precioex');
    </script>
    <?php include("includes/footer.php"); ?>
