<?php


if (!$_POST) {
    echo 'Valio barriga';
} else {

      $id = $_POST['id_depart'];
      $nombre = $_POST['nom_dpto_edit'];

      include("../../../includes/conexionG.php");
      $sql = "UPDATE departamentos 
      SET 
      nom_dpto = '$nombre' WHERE id_dpto = $id ;";

      $resultado = mysqli_query($enlace, $sql);


      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_departamentos.php");
          exit();
      } 
   
       
   
    }   

