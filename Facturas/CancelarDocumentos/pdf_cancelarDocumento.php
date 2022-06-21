<?php
require ('../../fpdf/fpdf.php');




class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {
    $empresa = $_GET['empresa'];
    if ($empresa == 'GRACOIL'){
        $imagenHeader = '../../static/imagenes/Gracoil_Logo-01.png';
    } else {
        $imagenHeader = '../../static/imagenes/Interamericana_v1_negro.png';
    }
    

      $this->Image($imagenHeader,80,0,50); 

    
      $this->Ln(2);
   }
}

$id_cd = $_GET['id'];
$empresa = $_GET['empresa'];

if ($empresa == 'GRACOIL'){
    include("../../includes/conexionG.php");
   $consulta = "SELECT * FROM cancelacion_doc_g WHERE id_cd = $id_cd";
    //$consulta = "SELECT * FROM cancelacion_doc WHERE id_cd = $id_cd";
    $datos = mysqli_query($enlace, $consulta);
    while ($dato = mysqli_fetch_assoc($datos)) {
        
        $id_cd = $dato['id_cd'];
        $nom_emp =  $dato['nom_emp']; 
        $fecha_sol =  $dato['fecha_sol']; 
        $dpt_sol = $dato['dpt_sol']; 
        $desc_mov = $dato['desc_mov']; 
        $nom_clie = $dato['nom_clie'];
        $num_doc =  $dato['num_doc']; 
        $fecha_doc = $dato['fecha_doc']; 
        $monto_doc = $dato['monto_doc']; 
        $fol_fisc =  $dato['fol_fisc']; 
        $tip_mov = $dato['tip_mov'];
        $num_doc_cred = $dato['num_doc_cred'];
        $fec_doc_cred = $dato['fec_doc_cred'];
        $mon_doc_cred = $dato['mon_doc_cred'];

        //dar formato a la fecha 
        setlocale(LC_ALL,"spanish");
        $fecha = str_replace("/", "-", $fecha_sol);			
        $newDate = date("d-m-Y", strtotime($fecha));				
        $fecha_Desc = strftime("%A %d de %B del %Y", strtotime($newDate));

        //obtner la fecha del dia
        $fecha_del_dia = date('d-m-Y');
        //obtener los dos últimos dígitos del años
        $anio = substr($fecha_del_dia, -2);
        //Obtener las 3 primeras letras del nombre de la empresa
        $emp = substr(strtoupper($nom_emp), -7, 3);
        //validar el id, para saber si se agrega un 0 antes o no
        if($id_cd < 10){
            $id_fac = '0'.$id_cd;
        }else{
            $id_fac = $id_cd;
        }
        //concatenar todos y guardarlo en una vairblae
        $fac = $anio.'-FAC-'.$emp.$id_fac;

        //modificacion del nombre de la empresa
        $formalNombreEmpresa =   $nom_emp.', S.A. de C.V.';
        $tam_nom_clie =  strlen($nom_clie);

        
        $fecha_doc_edit = str_replace("/", "-", $fecha_doc);			
        $newDate_edit = date("d-m-Y", strtotime($fecha_doc_edit));				
        $fecha_Desc_edit = strftime("%A %d de %B del %Y", strtotime($newDate_edit));

        
  
     
        if( $fec_doc_cred == '0000-00-00'){
            $fecha_Desc_credi = '';
        }else {
            $fecha_doc_credi = str_replace("/", "-", $fec_doc_cred);			
            $newDate_credi = date("d-m-Y", strtotime($fecha_doc_credi));				
            $fecha_Desc_credi = strftime("%A %d de %B del %Y", strtotime($newDate_credi));
        }

    }
}

