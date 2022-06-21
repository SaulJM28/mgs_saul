<?php
include "../../../includes/config.php";
include "../../../includes/utils.php";


$dbConn =  connect($db);

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['fini']) && isset($_POST['ffin']) && isset($_POST['id_ubic'])   )
    {
      $fini = $_POST['fini'];
      $ffin = $_POST['ffin'];
      $id_ubic = $_POST['id_ubic'];
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT RTP.id_rpt, RTP.edad, RTP.peso, RTP.talla, RTP.cintura, RTP.cadera, RTP.T_A, RTP.glucosa, RTP.IMC, RTP.porc_gra, RTP.porc_musc, RTP.MA, RTP.fecha_regis, RTP.id_emp, RTP.id_ubic, ERH.nom, ERH.ap1, ERH.ap2, URH.nom_ubic FROM regis_talla_peso RTP INNER JOIN empleados_rh ERH ON RTP.id_emp = ERH.id_emp INNER JOIN ubicacione_rh URH ON RTP.id_ubic = URH.id_ubic WHERE  URH.id_ubic = '$id_ubic' AND RTP.fecha_regis BETWEEN '$fini' AND '$ffin'"); 
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