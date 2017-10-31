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
<body style="border: black 5px solid; height: 100%">
<div style="padding: 5%">
    <div class="col-md-12">
        <img src="https://www.emi.edu.bo/images/logo500.png" class="pull-left" width="150" />
    </div>
    
    <div class="col-md-12" style="text-align: center">
            <h1 class="text-center" style="text-decoration:underline">Perfil de Interes y</h1>
            <h1 class="text-center" style="text-decoration:underline">Aptitud Vocacional</h1>
    </div>
    <div class="col-md-12">
        <h2>PERFIL DE LA PERSONA</h2>
        <h3>Cuestionario de Interes Vocacional</h3>
        <p>Pretende: Ver la atencion que se da a una actividad de caracter laboral, a la cual se le atribuye un valor y se le otorga mayor importancia. El interes vocacional constituye una parte importante para elegir una carrera.</p>
    </div>
    <div class="col-md-12">
        <table width="100%" border="1" cellspacing="3" cellpadding="3">
            <tr>
                <td><CENTER><strong>RESULTADO DEL CUESTIONARIO DE INTERES VOCACIONAL</strong></CENTER></td>
            </tr>
            <tr>
                <td>Interes por: '.$resInteres[0]["tipo"].'</td>
            </tr>
            <tr>
                <td>'.$textInteres.'</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <p>Por lo tanto de acuerdo alresultado obtenido se aconseja que el estudiante elija la siguiente carrera:</p>
        <ul>
            <li>'.$fuzzyShow[0]['carrera'].'</li>
        </ul>
    </div>
    <div class="col-md-12">
        <table width="100%" border="1" cellspacing="3" cellpadding="3">
            <tr>
                <td colspan="10"><CENTER><strong>AREAS DE INTERES VOCACIONAL</strong></CENTER></td>
            </tr>
            <tr>
                <td>ITI</td>
                <td>IMP</td>
                <td>IDC</td>
                <td>ICQI</td>
                <td>ICOM</td>
                <td>IMA</td>
                <td>ICP</td>
                <td>ICA</td>
                <td>IAR</td>
                <td>ICT</td>
            </tr>
            <tr>
                <td>'.round(($pruebaOV[0]["res_TI"]*100/30),2).'</td>
                <td>'.round(($pruebaOV[0]["res_MP"]*100/30),2).'</td>
                <td>'.round(($pruebaOV[0]["res_DC"]*100/30),2).'</td>
                <td>'.round(($pruebaOV[0]["res_CQI"]*100/30),2).'</td>
                <td>'.round(($pruebaOV[0]["res_COM"]*100/30),2).'</td>
                <td>'.round(($pruebaOV[0]["res_MA"]*100/30),2).'</td>
                <td>'.round(($pruebaOV[0]["res_CP"]*100/30),2).'</td>
                <td>'.round(($pruebaOV[0]["res_CA"]*100/30),2).'</td>
                <td>'.round(($pruebaOV[0]["res_AR"]*100/30),2).'</td>
                <td>'.round(($pruebaOV[0]["res_CT"]*100/30),2).'</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <table width="100%" border="1" cellspacing="3" cellpadding="3">
            <tr>
                <td><CENTER><strong>AREA</strong></CENTER></td>
                <td><CENTER><strong>IINTERPRETACION</strong></CENTER></td>
            </tr>
            <tr>
                <td>'.$resInteres[0]["tipo"].'</td>
                <td>El resultado de la prueba de '.$resInteres[0]["tipo"].' fue de '.round(($resInteres[0]["porcentaje"]*100/30),2).' sobre 100, indicador que muestra que tiene un '.$txtInteres.'</td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-12">
        <h3>Cuestionario de Aptitud Vocacional</h3>
        <p>Pretende: Ver la capacidad del estudiante que tiene para realizar actividades especificas sin ninguna complicacion, es decir, ejecutar una tarea y se le hace sencilla.</p>
    </div>
    <div class="col-md-12">
        <table width="100%" border="1" cellspacing="3" cellpadding="3">
            <tr>
                <td><CENTER><strong>RESULTADO DEL CUESTIONARIO DE APTITUD VOCACIONAL</strong></CENTER></td>
            </tr>
            <tr>
                <td>Aptitud para: '.$resAptitudes[0]["tipo"].'</td>
            </tr>
            <tr>
                <td>'.$textAptitud.'</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <table width="100%" border="1" cellspacing="3" cellpadding="3">
            <tr>
                <td colspan="10"><CENTER><strong>AREAS DE APTITUD VOCACIONAL</strong></CENTER></td>
            </tr>
            <tr>
                <td>EP</td>
                <td>MC</td>
                <td>VE</td>
                <td>DM</td>
                <td>V</td>
                <td>CB</td>
                <td>CT</td>
                <td>CA</td>
                <td>A</td>
                <td>P</td>
            </tr>
            <tr>
                <td>'.round(($pruebaAp[0]["res_EP"]*100/30),2).'</td>
                <td>'.round(($pruebaAp[0]["res_MC"]*100/30),2).'</td>
                <td>'.round(($pruebaAp[0]["res_VE"]*100/30),2).'</td>
                <td>'.round(($pruebaAp[0]["res_DM"]*100/30),2).'</td>
                <td>'.round(($pruebaAp[0]["res_V"]*100/30),2).'</td>
                <td>'.round(($pruebaAp[0]["res_CB"]*100/30),2).'</td>
                <td>'.round(($pruebaAp[0]["res_CT"]*100/30),2).'</td>
                <td>'.round(($pruebaAp[0]["res_CA"]*100/30),2).'</td>
                <td>'.round(($pruebaAp[0]["res_A"]*100/30),2).'</td>
                <td>'.round(($pruebaAp[0]["res_P"]*100/30),2).'</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <table width="100%" border="1" cellspacing="3" cellpadding="3">
            <tr>
                <td><CENTER><strong>AREA</strong></CENTER></td>
                <td><CENTER><strong>IINTERPRETACION</strong></CENTER></td>
            </tr>
            <tr>
                <td>'.$resAptitudes[0]["tipo"].'</td>
                <td>El resultado de la prueba de '.$resAptitudes[0]["tipo"].' fue de '.round(($resAptitudes[0]["porcentaje"]*100/30),2).' sobre 100, indicador que muestra que tiene un '.$txtAptitud.'</td>
            </tr>
        </table>
    </div>
</div>
';

$codigoHTML.='
</body>';
$codigoHTML.='
</html>';


$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML,'UTF-8');
ini_set("memory_limit","128M");
$dompdf->set_paper('a4','portrait'); //Esta l�nea es para hacer la p�gina del PDF m�s grande
$dompdf->render();
$dompdf->stream("reporte_test.pdf");
?>