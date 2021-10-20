<?php session_start(); 
include("db.php");

$carrito_mio = $_SESSION['carrito'];
$no_mesa = $_SESSION['numero_m'];
$id_detalle_orden = $_SESSION['id_det_orden'];

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

        //insertar cada producto en una orden
        for($i=0;$i<=count($carrito_mio)-1;$i ++){
            if($carrito_mio[$i]!=NULL){

                $cantidad = $carrito_mio[$i]['cantida'];
                $idprodm = $carrito_mio[$i]['idprodm'];
                $nomprodm = $carrito_mio[$i]['nomprodm']; //nombre del producto para agregar a la toma de orden -------------------------
                $precio = $carrito_mio[$i]['precio'];


                $consagregarorden = "INSERT INTO toma_orden
                        (cantidad, precio, id_producto_m, nombre_prod_m, id_det_orden) 
                        VALUES('$cantidad', '$precio', '$idprodm', '$nomprodm', '$id_detalle_orden')"; //idprodm
                        $resultorden = mysqli_query($conexion,$consagregarorden);

                $_SESSION['mensaje'] = "Detalle de orden guardado";
                $_SESSION['tipo_mensaje'] = "primary";
                header("Location: verOrden.php");
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
    else{
        $_SESSION['mensaje'] = "Orden Omitida :)";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: verOrden.php");
        unset($_SESSION['carrito']);
        $_SESSION['carrito'] = NULL;
        $total=0;
    }
}//
else{
    $_SESSION['mensaje'] = "¡Ups ha ocurrido un error! No existe un producto para agregar a la orden";
    $_SESSION['tipo_mensaje'] = "danger";
    header("Location: verOrden.php");
    unset($_SESSION['carrito']);
    $_SESSION['carrito'] = NULL;
    $total=0;
}
?>