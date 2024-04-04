<?php
//Caso o cliente tente acessar as páginas protegidas via url diretamente diblando a primeira validação do formulário, 
//é exigido inicialmente essa validação para poder prosseguir em todos os arquivos.
session_start();
   
   if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM' ){
    header('location: index.php?login=erro2');
   }

   ?>