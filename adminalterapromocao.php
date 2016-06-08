<?php
if (empty($_COOKIE['usuario'])and($_COOKIE['usuario']=='carlos')){
echo'<h1 align="center">Erro Usu·rio n„o logado</h1>';
header('location:index.php');}


include ('includes/topHome.html');
require_once ('includes/conexao.php');

echo '<h3 align="center">Alterar promo</h3>';


if (isset($_POST['submitted'])) {	
	$errors = array();

  if (empty($_POST['promodesc'])) {
    $erros[] = "voce esqueceu de digitar a descricao descricao.";
    } 
    else {
      $promodesc = mysqli_real_escape_string ($dbc, trim($_POST['promodesc']));
    }
 
  if (empty($_POST['ncupom'])) {
    $erros[] = "Voce esqueceu de digitar o numcupom.";
    } 
    else {
      $ncupom = mysqli_real_escape_string ($dbc, trim($_POST['ncupom']));
    }

   

    if (!empty($_POST['xid'])) {
	$xid=$_POST['xid'];
	}else{
	$errors[] = 'Favor digitar o ID';
	}

	#fim da valida√ß√£o 


	 if (empty($errors)) {
   	  $q = "UPDATE promocao SET promo_desc='$promodesc',promo_numcupom='$ncupom' WHERE promo_id=$xid LIMIT 1";
  
   			$r = @mysqli_query ($dbc, $q);

   			if (mysqli_affected_rows($dbc) == 1) {
          

   				echo '<p align="center" >a Promocao foi editada com sucesso.';
   				echo '</br><a align="center" class="waves-effect waves-light btn green"  href="adminvisualizapromocao.php">Voltar</a></p>';

   			    $result='sucesso';}	
 			
	}else{
     	echo '<p class="error">Ocorreram os seguinte(s) erro(s)<br />';
        foreach ($errors as $msg) {echo " - $msg<br />\n";}
        }
}	
#fim do update

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
     	$id = $_GET['id'];
     

	$q = "SELECT * FROM promocao WHERE promo_id = $id ";		
	$r = @mysqli_query ($dbc, $q);

	if (mysqli_num_rows($r) == 1) { 

		
		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
		

		echo '
<form action="adminalterapromocao.php" method="post">

	<div id="panelcad"  style="padding:50px;">
	 
	  <div class="input-field col s6">

	  <input  id="promodesc" type="text" name="promodesc" maxlength="50" length="50" value="'.$row['promo_desc'].'"> 
	   <label for="promodesc">Descricao</label>  <br>  
	  </div> <br>

	  <div class="input-field col s6">  
	  <input id="ncupom" type="text" name="ncupom" maxlength="100" length="100" 
    value="'.$row['promo_numcupom'].'"> 
	  <label for="ncupom">Numero Cupom  </label> <br>
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




