   /**   Trabajo final de proyecto de grado by JUAN PABLO PRIETO
         Tema: Sistema de Invernadero Automatico (SIA)
         Carrera: Lic. en Analisis de Sistemas Informaticos.
         Institucion: Universidad Autonoma de Encarnacion (UNAE).
         Pais: Paraguay
         Dto. Itapua
         Ciudad: Encarnacion
   **/
/////////////////////////////////////////////
  ArrayCultivo=[];
//------ Prototipo cultivo ---//////////
function Cultivo(id_usuario,nombrecultivo,variedad,cant,fechap,fechac,tempmin,tempmax,humedadmin,humedadmax)
{
	this.id_usuario =id_usuario;
	this.nombrecultivo = nombrecultivo;
	this.variedad = variedad;
	this.cantidad = cant;
	this.fechap =fechap ;
	this.fechac =fechac;
	this.tempmin =tempmin;
	this.tempmax =tempmax;
	this.humedadmin = humedadmin;
	this.humedadmax = humedadmax;
}

// funcion para que dispara peticion a arduino server con ajax
var url = 'http://169.254.246.179';// direccion del arduino server
//------------- seccion enviar temperatura---------------------------

//------------- seccion ---------------------------
$(document).ready(function(){
$("#ocultardataConfig").css("display", "none");
$( "#tabs" ).tabs({
			event: "click" //mouseover
           	});
datapicker();//datapicker
///----------- funcion para enviar temperatura y humedad al server arduino
// funcion para enviar temperatura, humedad y repuesta del server arduino
	function ObtenerConfClima(){
        var tempMin = $("#Tmin").val();
        var tempMax = $("#Tmax").val();
        var humedadMin = $("#Hmin").val();
        var humedadMax= $("#Hmax").val();
        var EnviarDatos=tempMin+tempMax+humedadMin+humedadMax;
 	   $('#estado').removeClass('label-success').addClass('label-warning');
		$('#estado').text("Enviando peticion..");
		//console.log(EnviarDatos);
    	$.ajax({
		    url: url,
		    data: {orden:EnviarDatos},
		    dataType: 'jsonp',
		    crossDomain: true,
		    jsonp: false,
		    jsonpCallback: 'datos', // IMPORTANTE PORQUE NOS DEVULVE LOS DATOS DE LOS SENSORES DESDE ARDUINO
      success: function(data) {
   	            $('#estado').removeClass('label-warning').addClass('label-success')
				$('#estado').text("Obteniendo respuestas..");
				$('#Temperatura').text(data.sensorTemperatura);
				$('#Humedad').text(data.sensorHumedad);
				$('#ventiladorFrio').val(data.ventiFrio);
				$('#ventiladorCaliente').val(data.ventiCaliente);
        $('#lluviaInvernadero').val(data.ventiFrio);

		//end code para obtener respuesta del sever arduino
  //------------------------STAR CODE SLIDER-----------------------------------------------------
			   var sliderTemperatura= data.sensorTemperatura; // asigno valor para mi slider
		     var sliderHumedad= data.sensorHumedad; // asigno valor para mi slider
			$( ".slider-vertical" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 1023,
			value:sliderTemperatura,
			slide: function( event, ui ) {
				$( "#amount" ).val(ui.value);
			}
		});
		$( "#slider-vertical" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 1023,
			value: sliderHumedad,
			slide: function( event, ui ) {
				$( "#amount" ).val( ui.value );
			}
		});

  //----------------------END CODE SLIDER-------------------------------------------------------
		    }
		  });
        return false;
    }
//setInterval(ObtenerConfClima, 700); // a cada 700 milesiam de segundos llamo a esta funcion

//-----------------END CODE AJAX SEND-REQUES -----------------------------------------------------

//--------------------------------------------
Tooltip();  //tooltip
//dialog modal
$("#LevatarModal").click(function(){
$("#divModal").dialog( "open" );
});
 DialogoModal();//formulario modal
//------------------------------------------
});//cierre

//-----------------------------------------------------------------------------------------------
//Tooltip
function Tooltip() {
		$( document ).tooltip({
			position: {
				my: "center bottom-20",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
						.addClass( "arrow" )
                        .addClass( feedback.vertical )
						.addClass( feedback.horizontal )
						.appendTo( this );
				}
			}
		});
//-----------------------------------------------------------------------------------------------
	};
   













//***********************************************************************************************************************
//// CODIGO PARA DEFINIR A CADA CAMPO SI VA A SER DE SOLO NUMERO O CARACTER O AMBOS-------------------------------------
//**********************************************************************************************************************
function permite(elEvento, permitidos) {
  // Variables que definen los caracteres permitidos
  var numeros = "0123456789/";
  var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
  var numeros_caracteres = numeros + caracteres;
  var teclas_especiales = [8, 9, 37, 39, 46];
  // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha  ,9=tab

 // Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
    case 'car':
      permitidos = caracteres;
      break;
    case 'num_car':
      permitidos = numeros_caracteres;
      break;
  }

  // Obtener la tecla pulsada
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);

  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }

  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
