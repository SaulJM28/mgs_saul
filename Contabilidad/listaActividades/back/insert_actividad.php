<?php


if (!$_POST) {
  echo 'Valio barriga';
} else {



  $acti = $_POST['nom_acti'];
  $fecha_lim = $_POST['fecha_lim'];
  $avance = $_POST['avance'];
  $present = $_FILES['prese']['name'];
  $revisado = $_POST['revi'];
  $comp = $_POST['comp'];
  $dept = $_POST['dpto'];
  $obser = $_POST['observaciones'];


  $directorio = '../evidencias/';
  $subir_archivo = $directorio . basename($_FILES['prese']['name']);
  /*   $tipo = $_FILES['prese']['type'];
    $formato =   explode('/', $tipo, 2);

    $archivo = "folio-00".$folio."-tq1.".$formato[1];

    echo $tipo; */

  /*   $nombre_archivo = '../evidencias/MyPDF.pdf';
if (file_exists($nombre_archivo)) {
    echo "La última modificación de $nombre_archivo fue: " . date ("F d Y H:i:s.", filemtime($nombre_archivo));
} */

  if (move_uploaded_file($_FILES['prese']['tmp_name'], $subir_archivo)) {
    echo "El archivo es válido y se cargó correctamente.<br><br>";
    include("../../../includes/conexionG.php");
    $sql = "INSERT INTO actividades_contador(
          id_ac,
          acti,
          fecha_lim,
          avance,
          present,
          revisado,
          comp,
          dept,
          obser
          ) VALUES(
              '',
              '$acti',
              '$fecha_lim',
              '$avance',
              '$present',
              '$revisado',
              '$comp',
              '$dept',
              '$obser'
           )";

    $resultado = mysqli_query($enlace, $sql);


    if (!$resultado) {
      echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
    } else {
      header("Location: ../lista_actividades.php");
      exit();
    }
  } else {
    include("../../../includes/conexionG.php");
    $sql = "INSERT INTO actividades_contador(
          id_ac,
          acti,
          fecha_lim,
          avance,
          present,
          revisado,
          comp,
          dept,
          obser
          ) VALUES(
              '',
              '$acti',
              '$fecha_lim',
              '$avance',
              'N/A',
              '$revisado',
              '$comp',
              '$dept',
              '$obser'
           )";

    $resultado = mysqli_query($enlace, $sql);


    if (!$resultado) {
      echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
    } else {
      header("Location: ../lista_actividades.php");
      exit();
    }
  }
}
