<?php
/**   Trabajo final de proyecto de grado by JUAN PABLO PRIETO
         Tema: Sistema de Invernadero Automatico (SIA)
         Carrera: Lic. en Analisis de Sistemas Informaticos.
         Institucion: Universidad Autonoma de Encarnacion (UNAE).
         Pais: Paraguay
         Dto. Itapua
         Ciudad: Encarnacion
   **/
## incluyo librerias
  include("Libreria/libreria.php");
?>
<html>
<head>
	<title>Mi cuenta</title>
 <nav id='nav'>
 <div class='logo'>CHOKOKUE-PARAGUAYO <img src="Img/logoCabecera.png"> by Juan Pablo Prieto</div>
</nav>
</head>
<div id="tabs">
	<ul>
  <li><a href="#tabs-1"><BR>Mi cuenta</a></li>


	</ul>
<div id="tabs-1">
<section class='sectionTablas'>
<form   method="POST" action="recuperar_cuenta.php">
   <h2>Quiero recuperar mi cuenta</h2>
   <div id='ErrorEmail'></div>
<input type='email' id='email' title= 'Introduce tu direccion de correo electronico' placeholder='Introduce tu email'class='' maxlength='40' size='40' required>
<input type='button' id='bt_email' value='Enviar'  class='ui-button'><BR>
 <a href="index.php" id='linkVolver' title="Volver al inicio">Volver</a>
</form>
</section>
</div>
</body>
</html>
