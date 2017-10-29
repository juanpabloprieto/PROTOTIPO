<?php
session_start();
/* //////////////////////////////////////////////////////////////
@ Autor: JUAN PABLO PRIETO  -- Analista de Sistemas Informaticos.
  Email: prietojuanpablo763@gmail.com
  Telef: 0975 642 695
  Pais: PARAGUAY
  Dpto: Itapua
  Ciudad: Encarnacion

*///////////////////////---LOGIN---//////////////////////////////////////////////
## Me conecto con la clas para la consulta
  include("Clase.php");
  $mensaje='';
########### seccion login##########################################
 if (!empty($_POST)) {//llave principal
     $UsernameLogin= $_POST['LoginName'];
     $PasswordLogin= md5($_POST['LoginPassword']);
     $usuario=Consulta::consul_users(); //imprimo la clase que contiene los datos sobre users
//datos de los usuario que estan el la db
  foreach ($usuario as $dataDB){
    $id_userDB =$dataDB['id'];
    $UsernameDB=$dataDB['username'];
    $PasswordDB=$dataDB['password'];
//pregunto si el usuario que trata de logearse esta en la db
if (($UsernameLogin==$UsernameDB) and ($PasswordLogin==$PasswordDB)){
       $mensaje=1;
       $_SESSION["id"] = $id_userDB;
    }
  else if(($UsernameLogin==$UsernameDB) and ($PasswordLogin<>$PasswordDB)){
          $mensaje=2;
         }
  else if(($PasswordLogin==$PasswordDB) and ($UsernameLogin<>$UsernameDB)){
         $mensaje=3;
         }
  }

 
   switch ($mensaje) {
   case 1:
       echo $_SESSION["id"];
    break;
  case 2:
       echo 'Clave incorrecto !';
    break;
  case 3:
       echo 'Nombre de usuario incorrecto !';
   break;
    default:
    echo 'Nombre de usuario y la clave no son correctos !';
   break;
}           
}//fin llave principal
########## fin seccion login ####################################################
?>

