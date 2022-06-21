<?php


if (!$_POST) {
    echo 'Valio barriga';
} else {

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
        //base del servidor cancelacion_doc_g

        $sql = "INSERT INTO cancelacion_doc_g(
        id_cd,
	    nom_emp,
	    fecha_sol,
	    dpt_sol,
	    desc_mov,
        tip_mov,
	    nom_clie,
	    num_doc,
	    fecha_doc,
	    monto_doc,
	    fol_fisc,
        num_doc_cred,
        fec_doc_cred,
        mon_doc_cred
        ) VALUES(
            '',
            '$emp',
            '$fecha_solic',
            '$demp_solic',
            '$desc_mot',
            '$tip_mov',
            '$nom_clie',
            '$num_doc',
            '$fec_doc',
            '$mon_doc',
            '$fol_fisc_afect',
            '$num_doc_cred',
            '$fec_doc_cred',
            '$mon_doc_cred'
        )";

        $resultado = mysqli_query($enlace, $sql);


        if (!$resultado) {

            echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
        } else {
            header("Location: ../cancelarDocumento.php");
            exit();
        }
    } else if ($emp == 'INTER') {
        include("../../../includes/conexionG.php");

        $sql = "INSERT INTO cancelacion_doc_i(
            id_cd,
            nom_emp,
            fecha_sol,
            dpt_sol,
            desc_mov,
            tip_mov,
            nom_clie,
            num_doc,
            fecha_doc,
            monto_doc,
            fol_fisc,
            num_doc_cred,
            fec_doc_cred,
            mon_doc_cred
            ) VALUES(
                '',
                '$emp',
                '$fecha_solic',
                '$demp_solic',
                '$desc_mot',
                '$tip_mov',
                '$nom_clie',
                '$num_doc',
                '$fec_doc',
                '$mon_doc',
                '$fol_fisc_afect',
                '$num_doc_cred',
                '$fec_doc_cred',
                '$mon_doc_cred'
            )";

        $resultado = mysqli_query($enlace, $sql);


        if (!$resultado) {

            echo "Error: " . $sql . "<br>" . mysqli_error($enlace);
        } else {
            header("Location: ../cancelarDocumento.php");
            exit();
        }
    }
}
