<?php 
if (empty($_COOKIE['usuario'])and($_COOKIE['usuario']=='carlos')){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}

include('includes/topHome.html');
echo'<h4 align="center"> Excluir/Editar Promocao</h4>';
require_once('includes/conexao.php');

$q = "SELECT * FROM usuarios ";
$r = mysqli_query($dbc, $q);

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

  if ($row['blok']==1){
  $bloqueado='USUARIO BLOQUEADO';
  $classe=' red ';
}else{
  $classe='   ';
  $bloqueado=' ';
}
  
echo'
<ul class="collection">
<li class="collection-item avatar">
      <img src="https://goo.gl/iI4vKI" alt="" class="circle">
      <span class="title"> ID: '.$row['usu_id'].'</span>
      <span class="title"> Nome: '.$row['usu_nome'].'</span>
      <span class="title"> Email: '.$row['usu_email'].'</span>
      <span class="title '.$classe.'">'.$bloqueado.'</span>


      <p><a  class="waves-effect waves-light btn red"
              href="adminbloquearusuario.php?id='. $row['usu_id'] . '">Bloq/Desbloq</a> 
         <a  class="waves-effect waves-light btn orange" 
              href="adminalterausuario.php?id='. $row['usu_id'] . '">Editar</a>
      </p>
      
  </li>
  </ul>
';
  }
  

include('footer.html');
mysqli_free_result($r); 
mysqli_close($dbc);


?>





