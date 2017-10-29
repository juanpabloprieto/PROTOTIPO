   /**   Trabajo final de proyecto de grado by JUAN PABLO PRIETO
         Tema: Sistema de Invernadero Automatico (SIA)
         Carrera: Lic. en Analisis de Sistemas Informaticos.
         Institucion: Universidad Autonoma de Encarnacion (UNAE).
         Pais: Paraguay
         Dto. Itapua
         Ciudad: Encarnacion
   **/


$(document).ready(function(){
      // al hacer click se invia los datos para add users
       	$('#bt_GuardarRegistro').click(function(){
                                   AddUsuario();//funcion AddUsuario
                                   });
        // al hacer click se invia los datos para actualizar usuario
       	$('#bt_ActualizarRegistro').click(function(){
                                  ActualizarUsuario()//funcion UpdateUser
                                   });
    HTML_Login();//HTML Login
});// cierre llave princial
//////// funcion para insertar datos del registro por medio de ajax ///////
     function AddUsuario(){
      var corroborado = false;
       if (CorroborarCampoUsers(corroborado)){
        //star ajax
 $.ajax({
       cache: false,
       data:{
             Username: $("#username").val(),   //.toUpperCase(),
             password: $("#password").val(),
             Nombres:  $("#nombres").val(),    //.toUpperCase(),
             Apellidos:$("#apellidos").val(),  //.toUpperCase(),
             Direccion:$("#direccion").val(),  //.toUpperCase(),
             Telefono: $("#telefono").val(),//.toUpperCase(),
             Email:    $("#email").val().toLowerCase(),

               },
                url:   'Php/Add_Users.php',
                type:  'post',
                beforeSend: function () {
                  //mensaje
                 $('#mjsRegistro').text("Enviando..");
                },
                success:  function (respuesta) {
                   if(respuesta==1){
                                 $('.sectionAdd').html('Tu dato se han guardado correctamente.<BR> <BR><input type="button" onclick=location.reload(); value="Click aqui para logearte">');
                                      }else{
                   $('#mjsRegistro').text(respuesta);
                   }}
        });//the end AJAX
      }
     }
///////// fin funcion para insertar datos del registro por medio de ajax
//////// funcion para actualizar datos del registro por medio de ajax ///////
     function ActualizarUsuario(){
      var corroborado = false;
       if (CorroborarCampoUsers(corroborado)){
        //star ajax
 $.ajax({
       cache: false,
       data:{
             idUsuario: $("#id_usuario").val(),//.toUpperCase(),
             Username: $("#username").val(),//.toUpperCase(),
             password: $("#password").val(),
             Nombres:  $("#nombres").val(),//.toUpperCase(),
             Apellidos:$("#apellidos").val(),//.toUpperCase(),
             Direccion:$("#direccion").val(),//.toUpperCase(),
             Telefono: $("#telefono").val(),//.toUpperCase(),
             Email:    $("#email").val().toLowerCase(),

               },
                url:   'Php/Update_User.php',
                type:  'post',
                beforeSend: function () {
                  //mensaje
                 $('#actualizarCuenta').text("Enviando..");
                },
                success:  function (respuesta) {
                   if(respuesta==2){
                                    location.reload();// actualizo la pagina
                                      }else{
                   $('#actualizarCuenta').text(respuesta);
                   }}
        });//the end AJAX
      }
     }
///////// fin funcion para actualizar datos del registro por medio de ajax

