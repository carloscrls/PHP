<?php
if (empty($_COOKIE['usuario'])and($_COOKIE['usuario']=='carlos')){
echo'<h1 align="center">Erro Usu·rio n„o logado</h1>';
header('location:index.php');}


include ('includes/topHome.html');
require_once ('includes/conexao.php');

echo '<h3 align="center">Alterar usuario</h3>';


if (isset($_POST['submitted'])) {	
	$errors = array();

  if (empty($_POST['usunome'])) {
    $erros[] = "voce esqueceu de digitar a descricao descricao.";
    } 
    else {
      $usunome = mysqli_real_escape_string ($dbc, trim($_POST['usunome']));
    }
 
  if (empty($_POST['usuemail'])) {
    $erros[] = "Voce esqueceu de digitar o numcupom.";
    } 
    else {
      $usuemail = mysqli_real_escape_string ($dbc, trim($_POST['usuemail']));
    }

  if (empty($_POST['ususenha'])) {
    $erros[] = "Voce esqueceu de digitar o numcupom.";
    } 
    else {
      $ususenha = mysqli_real_escape_string ($dbc, trim($_POST['ususenha']));
    }
   

    if (!empty($_POST['xid'])) {
	$xid=$_POST['xid'];
	}else{
	$errors[] = 'Favor digitar o ID';
	}

	#fim da valida√ß√£o 


	 if (empty($errors)) {
   	  $q = "UPDATE usuarios SET usu_nome='$usunome', usu_email='$usuemail', 
   	  usu_senha='$ususenha' WHERE usu_id = $xid LIMIT 1";
  
   			$r = @mysqli_query ($dbc, $q);

   			if (mysqli_affected_rows($dbc) == 1) {
          

   				echo '<p align="center" >Usuario foi editada com sucesso.';
   				echo '</br><a align="center" class="waves-effect waves-light btn green"  href="adminvisualizausuario.php">Voltar</a></p>';

   			    $result='sucesso';}	
 			
	}else{
     	echo '<p class="error">Ocorreram os seguinte(s) erro(s)<br />';
        foreach ($errors as $msg) {echo " - $msg<br />\n";}
        }
}	
#fim do update

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
     	$id = $_GET['id'];
     

	$q = "SELECT * FROM usuarios WHERE usu_id = $id ";		
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { 

		
		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
		

		echo '
<form action="adminalterausuario.php" method="post">

	<div id="panelcad"  style="padding:50px;">
	 
	  <div class="input-field col s6">

	  <input  id="usunome" type="text" name="usunome" maxlength="50" length="50" value="'.$row['usu_nome'].'"> 
	   <label for="usunome">Nome</label>  <br>  
	  </div> <br>

	  <div class="input-field col s6">  
	  <input id="usuemail" type="email" name="usuemail" maxlength="100" length="100" 
    value="'.$row['usu_email'].'"> 
	  <label for="usuemail">Email</label> <br>
	 </div> <br> 

	  <div class="input-field col s6">  
	  <input id="ususenha" type="text" name="ususenha" maxlength="100" length="100" 
    value="'.$row['usu_senha'].'"> 
	  <label for="ususenha">Senha</label> <br>
	 </div> <br> 
	       
	    <p><input class="waves-effect waves-light btn green"  type="submit" name="submit" value="Alterar" /></p>
		
					<input type="hidden" name="submitted" value="TRUE" />
					<input type="hidden" name="xid" value="' . $id . '" />
	    </div> 				
</form>
		';

    }

} else if (empty($result)) { 
	echo '<p class="error">Esta p√°gina foi acessada de modo indevido.</p>';
}

mysqli_close($dbc);
		
include ('footer.html');

?>




