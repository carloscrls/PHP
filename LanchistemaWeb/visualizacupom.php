<?php
if (empty($_COOKIE['usuario'])){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}

require_once('includes/conexao.php');//chama arquivo de conexao 
 include('includes/topHome.html');

 $erros = array();

  if (empty($_POST['ncupom'])) {
    $erros[] = "Voce esqueceu de 
    digitar cupom.";
    } else {
      $ncupom = mysqli_real_escape_string ($dbc, trim($_POST['ncupom']));
    }
 if (empty($erros)) {
   $q = "SELECT * FROM promocao, prato WHERE promo_numcupom = ".$ncupom." 
           and promocao.promo_pratoId = prato.prato_id and promocao.utilizado IS NULL ";
       // ** and cupom_status != usado ** ideia !
       // $ncpm recebera o numero do cupom digitado 

    $r = @mysqli_query($dbc, $q); // joga na query a conexao, Query @ nao  exibe erro apontando os dados do banco (trateremos isso )

    $num = mysqli_num_rows($r);
     
     if ($num > 0){
        $qry = "update promocao set utilizado = 1 where promo_numcupom = ".$ncupom.";";
        $insrt = @mysqli_query($dbc, $qry);  

          while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){//Rrecebe cnxç/query
           
           echo'
                <ul class="collection">
                  <li class="collection-item avatar">
                  <img src="'.$row['prato_linkfoto'].'"  class="circle">
                  <span class="title">Cupom '.$row['promo_numcupom'].'</span>
                  <span class="title">Nome Prato '.$row['prato_nome'].'</span>
                  <span class="title">Prato '.$row['prato_desc'].'</span>
                  <span class="title">Promo '.$row['promo_desc'].'</span>
                 </li>
              </ul>';

          } 
            
       echo'</table>';
         mysqli_free_result($r);
 
    } else
      echo'<p class="error" align="center"> Infelizmente voce não foi sorteado lamentamos provavelmente este cupom ja foi utilizado :( </br></p>';
      echo '<a align="center" href="home.php" class="waves-effect waves-orange btn-flat" type="submit" >Voltar</a><br>

            <a href="javascript:self.print()" align="center" href="home.php" class="waves-effect waves-orange btn-flat" type="submit" >Imprimir</a><br>
            ';
      
      mysqli_close($dbc);}
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

  echo'</body> </html>';
?>



