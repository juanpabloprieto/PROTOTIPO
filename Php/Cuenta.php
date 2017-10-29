<?php
/**   Trabajo final de proyecto de grado by JUAN PABLO PRIETO
         Tema: Sistema de Invernadero Automatico (SIA)
         Carrera: Lic. en Analisis de Sistemas Informaticos.
         Institucion: Universidad Autonoma de Encarnacion (UNAE).
         Pais: Paraguay
         Dto. Itapua
         Ciudad: Encarnacion
   **/
  include("Clase.php");
  if (!empty($_POST)){
  $Email='';
    $Usuarios=Consulta::consul_users(); //consulto usuarios registrados
        foreach($Usuarios as $ConsultaUsuario){
        if($_POST['Email']==$ConsultaUsuario['email']){
        $NombreUsuario = $ConsultaUsuario['username'];
        $Email         = $ConsultaUsuario['email'];
        $Password      = $ConsultaUsuario['password'];
        	// Le  Envio  por correo electronico  su nuevo password

     $Destinatario    = $Email;//A quien se envia
     $RemitenteNombre = 'CHOKOKUE-PARAGUAYO';//Quien envia
	 $RemitenteMail   = 'cv_py@cv_py_online.com';//Mail de quien envia
	 $urlAccessLogin  = 'http://localhost/autenticar_usuarios/';		//Url de la pantalla de login
     $Asunto = "Su  contraseña y nombre de usuario de CHOKOKUE-PARAGUAYO";

     $cuerpomsg ='Su nombre de usuario es: '.$NombreUsuario. 'y su password: '.$Password;

	date_default_timezone_set('America/Mexico_City');

	//Establecer cabeceras para la funcion mail()
	//version MIME
	$cabeceras = "MIME-Version: 1.0\r\n";
	//Tipo de info
	$cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
	//direccion del remitente
	$cabeceras .= "From: ".$RemitenteNombre." <".$RemitenteMail.">";
	//Si se envio el email
	if(mail($Destinatario,$Asunto,$cuerpomsg,$cabeceras)){
    $mensajeOk= 'Datos sobre la cuenta ya se envio en la direccion  '.$Email;
    }
    $erromjs='';}else{$erromjs='Email que enviaste no corresponde a ningun usuario.';}
}
if($Email<>''){
echo $mensajeOk;
   }else if($erromjs<>''){
echo $erromjs;
   }
}
?>
