<?php
if (empty($_COOKIE['usuario'])){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');}

require_once('includes/conexao.php');//chama arquivo de conexao 
 include('includes/topHome.html');

$q = " SELECT * FROM prato where prato_id = $fkpratoid ";  // M maiusc chama o nome do mes 

$r = @mysqli_query($dbc, $q); // joga na query a conexao, Query @ nao  exibe erro apontando os dados do banco (trateremos isso )

$num = mysqli_num_rows($r);
 
 if ($num > 0){
      while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){//Rrecebe cnxç/query
       
        echo ' <div class="row" id="paneltop3"  >
                <div  class="col s12 m0">
                 <div  class="card">
                  <div  class="card-image">
                     <tr >
                        <td><h3 align ="center" class="flow-text" > Prato pontuado '.$row['prato_nome'].'</h></td></br>
                         <td class="flow-text" > Cod.'.$row['prato_id'].'</td><br>
                         <td class="flow-text" > '.$ponto.' Pontos atribuidos </td>
                         <br/><td class="flow-text" >Sobre: '.$row['prato_desc'].'</td>
                         <td> <img  style="padding-left:50px; padding-right:50px;  width:100% ;height:50%;!important"  src="'.$row['prato_linkfoto'].'"></td></br></br>
                         <td> <a href="homePontuacao.php" class="btn waves-effect waves-light orange" type="submit" name="btn_voltar">Voltar</a></td>
                     </tr>
                 </div>
               <div class="card-content" >
              <p> Ingredientes: '.$row['prato_ingredientes'].'</p>
            </div>
          </div>
         </div>
        </div><br> 
      </div>';//tr=linha td=coluna (while cria linhas)

      }  
   echo'</table>';
     mysqli_free_result($r);

} else
  echo'<p class="error" align="center"> o ID do prato digitado não é valido </p><br>
 <p class="error" align="center"> <a href="homePontuacao.php" class="btn waves-effect waves-light orange" type="submit" name="btn_voltar">Voltar</a></p><br>';
  mysqli_close($dbc);

  echo'</body> </html>';
?>
