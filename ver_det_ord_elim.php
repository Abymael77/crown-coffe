<?php 
    session_start();
    include("db.php");

    if(isset($_GET['idor'])){
        $id_orden = $_GET['idor'];
        $consultaeliminar = "DELETE FROM toma_orden
        WHERE id_orden = $id_orden";
        $res_elim_ord = mysqli_query($conexion,$consultaeliminar);

        if(!$res_elim_ord){
            $_SESSION['mensaje'] = "El producto no fue eliminado de la orden";
            $_SESSION['tipo_mensaje'] = "danger";
            header("Location: verOrden.php");
        }

        $_SESSION['mensaje'] = "Producto eliminado de la orden";
        $_SESSION['tipo_mensaje'] = "primary";
        header("Location: verOrden.php");
    }

?>