<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>Charting</title>

	<script type="text/javascript" src="js/enhance.js"></script>		
	<script type="text/javascript">
		// Run capabilities test
		enhance({
			loadScripts: [
				'js/excanvas.js',
				'js/jquery.min.js',
				'js/visualize.jQuery.js',
				'js/grafico.js'
			],
			loadStyles: [
				'css/visualize.css',
				'css/visualize-light.css'
			]	
		});   
    </script>
</head>
<body>
<?php
## incluyo librerias
  
  include("../Php/Clase.php");
echo"<table border='1' style='display:none'>";
echo'<thead>
      <tr>
           <th scope="col"><h4>Fecha y hora</h4></th>
           <th scope="col"><h4>Temperatura</h4></th>
           <th scope="col"><h4>Humedad</4></th>
       </tr>
     </thead>';
 echo '<tbody>';    

$estadistica=Consulta::consul_estadisticas(); //imprimo la clase que contiene los datos sobre cultivos
 foreach($estadistica as $resulEstadistica){
    echo"<tr id='columna'><td>".$resulEstadistica['datetime']."</td>";
   
    echo"<td>".$resulEstadistica['temp']."&deg;C</td>";
    echo"<td>".$resulEstadistica['humedad']."%</td></tr>";
}
echo'</tbody>';
echo"</table>";
?>
</body>
</html>