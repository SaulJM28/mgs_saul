<?php


if (!$_POST) {
    echo 'Valio barriga';
} else {

      $nombre = $_POST['nom_dpto'];

      include("../../../includes/conexionG.php");
      $sql = "INSERT into departamentos 
      (id_dpto, 
      nom_dpto, 
      estatus) values ('', '$nombre', 'ACTIVO');";

      $resultado = mysqli_query($enlace, $sql);


      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_departamentos.php");
          exit();
      } 
   
       
   
    }   

