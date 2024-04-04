<?php
session_start();

//Montagem do texto
$texto = implode('#', str_replace('#', '-', $_POST)).'#'.$_SESSION['id'].PHP_EOL;

//Abrindo o arquivo
$arquivo = fopen('../../app_help_desk2/arquivo.hd', 'a');
//Escrevendo o texto
fwrite($arquivo, $texto);
//Fechando o arquivo
fclose($arquivo);
//Volta para a página abrir chamado
header('location:abrir_chamado.php');

?>