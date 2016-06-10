<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>FoodMania</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav id="nav" class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">FoodMania</a>

      <ul class="right hide-on-med-and-down">
        <li><a href="#">Pizzas</a></li>
        <li><a href="#">Bebidas</a></li>
        <li><a href="#">Outros</a></li>
        <li><a data-target="modal1" class=" modal-trigger">Carrinho<i data-target="modal1"class="material-icons right  modal-trigger">shopping_cart</i></a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a data-target="modal1" class="btn modal-trigger">Carrinho<i class="material-icons right">shopping_cart</i></a></li>
        <li><a  class="btn" href="#prato1">Pizzas<i class="material-icons right">stars</i></a></li>
        <li><a  class="btn" href="#prato2">Bebidas<i class="material-icons right">stars</i></a></li>
        <li><a  class="btn" href="#prato3">Outros<i class="material-icons right">stars</i></a></li>
        
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

   
    <!-- imagem logo  -->
    </br> 
     <div class=" row s12">
        <img class="col s12" src="https://goo.gl/f5mJAZ" > <!-- 1024x100 obrigatorio image -->
     </div >
  <!-- fim imagem logo  -->

     
<!--   #CODIGO AQUI --> 
<div style="padding-left: 5%; padding-right: 5%;"> <!-- tudo esta dentro desta div -->


<ul>
<li class="striped">
  <div align="center"><h5>Monte sua Pizza</h5></div>
 <div class="row s12" >
    <select class="icons col s6">
      <option value="" disabled selected>Tamanho</option>
      <option value=""  class="left circle">Pequena 4 Pedaços</option>
      <option value=""  class="left circle">Media 8 Pedaços</option>
      <option value=""  class="left circle">Grande 16 Pedaços</option>
    </select>
   
   <select class="icons col s6">
      <option value="" disabled selected>Sabores</option>
      <option value=""  class="left circle">Inteira</option>
      <option value=""  class="left circle">Dois Sabores</option>
      <option value=""  class="left circle">Três Sabores</option>
    </select>
</div>


