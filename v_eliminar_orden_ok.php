<?php
    include('db.php');
    session_start();
    $id_det_orden = $_GET['id'];
    $filasTomOrd = 0;
    // echo  $orden;
    // echo "  <----->  ";

    //Tabla detalle de orden
    $consDetOrd = "SELECT * FROM detalle_orden WHERE id_det_orden = '$id_det_orden'";
    $resDetOrd = mysqli_query($conexion, $consDetOrd);
    while($rowDetOrd=mysqli_fetch_assoc($resDetOrd)){
        $id_mesa = $rowDetOrd['id_mesa'];
    }

    //Tabla Toma de orden
    $consTomOrd = "SELECT * FROM toma_orden WHERE id_det_orden = '$id_det_orden'";
    $resTomOrd = mysqli_query($conexion, $consTomOrd);
    while($rowTomOrd=mysqli_fetch_assoc($resTomOrd)){
        $filasTomOrd++;
    }
    
    
    if($filasTomOrd == 0){ //detalle de orden sin productos 
        echo "<-- Numero de filas obtenidas SIIII -->";
        echo $filasTomOrd;
        echo "    eliminar detalle de orden";

        //eliminar detalle_orden
        $consElimDetOrd = "DELETE FROM detalle_orden WHERE id_det_orden = '$id_det_orden'";
        $resElimDetOrd = mysqli_query($conexion, $consElimDetOrd);

        if($resElimDetOrd){
            //activar el estado de la mesa
            $consmesaest = "UPDATE mesa SET estado = 1 WHERE id_mesa = '$id_mesa'";
            $resmesaest = mysqli_query($conexion,$consmesaest);
            if($resmesaest){ 
                $_SESSION['mensaje'] = "¡Mesa Activada!";
                $_SESSION['tipo_mensaje'] = "primary";
                header("Location: verOrden.php");
            }
        }
    }
    else{ //detalle de orden con productos
        echo "<-- Numero de filas obtenidas ELSEEEE -->";
        echo $filasTomOrd;
        echo "    eliminar toma de orden luego detalle de orden";

        //eliminar toma_orden de detalle_orden 
        $consElimTomOrd = "DELETE FROM toma_orden WHERE id_det_orden = '$id_det_orden'";
        $resElimTomOrd = mysqli_query($conexion, $consElimTomOrd);

        if($resElimTomOrd){
            //eliminar detalle_orden 
            $consElimDetOrd = "DELETE FROM detalle_orden WHERE id_det_orden = '$id_det_orden'";
            $resElimDetOrd = mysqli_query($conexion, $consElimDetOrd);

            if($resElimDetOrd){
                //activar el estado de la mesa
                $consmesaest = "UPDATE mesa SET estado = 1 WHERE id_mesa = '$id_mesa'";
                $resmesaest = mysqli_query($conexion,$consmesaest);
                if($resmesaest){ 
                    $_SESSION['mensaje'] = "¡Mesa Activada!";
                    $_SESSION['tipo_mensaje'] = "primary";
                    header("Location: verOrden.php");
                }
            }
        }
    }

?>