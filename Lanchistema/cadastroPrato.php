<?php
if (empty($_COOKIE['usuario'])){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}
     
if (isset($_POST['submitted'])) {
  
  require_once('includes/conexao.php');

  $erros = array();

  if (empty($_POST['prtnme'])) {
    $erros[] = "voce esqueceu de 
    digitar nome do prato.";
    } 
    else {
      $prtnme = mysqli_real_escape_string ($dbc, trim($_POST['prtnme']));
    }
 
    if (empty($_POST['ingred'])) {
    $erros[] = "Voce esqueceu de 
    digitar os ingredintes.";
    } 
    else {
      $ingred = mysqli_real_escape_string ($dbc, trim($_POST['ingred']));
    }

    if (empty($_POST['dsc'])) {
    $erros[] = "Voce esqueceu de 
    digitar a descricao do prato.";
    } 
    else {
      $dsc = mysqli_real_escape_string ($dbc, trim($_POST['dsc']));
    }

     if (empty($_POST['lnk'])) {
    $erros[] = "Voce esqueceu de 
    digitar o link da foto JPG.";
    } 
    else {
      $lnk = mysqli_real_escape_string ($dbc, trim($_POST['lnk']));
    }
  
      if (empty($erros)) {
        $q = "INSERT INTO prato 
        (prato_desc, prato_ingredientes, prato_nome, prato_linkfoto)
        VALUES ('$dsc','$ingred' ,'$prtnme','$lnk')";

        $r = @mysqli_query ($dbc, $q);

          if ($r) {
          
            include('home.php');

            
          } else {
           include('includes/top.html');
            echo '<h1 align="center">Erro no sistema  !!!</h1>
            <p align="center" class="error">Este prato ja esta cadastrado em nossa base de dados
           , Obrigado<br />
            </p>
            ';
            
           echo '<p align="center">' . mysqli_error($dbc) .'<br /><br />Query ' . $q . '</p> </br></br>'; 
           echo '</br><p align="center"> <a align="center" href="index.php"class="waves-effect waves-orange btn-flat" type="submit" name="btn_enter">Voltar</p></a>'; 
          
          
          mysqli_close($dbc);}

      exit();
      } //se tiver erro executa abaixo 

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
      }
  ?>


