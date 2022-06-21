<?php

if($_POST && $_POST['empresa'] == 'GRACOIL'){
     include("../../../includes/conexionG.php");
    if(!empty($_POST['id_cd'])){

        $arrUsuarios = array();
            $intId = intval($_POST['id_cd']);
            /* $query_select = mysqli_query($enlace, "SELECT * FROM cancelacion_doc_g WHERE id_cd = $intId"); */
            $query_select = mysqli_query($enlace, "SELECT * FROM cancelacion_doc_g WHERE id_cd = $intId");
            $num_rows = mysqli_num_rows($query_select);
            if($num_rows > 0){
                $arrUsuarios = mysqli_fetch_assoc($query_select);
                $json = json_encode($arrUsuarios, JSON_UNESCAPED_UNICODE);
                echo $json;
            }else {
                echo "noData";
            }
            exit;
    }
}

if($_POST && $_POST['empresa']  == 'INTER'){
    include("../../../includes/conexionG.php");
    if(!empty($_POST['id_cd'])){

        $arrUsuarios = array();
            $intId = intval($_POST['id_cd']);
            $query_select = mysqli_query($enlace, "SELECT * FROM cancelacion_doc_i WHERE id_cd = $intId");
            $num_rows = mysqli_num_rows($query_select);
            if($num_rows > 0){
                $arrUsuarios = mysqli_fetch_assoc($query_select);
                $json = json_encode($arrUsuarios, JSON_UNESCAPED_UNICODE);
                echo $json;
            }else {
                echo "noData";
            }
            exit;
    }
}


?>