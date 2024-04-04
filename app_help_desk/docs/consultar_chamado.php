

  <?php
  require_once 'validador_acesso.php';
   
?>
<?php
//chamados
  $chamados = array();
//abrir arquivo.hd 
  $arquivo =  fopen('../../app_help_desk2/arquivo.hd', 'r');
  //enquanto hover registros (linhas) a serem recuperados
  // feof testa pelo fim do arquivo, true se encontrar o fim do arquivo e false se não encontrar.
  //operador de negação para inverter quando for true ou false e poder pecorrer cada uma das linhas
  while(!feof($arquivo)){ 
    //Com base no arquivo aberto e a posição do curso o fgets recupera o que estiver na determinada linha.
 $registros = fgets($arquivo);

      $chamado_dados = explode('#', $registros);
      //quantidade de elementos dentro do array chamado-dados se for inferior a 3, 
      //significa que estar faltando dados, se tiver faltando qualquer informação executar o (continue).
        if(count($chamado_dados)<3){
          continue;
        }   
     //Para usuário mostrar apenas os seus chamados
      if($_SESSION['perfil_id'] == 2){
        if($_SESSION['id'] != $chamado_dados[3]){
          continue;
        }
        //Para ADM mostra todos os chamados
        else {
          $chamados[] = $registros;
        }
       }else {
        $chamados[] = $registros;
     }
   }
  fclose($arquivo);
    ?>



<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <?php
        require_once "sair.php";
       ?>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>  
            <div class="card-body">
          
            <?php foreach($chamados as $chamado) { ?>
              <? $chamado_dados = explode('#', $chamado) ?>
              
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$chamado_dados[0]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[1]?></h6>
                  <p class="card-text"><?=$chamado_dados[2]?></p>
                </div>
              </div>    
               
              <? } ?>
              
           
              <div class="row mt-5">
                <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>