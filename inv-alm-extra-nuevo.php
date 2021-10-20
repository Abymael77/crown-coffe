<?php 
    session_start();
    include("db.php");

    if(isset($_POST['guardar_extra'])) 
    {
        if (strlen($_POST['nombre']) >= 1 && strlen($_POST['costo']) >= 1 && strlen($_POST['precio']) >= 1 && strlen($_POST['unimedida']) >= 1) 
        {
            $nombre = trim($_POST['nombre']);
            $costo = trim($_POST['costo']);
            $precio = trim($_POST['precio']);
            $unimedida = trim($_POST['unimedida']);
            $descripcion = trim($_POST['descripcion']);
            //$fechareg = date("d/m/y"); //fecha
            $consultaagregar = "INSERT INTO extra_prod_menu(nombre_extra, costo, precio, unidad_mediada, descripcion) 
                            VALUES ('$nombre', '$costo', '$precio', '$unimedida', '$descripcion')";
            $resultadoaagregar = mysqli_query($conexion,$consultaagregar);
            if ($resultadoaagregar) {
                $_SESSION['mensaje'] = "categoria guardada";
                $_SESSION['tipo_mensaje'] = "primary";
                header("Location: inv-alm-extra.php");
            } else {
                $_SESSION['mensaje'] = "¡Ups ha ocurrido un error!";
                $_SESSION['tipo_mensaje'] = "primary";
                header("Location: inv-alm-extra.php");
            }
        }
        else{
            $_SESSION['mensaje'] = "¡Por favor complete los campos!";
            $_SESSION['tipo_mensaje'] = "danger";
            header("Location: inv-alm-extra.php");
        }
    }
?>