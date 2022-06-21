<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {

$nom_area  = $_POST['nom_area'];

      include("../../../includes/conexionG.php");
      $sql = "INSERT INTO puestos_rh (id_puesto, nom_puesto, estatus) VALUES ('', '$nom_area', 'ACTIVO')";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_areas.php");
          exit();
      } 
    
    }   

    ?>
