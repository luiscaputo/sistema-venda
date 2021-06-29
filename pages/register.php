<?php
  require_once '../core/conection.php';
  $nome = $_POST['name'];
  $bi = $_POST['bi'];
  
  if(empty($nome)):
    echo 'Digite Seu nome para continuar.';
  elseif(empty($bi)):
    echo 'Digite seu BI para continuar.';
  else:
    //validando BI
   foreach ($bi as  $x) {
      if(($bi[0] != "/[^0-9]/") && ($bi[9-10] != "/[^a-z]/" || "/[^A-Z]/") && ($bi[11-13] != "/[^0-9]/")){
        echo 'Esta digitanto bi errado!';
       }
   }
      // if(($bi[0] != "/[^0-9]/") && ($bi[9-10] != "/[^a-z]/" || "/[^A-Z]/") && ($bi[11-13] != "/[^0-9]/")){
      //   echo 'Esta digitanto bi errado!';
      // }

    $save = $pdo->prepare("INSERT INTO voters(name, codVoter) VALUES ('$nome', '$bi')");
    $save->execute();

    if($save->rowCount() > 0){
      echo true;
    }else {
      echo 'Erro ao salvar cadastramento';
    }
  endif;
?>