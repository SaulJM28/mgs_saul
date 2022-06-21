<?php


if (!$_POST) {
    echo 'Valio barriga';
} else {

    $num_ope = $_POST["num_ope"];
    $clv_sol_inc  = $_POST['clv_sol_inc'];
    $area = $_POST['area'];
    $proceso = $_POST['proceso'];
    $importe = $_POST['importe'];
    $solicitud = $_POST['solicitud'];
    $fec_lim_reg = $_POST['fec_lim_reg'];
    $fec_cap = $_POST['fec_cap'];
    $dias_atra = $_POST['dias_atra'];
    $justificacion = $_POST['justificacion'];
    $observaciones = $_POST['observaciones'];
    $nom_resp_area = $_POST['nom_resp_area'];
    $nom_resp_pro = $_POST['nom_resp_pro'];
    $emp =  $_POST['emp'];



 
        include("../../../includes/conexionG.php");
        $sql = "INSERT INTO mov_ext_empresa(
     id_ext ,
no_ope ,
clv_sol_inc ,
area ,
proceso ,
importe ,
solicitud ,
fec_lim_reg ,
fec_cap ,
dias_atra ,
just ,
obser ,
nom_resp_area ,
nom_resp_proc ,
empresa 
        ) VALUES(
            '',
            '$num_ope',
            '$clv_sol_inc',
            '$area',
            '$proceso',
            '$importe',
            '$solicitud',
            '$fec_lim_reg',
            '$fec_cap',
            '$dias_atra',
            '$justificacion',
            '$observaciones',
            '$nom_resp_area',
            '$nom_resp_pro',
            '$emp'
        )";

        $resultado = mysqli_query($enlace, $sql);


        if (!$resultado) {
            echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
        } else {
            header("Location: ../FormatoMoviExtemp.php?mensaje=success");
            exit();
        }
   
    
}
