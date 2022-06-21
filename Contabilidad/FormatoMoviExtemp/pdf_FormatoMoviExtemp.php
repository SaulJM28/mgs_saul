<?php
require('../../fpdf/fpdf.php');

class PDF extends FPDF
{
    //Cabecera de página
    function Header()
    {
        $empresa = $_GET['empresa'];
        if ($empresa == 'GRACOIL') {
            $imagenHeader = '../../static/imagenes/Gracoil_Logo-01.png';
            $titulo = 'GRACOIL, S.A. DE C.V.';
        } elseif ($empresa == 'INTER'){
            $imagenHeader = '../../static/imagenes/Interamericana_v1_negro.png';
            $titulo = 'INTERAMERICANA, S.A. DE C.V.';
        } elseif($empresa == 'CARBURANTE'){
            $imagenHeader = '../../static/imagenes/Carburantes_v2_negro.png';
            $titulo = 'CARBURANTES DEL CENTRO, S.A. DE C.V.';
        } elseif($empresa == 'NINO'){
            $imagenHeader = '../../static/imagenes/Transliquidos.jpg';
            $titulo = 'TRANSLIQUIDOS DE HIDALGO, S.A. DE C.V.';
        }


        $this->Image($imagenHeader, 0, 0, 40);

        $this->SetFont('Arial', '', 16);
        $this->setTextColor(0, 0, 0);

        $this->cell(0, 10, $titulo, 0, 1, 'C');

        $this->Ln(2);
    }
}

$id_ext = $_GET['id'];
$empresa = $_GET['empresa'];


    include("../../includes/conexionG.php");
    $consulta = "SELECT * FROM mov_ext_empresa WHERE id_ext = $id_ext";
    $datos = mysqli_query($enlace, $consulta);
    while ($dato = mysqli_fetch_assoc($datos)) {

        $id_ext = $dato['id_ext'];
        $no_ope =  $dato['no_ope'];
        $clv_sol_inc =  $dato['clv_sol_inc'];
        $area = $dato['area'];
        $proceso = $dato['proceso'];
        $importe = $dato['importe'];
        $solicitud =  $dato['solicitud'];
        $fec_lim_reg = $dato['fec_lim_reg'];
        $fec_cap = $dato['fec_cap'];
        $dias_atra =  $dato['dias_atra'];
        $just = $dato['just'];
        $obser = $dato['obser'];
        $nom_resp_area = $dato['nom_resp_area'];
        $nom_resp_proc = $dato['nom_resp_proc'];
        $empresa = $dato['empresa'];

        //dar formato a la fecha 
        setlocale(LC_ALL, "spanish");
        $fecha_del_dia = date('d-m-Y');
        $fecha = str_replace("/", "-", $fecha_del_dia);
        $newDate = date("d-m-Y", strtotime($fecha));
        $fecha_Desc = strftime("%A %d de %B del %Y", strtotime($newDate));

        //Obtener las 3 primeras letras del nombre de la empresa
        $emp = substr(strtoupper($empresa), -7, 3);
        //validar el id, para saber si se agrega un 0 antes o no
        if ($id_ext < 10) {
            $id_fac = '0' . $id_ext;
        } else {
            $id_fac = $id_ext;
        }
        //concatenar todos y guardarlo en una vairblae
        $fac = $emp . '-EXT-' . $id_fac;




        $fec_lim_reg_dec = str_replace("/", "-", $fec_lim_reg);
        $newDate_desc = date("d-m-Y", strtotime($fec_lim_reg_dec));
        $fec_lim_reg_dec_com = strftime("%A %d de %B del %Y", strtotime($newDate_desc));


        $fec_cap_dec = str_replace("/", "-", $fec_cap);
        $newDate_cap_dec = date("d-m-Y", strtotime($fec_cap_dec));
        $fec_cap_dec_com = strftime("%A %d de %B del %Y", strtotime($newDate_cap_dec));
    }
//Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();

$pdf->cell(0, 7, utf8_decode('FORMATO MOVIMIENTOS EXTEMPORANEOS'), 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 10);
$pdf->setTextColor(0, 0, 0);
$pdf->setFillColor(255, 255, 255);

