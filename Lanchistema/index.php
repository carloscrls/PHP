<?php

     unset($_COOKIE['usuario']);


      include ('includes/top.html');
      echo '<h5 align="center">  </h5>';
      require_once('includes/conexao.php');
      $Nimg = 1;
      $q = " select * , sum(pontuacao_ponto) as total from prato, pontuacao where prato_id = pontuacao_prato_id 
       group by pontuacao_prato_id order by total DESC "; 
      $r = @mysqli_query($dbc, $q); // joga na query a conexao, Query @ nao  exibe erro apontando os dados do banco (trateremos isso )
  
echo'
    <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">search</i></h2>
            <h5 class="center">Aqui voce encontra</h5>

            <p class="light">Os melhores pratos do Lanchistema, abaixo esta listado os melhores pratos de nosso cardapio.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Esta com sorte ?</h5>

            <p class="light">Basta se cadastrar entrar e utilizando seu cupom voce concorre a muitos premios</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">done</i></h2>
            <h5 class="center">Qual o melhor prato?</h5>

            <p class="light">Entre e pontue nossos pratos de 0-10, coloque seu prato preferido no TOP deste ranking</p>
          </div>
        </div>
      </div>

    </div>
  </div>
  ';


        $num = mysqli_num_rows($r);
          if ($num > 0){
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
              echo ' 
                      <div  class="parallax-container valign-wrapper" id="box" >
                          <div class="section no-pad-bot">
                            <div class="container">
                              <div class="row center">
                                <h5 class="header col s12 light">Prato Top '.$Nimg.' - '.$row['prato_nome'].'</h5>
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
                                 <p class="left-align light">Total Pontos: '.$row['total'].' </p>
                              </div>
                            </div>
                          </div>
                        </div>';
                      $Nimg = ($Nimg +1);
           }}
    
    
     include ('footer.html');



?> 



    