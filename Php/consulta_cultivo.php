
<?php
require( 'Clase.php' );

$first = 0;//separa los elementos con una coma
$json = '{"aaData":[';
//yo uso un foreach, pero pueden cambiarlo por un while ($reg = mysql_fetch_array($res))
foreach(Consulta::consul_cultivos() as $resulCultivo){
    $id_cultivo=$resulCultivo['id_cultivo'];
    if ($first++) $json .=',';
    $json .= '["'.$resulCultivo['nombrecultivo'].'",';
    $json .= '"'.$resulCultivo['variedad'].'",';
    $json .= '"'.$resulCultivo['fechap'].'",';
    $json .= '"'.$resulCultivo['fechac'].'",';
    $json .= '"'.$resulCultivo['tempmin'].'",';
    $json .= '"'.$resulCultivo['tempmax'].'",';
    $json .= '"'.$resulCultivo['humedadmin'].'",';
    $json .= '"'.$resulCultivo['humedadmax'].'",';
    $json .= '"'.$resulCultivo['username'].'",';
    $json .= '"'."<button onClick='EliminarCultivo()' data-id=".$id_cultivo.">Eliminar</button>".'"]';   
}
$json .= ']}';
 
echo  $json;
 
?>

