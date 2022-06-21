<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {

$id_emp  = $_POST['empleado'];
$alergias	= $_POST['alergias'];

if($_POST['desc_alergias'] == ''){
$desc_alergias = 'N/A';
}else {
$desc_alergias	= $_POST['desc_alergias']; 
}
$talla  = $_POST['talla'];
$peso = $_POST['peso'];
$imc  = $_POST['imc'];
$cintura = $_POST['cintura'];
$cadera	= $_POST['cadera'];
$icc = $_POST['icc'];
$porc_gra  = $_POST['porc_gra'];
$porc_musc = $_POST['porc_musc'];
$fech_ult_covid  = $_POST['fech_ult_covid'];
$fech_ult_anti = $_POST['fech_ult_anti'];
$fech_ult_alch = $_POST['fech_ult_alch'];
$presion = $_POST['presion'];
$glucosa = $_POST['glucosa'];
$observaciones = $_POST['observaciones'];
$fech_regis = $_POST['fech_regis'];
/* 
echo $id_emp .' '. $alergias .' '. $desc_alergias .' '. $talla .' '. $peso .' '. $imc .' '. $cintura .' '. $cadera .' '. $porc_gra .' '. $porc_musc .' '. $fech_ult_covid . ' ' . $fech_ult_anti . ' ' . $fech_ult_alch . ' ' . $presion .' ' . $glucosa . ' ' . $observaciones . ' ' . $fech_regis;
 */

    include("../../../includes/conexionG.php");
      $sql = "INSERT INTO hist_clic_emple (id_hce, alergias, desc_alerg, talla, peso, IMC, cintura, cadera, icc, porc_gra, porc_musc, edad_met, fecha_ult_covid, fecha_ult_anti, fecha_ult_alch, presion, glucosa, Observaciones, fecha_regis, id_emp) VALUES ('', '$alergias', '$desc_alergias', '$talla', '$peso', '$imc ', '$cintura', '$cadera', '$icc', '$porc_gra', '$porc_musc', '$gra_aca', '$fech_ult_covid', '$fech_ult_anti', '$fech_ult_alch', '$presion', '$glucosa', '$observaciones', '$fech_regis', '$id_emp');";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ./lista_expedientes_clinicos.php");
          exit();
      }  
    
    }   

    ?>
