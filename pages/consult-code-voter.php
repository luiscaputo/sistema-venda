<?php
  require_once '../core/conection.php';
  require_once 'includes/header.php';
  if(isset($_POST['consult'])){
    $name = filter_input(INPUT_POST, 'data');
    $consult = $pdo->prepare("SELECT * FROM voters WHERE name like '%$name%'");
    $consult->execute();
    if($consult->rowCount()){
      echo '
        <table class="text-center table" style="color: white;">
        <tr class="bg-danger">
          <th scope="col">NºRegistro</th>
          <th scope="col">Nome</th>
          <th scope="col">Código de Voto*</th>
          <th scope="col">Data de Registro</th>
        </tr>
      ';
      while($data = $consult->fetch(PDO::FETCH_ASSOC)){
        echo '
        <tr class="">
          <td scope="row">'.$data['id'].'</td>
          <td>'.$data['name'].'</td>
          <td><b>'.$data['codVoter'].'<b></td>     
          <td>'.$data['created_at'].'</td>
        </tr>
        </table>
      ';
      echo '<a href="../index">VOLTAR</a>';
      }
    }else{
      echo '<h3 class="text-center">NÃO HÁ REGISTRO COM ESSE NOME!</h3>';
      // return false;
    }
  }

  require_once 'includes/footer.php';
?>