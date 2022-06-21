<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {
$id = $_POST['id_elim'];

      include("../../../includes/conexionG.php");
      $sql = "UPDATE puestos_rh SET  estatus='INACTIVO' WHERE id_puesto='$id';";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_areas.php");
          exit();
      } 
    
    }   

    ?>
