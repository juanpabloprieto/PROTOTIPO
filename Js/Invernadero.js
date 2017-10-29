   /**   Trabajo final de proyecto de grado by JUAN PABLO PRIETO
         Tema: Sistema de Invernadero Automatico (SIA)
         Carrera: Lic. en Analisis de Sistemas Informaticos.
         Institucion: Universidad Autonoma de Encarnacion (UNAE).
         Pais: Paraguay
         Dto. Itapua
         Ciudad: Encarnacion
   **/

//Mantiene los tabas# seleccionado en la pantalla al actualizar la pagina
$(document).ready(function(){
$("#tabs1").click(function(){
 window.location='#tabs-1' ;
});
$("#tabs2").click(function(){
 window.location='#tabs-2' ;
});
$("#tabs3").click(function(){
 window.location='#tabs-3' ;
});
$("#tabs4").click(function(){
 window.location='#tabs-4' ;
});
$("#tabs5").click(function(){
 window.location='#tabs-5' ;
});
$("#bt_horas").click(function(){
  datahora();
  location.reload();
});
///////////////////////////////////////////////////////////////////////
////////////// CONSULTA dataTable /////////////////////////
dataTable_cultivo();
dataTable_estadistica();
/////////////////////////////////////////////////////////////////////////
datalocal();
Datetime();


 $('#botonEnviarTemp').click(function(){ ObtenerDatos()});
 // Hover states on the static widgets
		$( "#icons li" ).hover(
			function() {
				$( this ).addClass( "ui-state-hover" );
			},
			function() {
				$( this ).removeClass( "ui-state-hover" );
			}
		);
		
$( "#calendario" ).datepicker({
			inline: true
		});
		$('#bt_email').click(function(){
                                 EnviarEmail();
                                   });
});

// funcion para obtener datos del formulario del invernadero
function ObtenerDatos(){
   TempMin   = $("#TempMin").val();
   TempMax   = $("#TempMax").val();
   HumedadMin= $("#HumedadMin").val();
   HumedadMax= $("#HumedadMax").val();
   Id_user  = $("#id_usuario").val();

       if (TempMin==0 || TempMax==0 || HumedadMin==0 || HumedadMax==0){ $("#divInver").text('Debes establecer valores distintos a los cuatro paràmetros')}
      
       else if(TempMax==TempMin||HumedadMax==HumedadMin){$("#divInver").text('Paràmetros mal configurado')}
       
       else if(TempMax<TempMin||HumedadMax<HumedadMin){$("#divInver").text('Paràmetros mal configurado')}
       
       else if (TempMax>TempMin&&HumedadMax>HumedadMin){
       
       //star ajax
 $.ajax({
       cache: false,
       data:{
             TempMin:TempMin,
             TempMax:TempMax,
             HumedadMin:HumedadMin,
             HumedadMax:HumedadMax,
             Id_user:Id_user,
               },
                url:   'Php/Add_Config.php',
                type:  'post',
                beforeSend: function () {
                  //mensaje
                 $('#divInver').text("Enviando..");
                },
                success:  function (respuesta) {
                $('#divInver').text(respuesta);
                location.reload();//recargo la pagina
                }

        });//the end AJAX



      }

}
//////// funcion para enviar por ajax ///////
     function EnviarEmail(){
      var corroborado = false;
       if (CorroborarCampoEmail(corroborado)){
        //star ajax
 $.ajax({
       cache: false,
       data:{
             Email:$("#email").val().toLowerCase()
             },
                url:   'Php/Cuenta.php',
                type:  'post',
                beforeSend: function () {
                  //mensaje
                 $('#ErrorEmail').text("Enviando..");
                },
                success:  function (respuesta) {
                   $('#ErrorEmail').text(respuesta);
                   }
        });//the end AJAX
      }
     }
///////// fin funcion para insertar datos del registro por medio de ajax
///// funcion para corroborar que los campos obligatorios no esten vacio
 function CorroborarCampoEmail(corroborado){
             email     = $("#email");
             allFields = $( [] ).add(email);
             allFields.removeClass( "ui-state-error" );  //reseteamos los campos marcados
	         tips = $("#ErrorEmail");

				var bValid = true;
				bValid = bValid && checkRegexp(email,/^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i, "Email no valido!");
                 if ( bValid ) {
						corroborado = true;
						return corroborado;
						allFields.val( "" ).removeClass( "ui-state-error" );
					}
}
//  funcion para obtener datos y enviar a la db
  function RequesAjax(){
	$.ajax({
		    url: 'http://169.254.246.179',
		    dataType: 'jsonp',
		    crossDomain: true,
		    jsonp: false,
		    jsonpCallback: 'datos', // IMPORTANTE PORQUE NOS DEVULVE LOS DATOS DE LOS SENSORES DESDE ARDUINO
      success: function (data) {
          $("#temp").val(data.sensorTemperatura);
          $("#humedad").val(data.sensorHumedad);
          GuardarEstadistica();
  }
		  });

}

 function GuardarTiempo(){
   var SaveTime=0;
   var horas=$("#horas").val();//valor del tiempo
   var SaveTime=horas*1000
  return SaveTime ;
 }

 function datahora(){
   localStorage.clear();
   localStorage.setItem("SaveTime",JSON.stringify(GuardarTiempo()));
   datalocal();
}
function datalocal(){
  var tiempoEstablecida = JSON.parse(localStorage.getItem("SaveTime"));
   $('#horaFijada').val(tiempoEstablecida);
}
function Hora(){
 xTime=$('#horaFijada').val()*1;
 setInterval(RequesAjax,xTime); // a cada x minutos de segundos llamo a esta funcion para insertar en la db
//console.log(xTime)
}
setInterval(Hora,1000 );
function GuardarEstadistica(){
    //star ajax
 $.ajax({
       cache: false,
       data:{
            Temp:$("#temp").val(),
            Humedad:$("#humedad").val(),
            Datetime:$("#datetime").val()
           },
                url:   'Php/Add_Estadistica.php',
                type:  'post',
                beforeSend: function () {
                  //mensaje
                 $('#divEstadisticas').text("Guardando datos del invernadero..");
                },
                success:  function (respuesta) {
                   $('#divEstadisticas').text(respuesta);
                   location.reload();
                   }

        });//the end AJAX
}
 function Datetime(){
  var fecha = new Date();
$("#datetime").val(fecha.getFullYear()+"-"+(fecha.getMonth()+1)+"-"+fecha.getDate()+" "+(fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds()));
}

function EliminarCultivo(){
if (window.confirm("Atencion:\nDesea eliminar el cultivo?")){
       var id=$(this).attr('data-id');
       console.log('El id es:')
       console.log(id)
       //star ajax
 $.ajax({
     cache: false,
       data:{idCultivo:id},
                url:   'Php/DeleteCultivo.php',
                type:  'post'

        });//the end AJAX
        //location.reload();// recargo la pagina
   }
}

setInterval(Datetime, 1000);//actualiza la hora
///////////////////////////////////////////////////////
///funcion para traer datos mediante data table/////////
//////////////////////////////////////////////////////////
function dataTable_cultivo(){
$('#cultivo').dataTable({
    'sAjaxSource': 'Php/consulta_cultivo.php'
});  
} 
function dataTable_estadistica(){
$('#estadistica').dataTable({
    'sAjaxSource': 'Php/consulta_estadistica.php'
});  
} 
//////////////////////////////////////////////////////////////////