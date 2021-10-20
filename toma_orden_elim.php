<?php session_start(); 
include("db.php");

$carrito_mio = $_SESSION['carrito'];
$no_mesa = $_SESSION['numero_m'];

if(count($carrito_mio)<=0){
    unset($carrito_mio);
    $carrito_mio=NULL;
}

//verificar que exista un registro en la lista
for($ii=0;$ii<=count($carrito_mio)-1;$ii ++){
    if($carrito_mio[$ii]==NULL){
        //unset($carrito_mio);
        $carrito_mio[$ii]=NULL;
    }
    else{ $rw = 1;}
}

if(isset($_SESSION['carrito'])){

    if($carrito_mio!=NULL && $rw != 0){

        $conmesanum = "SELECT * FROM mesa ORDER BY numero";
        $resmesaid = mysqli_query($conexion,$conmesanum);

        while($rowmesa=mysqli_fetch_assoc($resmesaid)){
            $num_mesa = $rowmesa["numero"];
            if($num_mesa == $no_mesa){
                $id_mesa = $rowmesa["id_mesa"];
                $consagregar = "INSERT INTO detalle_orden(id_mesa) 
                    VALUES ('$id_mesa')";
                    $resagregar = mysqli_query($conexion,$consagregar);
            }
        }

        if ($resagregar){

            //insertar cada producto en una orden
            for($i=0;$i<=count($carrito_mio)-1;$i ++){
                if($carrito_mio[$i]!=NULL){

                    $cantidad = $carrito_mio[$i]['cantida'];
                    $idprodm = $carrito_mio[$i]['idprodm'];
                    $nomprodm = $carrito_mio[$i]['nomprodm']; //nombre del producto para agregar a la toma de orden -------------------------
                    $precio = $carrito_mio[$i]['precio'];

                    
                    $cons_det_orden = "SELECT MAX(id_det_orden) AS id_det_orden FROM detalle_orden";
                    $result_id_del_orden = mysqli_query($conexion,$cons_det_orden);
                    while($row1=mysqli_fetch_array($result_id_del_orden)){
                        $id_det_orden = $row1['id_det_orden'];

                        $consagregarorden = "INSERT INTO toma_orden
                                (cantidad, precio, id_producto_m, nombre_prod_m, id_det_orden) 
                                VALUES('$cantidad', '$precio', '$idprodm', '$nomprodm', '$id_det_orden')"; //idprodm
                                $resultorden = mysqli_query($conexion,$consagregarorden);
                    }

                    $_SESSION['mensaje'] = "Detalle de orden guardado";
                    $_SESSION['tipo_mensaje'] = "primary";
                    header("Location: tomaOrden.php");
                    unset($_SESSION['carrito']);
                    $_SESSION['carrito'] = NULL;
                    $total=0;
                }
            }
            if($resultorden){
                $consmesaest = "UPDATE mesa SET estado = 0 WHERE id_mesa = '$id_mesa'";
                $resmesaest = mysqli_query($conexion,$consmesaest);
            }
        }
        else {
            
            $_SESSION['mensaje'] = "¡Ups ha ocurrido un error!";
            $_SESSION['tipo_mensaje'] = "danger";
            header("Location: tomaOrden.php");
            unset($_SESSION['carrito']);
            $_SESSION['carrito'] = NULL;
            $total=0;
        }
    }
    else{
        $_SESSION['mensaje'] = "Orden Omitida :)";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: tomaOrden.php");
        unset($_SESSION['carrito']);
        $_SESSION['carrito'] = NULL;
        $total=0;
    }
}
else{
    $_SESSION['mensaje'] = "¡Ups ha ocurrido un error! No se puede registrar una orden vacia";
    $_SESSION['tipo_mensaje'] = "danger";
    header("Location: tomaOrden.php");
    unset($_SESSION['carrito']);
    $_SESSION['carrito'] = NULL;
    $total=0;
}
?>