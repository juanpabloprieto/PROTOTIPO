       <?php
/* //////////////////////////////////////////////////////////////
@ Autor: JUAN PABLO PRIETO  -- Analista de Sistemas Informaticos.
  Email: prietojuanpablo763@gmail.com
  Telef: 0975 642 695
  Pais: PARAGUAY
  Dpto: Itapua
  Ciudad: Encarnacion*/
  ////////////////--- Add users----/////////////////////
  ## incluyo librerias
  include("Clase.php");
 ###Obtento los datos provenientes del form Usuarios ######################################
   if (!empty($_POST)){
     if (isset($_POST['idUsuario'])<>""){
        //Llamo a la clase para actualizar los datos a la db
                    Update::update_user();
   }else{
         echo 'Error: id del usuario esta vacio!.';
        }

}

?>

