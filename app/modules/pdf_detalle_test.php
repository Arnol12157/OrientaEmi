<?php

require_once("../dompdf/dompdf_config.inc.php");
require_once 'requires.php';
$id=$_REQUEST['id'];
require_once 'Ctrl_Reportes.php';


$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TEST</title>
</head>
<body>
<div class="col-md-12">
    <img src="https://admision.emi.edu.bo/saga/media/mlogoemi.png" class="pull-left" width="72" />
</div>
<div class="col-md-12" style="text-align: center">
        <h1 class="text-center">Perfil de Interes y</h1>
        <h1 class="text-center">Aptitudes para Ingenieria</h1>
</div>
<div class="col-md-12">
    <p>El(la) estudiante  ha sido diagnosticado(a) de la siguiente forma:</p>
</div>
<input type="hidden" id="res_EP" value="<?= $pruebaAp[0]["res_EP"]*100/30 ?>">
                                <input type="hidden" id="res_MC" value="'. $pruebaAp[0]["res_MC"]*100/30 .'">
                                <input type="hidden" id="res_PE" value="'. $pruebaAp[0]["res_PE"]*100/30 .'">
                                <input type="hidden" id="res_VE" value="'. $pruebaAp[0]["res_VE"]*100/30 .'">
                                <input type="hidden" id="res_V" value="'. $pruebaAp[0]["res_V"]*100/30 .'">
                                <input type="hidden" id="res_CB" value="'. $pruebaAp[0]["res_CB"]*100/30 .'">
                                <input type="hidden" id="res_C" value="'. $pruebaAp[0]["res_C"]*100/30 .'">
                                <input type="hidden" id="res_ACA" value="'. $pruebaAp[0]["res_CA"]*100/30 .'">
                                <input type="hidden" id="res_A" value="'. $pruebaAp[0]["res_A"]*100/30 .'">
                                <input type="hidden" id="res_CI" value="'. $pruebaAp[0]["res_CI"]*100/30 .'">
<input type="hidden" id="res_TI" value="'. $pruebaOV[0]["res_TI"]*100/30 .'">
                                <input type="hidden" id="res_MP" value="'. $pruebaOV[0]["res_MP"]*100/30 .'">
                                <input type="hidden" id="res_DC" value="'. $pruebaOV[0]["res_DC"]*100/30 .'">
                                <input type="hidden" id="res_CQI" value="'. $pruebaOV[0]["res_CQI"]*100/30 .'">
                                <input type="hidden" id="res_COM" value="'. $pruebaOV[0]["res_COM"]*100/30 .'">
                                <input type="hidden" id="res_MA" value="'. $pruebaOV[0]["res_MA"]*100/30 .'">
                                <input type="hidden" id="res_CP" value="'. $pruebaOV[0]["res_CP"]*100/30 .'">
                                <input type="hidden" id="res_CA" value="'. $pruebaOV[0]["res_CA"]*100/30 .'">
                                <input type="hidden" id="res_AR" value="'. $pruebaOV[0]["res_AR"]*100/30 .'">
                                <input type="hidden" id="res_CT" value="'. $pruebaOV[0]["res_CT"]*100/30 .'">
<div class="col-md-12" id="perfil">
    <div id="chartPerfil" width="400" height="250"></div>
    <div class="small-box bg-green col-md-12">
        <div class="inner">
            <h3>60<sup style="font-size: 20px">%</sup></h3>
            <p>Tus aptitudes e intereses se encuentran en el mismo rango, por lo tanto puedes considerar en primer lugar actividades propias de esta area, se le recomienda la carrera de: <?= $fuzzyShow[0][\'carrera\'] ?></p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
    </div>
</div>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5"><CENTER><strong>REPORTE DE ESTUDIANTES</strong></CENTER></td>
  </tr>
  <tr bgcolor="#adff2f">
    <td bgcolor="#adff2f"><strong>CI</strong></td>
        <td bgcolor="#adff2f"><strong>Nombres</strong></td>
        <td bgcolor="#adff2f"><strong>Apellidos</strong></td>
        <td bgcolor="#adff2f"><strong>Aptitud para ingenieria</strong></td>
        <td bgcolor="#adff2f"><strong>Carrera segun test</strong></td>
  </tr>';


foreach($estudiantesRep as $est)
{
    $aptoRep="NO REALIZO EL TEST";
    $carreraRep="NO REALIZO EL TEST";
    $codigoHTML.= '<tr>
                                        <td>'.$est["ci"].'</td>
                                        <td>'.$est["nombres"].'</td>
                                        <td>'.$est["apellidos"].'</td>
                                        <td>'.$aptoRep.'</td>
                                        <td>'.$carreraRep.'</td>
                                      </tr>';
}


$codigoHTML.='
</table>
</body>';
include "scripts_template.php";
$codigoHTML.='
</html>';


$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->set_paper('a4','portrait'); //Esta l�nea es para hacer la p�gina del PDF m�s grande
$dompdf->render();
$dompdf->stream("reporte_test.pdf");
?>