if($empresa == 'INTER'){
    include("../../includes/conexionG.php");
    $consulta = "SELECT * FROM cancelacion_doc_i WHERE id_cd = $id_cd";
    $datos = mysqli_query($enlace, $consulta);
    while ($dato = mysqli_fetch_assoc($datos)) {
        
        $id_cd = $dato['id_cd'];
        $nom_emp =  $dato['nom_emp']; 
        $fecha_sol =  $dato['fecha_sol']; 
        $dpt_sol = $dato['dpt_sol']; 
        $desc_mov = $dato['desc_mov']; 
        $nom_clie = $dato['nom_clie'];
        $num_doc =  $dato['num_doc']; 
        $fecha_doc = $dato['fecha_doc']; 
        $monto_doc = $dato['monto_doc']; 
        $fol_fisc =  $dato['fol_fisc']; 
        $tip_mov = $dato['tip_mov']; 
        $num_doc_cred = $dato['num_doc_cred'];
        $fec_doc_cred = $dato['fec_doc_cred'];
        $mon_doc_cred = $dato['mon_doc_cred'];

     

        //dar formato a la fecha 
        setlocale(LC_ALL,"spanish");
        $fecha = str_replace("/", "-", $fecha_sol);			
        $newDate = date("d-m-Y", strtotime($fecha));				
        $fecha_Desc = strftime("%A %d de %B del %Y", strtotime($newDate));

        //obtner la fecha del dia
        $fecha_del_dia = date('d-m-Y');
        //obtener los dos últimos dígitos del años
        $anio = substr($fecha_del_dia, -2);
        //Obtener las 3 primeras letras del nombre de la empresa
        $emp = substr(strtoupper($nom_emp), -7, 3);
        //validar el id, para saber si se agrega un 0 antes o no
        if($id_cd < 10){
            $id_fac = '0'.$id_cd;
        }else{
            $id_fac = $id_cd;
        }
        //concatenar todos y guardarlo en una vairblae
        $fac = $anio.'-FAC-'.$emp.$id_fac;

        $nom_emp = 'Interamericana de Aceites y Lubricantes';
        //modificacion del nombre de la empresa
        $formalNombreEmpresa =   $nom_emp.', S.A. de C.V.';
        $tam_nom_clie =  strlen($nom_clie);

        
        $fecha_doc_edit = str_replace("/", "-", $fecha_doc);			
        $newDate_edit = date("d-m-Y", strtotime($fecha_doc_edit));				
        $fecha_Desc_edit = strftime("%A %d de %B del %Y", strtotime($newDate_edit));

        if( $fec_doc_cred == '0000-00-00'){
            $fecha_Desc_credi = '';
        }else {
            $fecha_doc_credi = str_replace("/", "-", $fec_doc_cred);			
            $newDate_credi = date("d-m-Y", strtotime($fecha_doc_credi));				
            $fecha_Desc_credi = strftime("%A %d de %B del %Y", strtotime($newDate_credi));
        }
   
     
    }
}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->setTextColor(255,255,255);
$pdf->setFillColor(0, 112, 192); 
$pdf->cell(95, 7, utf8_decode($fac ), 1, 0, 'C', 'true');
$pdf->cell(95, 7, utf8_decode($tip_mov ), 1, 1, 'C', 'true');

$pdf->setTextColor(0,0,0);
$pdf->setFillColor(255,255,255); 
$pdf->cell(95, 7, utf8_decode('Empresa en que se hace el movimiento' ), 1, 0, 'L', 'true');
$pdf->SetFont('Arial','',10);
$pdf->cell(95, 7, utf8_decode($formalNombreEmpresa ), 1, 1, 'L', 'true');


$pdf->cell(95, 7, utf8_decode('Fecha de solicitud' ), 1, 0, 'L', 'true');
$pdf->cell(95, 7, $fecha_Desc, 1, 1, 'L', 'true');

$pdf->cell(95, 7, utf8_decode('Departamento que solicita' ), 1, 0, 'L', 'true');
$pdf->cell(95, 7, utf8_decode($dpt_sol ), 1, 1, 'L', 'true');
/* $pdf->Multicell(0, 7, utf8_decode('Descripción del motivo: ' . $desc_mov), 1, 1, 'L', 'true'); */


if(strlen($desc_mov) >= 100 && strlen($desc_mov) <= 160){
    $pdf->cell(95, 15, utf8_decode('Descripción del motivo' ), 1, 0, 'L', 'true');
    $pdf->Multicell(0, 5, utf8_decode($desc_mov), 1, 1, 'L', 'true');
}elseif (strlen($desc_mov) >= 61 && strlen($desc_mov) <= 100){
    $pdf->cell(95, 10, utf8_decode('Descripción del motivo' ), 1, 0, 'L', 'true');
    $pdf->Multicell(0, 5, utf8_decode($desc_mov), 1, 1, 'L', 'true');
}elseif(strlen($desc_mov) >= 0 && strlen($desc_mov) <= 60){
    $pdf->cell(95, 5, utf8_decode('Descripción del motivo' ), 1, 0, 'L', 'true');
    $pdf->Multicell(0, 5, utf8_decode($desc_mov), 1, 1, 'L', 'true');
}else {
    $pdf->cell(95, 5, utf8_decode('Descripción del motivo' ), 1, 0, 'L', 'true');
    $pdf->cell(0, 5, utf8_decode($desc_mov), 1, 1, 'L', 'true');
}


