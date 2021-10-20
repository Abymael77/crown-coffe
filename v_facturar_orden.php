        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php 
    session_start();
    include("db.php");

    if(isset($_GET['id_det_orden'])){
        $id_det_orden = $_GET['id_det_orden'];
        echo $id_det_orden; 

        //obtener numero de mesa para detalle_orden
        $detalleorden = "SELECT m.numero 
                        FROM detalle_orden AS do1
                        INNER JOIN mesa AS m
                        ON do1.id_mesa = m.id_mesa
                        WHERE do1.id_det_orden = '$id_det_orden'";
            $resm = mysqli_query($conexion, $detalleorden);
            while($row=mysqli_fetch_assoc($resm)){
                $nomesa = $row["numero"];
            }

        if($resm){
            //cambiar estado de detalle_orden
            $consordesta = "UPDATE detalle_orden SET estado_orden = 0 WHERE id_det_orden = '$id_det_orden'";
            $resordesta = mysqli_query($conexion,$consordesta);
            if($resordesta){
                //cambiar estado de la mesa
                $consmesaest = "UPDATE mesa SET estado = 1 WHERE numero = '$nomesa'";
                $resmesaest = mysqli_query($conexion,$consmesaest);

                if($resmesaest){
                    $considcaja = "SELECT * FROM tbcajaefectivo WHERE estado=1 ";
                    $residcaja = mysqli_query($conexion, $considcaja);

                    if($considcaja){
                        $caja = mysqli_fetch_array($residcaja);
                        $idcaja = $caja['id'];

                        $consfa = "INSERT INTO factura(id_detalle_orden, id_caja) VALUES ('$id_det_orden', '$idcaja')";
                        $resconsfact = mysqli_query($conexion, $consfa);

                        if($resconsfact){


                            // aqui va el descuento de inventario 

                            $_SESSION['mensaje'] = "Facturado con exitoooooo";
                            $_SESSION['tipo_mensaje'] = "primary";
                            $_SESSION['id_det_orden'] = $id_det_orden;
                            header("Location: ver_factura.php?id_det_orden='$id_det_orden'");
                            
                        }
                        else{
                            die("Noooooooo sin registrar factura");
                        }
                    }
                    
                }
                else{
                    die("mesa sin activar");
                }
                
            }
            else{
                die("Orden sin desactivar");
            }
        }
        else{
            die("Sin mesa asignada");
        }
        // $_SESSION['mensaje'] = "Producto eliminado de la orden";
        // $_SESSION['tipo_mensaje'] = "primary";
        // header("Location: verOrden.php");

                            // ordenes y mesas
                            
                            // fin ordenes y mesas
    }
?>
