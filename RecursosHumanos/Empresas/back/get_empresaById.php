<?php

if($_POST){
     include("../../../includes/conexionG.php");
    if(!empty($_POST['id_empresa'])){

        $arrUsuarios = array();
            $intId = intval($_POST['id_empresa']);
            $query_select = mysqli_query($enlace, "SELECT * FROM empresas_rh WHERE id_empresa = $intId");
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