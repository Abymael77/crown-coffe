<?php 
    session_start();
    include("db.php");

    if(isset($_POST['btnactualizar'])) 
    {
        if (strlen($_POST['nombre']) >= 1) 
        {
            $id_cat = $_GET['id'];
            $nombre = trim($_POST['nombre']);
            $costo = trim($_POST['costo']);
            $precio = trim($_POST['precio']);
            $unimedida = trim($_POST['unimedida']);
            $descripcion = trim($_POST['descripcion']);
            //$fechareg = date("d/m/y"); //fecha
            $consultaagregar = "UPDATE extra_prod_menu 
                SET nombre_extra = '$nombre', costo = '$costo', precio = '$precio', unidad_mediada = '$unimedida', descripcion = '$descripcion' 
                WHERE id_extra_prod_m = $id_cat";
            mysqli_query($conexion,$consultaagregar);

            $_SESSION['mensaje'] = "categoria Actualizada";
            $_SESSION['tipo_mensaje'] = "primary ";
            header("Location: inv-alm-extra.php");
        }
    }
?>