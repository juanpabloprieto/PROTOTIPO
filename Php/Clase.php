<?php
/* //////////////////////////////////////////////////////////////
@ Autor: JUAN PABLO PRIETO  -- Analista de Sistemas Informaticos.
  Email: prietojuanpablo763@gmail.com
  Telef: 0975 642 695
  Pais: PARAGUAY
  Dpto: Itapua
  Ciudad: Encarnacion

*/
//Establezco la conexion con DB
include("DB_Config.php");
//////////////////////---------//////////////////////////////////////////////
                      ##Clases##
//////////////////////---------////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
### CLASE PARA INSERTAR USERS ######
//////////////////////////////////////////////////////////////////////////////
   class Add{
   // funcion para agregar usuarios.
     public static function add_user(){
         $username  = $_POST['Username'];
         $password  = md5($_POST['password']);
         $nombres   = $_POST['Nombres'];
         $apellidos = $_POST['Apellidos'];
         $direccion = $_POST['Direccion'];
         $telefono  = $_POST['Telefono'];
         $email     = $_POST['Email'];
      $AddUsers = mysql_query("INSERT INTO users(username,password,nombres,apellidos,direccion,telefono,email) VALUES('$username','$password','$nombres','$apellidos','$direccion','$telefono','$email')") or die ("No se pudo guardar los datos" . mysql_error());
        if($AddUsers){
              echo 1;
             }
    }// fin llave funcion add_user
    // funcion para agregar cultivo
     public static function add_cultivo(){
            $DatoCultivoRecived  =json_decode($_POST['DatosCultivo']);
            foreach($DatoCultivoRecived as $dataCultivo){
            $nombrecultivo =$dataCultivo->nombrecultivo;
            $variedad      =$dataCultivo->variedad;
            $cant          =$dataCultivo->cantidad;
            $id_user       =$dataCultivo->id_usuario;
            $FePlantacion  =$dataCultivo->fechap;
            $fechaCos      =$dataCultivo->fechac;
            $tempmin       =$dataCultivo->tempmin;
            $tempmax       =$dataCultivo->tempmax;
            $humedadmin    =$dataCultivo->humedadmin;
            $humedadmax    =$dataCultivo->humedadmax;
            $insertarCultivos = mysql_query("INSERT INTO cultivos(nombrecultivo,variedad,cant,id_usuario,fechap,fechac,tempmin,tempmax,humedadmin,humedadmax) VALUES('$nombrecultivo','$variedad','$cant','$id_user','$FePlantacion','$fechaCos','$tempmin','$tempmax','$humedadmin','$humedadmax')") or die (" No se pudo guardar los datos" .mysql_error());
            if($insertarCultivos){
              echo true;
            }
     }
    }// fin llave funcion add_cultivo
    // funcion para agregar config.
     public static function add_config(){
         $tempmin   = $_POST['TempMin'];
         $tempmax   = $_POST['TempMax'];
         $humedadmin= $_POST['HumedadMin'];
         $humedadmax= $_POST['HumedadMax'];
         $id_users  = $_POST['Id_user'];
$AddConfig = mysql_query("INSERT INTO configuraciones(tempmin,tempmax,humedadmin,humedadmax,id_users) VALUES('$tempmin','$tempmax','$humedadmin','$humedadmax','$id_users')")or die (" No se pudo guardar los datos" .mysql_error());
     if($AddConfig){echo 'Datos enviado!';}
    }// fin llave funcion add_config
    // funcion para agregar datetime.
     public static function add_estadistica(){
         $humedad    = $_POST['Humedad'];
         $temp       = $_POST['Temp'];
         $datetime   = $_POST['Datetime'];
$AddHumedad = mysql_query("INSERT INTO estadisticas(datetime,temp,humedad) VALUES('$datetime','$temp','$humedad')")or die (" No se pudo guardar los datos" .mysql_error());
     if($AddHumedad){echo 'Guardado!';}
    }// fin llave funcion add_datetime
    
} //fin llave clase Add
   ###### fin clse para agregar usuario###########################
   //////////////////////////////////////////////////////////////////////
   //////////////////////////////////////////////////////////////////////
   ###clase para actualizar la tabla de  Usuarios
   ///////////////////////////////////////////////////////////////////////
   class Update{
    // funcion para actualizar tabla usuarios
   public static function update_user(){
         $idUser    = $_POST['idUsuario'];
         $username  = $_POST['Username'];
         $password  = md5($_POST['password']);
         $nombres   = $_POST['Nombres'];
         $apellidos = $_POST['Apellidos'];
         $direccion = $_POST['Direccion'];
         $telefono  = $_POST['Telefono'];
         $email     = $_POST['Email'];
         $sql = mysql_query("UPDATE users SET username='$username',password='$password',nombres='$nombres',apellidos='$apellidos',direccion='$direccion',telefono='$telefono', email='$email' WHERE id= $idUser");
         if($sql){
              echo 2;
                 }
                else if(!$sql){
              echo 'No se actualizo tus datos, usuario o email le pertenece a otro.';
                 }
       }
}
                  /// fin clase acutalizar ///
///////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
########### clase para hacer consultas   ########################
////////////////////////////////////////////////////////////////////////
   class Consulta{
   // funcion para hacer consulta a tabla usuarios
     public static function consul_users(){
      $consulta=("select * from users"); // ejecuta la consulta
      $resultado = mysql_query($consulta);
       $rows=array();
       while ( $resulConsulta = mysql_fetch_array($resultado) )
			{
				$rows[]=$resulConsulta;
			}
         return $rows;
         mysql_free_result($consulta);
   }
   // funcion para hacer consulta a tabla cultivos
     public static function consul_cultivos(){
      $consulta=("(SELECT * FROM (cultivos c INNER JOIN users u ON c.id_usuario = u.id))"); // ejecuta la consulta
      $resultado = mysql_query($consulta);
       $rows=array();
       while ( $resulConsulta = mysql_fetch_array($resultado) )
  	{
				$rows[]=$resulConsulta;
  	}
         return $rows;
         mysql_free_result($consulta);
   }
   // funcion para hacer consulta a tabla configuraciones
     public static function consul_config(){
      $consulta=("(SELECT *FROM (configuraciones c INNER JOIN users u ON c.id_users = u.id))"); // ejecuta la consulta
      $resultado = mysql_query($consulta);
       $rows=array();
       while ( $resulConsulta = mysql_fetch_array($resultado) )
  	{
				$rows[]=$resulConsulta;
  	}
         return $rows;
         mysql_free_result($consulta);
   }
   // funcion para hacer consulta a tabla datetime
     public static function consul_estadisticas(){
     $consulta=("select * from estadisticas"); // ejecuta la consulta
      $resultado = mysql_query($consulta);
       $rows=array();
       while ( $resulConsulta = mysql_fetch_array($resultado) )
  	{
				$rows[]=$resulConsulta;
  	}
         return $rows;
         mysql_free_result($consulta);
   }
}
           ///// fin clase consulta /////////
////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
########### clase para eliminar registros ##########################
/////////////////////////////////////////////////////////////////////
   class Eliminar{
   // funcion para eliminar registro de la tabla cultivo
     public static function delete_cultivos(){
          $id_cultivo=$_POST['idCultivo'];
          $query = mysql_query("DELETE FROM cultivos WHERE id_cultivo ='$id_cultivo'")or die ("Tipo error: " .mysql_error());
 }
}
////////////// fin clase eliminar registros//////////////////////////////////
?>
