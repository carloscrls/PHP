<?php # Script - apaga_usuario.php
if (empty($_COOKIE['usuario'])and($_COOKIE['usuario']=='carlos')){
echo'<h1 align="center">Erro Usu�rio n�o logado</h1>';
header('location:index.php');}


include ('includes/topHome.html');

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
	$id = $_GET['id'];

} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { 
	$id = $_POST['id'];
} else { 
	echo '<p class="error">Esta página foi acessada de modo indevido.</p>';
	include ('includes/footer.html'); 
	exit();
}

require_once ('includes/conexao.php');

if (isset($_POST['submitted'])) {

	if ($_POST['opcao'] == 'Sim') { 

		
		$q = "DELETE FROM prato WHERE prato_id=$id LIMIT 1";		
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) {
		
			echo '<p align="center"> prato foi excluído.';
			echo '</br><a align="center" class="waves-effect waves-light btn green"  href="adminvisualizaprato.php">Voltar</a></p>';	
		
		} else { 
			echo '<p class="error">O prato não pode ser excluído devido a um erro do sistema.</p>'; 
			echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; 
		}
	
	} else { 
		header('location:adminvisualizaprato.php');	
	}

} else { 

	$q = "SELECT * FROM prato WHERE prato_id=$id";
	$r = @mysqli_query ($dbc, $q);
	
	if (mysqli_num_rows($r) == 1) { 
		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);

echo '<form action="adminexcluiprato.php" method="post">
			<ul class="collection">
	     <li class="collection-item avatar">
	      <img src="'.$row['prato_linkfoto'].'"  class="circle">
	      <span class="title">'.$row['prato_id'].'</span>
	      <span class="title">'.$row['prato_nome'].'</span>
	      <p>Tem certeza que deseja excluir este prato?<br />
	    <p>
	      <input  type="radio" id="test1" name="opcao" value="Sim"/>
	      <label for="test1">SIM</label>
	  
	      <input  type="radio" id="test2" name="opcao" value="Nao" />
	      <label for="test2">NAO</label>
	    </p>
	    <p><input class="waves-effect waves-light btn red" type="submit" name="submit" value="Confirma" /></p>
			<input type="hidden" name="submitted" value="TRUE" />
			<input type="hidden" name="id" value="' . $id . '" />
	      
	  </li>
	  </ul>
	</form>';
	
	} else { 
		echo '<p class="error">Esta página foi acessada de modo indevido.</p>';
	}

} 

mysqli_close($dbc);
		

?>
