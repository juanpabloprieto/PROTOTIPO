<?php
/*
@ Autor: JUAN PABLO PRIETO  -- Analista de Sistemas Informaticos.
  Email: prietojuanpablo763@gmail.com
  Telef: 0975 642 695
  Pais: PARAGUAY
  Dpto: Itapua
  Ciudad: Encarnacion

*/
## incluyo librerias
  include("Libreria/libreria.php");
  include("Php/Clase.php");
  echo"<script src='Js/Ventiladores.js'></script><script src='Js/Invernadero.js'></script><script src='Js/Emergencia.js'></script>";
?>
<?php
session_start();
if( isset($_SESSION["id"])<>""){ //pregunto si hay sesion
    $Users=Consulta::consul_users(); //imprimo la clase que contiene los datos sobre users
    foreach($Users as $dataUser){
    if($_SESSION["id"]==$dataUser['id']){
    $id_usuario = $dataUser['id'];//id usuario
    $usuario= $dataUser['username']; //imprimo nombre del usuario
    $nombres = $dataUser['nombres'];//nombres
    $apellidos = $dataUser['apellidos'];//apellidos
    $password = $dataUser['password'];//password
    $direccion = $dataUser['direccion'];//direccion
    $telefono = $dataUser['telefono'];//telefono
    $email = $dataUser['email'];//email
    }
 }
?>
<html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Administracion</title>
<script type="text/javascript">
        
         
</script>
 <nav id='nav'>
 
</nav>
</head>
<body>

<div id="tabs">
	<ul>
		<li><a id='tabs1'   href="#tabs-1"><BR><?php echo"<label>Bienvenido $usuario<label>";?><BR></a></li>
		<li><a id='tabs2'   href="#tabs-2"><BR>Invernadero</a></li>
		<li><a id='tabs3'   href="#tabs-3"><BR>Cultivo</a></li>
		<li><a id='tabs4'   href="#tabs-4"><BR>Estadistica</a></li>
        <li><a id='tabs5'   href="#tabs-5"><BR>Cuenta</a></li>
        <li><img title='Anterior' onClick='window.location="index.php"' class='NavAnterior1' src="Img/anterior.png"></li>
		<li id='NavAdmin'>ADMINISTRACION</li>
		<ul id="icons" class="ui-widget ui-helper-clearfix"><li id='cerrarSesion' class="ui-state-default ui-corner-all" title="Cerrar sesion" ><span class="ui-icon ui-icon-person" ></span><a class='cerrarSesion' href="Php/cerrar_sesion.php">Salir</a></li></ul>
</ul>

<div id="tabs-1">
   <section class='sectionEstado'>
   
          <div class='sectionEstado1'><label>Estado:</label><div id='estado'></div><BR><BR>
          <div id='msjEmergencia'></div><div id='div_atencion' class='div_emergencia'>Atención! el sistema se esta sobre calentando, revise la configuracion del clima.</div>
          <div class='div_emergencia' id='div_advertencia'>Advertencia!! el invernadero corre peligro, el sistema se apagará totalmente en algunos segundos.</div>
          <div class='div_emergencia' id='div_congelado'>Atención! el sistema se esta congelando, revise la configuracion del clima.</div>
</div>

            <div class='sectionSliderTemp'>
            <label  class="labelTempMax">Temperatura:<label>
            <span id="Temperatura"></span>
            <div id="labelTempMax" class="slider-vertical" style="height:325px;"></div>
            </div>
             <div class='sectionSliderHumedad'>
            <label>Humedad:<label>
            <span id="Humedad" class=""></span>
            <div id="slider-vertical" class="ui-slider1" style="height:325px;"></div>
            </div>
            <!--seccion ventiladores-->
              <div class='sectionVentiCaliente'>
              <div id='lluvia' ></div>
              <label>Regad&iacute;o<label>
                <BR><BR><BR><BR>
            <div id='ventiCaliente' ></div>
            <label>Aire Caliente<label>
            </div>
            <div class='sectionVentiFrio'>
             <div id='sol' ></div>
             <label>Clima</label>
            <BR><BR><BR><BR>
            <div id='ventiFrio' ></div>
            <label>Aire Fria</label>
            </div>
             <!-- endseccion ventiladores-->
</section>

</div>


<!--section 2-->
<div id="tabs-2">
<section class='sectionTablas'>
<!--section form config invernadero-->
      <div class="table1">
    <h3>Configura el clima del Invernadero</h3>
<table border="0"  width="">
<div id='divInver' class='inver'></div>
<input id='id_usuario' type='hidden' value='<?php echo $id_usuario?>'>
<tr>
   <td>
     <label class='label'>Temperatura Minima</label>
   </td>
   <td>
   <select name='TempMin' id='TempMin' class='campoTemp' required>
    <option value="00">0</option>
    <option value="01">1</option>
    <option value="02">2</option>
    <option value="03">3</option>
    <option value="04">4</option>
    <option value="05">5</option>
    <option value="06">6</option>
    <option value="07">7</option>
    <option value="08">8</option>
    <option value="09">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
    <option value="37">37</option>
    <option value="38">38</option>
    <option value="39">39</option>
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
    <option value="61">61</option>
    <option value="62">62</option>
    <option value="63">63</option>
    <option value="64">64</option>
    <option value="65">65</option>
    <option value="66">66</option>
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="69">69</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="72">72</option>
    <option value="73">73</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="76">76</option>
    <option value="77">77</option>
    <option value="78">78</option>
    <option value="79">79</option>
    <option value="80">80</option>
    <option value="81">81</option>
    <option value="82">82</option>
    <option value="83">83</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="86">86</option>
    <option value="87">87</option>
    <option value="88">88</option>
    <option value="89">89</option>
    <option value="90">90</option>
    <option value="91">91</option>
    <option value="92">92</option>
    <option value="93">93</option>
    <option value="94">94</option>
    <option value="95">95</option>
    <option value="96">96</option>
    <option value="97">97</option>
    <option value="98">98</option>
    <option value="99">99</option>
</select>
</td>
</tr>
<tr>
<td>
<label class='label'>Temperatura Maxima</label>
</td>
<td>
<select name='TempMax' id='TempMax' class='campoTemp' required>
<option value="00">0</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
<option value="60">60</option>
<option value="61">61</option>
<option value="62">62</option>
<option value="63">63</option>
<option value="64">64</option>
<option value="65">65</option>
<option value="66">66</option>
<option value="67">67</option>
<option value="68">68</option>
<option value="69">69</option>
<option value="70">70</option>
<option value="71">71</option>
<option value="72">72</option>
<option value="73">73</option>
<option value="74">74</option>
<option value="75">75</option>
<option value="76">76</option>
<option value="77">77</option>
<option value="78">78</option>
<option value="79">79</option>
<option value="80">80</option>
<option value="81">81</option>
<option value="82">82</option>
<option value="83">83</option>
<option value="84">84</option>
<option value="85">85</option>
<option value="86">86</option>
<option value="87">87</option>
<option value="88">88</option>
<option value="89">89</option>
<option value="90">90</option>
<option value="91">91</option>
<option value="92">92</option>
<option value="93">93</option>
<option value="94">94</option>
<option value="95">95</option>
<option value="96">96</option>
<option value="97">97</option>
<option value="98">98</option>
<option value="99">99</option>
</select>
</td>
</tr>
<tr>
<td>
<label class='label'>Humedad Minima %</label>
</td>
<td>
<select name='HumedadMin' id='HumedadMin' class='campoTemp' required>
<option value="00">0</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
<option value="60">60</option>
<option value="61">61</option>
<option value="62">62</option>
<option value="63">63</option>
<option value="64">64</option>
<option value="65">65</option>
<option value="66">66</option>
<option value="67">67</option>
<option value="68">68</option>
<option value="69">69</option>
<option value="70">70</option>
<option value="71">71</option>
<option value="72">72</option>
<option value="73">73</option>
<option value="74">74</option>
<option value="75">75</option>
<option value="76">76</option>
<option value="77">77</option>
<option value="78">78</option>
<option value="79">79</option>
<option value="80">80</option>
<option value="81">81</option>
<option value="82">82</option>
<option value="83">83</option>
<option value="84">84</option>
<option value="85">85</option>
<option value="86">86</option>
<option value="87">87</option>
<option value="88">88</option>
<option value="89">89</option>
<option value="90">90</option>
<option value="91">91</option>
<option value="92">92</option>
<option value="93">93</option>
<option value="94">94</option>
<option value="95">95</option>
<option value="96">96</option>
<option value="97">97</option>
<option value="98">98</option>
<option value="99">99</option>
</select>
</td>
</tr>
<tr>
<td>
<label class='label'>Humedad Maxima %</label>
</td>
<td>
<select name='HumedadMax' id='HumedadMax' class='campoTemp' required>
<option value="00">0</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
<option value="60">60</option>
<option value="61">61</option>
<option value="62">62</option>
<option value="63">63</option>
<option value="64">64</option>
<option value="65">65</option>
<option value="66">66</option>
<option value="67">67</option>
<option value="68">68</option>
<option value="69">69</option>
<option value="70">70</option>
<option value="71">71</option>
<option value="72">72</option>
<option value="73">73</option>
<option value="74">74</option>
<option value="75">75</option>
<option value="76">76</option>
<option value="77">77</option>
<option value="78">78</option>
<option value="79">79</option>
<option value="80">80</option>
<option value="81">81</option>
<option value="82">82</option>
<option value="83">83</option>
<option value="84">84</option>
<option value="85">85</option>
<option value="86">86</option>
<option value="87">87</option>
<option value="88">88</option>
<option value="89">89</option>
<option value="90">90</option>
<option value="91">91</option>
<option value="92">92</option>
<option value="93">93</option>
<option value="94">94</option>
<option value="95">95</option>
<option value="96">96</option>
<option value="97">97</option>
<option value="98">98</option>
<option value="99">99</option>
</select>
</td>
</tr>
<tr>
 <td>&nbsp;</td>
 <td><BR>
 <input type='button' value='Enviar' id='botonEnviarTemp'class='ui-button'>
  <td>
</tr>
</table>
</div>
<div id='' class='table2'>
<label class='labelConfig'>Historial de configuraciones</label>
<form method="POST" action="admin.php#tabs-2">
    <input type="search" placeholder="Buscar por usuario" name="busqueda_usuario">
    <input type=submit value="Buscar"> <input type=submit value="Mostrar todo">
</form>
 <?php
 $busqueda_usuario="";
 @$busqueda_usuario=($_POST['busqueda_usuario']);
if(empty(!$busqueda_usuario)){

  echo"<table border='1' class='tableCultivo'>";
  echo'<tr><td><h4>Temperatura Minima</h4></td><td><h4>Temperatura Maxima</h4></td><td><h4>Humedad Minima</4></td><td><h4>Humedad Maxima<h4></td><td><h4>Usuario</h4></td></tr>';
 $usuario=("(SELECT id FROM users where nombres='$busqueda_usuario')"); // ejecuta la consulta
      $id_users = mysql_query($usuario);
      $rows=array();
       while ( $id = mysql_fetch_array($id_users) )
         {
          $idU=$id['id'];  
            
      
        $consulta=("(SELECT *FROM (configuraciones c INNER JOIN users u ON c.id_users = u.id)where id_users='$idU')"); // ejecuta la consulta
      $resultado = mysql_query($consulta);
       $rows=array();
       while ( $resulConfig = mysql_fetch_array($resultado) )
         {
    echo"<tr id='columna'><td><input id='Tmin' type='text'value='".$resulConfig['tempmin']."' size='2' disabled>&deg;C</td>";
    echo"<td><input id='Tmax' type='text' value='".$resulConfig['tempmax']."' size='2' disabled>&deg;C</td>";
    echo"<td><input id='Hmin' type='text' value='".$resulConfig['humedadmin']."' size='2' disabled>%</td>";
    echo"<td><input id='Hmax' type='text' value='".$resulConfig['humedadmax']."' size='2' disabled>%</td>";
    echo"<td>".$resulConfig['nombres']."</td>";
         
        }
    
      }  
           
echo"</table>";
}else{
echo"<table border='1' class='tableCultivo'>";
echo'<tr><td><h4>Temperatura Minima</h4></td><td><h4>Temperatura Maxima</h4></td><td><h4>Humedad Minima</4></td><td><h4>Humedad Maxima<h4></td><td><h4>Usuario</h4></td></tr>';

$Config=Consulta::consul_config(); //imprimo la clase que contiene los datos sobre cultivos
 foreach($Config as $resulConfig){
 
    echo"<tr id='columna'><td><input id='Tmin' type='text'value='".$resulConfig['tempmin']."' size='2' disabled>&deg;C</td>";
    echo"<td><input id='Tmax' type='text' value='".$resulConfig['tempmax']."' size='2' disabled>&deg;C</td>";
    echo"<td><input id='Hmin' type='text' value='".$resulConfig['humedadmin']."' size='2' disabled>%</td>";
    echo"<td><input id='Hmax' type='text' value='".$resulConfig['humedadmax']."' size='2' disabled>%</td>";
    echo"<td>".$resulConfig['nombres']."</td>";
    
    }
echo"</table>";
}
?>
</div>
</section>
</div>



<div id="tabs-3">
    
         
<table id="cultivo" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Cultivo</th>
            <th>Variedad</th>
            <th>Fecha Plantaciòn</th>
            <th>Fecha Cosecha</th>
            <th>Temp Mìnima</th>
            <th>Temp Màxima</th>
            <th>Humedad Mìnima</th>
            <th>Humedad Màxima</th>
            <th>Usuario</th>
            <th><ul id="icons" class="ui-widget ui-helper-clearfix"><li class="ui-state-default ui-corner-all" id="LevatarModal" title="Agregar"><span class="ui-icon ui-icon-plusthick"></span></li></ul></th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th>Cultivo</th>
            <th>Variedad</th>
            <th>Fecha Plantaciòn</th>
            <th>Fecha Cosecha</th>
            <th>Temp Mìnima</th>
            <th>Temp Màxima</th>
            <th>Humedad Mìnima</th>
            <th>Humedad Màxima</th>
            <th>Usuario</th>
            <th></th>
        </tr>
    </tfoot>
</table>

     
</div>





<div id="tabs-4">
 <section class='sectionEstadistica'>
     <table id="estadistica" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Temperatura &deg;</th>
            <th>Humedad %</th>
            <th>Fecha y Hora</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th>Temperatura</th>
            <th>Humedad</th>
            <th>Fecha y Hora</th>
        </tr>
    </tfoot>
</table>

</section>
</div>











<div id="tabs-5">
<p id='mensajeError'></p>    
<!-- Dotos sobre la cuenta-->
<div>
<table class='UpdateUsers'>
<tr><td>&nbsp;</td><td>Actualiza tu cuenta</td></tr>
<tr><td>&nbsp;</td><td><p class="validateTips" id='actualizarCuenta'></td></tr>
<tr><td>&nbsp;</td><td><input id='id_usuario' type='hidden' value='<?php echo $id_usuario?>' maxlength='40' required></td></tr>
<tr><td>Usuario:</td><td><input id='username' type='text' value='<?php echo $usuario?>' maxlength='40' required></td></tr>
<tr><td>Nombres:</td><td><input id='nombres'  onkeypress="return permite(event, 'car')" type='text' value='<?php echo $nombres ?>' maxlength='40' required></td></tr>
<tr><td>Apellidos:</td><td><input id='apellidos' onkeypress="return permite(event, 'car')" type='text' value='<?php echo $apellidos ?>' maxlength='40' required></td></tr>
<tr><td>Clave:</td><td><input id='password'type='password' value='<?php echo $password?>' maxlength='40' onClick="NuevoClave()" required></td></tr>
<tr><td>Repetir Clave:</td><td><input id='repassword'type='password'  maxlength='40' onblur="ChequearClaveAdmin()" required></td></tr>
<tr><td>Direccion:</td><td><input id='direccion'type='text' value='<?php echo $direccion?>' maxlength='40' required></td></tr>
<tr><td>Telefono:</td><td><input  id='telefono' onkeypress="return permite(event, 'num')"type='number' value='<?php echo $telefono?>' maxlength='40'required></td></tr>
<tr><td>Email:</td><td><input id='email'type='text' value='<?php echo $email?>' maxlength='40'required></td></tr>
<tr><td><input type='button' value='Cancelar'class='ui-button'onclick="location.reload();"></td><td><input type='button' value='Actualizar mi cuenta' id='bt_ActualizarRegistro'  title= 'Click para actualizar tus datos'class='ui-button'></td></tr>
</table>
<div id="calendario"></div>
</div>



</div>








      <!------------------- formulario de Modal  --------------------------------------->
       <!------------------------------------------------------------------------------->
<div id='divModal'>
<p class="validateTips"> * Campos requeridos.</p>
<input type='text' id='tipocultivo' onkeypress="return permite(event, 'car')" title= 'que plantaste?' placeholder=' Nombre de cultivo' class='campoModal'maxlength='40'>
<input type='text' id='variedad' onkeypress="return permite(event, 'car')" title= 'que clase?' placeholder='variedad' class='campoModal'maxlength='40'>
<input type='number' id='cantidad' onkeypress="return permite(event, 'num')"title= 'Cuantas plantas sembraste?' placeholder=' Cantidad de planta sembrada' class='campoModal'maxlength='40'>
<input type='hidden' id='id_usuario'   value=<?php $id_usuario?>>
<input type='text' onkeypress="return permite(event, 'num')" id='feplantacion' title= 'hacer click para introducir la fecha de plantacion' placeholder='Fecha de Plantacion' class='campoModal'maxlength='40'>
<input type='text' onkeypress="return permite(event, 'num')" id='fechacosecha' title= 'hacer click para introducir la fecha de cosecha' placeholder='Fecha de Cosecha' class='campoModal'maxlength='40'>
<!--table-->
<table border="0" class='table3'>
<tr>
   <td>
     <label class='labelModal'>Temperatura Minima</label>
   </td>
   <td>
<select name='tempminima' id='tempminima' class='SelectModal' placeholder='' required>
    <option value="00">0</option>
    <option value="01">1</option>
    <option value="02">2</option>
    <option value="03">3</option>
    <option value="04">4</option>
    <option value="05">5</option>
    <option value="06">6</option>
    <option value="07">7</option>
    <option value="08">8</option>
    <option value="09">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
    <option value="37">37</option>
    <option value="38">38</option>
    <option value="39">39</option>
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
    <option value="61">61</option>
    <option value="62">62</option>
    <option value="63">63</option>
    <option value="64">64</option>
    <option value="65">65</option>
    <option value="66">66</option>
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="69">69</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="72">72</option>
    <option value="73">73</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="76">76</option>
    <option value="77">77</option>
    <option value="78">78</option>
    <option value="79">79</option>
    <option value="80">80</option>
    <option value="81">81</option>
    <option value="82">82</option>
    <option value="83">83</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="86">86</option>
    <option value="87">87</option>
    <option value="88">88</option>
    <option value="89">89</option>
    <option value="90">90</option>
    <option value="91">91</option>
    <option value="92">92</option>
    <option value="93">93</option>
    <option value="94">94</option>
    <option value="95">95</option>
    <option value="96">96</option>
    <option value="97">97</option>
    <option value="98">98</option>
    <option value="99">99</option>
</select>
</td>
</tr>
<tr>
<td>
<label class='labelModal'>Temperatura Maxima</label>
</td>
<td>
<select name='tempmaxima' id='tempmaxima' class='SelectModal' placeholder='' required>
    <option value="00">0</option>
    <option value="01">1</option>
    <option value="02">2</option>
    <option value="03">3</option>
    <option value="04">4</option>
    <option value="05">5</option>
    <option value="06">6</option>
    <option value="07">7</option>
    <option value="08">8</option>
    <option value="09">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
    <option value="37">37</option>
    <option value="38">38</option>
    <option value="39">39</option>
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
    <option value="61">61</option>
    <option value="62">62</option>
    <option value="63">63</option>
    <option value="64">64</option>
    <option value="65">65</option>
    <option value="66">66</option>
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="69">69</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="72">72</option>
    <option value="73">73</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="76">76</option>
    <option value="77">77</option>
    <option value="78">78</option>
    <option value="79">79</option>
    <option value="80">80</option>
    <option value="81">81</option>
    <option value="82">82</option>
    <option value="83">83</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="86">86</option>
    <option value="87">87</option>
    <option value="88">88</option>
    <option value="89">89</option>
    <option value="90">90</option>
    <option value="91">91</option>
    <option value="92">92</option>
    <option value="93">93</option>
    <option value="94">94</option>
    <option value="95">95</option>
    <option value="96">96</option>
    <option value="97">97</option>
    <option value="98">98</option>
    <option value="99">99</option>
</select>
</td>
</tr>
<tr>
<td>
<label class='labelModal'>Humedad Minima %</label>
</td>
<td>
<select name='humedadminima' id='humedadminima' class='SelectModal' placeholder='' required>
    <option value="00">0</option>
    <option value="01">1</option>
    <option value="02">2</option>
    <option value="03">3</option>
    <option value="04">4</option>
    <option value="05">5</option>
    <option value="06">6</option>
    <option value="07">7</option>
    <option value="08">8</option>
    <option value="09">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
    <option value="37">37</option>
    <option value="38">38</option>
    <option value="39">39</option>
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
    <option value="61">61</option>
    <option value="62">62</option>
    <option value="63">63</option>
    <option value="64">64</option>
    <option value="65">65</option>
    <option value="66">66</option>
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="69">69</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="72">72</option>
    <option value="73">73</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="76">76</option>
    <option value="77">77</option>
    <option value="78">78</option>
    <option value="79">79</option>
    <option value="80">80</option>
    <option value="81">81</option>
    <option value="82">82</option>
    <option value="83">83</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="86">86</option>
    <option value="87">87</option>
    <option value="88">88</option>
    <option value="89">89</option>
    <option value="90">90</option>
    <option value="91">91</option>
    <option value="92">92</option>
    <option value="93">93</option>
    <option value="94">94</option>
    <option value="95">95</option>
    <option value="96">96</option>
    <option value="97">97</option>
    <option value="98">98</option>
    <option value="99">99</option>
</select>
</td>
</tr>
<tr>
<td>
<label class='labelModal'>Humedad Maxima %</label>
</td>
<td>
<select name='humedadmaxima' id='humedadmaxima' class='SelectModal' placeholder='' required>
    <option value="00">0</option>
    <option value="01">1</option>
    <option value="02">2</option>
    <option value="03">3</option>
    <option value="04">4</option>
    <option value="05">5</option>
    <option value="06">6</option>
    <option value="07">7</option>
    <option value="08">8</option>
    <option value="09">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
    <option value="37">37</option>
    <option value="38">38</option>
    <option value="39">39</option>
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
    <option value="61">61</option>
    <option value="62">62</option>
    <option value="63">63</option>
    <option value="64">64</option>
    <option value="65">65</option>
    <option value="66">66</option>
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="69">69</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="72">72</option>
    <option value="73">73</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="76">76</option>
    <option value="77">77</option>
    <option value="78">78</option>
    <option value="79">79</option>
    <option value="80">80</option>
    <option value="81">81</option>
    <option value="82">82</option>
    <option value="83">83</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="86">86</option>
    <option value="87">87</option>
    <option value="88">88</option>
    <option value="89">89</option>
    <option value="90">90</option>
    <option value="91">91</option>
    <option value="92">92</option>
    <option value="93">93</option>
    <option value="94">94</option>
    <option value="95">95</option>
    <option value="96">96</option>
    <option value="97">97</option>
    <option value="98">98</option>
    <option value="99">99</option>
</select>
 </td>
</tr>
</table>

</div>

</body>
<input type="hidden" id='ventiladorFrio'  placeholder='ventiFrio'   value=''    size="10"><BR>
<input type="hidden" placeholder='ventiCaliente' id='ventiladorCaliente' value='' size="10"><BR>
<input type="hidden" placeholder='lluvia' id='lluviaInvernadero' value='' size="10"><BR>

</html>



<?php
} else {
    echo '<p><BR><BR>La sesion no esta abierta  click <a href="index.php">aqui</a> para ingresar. </p>';
}
?>
