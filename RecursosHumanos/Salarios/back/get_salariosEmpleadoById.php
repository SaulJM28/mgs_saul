<?php

if($_POST){
     include("../../../includes/conexionG.php");
    if(!empty($_POST['id_suemp'])){

        $arrUsuarios = array();
            $intId = intval($_POST['id_suemp']);
            $query_select = mysqli_query($enlace, "SELECT HSE.id_suemp, HSE.id_emp, HSE.sueldo_anterior, HSE.nuevo_sueldo, HSE.dif_sueldo, HSE.fecha_regi, ERH.nom, ERH.ap1, ERH.ap2 FROM hist_sueldo_emp HSE RIGHT JOIN empleados_rh ERH ON HSE.id_emp = ERH.id_emp WHERE HSE.id_suemp = $intId");
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