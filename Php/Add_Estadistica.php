<?php
/* //////////////////////////////////////////////////////////////
@ Autor: JUAN PABLO PRIETO  -- Analista de Sistemas Informaticos.
  Email: prietojuanpablo763@gmail.com
  Telef: 0975 642 695
  Pais: PARAGUAY
  Dpto: Itapua
  Ciudad: Encarnacion*/
  ////////////////--- Add config----/////////////////////
  ## incluyo librerias
  include("Clase.php");
 ###Obtento los datos provenientes del form Usuarios ######################################
   if (!empty($_POST)){
//Llamo a la clase para guardar los datos a la db
                    Add::add_estadistica();
}
?>