//---------------------------------------------------------------------------------
//****************************************************************************************************
//formulario de modal cultivo
function DialogoModal(){
$("#divModal").dialog({
			autoOpen: false,
		//	width: 200,      //alto
			width : 380, 	//ancho
			modal: true,	//modo
			buttons: [
				{
					text: "Ok",
					click: function() {
                    var corroborado = false;
                  if (CorroborarCampoVacio(corroborado)){
                    GuardarDatosModal();//Guarda datos del formulario de modal
                    EnviaDatosModal();//Envia datos de modal
					}
				}
				},
				{
					text: "Cancel",
					click: function() {
					LimpiarForm(); //limpia los campos del formulario
						$( this ).dialog( "close" );
					}
				}
			]
		});
		}
function CerrarDialog(){
 $("#divModal").dialog( "close" );//cierro formulario de modal
}
 function datapicker(){
$( "#feplantacion" ).datepicker({
			defaultDate: "+0w",  // con 0w el sumamos cero semana
			changeMonth: true,//Si el mes se debe representar como un desplegable en lugar de texto.
            //changeYear: true, Muestra el anho en forma deplegable
            numberOfMonths: 1
		});
		$( "#fechacosecha" ).datepicker({
		  defaultDate: "+0w", //le sumo una semana, es decir 7 dias
			changeMonth: true,
			numberOfMonths: 4
		});
}
 function LimpiarForm(){
   $("#tipocultivo").val("");
   $("#variedad").val("");
   $("#cantidad").val("");
   $("#duracion").val("");
   $("#feplantacion").val("");
   $("#fechacosecha").val("");
   $("#tempminima").val("");
   $("#tempmaxima").val("");
   $("#humedadminima").val("");
   $("#humedadmaxima").val("");
  }
  ///// se recoge datos sobre cultivo del form modal y guarda en un arreglo /////
 function GuardarDatosModal(){

        ArrayCultivo.push(
            new Cultivo(
                       $("#id_usuario").val(),
                       $("#tipocultivo").val(),
                       $("#variedad").val(),
                       $("#cantidad").val(),
                       $("#feplantacion").val(),
                       $("#fechacosecha").val(),
                       $("#tempminima").val(),
                       $("#tempmaxima").val(),
                       $("#humedadminima").val(),
                       $("#humedadmaxima").val()
                       )

        )

   }


 ///// funcion para corroborar que los campos obligatorios no esten vacio
 function CorroborarCampoVacio(corroborado){
             TipoCultivo =$("#tipocultivo"),
             FechaPlan   =$("#feplantacion"),
             FechaCosecha=$("#fechacosecha");
              allFields = $( [] ).add(TipoCultivo).add(FechaPlan).add(FechaCosecha);
	   		allFields.removeClass( "ui-state-error" );  //reseteamos los campos marcados
				tips = $( ".validateTips" );

				var bValid = true;
				bValid = bValid && comprobar_longitud(TipoCultivo, "campo Tipo de cultivo", 3, 30);
				bValid = bValid && comprobar_longitud(FechaPlan, "Fecha de plantacion ", 01, 31);
				bValid = bValid && comprobar_longitud(FechaCosecha, "Fecha de cosecha", 01, 31);
                 if ( bValid ) {
						corroborado = true;
						return corroborado;
						allFields.val( "" ).removeClass( "ui-state-error" );
					}
}
//// funcion para comprobar longitud
function comprobar_longitud( o, n, min, max ) {
	if ( o.val().length > max || o.val().length < min ) {
		o.addClass( "ui-state-error" );
		updateTips( "Longitud de  " + n + " debe ser entre " +
			min + " y " + max + "." );
		return false;
	} else {
		return true;
	}
}
///////////////////////////////////////
function updateTips( t ) {
	tips
		.text( t )
		.addClass( "ui-state-highlight" );
		setTimeout(function() {
			tips.removeClass( "ui-state-highlight", 1500 );
			}, 800 );
}
//funcion para enviar datos del formulario
  function EnviaDatosModal(){
   var datosForm=JSON.stringify(ArrayCultivo);
     ArrayCultivo=[];// una vez enviado vacio el array
     LimpiarForm();;//limpio los campos de dialog madal
      //star ajax
 $.ajax({
       cache: false,
       data:{DatosCultivo:datosForm},
                url:   'Php/Cultivo.php',
                type:  'post',
                beforeSend: function () {
                 //mensaje
                 $('.validateTips').text("Enviando..");
                },
                success:  function (respuesta) {
                            if(respuesta){
                                CerrarDialog();
                                 $('.validateTips').text("");
                               location.reload();
                              
                            }else{
                            $('.validateTips').text(respuesta);
                            $('.validateTips').text("");
                            }

                               }
        });//the end AJAX
}



