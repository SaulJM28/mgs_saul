<?php
$sDirectorio = '../../cp-xml/cp-Timbradas/cp-'.$_GET["nik"].'-Timbrada.xml';
 header("Content-type: application/force-download"); 
 header("Content-Disposition: attachment; filename=".'cp-'.basename($_GET["nik"]).'.xml'); 
 header("Content-Transfer-Encoding: binary"); 
 header("Content-Length: ".filesize($sDirectorio)); 
 readfile($sDirectorio);      
?>