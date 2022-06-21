<?php
include "../../../includes/config.php";
include "../../../includes/utils.php";


$dbConn =  connect($db);

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['id_emp'])  )
    {
      $id_emp = $_POST['id_emp'];
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT
      HSE.sueldo_anterior, HSE.nuevo_sueldo, HSE.porcentaje, HSE.dif_sueldo, HSE.fecha_regi, ERH.nom, ERH.ap1, ERH.ap2
      FROM hist_sueldo_emp HSE
      RIGHT JOIN empleados_rh ERH
      ON HSE.id_emp = ERH.id_emp where HSE.id_emp = '$id_emp'");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit();
	  }
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>