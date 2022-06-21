<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {

$nom_emp  = $_POST['nom_emp'];

      include("../../../includes/conexionG.php");
      $sql = "INSERT INTO empresas_rh (id_empresa, nom_emp, estatus) VALUES ('', '$nom_emp', 'ACTIVO')";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_empresas.php");
          exit();
      } 
    
    }   

    ?>
