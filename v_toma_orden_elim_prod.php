<?php 
    session_start();
    if(isset($_GET['cad'])){
        $icad=$_GET['cad'];
        $carrito_mio=$_SESSION['carrito'];

        for($i=0;$i<=count($carrito_mio)-1;$i ++){
            if($i == $icad){
                unset($carrito_mio[$i]);
                $carrito_mio[$i] = NULL;

                if(count($carrito_mio)<1){
                    unset($carrito_mio);
                }
            }
        }
    }

    $_SESSION['carrito']=$carrito_mio;

    $id_det_orden = $_SESSION['id_det_orden'];
    $pag = 'v_agreg_prod.php?id_det_orden='.$id_det_orden;

    header("Location: {$pag}");
?>