<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {
$id = $_POST['id_elim'];


      include("../../../includes/conexionG.php");
      $sql = "UPDATE empleados_rh SET  estatus='INACTIVO' WHERE id_emp='$id';";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_empleados.php");
          exit();
      } 
    
    }   

    ?>
