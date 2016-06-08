<!DOCTYPE html> 
<html lang="PT-BR">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <meta name="theme-color" content="#ef6c00 " />
  <title>Cadastro</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body background="http://www.innovarepesquisa.com.br/wp-content/uploads/2013/12/bg.jpg">


   <div class="navbar-fixed orange darken-2">
    <nav>
      <div class="nav-wrapper orange darken-2">
        <a href="#!" class="brand-logo orange darken-2">HOME</a>
        <ul class="right hide-on-med-and-down">
       <!--    <?php
          if ($_COOKIE['usuario'] == 'carlos'){
          echo' -->
          <li><a href="cadastroPrato.html">Cad. Prato</a></li>
           <li><a href="cadastroCupom.html">Cad. Cupom</a></li>
            <li><a href="cadastroPromocaoHTML.php">Cad. Promocao</a></li>
             <li><a href="cadastroUser.html">Cad. Usuario</a></li>
              <li><a href="adminvisualizaprato.php">Adm. Prato</a></li>
               <li><a href="adminvisualizausuario.php">Adm. Usuario</a></li>
                <li><a href="adminvisualizapromocao.php">Adm. Promocao</a></li><!-- ';
              }?> -->
             <li><a href="visualizacupomhtml.html">Tentar a Sorte</a></li>
              <li><a href="homePontuacao.php">Pontuar Pratos</a></li>
               <li><a href="logout.php">SAIR</a></li>
        </ul>
         <ul id="nav-mobile" class="side-nav" >
           <!--  <?php
          if ($_COOKIE['usuario'] == 'carlos'){
          echo' -->
          <li><a href="cadastroPrato.html">Cad. Prato</a></li>
           <li><a href="cadastroCupom.html">Cad. Cupom</a></li>
            <li><a href="cadastroPromocaoHTML.php">Cad. Promocao</a></li>
             <li><a href="cadastroUser.html">Cad. Usuario</a></li>
              <li><a href="adminvisualizaprato.php">Adm. Prato</a></li>
               <li><a href="adminvisualizausuario.php">Adm. Usuario</a></li>
                <li><a href="adminvisualizapromocao.php">Adm. Promocao</a></li><!-- ';
              }?> -->
             <li><a href="visualizacupomhtml.html">Tentar a Sorte</a></li>
              <li><a href="homePontuacao.php">Pontuar Pratos</a></li>
               <li><a href="index.php">SAIR</a></li>
        
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    
      </div>
    </nav>
  </div>

  <form  action="cadastroPromocao.php" method="post" >
 
    <div id="panelcad"style="padding:50px;"  >
 
   <div  class="input-field col s6">
    <input  id="promo" type="text" name="promo" maxlength="50" length="50"> 
    <label for="promo">Promocao descricao</label>  <br>  
    </div> <br>  
    <div   class="input-field col s6">  
   <?php
     require_once('includes/conexao.php');
     $resultado='Cupons Disponiveis ';

     $q="select cupom_numcupom from cupom where cupom_numcupom not in (Select promo_numcupom from promocao) order by cupom_numcupom"; 
     $r = @mysqli_query($dbc, $q);
     $num = mysqli_num_rows($r);

       while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
       $resultado = $resultado .' '. ($row['cupom_numcupom']).' - ';
     }
     
     echo' <input id="fknumcupom"  type="number" name="fknumcupom"maxlength="11" length="11"> 
    <label for="fknumcupom">'.$resultado.'</label> <br>';
     ?> 
   </div> <br> 
   
 <div   class="input-field col s6">  
  <?php
     require_once('includes/conexao.php');
     $resultado='Pratos Disponiveis ';

     $q="select prato_id from prato where prato_id not in (select promo_pratoId from promocao)"; 
     $r = @mysqli_query($dbc, $q);
     $num = mysqli_num_rows($r);

       while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
       $resultado = $resultado .' '. ($row['prato_id']).' - ';
     }
     
     echo' <input id="fkpratoid"  type="number" name="fkpratoid"maxlength="11" length="11"> 
    <label for="fkpratoid">'.$resultado.'</label> <br> ';
     ?> 

    </div> <br> 
    
     
  </div> 

   
    <div align ="center" >
     <button onclick="Materialize.toast('GRAVADO COM SUCESSO!!!', 5000,'rounded')" class="btn waves-effect waves-light" type="submit" name="submit" value="salvar">Salvar <i class="material-icons right">send</i></button>
     <input type="hidden" name="submitted" value="TRUE" >
     <a align="center" href="home.php"class="waves-effect waves-orange btn-flat" type="submit" name="btn_enter">Voltar</a>
    </div> 

 </form>
 

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
