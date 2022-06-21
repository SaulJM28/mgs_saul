<?php
include "../../../includes/config.php";
include "../../../includes/utils.php";


$dbConn =  connect($db);

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['id_rtp']) )
    {
      $id_rtp = $_POST['id_rtp'];
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT RTP.id_rpt, RTP.edad, RTP.peso, RTP.talla, RTP.cintura, RTP.cadera, RTP.T_A, RTP.glucosa, RTP.IMC, RTP.porc_gra, RTP.porc_musc, RTP.MA, RTP.fecha_regis, RTP.id_emp, RTP.id_ubic, ERH.nom, ERH.ap1, ERH.ap2, URH.nom_ubic FROM regis_talla_peso RTP INNER JOIN empleados_rh ERH ON RTP.id_emp = ERH.id_emp INNER JOIN ubicacione_rh URH ON RTP.id_ubic = URH.id_ubic WHERE  RTP.id_rpt = '$id_rtp'"); 
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetch()  );
      exit();
	  }
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>