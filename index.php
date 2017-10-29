<?php
/**   Trabajo final de proyecto de grado by JUAN PABLO PRIETO
         Tema: Sistema de Invernadero Automatico (SIA)
         Carrera: Lic. en Analisis de Sistemas Informaticos.
         Institucion: Universidad Autonoma de Encarnacion (UNAE).
         Pais: Paraguay
         Dto. Itapua
         Ciudad: Encarnacion
   **/
  ## incluy librerias
  include("Libreria/libreria.php");
   ?>
<html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>index</title>
<nav id='nav'>
  
</nav>
</head>
<body>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1"><BR>Inicio</a></li>
		<li><a href="#tabs-2"><BR>Invernadero</a></li>
		<li><a href="#tabs-3"><BR>Registrarme</a></li>
		<li id='NavInicio'>INICIO</li>
		<li><img title='Siguiente' onClick='window.location="admin.php"' class='NavSiguiente' src="Img/siguiente.png"></li>
	</ul>
<div id="tabs-1">
<!--seccion Bienvenido-->
<section class='sectionTablas'>
    <div id='divhtml'></div>
    <p>Bienvenidos/as al portal de CHOKOKUE-PY</p>
    <p>Este sistema web fue creado para el manejo remoto de un invernadero automaitizado.</p>
    <p>Mediante esta p&aacute;gina se puede controlar el clima del invernadero.</p>
    <p>Se puede programar el sistema de regad&iacute;o.</p>
    <p>Ver la temperatura y la humedad del suelo del invernadero en tiempo real.</p>
    <p>Autor:  Juan Pablo Prieto - Analista de sistemas Inform&aacute;ticos.</p>
    <p>Contactos:prietojuanpablo763@gmail.com - Telef: +595975 642 695</p>
    <p>Y por ultimo no se olviden de dejar sus comentarios antes de abandonar esta p&aacute;gina.</p>
   </section>
   <div id='ocultardataConfig'>
   <?php
echo"<table  class='tableCultivo'>";
echo'<tr><td><h4>Temperatura Minima</h4></td><td><h4>Temperatura Maxima</h4></td><td><h4>Humedad Minima</4></td><td><h4>Humedad Maxima<h4></td><td><h4>Config por:</h4></td><td>&nbsp;</td></tr>';
include("Php/Clase.php");
$Config=Consulta::consul_config(); //imprimo la clase que contiene los datos sobre cultivos
 foreach($Config as $resulConfig){

    echo"<tr><td><input id='Tmin' type='text'value='".$resulConfig['tempmin']."' size='2' disabled>°C</td>";
    echo"<td><input id='Tmax' type='text' value='".$resulConfig['tempmax']."' size='2' disabled>°C</td>";
    echo"<td><input id='Hmin' type='text' value='".$resulConfig['humedadmin']."' size='2' disabled>%</td>";
    echo"<td><input id='Hmax' type='text' value='".$resulConfig['humedadmax']."' size='2' disabled>%</td>";
    echo"<td>".$resulConfig['nombres']."</td>";
    echo"<td>". $resulConfig['apellidos']."</td>";
    }
echo"</table>";

?>
</div>
</div><!--Termina seccion Bienvenido-->
<div id="tabs-2">
<!--seccion Invernadero-->
<section class='sectionEstado'>

          <div class='sectionEstado1'>
          <label>Estado:</label><div id='estado'></div>
</div>

            <div class='sectionSliderTemp'>
            <label>Temperatura:<label>
            <span id="Temperatura" class=""></span>
            <div id="" class="slider-vertical" style="height:325px;"></div>
            </div>
             <div class='sectionSliderHumedad'>
            <label>Humedad:<label>
            <span id="Humedad" class=""></span>
            <div id="slider-vertical" class="ui-slider1" style="height:325px;"></div>
            </div>
</section>
<!-- fin seccion Invernadero-->
</div><!--fin tabs-2-->
<div id="tabs-3">
<section class='sectionTablas'>
<!--seccion Registro-->
<div class='sectionAdd'>
<h2>Registro de usuario</h2>
<p class="validateTips" id='mjsRegistro'></p>
<input type='text' id='username'onkeypress="return permite(event, 'num_car')" placeholder='Nombre Usuario'class='form-login' maxlength='40' required >
<input type='password' id='password' placeholder='Clave'class='form-login' maxlength='40'required >
<input type='password' id='repassword' placeholder='Repetir Clave'class='form-login' maxlength='40'required onblur='ChequearClave()' >
<input type='text' id='nombres'  onkeypress="return permite(event, 'car')"  placeholder='Nombres'class='form-login' maxlength='40' required>
<input type='text' id='apellidos' onkeypress="return permite(event, 'car')" placeholder='Apellidos'class='form-login' maxlength='40' required>
<input type='text' id='direccion' onkeypress="return permite(event, 'num_car')" placeholder='Direccion'class='form-login' maxlength='40'>
<input type='text' id='telefono' onkeypress="return permite(event, 'num')"  placeholder='Telefono'class='form-login' maxlength='15'>
<input type='email' id='email' placeholder='Email'class='form-login' maxlength='40' required>
<div class='btRegistro'><input type='button' value='Guardar' id='bt_GuardarRegistro'  title= 'Click para guardar tus datos'class='ui-button'>
<input type='button' value='Cancelar' onclick=location.reload(); title= 'cancelar'class='ui-button'></div>
</div>
</section>
<!-- fin seccion Registro-->
</div><!--fin tabs-3-->

</body>
</html>

