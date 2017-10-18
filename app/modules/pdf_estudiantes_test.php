<?php

require_once("../dompdf/dompdf_config.inc.php");
require_once 'requires.php';
require_once 'Ctrl_Reportes.php';

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ESTUDIANTES</title>
</head>
<body>
<div class="col-md-12">
    <img src="https://admision.emi.edu.bo/saga/media/mlogoemi.png" class="pull-left" width="72" />
</div>
<div class="col-md-12" style="text-align: center">
        <h1 class="text-center">Lista de estudiantes de acuerdo a cada</h1>
        <h1 class="text-center">carrera acorde al test</h1>
</div>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6"><CENTER><strong>Lista de estudiantes</strong></CENTER></td>
  </tr>
  <tr bgcolor="#adff2f">
    <td bgcolor="#adff2f"><strong>CI</strong></td>
        <td bgcolor="#adff2f"><strong>Nombres</strong></td>
        <td bgcolor="#adff2f"><strong>Apellidos</strong></td>
        <td bgcolor="#adff2f"><strong>Curso</strong></td>
        <td bgcolor="#adff2f"><strong>Interes</strong></td>
        <td bgcolor="#adff2f"><strong>Aptitud</strong></td>
  </tr>';


    foreach($estudiantesRep as $est)
    {
        $pruebaOV=Pruebas::query()->where('id_estudiante','=',$est["ci"])->get();
        $pruebaAp=PruebasAptitud::query()->where('id_estudiante','=',$est["ci"])->get();
        $pregOV=($pruebaOV->count());
        $pregAp=($pruebaAp->count());

        $fuzzyShow=Fuzzy::query()->where('id_estudiante','=', $est["ci"])->get();
        $resInteres=Resultados::query()->where('id_estudiante','=', $est["ci"])->where('test','=','INTERESES')->get();
        $resAptitudes=Resultados::query()->where('id_estudiante','=', $est["ci"])->where('test','=','APTITUDES')->get();
        if(($resAptitudes[0]['porcentaje']*100/30)>=0 && ($resAptitudes[0]['porcentaje']*100/30)<=25) {
            $txtAptitud="Falta de practica";
        }
        elseif (($resAptitudes[0]['porcentaje']*100/30)>25 && ($resAptitudes[0]['porcentaje']*100/30)<=50){
            $txtAptitud="Aptitudes comunes";
        }
        elseif (($resAptitudes[0]['porcentaje']*100/30)>50 && ($resAptitudes[0]['porcentaje']*100/30)<=75){
            $txtAptitud="Aptitudes normales";
        }
        elseif (($resAptitudes[0]['porcentaje']*100/30)>75 && ($resAptitudes[0]['porcentaje']*100/30)<=100){
            $txtAptitud="Aptitudes desarrolladas";
        }

        $txtInteres="No realizo el test";
        if($pregOV>0)
        {
            $txtInteres=$fuzzyShow[0]['carrera'];
        }

        if($pregAp==0)
        {
            $txtAptitud="No realizo el test";
        }

        $codigoHTML.= '<tr>
                                        <td>'.$est["ci"].'</td>
                                        <td>'.$est["nombres"].'</td>
                                        <td>'.$est["apellidos"].'</td>
                                        <td>'.$est["curso"].'</td>
                                        <td>'.$txtInteres.'</td>
                                        <td>'.$txtAptitud.'</td>
                                      </tr>';
    }


$codigoHTML.='
</table>
<div class="col-md-12" style="text-align: center;padding-top: 10%">
    <hr>
    <p>Firma: Lic. '.$dataUser["nombres"].'</p>
    <p>'.$dataUser["apellidos"].'</p>
</div>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->set_paper('a4','portrait'); //Esta l�nea es para hacer la p�gina del PDF m�s grande
$dompdf->render();
$dompdf->stream("reporte.pdf");
?>