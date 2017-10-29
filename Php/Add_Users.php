       <?php
/* //////////////////////////////////////////////////////////////
@ Autor: JUAN PABLO PRIETO  -- Analista de Sistemas Informaticos.
  Email: prietojuanpablo763@gmail.com
  Telef: 0975 642 695
  Pais: PARAGUAY
  Dpto: Itapua
  Ciudad: Encarnacion*/
  ////////////////--- Add users----/////////////////////
  ## incluyo librerias
  include("Clase.php");
 ###Obtento los datos provenientes del form Usuarios ######################################
   if (!empty($_POST)){
       //variables
        $NombreUsuarioRegistrado= '';
        $EmailUsuarioRegistrado='';
        $Usuarios=Consulta::consul_users(); //consulto usuarios registrados
        foreach($Usuarios as $ConsultaUsuario){
        $NombreUsuarioRegistrado= $ConsultaUsuario['username'];
        $EmailUsuarioRegistrado=  $ConsultaUsuario['email'];
                   }
         $NombreUsuarioSolicitante  = $_POST['Username'];
         $EmailUsuarioSolicitante   = $_POST['Email'];
         if ($NombreUsuarioRegistrado==$NombreUsuarioSolicitante){
            echo 'Nombre de usuario ya existe!';
            }else if($EmailUsuarioRegistrado==$EmailUsuarioSolicitante){
             echo 'Email ya existe!';
                }
              else if(($EmailUsuarioRegistrado<>$EmailUsuarioSolicitante)and($NombreUsuarioRegistrado<>$NombreUsuarioSolicitante))
              {
                //Llamo a la clase para guardar los datos a la db
                    Add::add_user();
              }
}

?>

