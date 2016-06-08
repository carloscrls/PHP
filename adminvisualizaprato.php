

<?php 
if (empty($_COOKIE['usuario'])and($_COOKIE['usuario']=='carlos')){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}

include('includes/topHome.html');

echo'<h4 align="center"> Excluir ou Editar Pratos</h4>';
require_once('includes/conexao.php');

$q = "SELECT * FROM prato ";
$r = mysqli_query($dbc, $q);

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
  
echo'
<ul class="collection">
<li class="collection-item avatar">
      <img src="'.$row['prato_linkfoto'].'"  class="circle">
      <span class="title">'.$row['prato_id'].'</span>
      <span class="title">'.$row['prato_nome'].'</span>
      <p><a  class="waves-effect waves-light btn red"
              href="adminexcluiprato.php?id='. $row['prato_id'] . '">Excluir</a> 
         <a  class="waves-effect waves-light btn orange" 
              href="adminalteraprato.php?id='. $row['prato_id'] . '">Editar</a>
      </p>
      
  </li>
  </ul>
';
  }
  

include('footer.html');
mysqli_free_result($r); 
mysqli_close($dbc);


?>





