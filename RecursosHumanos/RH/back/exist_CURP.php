<?php
include "../../../includes/config.php";
include "../../../includes/utils.php";


$dbConn =  connect($db);

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   
    if(isset($_POST['curp'])){
        $curp = $_POST['curp'];

   
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT CURP
      FROM empleados_rh WHERE CURP = '$curp'");
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