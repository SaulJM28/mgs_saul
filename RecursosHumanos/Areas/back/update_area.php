<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {
$id = $_POST['id_edit'];
$nom_area  = $_POST['nom_area_edit'];

      include("../../../includes/conexionG.php");
      $sql = "UPDATE puestos_rh SET  nom_puesto='$nom_area' WHERE id_puesto='$id';";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_areas.php");
          exit();
      } 
    
    }   

    ?>
