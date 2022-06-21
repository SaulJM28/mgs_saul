<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {

$id_rpt = $_POST['id_rpt'];


/* echo $id_rpt .' '. $id_emp .' '. $talla .' '. $peso .' '. $edad .' '. $imc .' '. $cintura .' '. $cadera .' '. $porc_gra .' '. $porc_musc .' '. $glucosa .' '. $MA . ' ' . $T_A  . ' ' . $fech_regis . ' ' . $id_ubi;
 */

  include("../../../includes/conexionG.php");
  $sql = "UPDATE regis_talla_peso  SET `estatus` = 'INACTIVO'  WHERE id_rpt = '$id_rpt';";
  
  $resultado = mysqli_query($enlace, $sql);

  if (!$resultado) {
    echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
  }else{
    exit();
  }
    
    }   

    ?>
