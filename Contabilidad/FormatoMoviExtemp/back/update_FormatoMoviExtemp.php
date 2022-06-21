<?php


if (!$_POST) {
    echo 'Valio barriga';
} else {

    $id_ext = $_POST['id_ext'];
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
    $sql = "UPDATE mov_ext_empresa
     SET
    no_ope =  '$num_ope',
    clv_sol_inc = '$clv_sol_inc',
    area = '$area',
    proceso =  '$proceso',
    importe = '$importe',
    solicitud =   '$solicitud',
    fec_lim_reg =  '$fec_lim_reg',
    fec_cap = '$fec_cap',
    dias_atra =  '$dias_atra',
    just = '$justificacion',
    obser = '$observaciones',
    nom_resp_area =  '$nom_resp_area',
    nom_resp_proc = '$nom_resp_pro',
    empresa =   '$emp'
    WHERE id_ext = '$id_ext'";

    $resultado = mysqli_query($enlace, $sql);


    if (!$resultado) {
        echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
    } else {
        header("Location: ../FormatoMoviExtemp.php?mensaje=update");
        exit();
    }
}
