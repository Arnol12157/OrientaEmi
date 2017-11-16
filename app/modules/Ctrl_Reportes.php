<?php
//$estudiantesRep=Estudiantes::all();
$estudiantesRep=Personas::query()->where('gestion','!=','')->get();
$psicologosRep=Personas::query()->where('gestion','=','')->get();


$pruebaOV=Pruebas::query()->where('id_estudiante','=',$id)->get();
$pruebaAp=PruebasAptitud::query()->where('id_estudiante','=',$id)->get();
$pregOV=($pruebaOV->count());
$pregAp=($pruebaAp->count());

$fuzzyShow=Fuzzy::query()->where('id_estudiante','=', $id)->get();
$resInteres=Resultados::query()->where('id_estudiante','=', $id)->where('test','=','INTERESES')->get();
$resAptitudes=Resultados::query()->where('id_estudiante','=', $id)->where('test','=','APTITUDES')->get();
if(($resAptitudes[0]['porcentaje']*100/30)>=0 && ($resAptitudes[0]['porcentaje']*100/30)<=25) {
    $textAptitud="FALTA DE PRACTICA; en este rubro se encuentran todas las actividades que no ha experimentado, y por lo tanto desconoce si tiene la habilidad.";
    $txtAptitud="FALTA DE MOTIVACION";
}
elseif (($resAptitudes[0]['porcentaje']*100/30)>25 && ($resAptitudes[0]['porcentaje']*100/30)<=50){
    $textAptitud="APTITUDES COMUNES; segun su apreciacion, no tiene desarrollada esa habilidad, por lo tanto es necesario practicar más para dominarla.";
    $txtAptitud="INTERES COMUN";
}
elseif (($resAptitudes[0]['porcentaje']*100/30)>50 && ($resAptitudes[0]['porcentaje']*100/30)<=75){
    $textAptitud="APTITUDES NORMALES; tiene desarrollada esa habilidad pero no lo suficiente para dominarla.";
    $txtAptitud="INTERES SUBPROFESIONAL";
}
elseif (($resAptitudes[0]['porcentaje']*100/30)>75 && ($resAptitudes[0]['porcentaje']*100/30)<=100){
    $textAptitud="APTITUDES DESARROLLADAS, las cuales domina, según su apreciacion.";
    $txtAptitud="INTERES PROFESIONAL";
}

if($resAptitudes[0]['tipo']=="EP")
{
    $areaAptitud="Ejecutivo Persuasiva";
    $textAptitud="Capacidad por organizar, planear, dirigir, supervisar y dar ordenes a otros; iniciativa, confianza en si mismo, ambicion de progreso, habilidad para dominar en situaciones sociales y en relaciones de persona a persona; habilidad para convencer y disuadir.";
}
elseif($resAptitudes[0]['tipo']=="MC")
{
    $areaAptitud="Mecánico Constructiva";
    $textAptitud="Habilidad para analizar formas en dos y tres dimensiones. Capacidad de percibir los elementos y partes que componen volumenes y estructuras. Comprension y habilidad en la manipulacion de los objetivos. Inclinacion por armar, ensamblar, empalmar, unir y combinar piezas para producir movimiento.";
}
elseif($resAptitudes[0]['tipo']=="VE")
{
    $areaAptitud="Viso Espacial";
    $textAptitud="habilidad de pensar y percibir imagenes externas e internas, recrearlas, transformarlas o modificarlas, decodificar informacion grafica. Tambien se encuentra relacionada con la sensibilidad que tiene el individuo frente a aspectos como color, lineas, forma, figura, espacio y la relacion que existe entre ellos.";
}
elseif($resAptitudes[0]['tipo']=="DM")
{
    $areaAptitud="Destreza Manual";
    $textAptitud="Capacidad para realizar trabajos con las manos. Pericia con los dedos, habilidad para movimientos coordinados, delicados y precisos. Aptitud para realizar labores manuales, dibujar, tocar un instrumento. Pericia en el manejo de herramientas.";
}
elseif($resAptitudes[0]['tipo']=="V")
{
    $areaAptitud="Ventas";
    $textAptitud="Capacidad de escucha, comunicacion eficaz, interes por brindar empatia y confianza a los demas. Ser paciente e insistente en situaciones dificiles, mostrar independencia.";
}
elseif($resAptitudes[0]['tipo']=="CB")
{
    $areaAptitud="Ciencias Biológicas";
    $textAptitud="Aptitud para detectar problemas biologicos en zoologia, ecologia etcetera plantearlos correctamente, y abordarlos en funcion del metodo cientifico. Analizar e interpretar resultados experimentales. Perfeccionar y desarrollar conceptos, teorias y metodos.";
}
elseif($resAptitudes[0]['tipo']=="CT")
{
    $areaAptitud="Cientifico";
    $textAptitud="Aptitud para captar, analizar y comprender; curiosidad innata, interes por conocer hechos, causas y los factores que intervienen. Actitud de observacion, pensamiento profundo y analitico, espíritu de investigador, experimentador, verificador. Gusto por usar aparatos y por trabajar en laboratorios.";
}
elseif($resAptitudes[0]['tipo']=="CA")
{
    $areaAptitud="Ciencias Agronómicas";
    $textAptitud="Capacidad de mejorar la calidad de los procesos de la produccion y la transformacion de productos agricolas y alimentarios. Fundamentada en principios cientificos y tecnologicos, estudia los factores fisicos, quimicos, biologicos, economicos y sociales que influyen o afectan al proceso productivo.";
}
elseif($resAptitudes[0]['tipo']=="A")
{
    $areaAptitud="Administrativo";
    $textAptitud="Capacidad para administrar y distribuir; ordenar por jerarquia, por el lugar que les corresponde y por prioridad. Habilidad para crear sistemas, estructurar y armar programas. Pensamiento sistematico, claro y ordenado.";
}
elseif($resAptitudes[0]['tipo']=="P")
{
    $areaAptitud="Práctica";
    $textAptitud="Aptitud para realizar tareas concretas orientadas principalmente hacia un fin utilitario o practico. Reconocimiento de la serie de operaciones a seguir para conseguir un resultado objetivo y concreto.";
}

