<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="UTF-8">
    <title>Document</title>
      <script type="text/javascript">
       var intervalo = setInterval(function () {
            $('#DIVupdate').load(document.URL +  '#DIVupdate');
            
          }, 3000);
      </script>
   </head>

    <body>
      <div id="DIVupdate"> 
       <input type="text" value="
          <?php
          date_default_timezone_set('America/Sao_Paulo');
          $data = date('d/m/Y');
          ?>
        "/>
            <input type="text" value="
              <?php
              date_default_timezone_set('America/Sao_Paulo');
              $hora = date('H:i:s');
              ?>
            "/>

      </div>
      <input type="text"/>
     

   </body>

  <footer>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/index.js"></script>
  </footer>

</html>

