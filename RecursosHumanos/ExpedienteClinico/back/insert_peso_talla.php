<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {

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

/* echo $id_emp .' '. $talla .' '. $peso .' '. $edad .' '. $imc .' '. $cintura .' '. $cadera .' '. $porc_gra .' '. $porc_musc .' '. $glucosa .' '. $MA . ' ' . $T_A  . ' ' . $fech_regis . ' ' . $id_ubi; */


      include("../../../includes/conexionG.php");
      $sql = "INSERT INTO regis_talla_peso (`id_rpt`, `edad`, `peso`, `talla`, `cintura`, `cadera`, `T_A`, `glucosa`, `IMC`, `porc_gra`, `porc_musc`, `MA`, `fecha_regis`, `estatus`,  `id_emp`, `id_ubic`) VALUES ('', '$edad', '$peso', '$talla', '$cintura', '$cadera', '$T_A', '$glucosa', '$imc', '$porc_gra', '$porc_musc', '$MA', '$fech_regis', 'ACTIVO',  '$id_emp', '$id_ubi');";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
        echo'<script type="text/javascript">
            alert("Registro éxitoso");
            window.location.href="../lista_peso_talla.php";
            </script>';
          exit();
      }  
    
    }   

    ?>
