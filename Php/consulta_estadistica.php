
<?php
require( 'Clase.php' );

$first = 0;//separa los elementos con una coma
$json = '{"aaData":[';
//recorro con foreach//
foreach(Consulta::consul_estadisticas() as $resulEstadistica){
    
    if ($first++) $json .=',';
    $json .= '["'.$resulEstadistica['temp'].' &deg;",';
    $json .= '"'.$resulEstadistica['humedad'].' %",';
    $json .= '"'.$resulEstadistica['datetime'].'"]';
   }
$json .= ']}';
 
echo  $json;
 

?>

