<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {
$id = $_POST['id_elim'];
$nom_ubic  = $_POST['nom_ubic_elim'];

      include("../../../includes/conexionG.php");
      $sql = "UPDATE ubicacione_rh SET  estatus='INACTIVO' WHERE id_ubic='$id';";
      $resultado = mysqli_query($enlace, $sql);
      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_ubicaciones.php");
          exit();
      } 
    
    }   
?>
