<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Cadastro</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body background="http://healtlifetips.com/wp-content/uploads/2015/09/wallpaper-healthy-food-gallery-wrhth.jpg">
 
   <div class="navbar-fixed orange darken-2">
    <nav>
      <div class="nav-wrapper orange darken-2">
        <a href="#!" class="brand-logo orange darken-2">HOME</a>
        <ul class="right hide-on-med-and-down">
          <?php
          if ($_COOKIE['usuario'] == 'carlos'){
          echo'
          <li><a href="cadastroPrato.html">Cad. Prato</a></li>
           <li><a href="cadastroCupom.html">Cad. Cupom</a></li>
            <li><a href="cadastroPromocaoHTML.php">Cad. Promocao</a></li>
             <li><a href="cadastroUser.html">Cad. Usuario</a></li>
              <li><a href="adminvisualizaprato.php">Adm. Prato</a></li>
               <li><a href="adminvisualizausuario.php">Adm. Usuario</a></li>
                <li><a href="adminvisualizapromocao.php">Adm. Promocao</a></li>';
              }?>
             <li><a href="visualizacupomhtml.html">Tentar a Sorte</a></li>
              <li><a href="homePontuacao.php">Pontuar Pratos</a></li>
               <li><a href="logout.php">SAIR</a></li>
        </ul>
         <ul id="nav-mobile" class="side-nav" >
            <?php
          if ($_COOKIE['usuario'] == 'carlos'){
          echo'
          <li><a href="cadastroPrato.html">Cad. Prato</a></li>
           <li><a href="cadastroCupom.html">Cad. Cupom</a></li>
            <li><a href="cadastroPromocaoHTML.php">Cad. Promocao</a></li>
             <li><a href="cadastroUser.html">Cad. Usuario</a></li>
              <li><a href="adminvisualizaprato.php">Adm. Prato</a></li>
               <li><a href="adminvisualizausuario.php">Adm. Usuario</a></li>
                <li><a href="adminvisualizapromocao.php">Adm. Promocao</a></li>';
              }?>
             <li><a href="visualizacupomhtml.html">Tentar a Sorte</a></li>
              <li><a href="homePontuacao.php">Pontuar Pratos</a></li>
               <li><a href="index.php">SAIR</a></li>
        
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    
      </div>
    </nav>
  </div>
 
<?php
if (empty($_COOKIE['usuario'])){
echo'<h1 align="center">Erro Usuário não logado</h1>';
header('location:index.php');
}
?>

<h5 align="center"> Bem Vindo  <?php echo $_COOKIE['usuario']; ?> </h5>




<div align="center">
<iframe src="https://docs.google.com/forms/d/1sz7RLqL05D2BnuqNvge-ivpd8wHDczT2Tn_JmNPix-c/viewform?embedded=true" width="90%" height="768px" frameborder="0" marginheight="0" marginwidth="0">Carregando…</iframe>
</div>
 

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>


<!-- Exemplo para paginaÃ§Ã£o 
select nom_editado  from vw_atrib_org_status_atual order by nom_editado limit PartindoDe +1 , Exiba -->