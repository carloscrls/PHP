<?php
if (empty($_COOKIE['usuario'])){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}
     
if (isset($_POST['submitted'])) {
  
  require_once('includes/conexao.php');

  $erros = array();

  if (empty($_POST['promo'])) {
    $erros[] = "Voce esqueceu de 
    digitar a promocao.";
    } 
    else {
      $promo = mysqli_real_escape_string ($dbc, trim($_POST['promo']));
    }

  if (empty($_POST['fknumcupom'])) {
    $erros[] = "Voce esqueceu de 
    digitar o num cupom cadastre o cupom primeiro.";
    } 
    else { 
        $q = "SELECT cupom_numcupom FROM cupom where cupom_numcupom = ".($_POST['fknumcupom'])." ";
    
        $r = @mysqli_query ($dbc, $q);
        $num = mysqli_num_rows($r);
        if ($num > 0){
         $fknumcupom = mysqli_real_escape_string ($dbc, trim($_POST['fknumcupom']));
        }else{
          $erros[] = "Cupom digitado nao existe";
          
        }
      
    }

  if (empty($_POST['fkpratoid'])) {
    $erros[] = "Voce esqueceu de 
    digitar o num do prato.";
    } 
    else {
        $q = "SELECT prato_id FROM prato where prato_id = ".($_POST['fkpratoid'])." ";
    
        $r = @mysqli_query ($dbc, $q);
        $num = mysqli_num_rows($r);
        if ($num > 0){
        $fkpratoid = mysqli_real_escape_string ($dbc, trim($_POST['fkpratoid']));
        }else{
          $erros[] = "Prato digitado nao existe";
           
        }
    }

  
    if (empty($erros)) {
      $q = "INSERT INTO promocao 
      (promo_desc, promo_numcupom, promo_pratoId)
      VALUES ('$promo', '$fknumcupom','$fkpratoid')";
  
      $r = @mysqli_query ($dbc, $q);

    if ($r) {
     
      include('home.php');

      
    } else {
     include('includes/top.html');
      echo '<h1 align="center">Erro no sistema  !!!</h1>
      <p align="center" class="error">Esta promoca ja esta cadastrado em nossa base de dados ou o cupom nao existe
      , Obrigado<br />
      </p>
      ';
      
     echo '<p align="center">' . mysqli_error($dbc) .'<br /><br />Query ' . $q . '</p> </br></br>'; 
     echo '<p align="center"> <a align="center" href="index.php"class="waves-effect waves-orange btn-flat" type="submit" name="btn_enter">Voltar</p></a>'; 
    }
    
    mysqli_close($dbc);
    exit();
    } else {
      include('includes/top.html');
      echo '<h2 align="Center" >Erro!</h2>
    <p class="error" align="Center">
      Ocorreram os seguinte(s) erro(s):
    <br />';
    foreach ($erros as $msg)
    {
      echo " - $msg<br />\n";
    }
    echo '</p> <p align="Center">Por favor, tente novamente.</p>';
    echo '<p align="center"> <a align="center" href="cadastroPromocaoHTML.php"class="waves-effect waves-orange btn-flat" type="submit" name="btn_enter">Voltar</p></a>'; 


    }
    mysqli_close($dbc);
    }
?>


