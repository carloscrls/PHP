<?php
if (empty($_COOKIE['usuario'])and($_COOKIE['usuario']=='carlos')){
echo'<h1 align="center">Erro Usu·rio n„o logado</h1>';
header('location:index.php');}

include ('includes/topHome.html');
require_once ('includes/conexao.php');

echo '<h3 align="center">Alterar prato</h3>';


if (isset($_POST['submitted'])) {	
	$errors = array();

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

    if (!empty($_POST['Xid'])) {
	$xid=$_POST['Xid'];
	}else{
	$errors[] = 'Favor digitar o ID';
	}

	#fim da valida√ß√£o 


	if (empty($errors)) {
   	  $q = "UPDATE prato SET 
   			 prato_desc='$dsc',
   			 prato_ingredientes='$ingred', 
   			 prato_nome='$prtnme',
   			 prato_linkfoto='$lnk' 

   			 WHERE prato_id=$xid LIMIT 1";
  
   			$r = @mysqli_query ($dbc, $q);
   			if (mysqli_affected_rows($dbc) == 1) {
   				echo '<p align="center" >O prato foi editado.';
   				echo '</br><a align="center" class="waves-effect waves-light btn green"  href="adminvisualizaprato.php">Voltar</a></p>';
   			    $result='sucesso';}	
 			
	}else{
     	echo '<p class="error">Ocorreram os seguinte(s) erro(s)<br />';
        foreach ($errors as $msg) {echo " - $msg<br />\n";}
        }
}	


if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
     	$id = $_GET['id'];
     

	$q = "SELECT * FROM prato WHERE prato_id=$id";		
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { 

		
		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
		

		echo '
<form action="adminalteraprato.php" method="post">

	<div id="panelcad"  style="padding:50px;">
	 
	  <div class="input-field col s6">
	  <input  id="prtnme" type="text" name="prtnme" maxlength="50" length="50" value="'.$row['prato_nome'].'"> 
	   <label for="prtnme">Nome do Prato</label>  <br>  
	  </div> <br>

	  <div class="input-field col s6">  
	  <input id="ingred" type="text" name="ingred" maxlength="100" length="100" value="'.$row['prato_ingredientes'].'"> 
	  <label for="ingred">Ingredientes  </label> <br>
	 </div> <br> 

	   <div class="input-field col s6">  
	  <input  id="dsc"  type="text" name="dsc" maxlength="100" length="100" value="'.$row['prato_desc'].'">
	  <label for="dsc">Descricao</label> <br>
	 </div> <br> 

	 <div class="input-field col s6">  
	  <input  id="lnk"  type="text" name="lnk" maxlength="100" length="100" value="'.$row['prato_linkfoto'].'">
	  <label for="lnk">Link da Foto JPG</label> <br>
	 </div> <br> 
	       
	    <p><input class="waves-effect waves-light btn green"  type="submit" name="submit" value="Alterar" /></p>
		
					<input type="hidden" name="submitted" value="TRUE" />
					<input type="hidden" name="Xid" value="' . $id . '" />
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