///// funcion para corroborar que los campos obligatorios no esten vacio
 function CorroborarCampoUsers(corroborado){
             username  = $("#username"),
             password  = $("#password"),
             nombres   = $("#nombres"),
             apellidos = $("#apellidos"),
             email     = $("#email");
 allFields = $( [] ).add(username).add(password).add(nombres).add(apellidos).add(email);
				allFields.removeClass( "ui-state-error" );  //reseteamos los campos marcados
				tips = $( ".validateTips" );

				var bValid = true;
				bValid = bValid && checkRegexp(username, /^[a-z]([0-9A-Z a-z])+$/i,"Nombre de Usuario no valido!" );
				bValid = bValid && comprobar_longitud(password, "campo Clave ", 5, 85);
				bValid = bValid && checkRegexp(nombres,/^[a-z]([A-Z a-z])+$/i, "Campo Nombres esta vacio!");
				bValid = bValid && checkRegexp(apellidos, /^[a-z]([A-Z a-z])+$/i, "Campo Apellidos esta vacio!");
				bValid = bValid && checkRegexp(email,/^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i, "Email no valido!");
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
		updateTips( n + " debe ser entre " +
			min + " y " + max + "Caracteres." );
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
///////////////// Funcion para validar con expresiones regulares////////////////////////////
function checkRegexp( o, regexp, n ) {
	if ( !( regexp.test( o.val() ) ) ) {
		o.addClass( "ui-state-error" );
		updateTips( n );
		return false;
	} else {
		return true;
	}
}
///////////// Funcion que contiene el formulario de login/////////////////
 function HTML_Login(){
   $("#divhtml").html(html);
// al hacer click se invia los datos para add users
       	$('#bt_Login').click(function(){
       	var corroborado = false;
       if (CorroborarCampoLogin(corroborado)){
                                   Login();//funcion login
                                   }
                                   });
 }
 //////// funcion para login ///////////////
  function Login(){
  //star ajax
    $.ajax({
       cache: false,
       data:{
             LoginName:     $("#userlogin").val(),//.toUpperCase(),
             LoginPassword: $("#passlogin").val()
               },
                url:   'Php/Login.php',
                type:  'post',
                beforeSend: function () {
                  //mensaje
                 $('#error').text("Enviando..");
                },
                success:  function (respuesta) {
                  if(respuesta>0){
                                 window.location='admin.php';
                                     }else{
                   $('#error').text(respuesta);
                   }}
        });//the end AJAX
      }

///////// fin funcion para login ///////////////////

///// funcion para corroborar que los campos obligatorios no esten vacio
 function CorroborarCampoLogin(corroborado){
             LoginName  = $("#userlogin"),
             Loginpassword  = $("#passlogin"),

 allFields = $( [] ).add(LoginName).add(Loginpassword);
				allFields.removeClass( "ui-state-error" );  //reseteamos los campos marcados
				tips = $( ".validateLogin" );

				var bValid = true;
				bValid = bValid && checkRegexp(LoginName, /^[a-z]([0-9A-Z a-z])+$/i,"Introduce tu nombre de usuario!" );
				bValid = bValid && checkRegexp(Loginpassword,/^[0-9a-z]([0-9A-Z a-z])+$/i,"Introduce tu clave!" );
			           if ( bValid ) {
						corroborado = true;
						return corroborado;
						allFields.val( "" ).removeClass( "ui-state-error" );
					}
}
// formulario de html login
var html= '<div class="card signin-card clearfix">'+
                   '<img class="profile-img" src="Img/avatar_2x.png" alt="">'+
                   '<p class="validateLogin" id="error"></p>'+
                   '<input id="userlogin"  type="text" placeholder="Usuario"  maxlength="30" class="campo-login" autofocus >'+
                   '<input id="passlogin"  type="password" placeholder="Password"  maxlength="27" class="campo-login">'+
                   '<input id="bt_Login"  class="ui-button" type="button" value="Iniciar sesion">'+
                   '<label class="remember">'+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                   '<a id="linkLogin" title="Si te olvidaste de tu Nombre de usuario o de tu contraseña hace click aqui" href="recuperar_cuenta.php">Necesitas ayuda?</a>'+
                   '</div>'
// funcion para chaquear clave si son iguales
function ChequearClave() {
  password= $("#password").val()
  repassword=$("#repassword").val()
  if ( password != repassword){
    $('#mjsRegistro').text("Las claves no coinciden!");
     // alert('no clave')
    $("#repassword").focus()
   
  }else if ( password == repassword){
    $('#mjsRegistro').text("");
    } 
}
// funcion para chaquear clave si son iguales
function ChequearClaveAdmin() {
  password= $("#password").val()
  repassword=$("#repassword").val()
  if ( password != repassword){
    $('#mensajeError').text("Las claves no coinciden!");
    $('#bt_ActualizarRegistro').attr('disabled','disabled')
    $("#repassword").focus()
   
  }else if ( password == repassword){
    $('#mensajeError').text("");
     $('#bt_ActualizarRegistro').removeAttr('disabled')
    } 
}
function NuevoClave(){
  password= $("#password").val("")
  }

