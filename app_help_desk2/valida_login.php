<?php
session_start();
   $usuario_id = null;
   $usuario_autenticado = false;
   $ususario_perfil_id =null;
   $perfis =[1=>'administrativo', 2 =>'usuário'];
   $usuario_app = [  ['id'=> 1, 'email'=>'magno@teste.com.br','senha'=>'123456', 'perfil_id' => 1],
                     ['id'=> 2,'email'=>'adm@teste.com.br', 'senha'=>'123456', 'perfil_id' => 1],
                     ['id'=> 3,'email'=>'user@teste.com.br', 'senha'=>'123456', 'perfil_id' => 2], 
                     ['id'=> 4,'email'=>'nata@teste.com.br', 'senha'=>'123456', 'perfil_id' => 2], 
];
   
foreach($usuario_app as $user){
   $user['email'];
   $user['senha'];
  $_POST['email'];
  $_POST['senha'];
 
  
    if($user['email']==$_POST['email']&&$user['senha']==$_POST['senha']){
       $usuario_autenticado = true;  
       $usuario_id = $user['id'];
       $usuario_perfil_id = $user['perfil_id'];
    }
   
}
//checagem inicial dos dados de formulário
if($usuario_autenticado){
    echo'Usuário autenticado';
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
   header('location: home.php');
}else{
    $_SESSION['autenticado'] = 'NAO';
   header('location: index.php?login=erro'); 
}

?>