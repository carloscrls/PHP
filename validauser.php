<?php
require_once('includes/conexao.php');//chama arquivo de conexao 
 

 $erros = array();

  if (empty($_POST['user'])) {
    $erros[] = "Voce esqueceu de 
    seu user.";
    } else {
      $user = mysqli_real_escape_string ($dbc, trim($_POST['user']));
    }

    if (empty($_POST['password'])) {
    $erros[] = "Voce esqueceu de 
    digitar sua senha.";
    } else {
      $password = mysqli_real_escape_string ($dbc, trim($_POST['password']));
    }


 if (empty($erros)) {
      $q = 
      "select  * from usuarios where (blok <> '1' or blok is null) and usu_email = '".$user."' and usu_senha= '".$password."';";
        $r = @mysqli_query($dbc, $q);  
        $num = mysqli_num_rows($r);
         
         if ($num == 1){
             setcookie("usuario",$_POST['user'],time()+60*60*24*30);
             header('location:home.php');
          }else{


      $q = "select  * from usuarios where (blok <> '1' or blok is null) and usu_email = '".$user."'";
      $r = @mysqli_query($dbc, $q); 
      $num = mysqli_num_rows($r);
      
        if ($num == 1){
          while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
          // mail ###
          $senha = 'Senha para Login: '.$row['usu_senha'];
          $email = $row['usu_email'];


          }
$email_servidor = "lanchistema.16mb.com";
$para = "$email";
$de = "noreply@lanchistema.16mb.com";
$mensagem = "$senha";
$assunto = "Senha do sistema Lanchistema";

    $headers = "From: $email_servidor\r\n" .
               "Reply-To: $de\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
 mail($para, $assunto, nl2br($mensagem), $headers);
 mail("$email","Senha de Login Lanchistema",$senha);


          // mail ###  

         include('includes/top.html');
           

          echo'<h5 align="center"> Senha incorreta</h5>';
          echo'<h5 align="center"> Enviamos sua senha para seu Email favor verificar </h5></br></br></br></br></br></br></br></br>';
          include('footer.html');
       }


       else{
               include('includes/top.html');
                echo'<h3 align="center">Usuario Nao encontrado</h3></br>';
               include('footer.html');
                } 
               mysqli_free_result($r);
              
            
   
      }
  } 
  else{

      include('includes/top.html');
       echo'<h5 align="center"> Erro ao Validar sua conta</h5>';
       echo'<h5 align="center"> Favor digitar todos os campor corretamente </h5></br></br></br></br></br></br></br></br>';
      include('footer.html');
     mysqli_close($dbc);}



    
?>