$pdf->cell(75);
$pdf->cell(25, 7, utf8_decode('Indicador'), 1, 0, 'L', 'true');
$pdf->cell(0, 7, utf8_decode($fac), 1, 1, 'L', 'true');

$pdf->cell(75);
$pdf->cell(25, 7, utf8_decode('Fecha del dia'), 1, 0, 'L', 'true');
$pdf->cell(0, 7, $fecha_Desc, 1, 1, 'L', 'true');

$pdf->cell(75);
$pdf->cell(25, 7, utf8_decode('No Operación'), 1, 0, 'L', 'true');
$pdf->cell(0, 7, utf8_decode($no_ope), 1, 1, 'L', 'true');

$pdf->Ln(5);

$pdf->cell(75, 7, utf8_decode('CLAVE DE LA SOLICITUD O  INCIDENCIA'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode($clv_sol_inc), 1, 1, 'L', 'true');

$pdf->cell(75, 7, utf8_decode('ÁREA'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode($area), 1, 1, 'L', 'true');

$pdf->cell(75, 7, utf8_decode('PROCESO'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode($proceso), 1, 1, 'L', 'true');

$pdf->cell(75, 7, utf8_decode('IMPORTE'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode( '$'. number_format($importe, 2)), 1, 1, 'L', 'true');

$pdf->cell(75, 7, utf8_decode('SOLICTUD'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode($solicitud), 1, 1, 'L', 'true');

$pdf->cell(75, 7, utf8_decode('FECHA LÍMITE DE REGISTRO'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, $fec_lim_reg_dec_com, 1, 1, 'L', 'true');

$pdf->cell(75, 7, utf8_decode('FECHA DE CAPTURA'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, $fec_cap_dec_com, 1, 1, 'L', 'true');

$pdf->cell(75, 7, utf8_decode('DÍAS DE ATRASO'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode($dias_atra), 1, 1, 'L', 'true');


$pdf->Multicell(0, 5, utf8_decode('JUSTIFICACIÓN: ' .$just), 1, 1, 'L', 'true');


$pdf->Multicell(0, 5, utf8_decode("OBSERVACIONES: " .$obser), 1, 1, 'L', 'true');

$pdf->Ln(5);
$pdf->cell(30, 14, utf8_decode('Área'), 1, 0, 'L', 'true');

$pdf->Multicell(0, 7, utf8_decode('El presente documento sirve para determinar el alcance de la incidencia y será de conocimiento de las áreas en las que tiene repercusión para su corrección'), 1, 1, 'L', 'true');

$pdf->cell(30, 7, utf8_decode('Área'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode(''), 1, 1, 'L', 'true');

$pdf->cell(30, 7, utf8_decode('Área'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode(''), 1, 1, 'L', 'true');
$pdf->cell(30, 7, utf8_decode('Área'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode(''), 1, 1, 'L', 'true');
$pdf->cell(30, 7, utf8_decode('Área'), 1, 0, 'L', 'true');

$pdf->cell(0, 7, utf8_decode(''), 1, 1, 'L', 'true');

$pdf->Ln(40);


$pdf->SetFont('Arial', '', 8);
$pdf->setTextColor(0, 0, 0);
$pdf->setFillColor(255, 255, 255);

$pdf->cell(20);
$pdf->cell(47.5, 7, utf8_decode('NOMBRE DEL RESPONSABLE DE ÁREA: '), 'T', 0, 'C', 'true');
$pdf->cell(47.5);
$pdf->cell(47.5, 7, utf8_decode('NOMBRE DEL RESPONSABLE DEL PROCESO: '), 'T', 1, 'C', 'true');

$pdf->cell(20);
$pdf->cell(47.5, 7, utf8_decode($nom_resp_area), 0, 0, 'C', 'true');
$pdf->cell(47.5);
$pdf->cell(47.5, 7, utf8_decode($nom_resp_proc), 0, 1, 'C', 'true');

$pdf->output();
