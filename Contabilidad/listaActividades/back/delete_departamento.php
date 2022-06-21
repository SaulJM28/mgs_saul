<?php


if (!$_POST) {
    echo 'Valio barriga';
} else {

      $id = $_POST['id_depart_elim'];
   

      include("../../../includes/conexionG.php");
      $sql = "UPDATE departamentos 
      SET 
      estatus = 'INACTIVO' WHERE id_dpto = $id;";

      $resultado = mysqli_query($enlace, $sql);


      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_departamentos.php");
          exit();
      } 
   
       
   
    }   

