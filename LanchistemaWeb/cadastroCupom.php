<?php
if (empty($_COOKIE['usuario'])){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}

if (isset($_POST['submitted'])) {
  
  require_once('includes/conexao.php');

  $erros = array();

  if (empty($_POST['cpm'])) {
    $erros[] = "Voce esqueceu de 
    digitar o numero do cupom.";
    } 
    else {
      $cpm = mysqli_real_escape_string ($dbc, trim($_POST['cpm']));
    }

      if (empty($erros)) {
      $q = "INSERT INTO cupom 
      (cupom_numcupom)
      VALUES ('$cpm')";
  
      $r = @mysqli_query ($dbc, $q);

    if ($r) {
    
      include('home.php');

      
    } else {
     include('includes/top.html');
      echo '<h1 align="center">Erro no sistema  !!!</h1>
      <p align="center" class="error">Este cupom ja esta cadastrado em nossa base de dados
       , Obrigado<br />
      </p>
      ';
      
     echo '<p align="center">' . mysqli_error($dbc) .'<br /><br />Query ' . $q . '</p> </br></br>'; 
     echo '<p align="center"> <a align="center" href="index.php"class="waves-effect waves-orange btn-flat" type="submit" name="btn_enter">Voltar</p></a>'; 
    }
    
    mysqli_close($dbc);
    exit();
    } else {
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
    }
?>


