<?php
if (!$_POST) {
    echo 'Valio barriga';
} else {

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
$fecha_regis = $_POST['fecha_regis'];
$sueldo = $_POST['sueldo'];
$puesto = $_POST['puesto'];
$empresa = $_POST['empresa'];
$ubicacion = $_POST['ubicacion'];

      include("../../../includes/conexionG.php");
      
      $sql = "INSERT INTO empleados_rh (id_emp, nom, ap1, ap2, NSS, CURP, RFC, Fech_nac, tel_mov, correo, gra_aca, nom_carr, est_civ,hijos, num_hijos, num_conct_emer, fec_alt, sueldo, puesto, empresa, ubicacion, estatus) VALUES ('', '$nom', '$ap1', '$ap2', '$NSS', '$CURP', '$RFC', '$Fech_nac', '$tel_mov', '$correo', '$gra_aca', '$nom_carr', '$est_civ', '$hijos', '$num_hijos', '$num_conct_emer', '$fecha_regis', '$sueldo', '$puesto', '$empresa', '$ubicacion', 'ACTIVO');";

      $resultado = mysqli_query($enlace, $sql);

      if (!$resultado) {
          echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
      } else {

        header("Location: ../../ExpedienteClinico/create_peso_talla.php");

          /* header("Location: ../lista_empleados.php"); */
          exit();
      } 
    
    }   

    ?>
