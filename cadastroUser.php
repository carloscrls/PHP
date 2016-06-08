<?php
if (empty($_COOKIE['usuario'])){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}
     
if (isset($_POST['submitted'])) {
  
  require_once('includes/conexao.php');

  $erros = array();

  if (empty($_POST['nome'])) {
    $erros[] = "VocÃª esqueceu de 
    digitar nome.";
    } 
    else {
      $nome = mysqli_real_escape_string ($dbc, trim($_POST['nome']));
    }

    if (empty($_POST['email'])) {
    $erros[] = "VocÃª esqueceu de 
    digitar o email.";
    } 
    else {
      $email = mysqli_real_escape_string ($dbc, trim($_POST['email']));
    } 

   if (!empty($_POST['senha'])) {
    if ($_POST['senha'] !=  $_POST['senha2']) {
        $erros[] = "Seu password nÃ£o
        corresponde Ã  confirmaÃ§Ã£o.";
      } 
      else {
        $senha = mysqli_real_escape_string ($dbc, trim($_POST['senha']));
      }

      if (empty($erros)) {

              $q = "select  * from usuarios where usu_email = '".$email."'";
              $r = @mysqli_query($dbc, $q); 
              $num = mysqli_num_rows($r);
              
             if ($num == 1){
               include('includes/top.html');
              echo '<h1 align="center">Ops Ocorreu um erro</h1>
              <p align="center" class="error">Este email ja esta cadastrado em nossa base de dados
              caso tenha esquecido a senha, digite o email no campo email e clique em entrar,
               que iremos enviar a senha para o email cadastrado Obrigado<br />
              </p>
              ';
              include('footer.html');
            }else{
      $q = "INSERT INTO usuarios 
      (usu_nome, usu_email, usu_senha)
      VALUES ('$nome', '$email','$senha')";
  
      $r = @mysqli_query ($dbc, $q);

    if ($r) {
     
      header('location:index.php');

      
    } else {
     include('includes/top.html');
      echo '<h3 align="center">Ops ocorreu um erro  !!!</h3>
      <p align="center" class="error">Este email ja esta cadastrado em nossa base de dados
      caso tenha esquecido a senha, digite o email no campo email e clique em entrar,
       que iremos enviar a senha para o email cadastrado Obrigado<br/>
      </p>
      ';
      
     echo '<p align="center">' . mysqli_error($dbc) .'<br /><br />Query ' . $q . '</p> </br></br>'; 
     echo '<p align="center"> <a align="center" href="index.php"class="waves-effect waves-orange btn-flat" type="submit" name="btn_enter">Voltar</p></a>'; 
    }
    
    mysqli_close($dbc);
    exit();
    }}#end ddo empty erros
     else {
      echo '<h1>Erro!</h1>
    <p class="error">
    Ocorreram os seguinte(s) erro(s):
    <br />';
    foreach ($erros as $msg)
    {
      echo " - $msg<br />\n";
    }
    echo '</p>
    <p>Por favor, tente novamente.</p>';
    }
    mysqli_close($dbc);
    }}
?>


