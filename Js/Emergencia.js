/**   Trabajo final de proyecto de grado by JUAN PABLO PRIETO
         Tema: Sistema de Invernadero Automatico (SIA)
         Carrera: Lic. en Analisis de Sistemas Informaticos.
         Institucion: Universidad Autonoma de Encarnacion (UNAE).
         Pais: Paraguay
         Dto. Itapua
         Ciudad: Encarnacion
   **/
///////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
  MostrarEmergencia();
});

function MostrarEmergencia(){
 var temperatura=20//$("#temp").val();
  if(temperatura>39 && temperatura<=44){
  $("#msjEmergencia").css("display", "block");
  $("#div_atencion").css("display", "block");
   $("#div_advertencia").css("display", "none");
   $("#div_congelado").css("display", "none");
  var img="Img/atencion.jpg";
 }else if(temperatura>=45 || temperatura<=-1){
 $("#msjEmergencia").css("display", "block");
 $("#div_advertencia").css("display", "block");
 $("#div_atencion").css("display", "none");
 $("#div_congelado").css("display", "none");
  var img="Img/advertencia.jpg";
 }else if(temperatura<=39 && temperatura>=1){
  $("#div_atencion").css("display", "none");
  $("#div_advertencia").css("display", "none");
  $("#msjEmergencia").css("display", "none");
  $("#div_congelado").css("display", "none");
  var img="Img/atencion.jpg";
 }else if(temperatura<=0){
 $("#div_atencion").css("display", "none");
  $("#div_advertencia").css("display", "none");
  $("#msjEmergencia").css("display", "block");
  $("#div_congelado").css("display", "block");
  var img="Img/atencion.jpg";
 }
$('#msjEmergencia').html('<img src='+img+' width="150" height="150">');
 }
