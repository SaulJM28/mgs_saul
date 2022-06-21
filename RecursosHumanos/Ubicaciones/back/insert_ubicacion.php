<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {

$nom_ubic  = $_POST['nom_ubic'];

      include("../../../includes/conexionG.php");
      $sql = "INSERT INTO ubicacione_rh (id_ubic, nom_ubic, estatus) VALUES ('', '$nom_ubic', 'ACTIVO')";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_ubicaciones.php");
          exit();
      } 
    
    }   

    ?>
