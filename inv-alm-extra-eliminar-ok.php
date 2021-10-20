<?php 
    session_start();
    include("db.php");

    if(isset($_GET['id'])){
        $id_cat = $_GET['id'];
        $consultaeliminar = "DELETE FROM extra_prod_menu
        WHERE id_extra_prod_m =  $id_cat";
        $res_elim_cat = mysqli_query($conexion,$consultaeliminar);

        if(!$res_elim_cat){
            die("error");
        }

        $_SESSION['mensaje'] = "categoria eliminada";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: inv-alm-extra.php");
    }

?>