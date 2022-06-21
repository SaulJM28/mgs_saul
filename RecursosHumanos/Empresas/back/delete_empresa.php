<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {
$id = $_POST['id_elim'];
$nom_emp  = $_POST['nom_emp_elim'];

      include("../../../includes/conexionG.php");
      $sql = "UPDATE empresas_rh SET  estatus='INACTIVO' WHERE id_empresa='$id';";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_empresas.php");
          exit();
      } 
    
    }   

?>
