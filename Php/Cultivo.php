       <?php
/* //////////////////////////////////////////////////////////////
@ Autor: JUAN PABLO PRIETO  -- Analista de Sistemas Informaticos.
  Email: prietojuanpablo763@gmail.com
  Telef: 0975 642 695
  Pais: PARAGUAY
  Dpto: Itapua
  Ciudad: Encarnacion

*/////////////////////////////////////////////////////////////////////
## Me conecto con la clase
 include("Clase.php");
// echo Consulta::consul_cultivos(); //imprimo la clase que contiene los datos sobre cultivos
if (!empty($_POST)){ // si el post no esta vacio.
  Add::add_cultivo();// invoco la clase add_cultivo para insercion de datos.
}


?>

