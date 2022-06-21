<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {

$id_rpt = $_POST['id_rpt'];
$id_emp  = $_POST['empleado'];
$id_ubi = $_POST['ubicacion'];
$talla  = $_POST['talla'];
$peso = $_POST['peso'];
$edad = $_POST['edad'];
$imc  = $_POST['imc'];
$cintura = $_POST['cintura'];
$cadera	= $_POST['cadera'];
$porc_gra  = $_POST['porc_gra'];
$porc_musc = $_POST['porc_musc'];
$glucosa = $_POST['glucosa'];
$fech_regis = $_POST['fech_regis'];
$MA = $_POST['MA'];
$T_A = $_POST['T_A'];

/* echo $id_rpt .' '. $id_emp .' '. $talla .' '. $peso .' '. $edad .' '. $imc .' '. $cintura .' '. $cadera .' '. $porc_gra .' '. $porc_musc .' '. $glucosa .' '. $MA . ' ' . $T_A  . ' ' . $fech_regis . ' ' . $id_ubi;

 */
  include("../../../includes/conexionG.php");
  $sql = "UPDATE regis_talla_peso  SET `edad` = '$edad', `peso` = '$peso', `talla` = '$talla', `cintura` = '$cintura', `cadera` = '$cadera', `T_A` = '$T_A', `glucosa` = '$glucosa', `IMC` = '$imc', `porc_gra` = '$porc_gra', `porc_musc` = '$porc_musc', `MA` = '$MA', `fecha_regis` = '$fech_regis', `id_emp` = $id_emp, `id_ubic` = '$id_ubi', `estatus` = 'ACTIVO' WHERE id_rpt = '$id_rpt';";
  
  $resultado = mysqli_query($enlace, $sql);

  if (!$resultado) {
    echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
  }else{
    echo'<script type="text/javascript">alert("Registro éxitoso"); window.location.href="../lista_peso_talla.php";</script>';
    exit();
  }
    
    }   

    ?>
