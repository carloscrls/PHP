<?php
#controle de Cookie 

        setcookie("usuario","",time()+60*60*24*30);
        header('Location:index.php');
 
#Fim do controle de cookie 
?>