if(($resInteres[0]['porcentaje']*100/30)>=0 && ($resInteres[0]['porcentaje']*100/30)<=25) {
    $txtInteres="FALTA DE MOTIVACION";
}
elseif (($resInteres[0]['porcentaje']*100/30)>25 && ($resInteres[0]['porcentaje']*100/30)<=50){
    $txtInteres="INTERES COMUN";
}
elseif (($resInteres[0]['porcentaje']*100/30)>50 && ($resInteres[0]['porcentaje']*100/30)<=75){
    $txtInteres="INTERES SUBPROFESIONAL";
}
elseif (($resInteres[0]['porcentaje']*100/30)>75 && ($resInteres[0]['porcentaje']*100/30)<=100){
    $txtInteres="INTERES PROFESIONAL";
}

if($resInteres[0]['tipo']=="ITI")
{
    $areaInteres="Tecnologías de Información";
    $textInteres="Interes en el desempeno como profesional de tecnologias de la informacion en el cual se involucran el diseno, construccion y uso de los artefactos y sistemas digitales.";
}
elseif($resInteres[0]['tipo']=="IMP")
{
    $areaInteres="Mecánica y Procesos";
    $textInteres="Motivacion por la utilizacion de calculo, la fisica, la mecanica. Las actividades que mejor lo caracterizan son la manipulacion de instrumentos, manejo de maquinas; y el diseño, armado y desarmado de piezas.";
}
elseif($resInteres[0]['tipo']=="IDC")
{
    $areaInteres="Diseño y Construcción";
    $textInteres="Interes por el diseno y construccion de espacios habitables por el hombre, haciendo de ellos lugares seguros, agradables, adaptados a las necesidades de un grupo o cultura. Esta area incluye tambien el diseno y construccion de artículos necesarios en la vida cotidiana, tales como puentes, carreteras.";
}
elseif($resInteres[0]['tipo']=="ICQI")
{
    $areaInteres="Ciencias Químicas e Industria";
    $textInteres="Interes en el desarrollo experimental, trabajando en laboratorio, industria, en la invencion de materias primas mas resistentes, biodegradables, reciclables, etc.";
}
elseif($resInteres[0]['tipo']=="ICOM")
{
    $areaInteres="Comerciales";
    $textInteres="Interes por el mercado, las transacciones comerciales y las ventas. Realiza el contacto con clientes y proveedores para conocer sus necesidades y tomarlas como base para realizar las transacciones dentro del mercado, las politicas y las leyes para el intercambio comercial entre paises, conociendo aspectos sobre la psicologia del consumidor.";
}
elseif($resInteres[0]['tipo']=="IMA")
{
    $areaInteres="Medioambiental";
    $textInteres="Interes ambiental el cual aplica a algun recurso natural o a un espacio territorial, pero se pueden establecer algunas situaciones a partir de las cuales se obtendría un resultado en el tema: el enfoque, los sujetos relacionados y las estrategias para aplicar acciones.";
}
elseif($resInteres[0]['tipo']=="ICP")
{
    $areaInteres="Científico";
    $textInteres="Interes en el deseo de comprender y analizar los origenes y formas de los procesos y fenomenos biologicos, quimicos y fisicos. El enfasis esta puesto en el conocimiento y comprension teorico, mas que en la aplicacion practica de los principios.";
}
elseif($resInteres[0]['tipo']=="ICA")
{
    $areaInteres="Ciencias Agronómicas";
    $textInteres="Interes sobre la sensacion y el olor de la buena tierra escurriendose entre sus dedos; capaz de pasarse horas y horas en medio de un potrero, de una cementera, de un bosque, sin mas compania que las plantas arboles, animales, el cielo y trabajar al aire libre.";
}
elseif($resInteres[0]['tipo']=="IAR")
{
    $areaInteres="Administración de Recursos";
    $textInteres="Interes en comprender criticamente el sistema economico y desarrollar actividades que le permitan crear, desarrollar y administrar empresas.";
}
elseif($resInteres[0]['tipo']=="ICT")
{
    $areaInteres="Ciencia y Tecnología";
    $textInteres="Motivacion sobre los efectos culturales, eticos y politicos del conocimiento cientifico y la innovacion tecnologica. Colocan el enfasis en la interpretacion sobre las utilidades, apropiaciones e impactos en la vida cotidiana de las personas, con el objetivo de romper las antiguas barreras de investigacion cientifico-tecnica.";
}

?>