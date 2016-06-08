<?php # Script - apaga_usuario.php
if (empty($_COOKIE['usuario'])and($_COOKIE['usuario']=='carlos')){
echo'<h1 align="center">Erro Usu·rio n„o logado</h1>';
header('location:index.php');}


include ('includes/topHome.html');

if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { 
	$id = $_GET['id'];

} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { 
	$id = $_POST['id'];
} else { 
	echo '<p class="error">Esta p√°gina foi acessada de modo indevido.</p>';
	include ('includes/footer.html'); 
	exit();
}

require_once ('includes/conexao.php');

if (isset($_POST['submitted'])) {

	if ($_POST['opcao'] == 'Sim') { 

		
		$q = "UPDATE usuarios set blok = 1 where usu_id = $id LIMIT 1 ";		
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) {
		
			echo '<p align="center"> usuario bloqueado.';	
			echo '</br><a align="center" class="waves-effect waves-light btn green"  href="adminvisualizausuario.php">Voltar</a></p>';
		
		} else { 
			echo '<p class="error">erro pois Usuario ja se encontra bloqueado.</p>'; 
			echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';
			header('location:adminvisualizausuario.php'); 
		}
	
	}
	
	if ($_POST['opcao'] == 'Nao') { 

		
		$q = "UPDATE usuarios set blok = 0 where usu_id = $id LIMIT 1 ";		
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) {
		
			echo '<p align="center"> usuario foi desbloqueado.';	
			echo '</br><a align="center" class="waves-effect waves-light btn green"  href="adminvisualizausuario.php">Voltar</a></p>';
		
		} else { 
			echo '<p class="error">erro pois Usuario ja se encontra debloqueado</p>'; 
			echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';
			header('location:adminvisualizausuario.php');  
		}
	
	}
	

} else { 

	$q = "SELECT * FROM usuarios WHERE usu_id=$id";
	$r = @mysqli_query ($dbc, $q);
	
	if (mysqli_num_rows($r) == 1) { 
		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);

echo '<form action="adminbloquearusuario.php" method="post">
			<ul class="collection">
	     <li class="collection-item avatar">
	      
	      <span class="title">ID:'.$row['usu_id'].'</span>
	      <span class="title">Nome:'.$row['usu_nome'].'</span>
	      <span class="title">Email:'.$row['usu_email'].'</span>

	      <p>Tem certeza que deseja Bloquear/Desbloquear este usuarios?<br />
	    <p>
	      <input  type="radio" id="test1" name="opcao" value="Sim"/>
	      <label for="test1">Bloquear</label>
	  
	      <input  type="radio" id="test2" name="opcao" value="Nao" />
	      <label for="test2">Desbloquear</label>
	    </p>
	    <p><input class="waves-effect waves-light btn red" type="submit" name="submit" value="Confirma" /></p>
			<input type="hidden" name="submitted" value="TRUE" />
			<input type="hidden" name="id" value="' . $id . '" />
	      
	  </li>
	  </ul>
	</form>';
	
	} else { 
		echo '<p class="error">Esta p√°gina foi acessada de modo indevido.</p>';
	}

} 

mysqli_close($dbc);
		

?>
