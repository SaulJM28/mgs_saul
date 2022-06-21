<?php
include "../../../includes/config.php";
include "../../../includes/utils.php";


$dbConn =  connect($db);

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['fini']) && isset($_POST['ffin'])  )
    {
      $fini = $_POST['fini'];
      $ffin = $_POST['ffin'];
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT HCE.id_hce, HCE.alergias, HCE.desc_alerg, HCE.talla, HCE.peso, HCE.IMC, HCE.cintura, HCE.cadera, HCE.porc_gra, HCE.porc_musc, HCE.edad_met, HCE.fecha_ult_covid, HCE.fecha_ult_anti, HCE.fecha_ult_alch, HCE.presion, HCE.glucosa, HCE.Observaciones,  HCE.fecha_regis, HCE.id_emp, ERH.nom, ERH.ap1, ERH.ap2 FROM hist_clic_emple HCE JOIN empleados_rh ERH ON HCE.id_emp = ERH.id_emp WHERE HCE.fecha_regis BETWEEN '$fini' AND '$ffin'"); 
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