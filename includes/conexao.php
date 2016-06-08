<?php
  
  define('DB_SERVIDOR', 'localhost');
  define('DB_USUARIO', 'HIDDEN');
  define('DB_SENHA', 'HIDDEN');
  define('DB_BANCO', 'u681500055_lanx');
  
$dbc = @mysqli_connect(DB_SERVIDOR,
  DB_USUARIO, DB_SENHA, DB_BANCO) or die ('Não foi possível conectar ao MySQL: '. mysqli_connect_error() );

//   define('DB_SERVIDOR', '127.0.0.1');
//   define('DB_USUARIO', 'root');
//   define('DB_SENHA', '');
//   define('DB_BANCO', 'lanchistema');
  
// $dbc = @mysqli_connect(DB_SERVIDOR,
//   DB_USUARIO, DB_SENHA, DB_BANCO) or die ('Não foi possível conectar ao MySQL: '. mysqli_connect_error() );
  
?>  
	