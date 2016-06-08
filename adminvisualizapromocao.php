<?php 
if (empty($_COOKIE['usuario'])and($_COOKIE['usuario']=='carlos')){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}

include('includes/topHome.html');
echo'<h4 align="center"> Excluir/Editar Promocao</h4>';
require_once('includes/conexao.php');

$q = "SELECT * FROM promocao ";
$r = mysqli_query($dbc, $q);

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
  
echo'
<ul class="collection">
<li class="collection-item avatar">
      <img src="http://goo.gl/wjpdvM" alt="" class="circle">
      <span class="title">'.$row['promo_desc'].'</span>
      <span class="title">'.$row['promo_numcupom'].'</span>


      <p><a  class="waves-effect waves-light btn red"
              href="adminexcluipromocao.php?id='. $row['promo_id'] . '">Excluir</a> 
         <a  class="waves-effect waves-light btn orange" 
              href="adminalterapromocao.php?id='. $row['promo_id'] . '">Editar</a>
      </p>
      
  </li>
  </ul>
';
  }
  

include('footer.html');
mysqli_free_result($r); 
mysqli_close($dbc);


?>





