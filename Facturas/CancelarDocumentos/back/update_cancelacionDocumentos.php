<?php


if (!$_POST) {
    echo 'Valio barriga';
} else {
    $id = $_POST['id_cd'];
    $emp = $_POST["emp"];
    $fecha_solic  = $_POST['fecha_solic'];
    $demp_solic = $_POST['demp_solic'];
    $desc_mot = $_POST['desc_mot'];
    $tip_mov = $_POST['tip_mov'];
    $nom_clie = $_POST['nom_clie'];
    $num_doc = $_POST['num_doc'];
    $fec_doc = $_POST['fec_doc'];
    $mon_doc = $_POST['mon_doc'];
    $fol_fisc_afect = $_POST['fol_fisc_afect'];
    $num_doc_cred = $_POST['num_doc_cred'];
    $fec_doc_cred = $_POST['fec_doc_cred'];
    $mon_doc_cred = $_POST['mon_doc_cred'];



    if ($emp == 'GRACOIL') {
        include("../../../includes/conexionG.php");
        $sql = "UPDATE cancelacion_doc_g SET 
	    nom_emp = '$emp',
	    fecha_sol = '$fecha_solic',
	    dpt_sol = '$demp_solic',
	    desc_mov = '$desc_mot',
        tip_mov = '$tip_mov',
	    nom_clie = '$nom_clie',
	    num_doc = '$num_doc',
	    fecha_doc = '$fec_doc',
	    monto_doc = '$mon_doc',
	    fol_fisc = '$fol_fisc_afect',
        num_doc_cred = '$num_doc_cred',
        fec_doc_cred = '$fec_doc_cred',
        mon_doc_cred = '$mon_doc_cred'
        WHERE id_cd = '$id'";

        $resultado = mysqli_query($enlace, $sql);


        if (!$resultado) {

            echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
        } else {
            header("Location: ../cancelarDocumento.php");
            exit();
        }
    } else if ($emp == 'INTER') {
        include("../../../includes/conexionG.php");

        $sql = "UPDATE cancelacion_doc_i SET 
	    nom_emp = '$emp',
	    fecha_sol = '$fecha_solic',
	    dpt_sol = '$demp_solic',
	    desc_mov = '$desc_mot',
        tip_mov = '$tip_mov',
	    nom_clie = '$nom_clie',
	    num_doc = '$num_doc',
	    fecha_doc = '$fec_doc',
	    monto_doc = '$mon_doc',
	    fol_fisc = '$fol_fisc_afect',
        num_doc_cred = '$num_doc_cred',
        fec_doc_cred = '$fec_doc_cred',
        mon_doc_cred = '$mon_doc_cred'
        WHERE id_cd = '$id'";

        $resultado = mysqli_query($enlace, $sql);


        if (!$resultado) {

            echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
        } else {
            header("Location: ../cancelarDocumento.php");
            exit();
        }
    }
}
