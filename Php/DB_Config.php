<?php
/* //////////////////////////////////////////////////////////////
@ Autor: JUAN PABLO PRIETO  -- Analista de Sistemas Informaticos.
  Email: prietojuanpablo763@gmail.com
  Telef: 0975 642 695
  Pais: PARAGUAY
  Dpto: Itapua
  Ciudad: Encarnacion

*/
////////////////////////////////////////////////////////////////////´´
// Configuracion de  los datos para la conexion y seleccion de la base de datos.
    $dbhost="127.0.0.1";#localhost
    $dbusername="root";
    $dbuserpass="";
    $dbname="db_sia";

	// Conectar a la base de datos
	@mysql_connect ($dbhost, $dbusername, $dbuserpass);
	@mysql_select_db($dbname) or die('No se pudo conectar con la base de datos, revise la conexiòn y el nombre de la base de datos.');

?>