$pdf->setTextColor(255,255,255);
$pdf->setFillColor(0, 112, 192); 
$pdf->cell(0, 7, utf8_decode('DATOS DEL DOCUMENTO A MODIFICAR' ), 1, 1, 'C', 'true');

$pdf->setTextColor(0,0,0);
$pdf->setFillColor(255,255,255); 

if( $tam_nom_clie > 50){
    $pdf->cell(95, 20, utf8_decode('Nombre del cliente' ), 1, 0, 'L', 'true');
    $pdf->Multicell(95, 10, utf8_decode($nom_clie ), 1, 1, 'L', 'true');
}else{
    $pdf->cell(95, 7, utf8_decode('Nombre del cliente' ), 1, 0, 'L', 'true');
    $pdf->cell(95, 7, utf8_decode($nom_clie ), 1, 1, 'L', 'true');
}




$pdf->cell(95, 7, utf8_decode('Número del documento' ), 1, 0, 'L', 'true');
$pdf->cell(95, 7, utf8_decode($num_doc ), 1, 1, 'L', 'true');

$pdf->cell(95, 7, utf8_decode('Fecha del documento' ), 1, 0, 'L', 'true');
$pdf->cell(95, 7, $fecha_Desc_edit , 1, 1, 'L', 'true');

$pdf->cell(95, 7, utf8_decode('Monto del documento' ), 1, 0, 'L', 'true');
$pdf->cell(95, 7, utf8_decode('$'. number_format($monto_doc, 2) ), 1, 1, 'L', 'true');


$pdf->cell(95, 7, utf8_decode('Folio fiscal por afectar' ), 1, 0, 'L', 'true');
$pdf->cell(95, 7, utf8_decode( $fol_fisc ), 1, 1, 'L', 'true');

$pdf->setTextColor(255,255,255);
$pdf->setFillColor(0, 112, 192); 
$pdf->cell(0, 7, utf8_decode('DATOS DE LA NOTA DE CRÉDITO' ), 1, 1, 'C', 'true');

$pdf->SetFont('Arial','',10);
$pdf->setTextColor(0,0,0);
$pdf->setFillColor(255,255,255); 
$pdf->cell(95, 7, utf8_decode('Número del documento' ), 1, 0, 'L', 'true');
$pdf->cell(95, 7, utf8_decode($num_doc_cred ), 1, 1, 'L', 'true');

$pdf->cell(95, 7, utf8_decode('Fecha del documento' ), 1, 0, 'L', 'true');
$pdf->cell(95, 7,  $fecha_Desc_credi, 1, 1, 'L', 'true');

$pdf->cell(95, 7, utf8_decode('Monto del documento' ), 1, 0, 'L', 'true');

if($mon_doc_cred == ''){
    $pdf->cell(95, 7, utf8_decode(''), 1, 1, 'L', 'true');
}else {
    $pdf->cell(95, 7, utf8_decode('$' . number_format($mon_doc_cred, 2)), 1, 1, 'L', 'true');
}




$pdf->cell(95, 10, utf8_decode('Gerencia:  MDF Lilian Flores Tovar' ), 1, 0, 'L', 'true');
$pdf->cell(95, 10, utf8_decode('' ), 1, 1, 'L', 'true');

$pdf->cell(95, 10, utf8_decode('Contabilidad: L.C. Santos Santiago Medina' ), 1, 0, 'L', 'true');
$pdf->cell(95, 10, utf8_decode('' ), 1, 1, 'L', 'true');

$pdf->cell(95, 10, utf8_decode('Facturación: Míriam Pérez y/o Esmeralda Castro' ), 1, 0, 'L', 'true');
$pdf->cell(95, 10, utf8_decode('' ), 1, 1, 'L', 'true');

$pdf->cell(95, 10, utf8_decode('Ventas: Leobardo y/o Emma' ), 1, 0, 'L', 'true');
$pdf->cell(95, 10, utf8_decode('' ), 1, 1, 'L', 'true');

$pdf->cell(95, 10, utf8_decode('Inventarios: Blanca de la Cruz' ), 1, 0, 'L', 'true');
$pdf->cell(95, 10, utf8_decode('' ), 1, 1, 'L', 'true');

$pdf->cell(95, 10, utf8_decode('Crédito y cobranza: Rubicelia Caballero' ), 1, 0, 'L', 'true');
$pdf->cell(95, 10, utf8_decode('' ), 1, 1, 'L', 'true');

$pdf->output();
