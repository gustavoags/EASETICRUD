<?php 
#CONECTANDO COM O BANCO DE DADOS LOCAL;
define('localhost', '127.0.0.1');
define('usuario', 'root');
define('senha', '');
define('bancodedados', 'ease');

$conexao = mysqli_connect(localhost, usuario, senha, bancodedados) or die ('Não foi possível se conectar!')
?>