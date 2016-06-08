<?php
if (empty($_COOKIE['usuario'])){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}

require_once('includes/conexao.php');//chama arquivo de conexao 
include('includes/topHome.html');
 echo '<h5 align="center"> Pontua Pratos </h5>';
$Nimg = 0;

$q = " SELECT * FROM prato ORDER BY prato_id   ";  // M maiusc chama o nome do mes 

$r = @mysqli_query($dbc, $q); // joga na query a conexao, Query @ nao  exibe erro apontando os dados do banco (trateremos isso )

$num = mysqli_num_rows($r);
 
 if ($num > 0){
      while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
        $Nimg = $Nimg +1;
        
        echo ' <form  action="cadastroPontuacao.php" method="post" >

              <div class="parallax-container valign-wrapper">
                          <div class="section no-pad-bot">
                            <div class="container">
                              <div class="row center">
                               <h5 class="header col s12 light">'.$row['prato_nome'].'</h5>
                               <h5 class="header col s12 light">Prato ID '.$row['prato_id'].'</h5>

                              </div>
                            </div>
                          </div>

                          <div class="parallax"><img src="'.$row['prato_linkfoto'].'" alt="Unsplashed background img '.$Nimg.'"></div>
                         </div>
                     <div class="container">
                          <div class="section">
                            <div class="row">
                              <div class="col s12 center card-content">
                                <h3><i class="mdi-content-send brown-text"></i></h3>
                                <h4>'.$row['prato_desc'].'</h4>
                                <p class="left-align light"> Ingredientes: '.$row['prato_ingredientes'].'</p>
                              </div></br>
                       </div><br>
                    <div class="input-field">
                        <a align="center">Pontue de 1-10 </a> 
                      <p class="range-field "><input id="ponto" name="ponto" type="range" id="ponto" min="1" max="10" /> </p>
                  
                    
                   <div align ="center" >
                        
                       <button class="btn waves-effect waves-light orange darken-4" type="submit" name="submit" value="salvar">Pontuar<i class="material-icons right">send</i></button>
                       <input type="hidden" name="submitted" value="TRUE" >
                   </div>
                   <div  class="input-field col s6">
                      <input  id="fkpratoid" type="hidden" name="fkpratoid" maxlength="50" length="50" value="'.$row['prato_id'].'"> 
                   </div>

                            </div>
                          </div>
 
                        </div>
                    </form> ';//tr=linha td=coluna (while cria linhas)
      }  
   
     mysqli_free_result($r);

} else{
  echo'<p class="error" align="center"> atualmente nao ha Pratos cadastrados </p>';
  mysqli_close($dbc);
}

     include ('footer.html');

?>