<div id="pratos123" class="row "><!-- responsividdade dos pratos -->

    <fieldset align="center" id="prato1" class="row z-depth-5 col s12 m4 l4" style="background-color: #f5f5f5 ;"><!-- prato 1 -->
     <div class="row s12">
        <select class="icons col s12">
          <option value="" disabled selected>Sabor 1</option>
          <option value="" data-icon="http://bomgostopizzaria.com.br/site/wp-content/uploads/2013/11/Pizza_4_queijo.png" class="left circle"><b>Quatro Queijos</b> </option>
          <option value="" data-icon="http://www.receitadodia.com/wp-content/uploads/2015/08/Receita-de-pizza-portuguesa.jpg" class="left circle">Portuguesa </option>
          <option value="" data-icon="http://static.pedidor.com/pizza-bolonhesa-imgp-b1-509080828bc3914847000005-5091941c8bc391d52b000004-7f18eb7d2fe94321940ce5e29da02b7b.jpeg" class="left circle">Bolonhesa </option>
        </select>
       </div> 
       <div id="ingredientes" align="center">
          <label align="center" class="">Ingredientes para Prato 1</label></br></br>
          <input type="checkbox" class="filled-in" id="filled-in-box1" checked="checked" />
          <label for="filled-in-box1">Presunto </label>

          <input type="checkbox" class="filled-in" id="filled-in-box2" checked="checked" />
          <label for="filled-in-box2">Queijo </label>

          <input type="checkbox" class="filled-in" id="filled-in-box3" checked="checked" />
          <label for="filled-in-box3">Alho </label>

          <input type="checkbox" class="filled-in" id="filled-in-box4" checked="checked" />
          <label for="filled-in-box4">Cebola </label>

          <input type="checkbox" class="filled-in" id="filled-in-box5" checked="checked" />
          <label for="filled-in-box5">Azeitona </label>

          <input type="checkbox" class="filled-in" id="filled-in-box6" checked="checked" />
          <label for="filled-in-box6">Molho </label>

          <input type="checkbox" class="filled-in" id="filled-in-box7" checked="checked" />
          <label for="filled-in-box7">Urucum </label>

          <input type="checkbox" class="filled-in" id="filled-in-box8" checked="checked" />
          <label for="filled-in-box8">Alface </label>
        </div></br>
        <div id="ingredientes" align="center">
         <label align="center" class="">Ingredientes Adicionais Prato 1</label></br></br>
          <input type="checkbox" class="filled-in" id="filled-in-box123"  />
          <label for="filled-in-box123">Molho de cebola </label>

          <input type="checkbox" class="filled-in" id="filled-in-box223"  />
          <label for="filled-in-box223">Bacon </label>

          <input type="checkbox" class="filled-in" id="filled-in-box323"  />
          <label for="filled-in-box323">Pimenta Calabresa</label>
       </br></br><label align="center">Varlor unitário R$ 31,00</label>
      </div> <!-- </br> -->
          
      </fieldset> <!-- fim prato1      --> 
       
      <fieldset align="center" id="prato2" class="row z-depth-5 col s12 m4 l4" style="background-color: #f5f5f5 ;"><!-- prato 2 -->

      <div class="row s12">
        <select class="icons col s12">
          <option value="" disabled selected>Sabor 2</option>
          <option value="" data-icon="http://bomgostopizzaria.com.br/site/wp-content/uploads/2013/11/Pizza_4_queijo.png" class="left circle"><b>Quatro Qjos</b></option>
          <option value="" data-icon="http://www.receitadodia.com/wp-content/uploads/2015/08/Receita-de-pizza-portuguesa.jpg" class="left circle">Portuguesa </option>
          <option value="" data-icon="http://static.pedidor.com/pizza-bolonhesa-imgp-b1-509080828bc3914847000005-5091941c8bc391d52b000004-7f18eb7d2fe94321940ce5e29da02b7b.jpeg" class="left circle">Bolonhesa </option>
        </select>
      </div>
    <div id="ingredientes" align="center">
         <label align="center" class="">Ingredientes para Prato 2</label></br></br>
          <input type="checkbox" class="filled-in" id="filled-in-box11" checked="checked" />
          <label for="filled-in-box11">Presunto </label>

          <input type="checkbox" class="filled-in" id="filled-in-box21" checked="checked" />
          <label for="filled-in-box21">Queijo </label>

          <input type="checkbox" class="filled-in" id="filled-in-box31" checked="checked" />
          <label for="filled-in-box31">Alho </label>

          <input type="checkbox" class="filled-in" id="filled-in-box41" checked="checked" />
          <label for="filled-in-box41">Cebola </label>

          <input type="checkbox" class="filled-in" id="filled-in-box51" checked="checked" />
          <label for="filled-in-box51">Azeitona </label>

          <input type="checkbox" class="filled-in" id="filled-in-box61" checked="checked" />
          <label for="filled-in-box61">Molho </label>

          <input type="checkbox" class="filled-in" id="filled-in-box71" checked="checked" />
          <label for="filled-in-box71">Urucum </label>

          <input type="checkbox" class="filled-in" id="filled-in-box81" checked="checked" />
          <label for="filled-in-box81">Alface </label>
        </div></br>
        <div id="ingredientes" align="center">
         <label align="center" class="">Ingredientes Adicionais Prato 2</label></br></br>
          <input type="checkbox" class="filled-in" id="filled-in-box122"  />
          <label for="filled-in-box122">Molho de cebola </label>

          <input type="checkbox" class="filled-in" id="filled-in-box222"  />
          <label for="filled-in-box222">Bacon </label>

          <input type="checkbox" class="filled-in" id="filled-in-box322"  />
          <label for="filled-in-box322">Pimenta Calabresa</label>
          </br></br><label align="center">Varlor unitário R$ 32,00</label>
      </div><!-- </br> -->
      
      </fieldset> <!-- fim prato2      --> 

      <fieldset align="center" id="prato3" class="row z-depth-5 col s12 m4 l4" style="background-color: #f5f5f5 ;"><!-- prato 3 -->

      <div class="row s12">
        <select class="icons col s12">
          <option value="" disabled selected>Sabor 3</option>
          <option value="" data-icon="http://bomgostopizzaria.com.br/site/wp-content/uploads/2013/11/Pizza_4_queijo.png" class="left circle"><b>Quatro Qjos</b></option>
          <option value="" data-icon="http://www.receitadodia.com/wp-content/uploads/2015/08/Receita-de-pizza-portuguesa.jpg" class="left circle">Portuguesa </option>
          <option value="" data-icon="http://static.pedidor.com/pizza-bolonhesa-imgp-b1-509080828bc3914847000005-5091941c8bc391d52b000004-7f18eb7d2fe94321940ce5e29da02b7b.jpeg" class="left circle">Bolonhesa </option>
        </select>
      </div>
    <div id="ingredientes" align="center">
         <label align="center" class="">Ingredientes para Prato 3</label></br></br>
          <input type="checkbox" class="filled-in" id="filled-in-box311" checked="checked" />
          <label for="filled-in-box311">Presunto </label>

          <input type="checkbox" class="filled-in" id="filled-in-box321" checked="checked" />
          <label for="filled-in-box321">Queijo </label>

          <input type="checkbox" class="filled-in" id="filled-in-box331" checked="checked" />
          <label for="filled-in-box331">Alho </label>

          <input type="checkbox" class="filled-in" id="filled-in-box341" checked="checked" />
          <label for="filled-in-box341">Cebola </label>

          <input type="checkbox" class="filled-in" id="filled-in-box351" checked="checked" />
          <label for="filled-in-box351">Azeitona </label>

          <input type="checkbox" class="filled-in" id="filled-in-box361" checked="checked" />
          <label for="filled-in-box361">Molho </label>

          <input type="checkbox" class="filled-in" id="filled-in-box371" checked="checked" />
          <label for="filled-in-box371">Urucum </label>

          <input type="checkbox" class="filled-in" id="filled-in-box381" checked="checked" />
          <label for="filled-in-box381">Alface </label>
        </div></br>
        <div id="ingredientes" align="center">
         <label align="center" class="">Ingredientes Adicionais Prato 3</label></br></br>
          <input type="checkbox" class="filled-in" id="filled-in-box3122"  />
          <label for="filled-in-box3122">Molho de cebola </label>

          <input type="checkbox" class="filled-in" id="filled-in-box3222"  />
          <label for="filled-in-box3222">Bacon </label>

          <input type="checkbox" class="filled-in" id="filled-in-box3322"  />
          <label for="filled-in-box3322">Pimenta Calabresa</label>
          </br></br><label align="center">Varlor unitário R$ 32,00</label>
      </div><!-- </br> -->
      
      </fieldset> <!-- fim prato3      --> 

</div><!-- fim responsividdade dos pratos -->  
  

</li>
<li>
 
<!-- botao -->
<div align="center" >
  <a href="#nav"><button  class="btn waves-effect waves-light" type="submit" name="action" onclick="Materialize.toast('Adicionado ao Carrinho!', 4000, 'rounded');" >Adicionar ao carrinho
    <i class="material-icons right">shopping_cart</i>
  </button></a>
</div> 
<!-- botao -->

</div>

</li>
</ul>
</div>
<!--   #CODIGO atéAQUI  -->
  
  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
    </div>
      
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>

          <!-- MODAL -->
            <div id="modal1" class="modal">
              <div class="modal-content">
                <ul>
                 Prato1 R$ 30,00</br>
                 Prato2 R$ 30,00</br>
                 Prato3 R$ 30,00</br>
                 <input type="text" value="R$ 90,00"/></br>
                </ul>
              </div>
              <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Não</a>
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Sim</a>
              </div>
            </div>
          <!-- FIM MODAL --> 

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
