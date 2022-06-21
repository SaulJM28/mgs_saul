<?php 
if (!$_POST) {
    echo 'Código de error de la base de datos ECO-007: Valio Barriga';
} else {

$empleado  = $_POST['empleado'];
$fech_regis	= $_POST['fech_regis'];
$sal_actual  = $_POST['sal_actual'];
$sal_nuevo  = $_POST['sal_nuevo'];
$sal_dif = $_POST['sal_dif'];
$porcentaje = $_POST['porcentaje'];

/* echo $empleado . " " . $fech_regis . " " . $sal_actual . " " . $sal_nuevo ." ". $sal_dif;
 */

     include("../../../includes/conexionG.php");
      $sql = "INSERT INTO hist_sueldo_emp (id_suemp, sueldo_anterior, nuevo_sueldo, dif_sueldo, porcentaje,  fecha_regi, id_emp) VALUES ('', '$sal_actual', '$sal_nuevo', '$sal_dif', '$porcentaje','$fech_regis', '$empleado');";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
        $sql2 = "UPDATE  empleados_rh SET sueldo = '$sal_nuevo' WHERE id_emp = '$empleado';";

            $resultado2 = mysqli_query($enlace, $sql2);
            if(!$resultado2) {
                echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
            } else { 
                header("Location: ../lista_salarios_empleados.php");
            }
          exit();
      }  
    
    }   








?>