<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {
$id = $_POST['id'];
$nom  = $_POST['nom_emp'];
$ap1	= $_POST['ap1_emp'];
$ap2  = $_POST['ap2_emp'];
$NSS  = $_POST['nss'];
$CURP = $_POST['CURP'];
$RFC  = $_POST['RFC'];
$Fech_nac = $_POST['fech_nac'];
$tel_mov	= $_POST['tel'];
$correo  = $_POST['correo_emp'];
$gra_aca = $_POST['gra_aca'];
$nom_carr  = $_POST['nom_carr'];
$est_civ = $_POST['est_civ'];
$hijos = $_POST['hijos'];
$num_hijos = $_POST['num_hijos'];
$num_conct_emer = $_POST['num_conct_emerg'];
$sueldo = $_POST['sueldo'];
$puesto = $_POST['puesto'];
$empresa = $_POST['empresa'];
$ubicacion = $_POST['ubicacion'];

      include("../../../includes/conexionG.php");
      $sql = "UPDATE empleados_rh SET  nom='$nom', ap1='$ap1', ap2='$ap2', NSS='$NSS', CURP='$CURP', RFC='$RFC', Fech_nac='$Fech_nac', tel_mov='$tel_mov', correo='$correo', gra_aca='$gra_aca', nom_carr='$nom_carr', est_civ='$est_civ' ,hijos='$hijos', num_hijos='$num_hijos', num_conct_emer='$num_conct_emer', sueldo='$sueldo', puesto='$puesto', empresa='$empresa', ubicacion='$ubicacion' WHERE id_emp='$id';";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {
          header("Location: ../lista_empleados.php");
          exit();
      } 
    
    }   

    ?>
