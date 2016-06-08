<?php
if (empty($_COOKIE['usuario'])){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}
// eu vim de home pontuacao 
if (isset($_POST['submitted'])) {
  
  require_once('includes/conexao.php');

  $erros = array();

  if (empty($_POST['fkpratoid'])) { 
    $erros[] = "Voce esqueceu de 
    digitar o id do prato.";
    } 
    else {
      $fkpratoid = mysqli_real_escape_string ($dbc, trim($_POST['fkpratoid']));
    }

    if (empty($_POST['ponto'])) {
    $erros[] = "Voce esqueceu de 
    atribuir ponto ao prato.";
    } 
    else {
      $ponto = mysqli_real_escape_string ($dbc, trim($_POST['ponto']));
    }

      if (empty($erros) and ($ponto <= 10)) {
      $q = "INSERT INTO pontuacao 
      (pontuacao_prato_id, pontuacao_ponto)
      VALUES ('$fkpratoid', '$ponto')";
  
      $r = @mysqli_query ($dbc, $q);

    if ($r) {
     
     include('indexPontuado.php');

      
    } else {
     include('includes/topHome.html');
      echo '<h1 align="center">Erro no sistema  !!!</h1>
      <p align="center" class="error">Algo de errado não esta certo
      , Obrigado<br />
      </p>
      ';
      
     echo '<p align="center">' . mysqli_error($dbc) .'<br /><br />Query ' . $q . '</p> </br></br>'; 
     echo '<p align="center"> <a align="center" href="index.php"class="waves-effect waves-orange btn-flat" type="submit" name="btn_enter">Voltar</p></a>'; 
    }
    
    
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


