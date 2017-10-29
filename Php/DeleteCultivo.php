<?php
/* //////////////////////////////////////////////////////////////
@ Autor: JUAN PABLO PRIETO  -- Analista de Sistemas Informaticos.
  Email: prietojuanpablo763@gmail.com
  Telef: 0975 642 695
  Pais: PARAGUAY
  Dpto: Itapua
  Ciudad: Encarnacion*/
//////////////////////////////////////////////////////////////
  ## Me conecto con la class
  include("Clase.php");
   if (!empty($_POST)){
  Eliminar::delete_cultivos();
 }
?>

