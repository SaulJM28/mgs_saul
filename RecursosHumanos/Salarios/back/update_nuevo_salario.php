<?php 
date_default_timezone_set('america/mexico_city');
if (!$_POST) {
    echo 'Código de error de la base de datos ECO-007: Valio Barriga';
} else {

$id  = $_POST['id'];
$id_emp = $_POST['id_emp'];
$fech_regis  = $_POST['fech_regis'];
$sal_actual  = $_POST['sal_actual'];
$sal_nuevo = $_POST['sal_nuevo'];
$sal_dif = $_POST['sal_dif'];
$porcentaje = $_POST['porcentaje'];
$fecha_del_dia = date('Y-m-d');

/* echo $id . " " . $nombre . " " . $fech_regis . " " . $sal_actual ." ". $sal_nuevo . " " . $sal_dif; */


      include("../../../includes/conexionG.php");
      $sql = "UPDATE hist_sueldo_emp SET sueldo_anterior = '$sal_actual', nuevo_sueldo = '$sal_nuevo', dif_sueldo = '$sal_dif', fecha_regi = '$fech_regis', porcentaje = '$porcentaje' WHERE id_suemp = '$id';";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
          header("Location: ../lista_salarios_empleados.php");
      } else {

        if($fech_regis == $fecha_del_dia){
            $sql2 = "UPDATE  empleados_rh SET sueldo = '$sal_nuevo' WHERE id_emp = '$id_emp';";
            $resultado2 = mysqli_query($enlace, $sql2);
            if(!$resultado2) {
                echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
            } else { 
                header("Location: ../lista_salarios_empleados.php");
            }
        }else {
            echo "El perido para cambiar el aumento de salario a acabado, favor de comunicarse con el encargado del sistema";
        }
       
      } 
    
    }
